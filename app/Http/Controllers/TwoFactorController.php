<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorController extends Controller
{
    protected Google2FA $google2fa;

    public function __construct()
    {
        $this->google2fa = new Google2FA();
    }

    // Show QR Code for Setup
    public function setup()
    {
        $user      = Auth::user();
        $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

        if (! $user->google2fa_secret) {
            $secret                 = $this->google2fa->generateSecretKey();
            $user->google2fa_secret = $secret;
            $user->save();
        }

        $qrCodeUrl = $google2fa->getQRCodeInline(
            config('app.name'),
            $user->email,
            $user->google2fa_secret
        );

        return view('auth.2fa-setup', compact('qrCodeUrl', 'user'));
    }

    // Enable 2FA
    public function enable(Request $request)
    {
        $user                    = Auth::user();
        $user->google2fa_enabled = true;
        $user->save();

        return redirect()->route('dashboard')->with('success', '2FA enabled successfully.');
    }

    // Disable 2FA
    public function disable()
    {
        $user                    = Auth::user();
        $user->google2fa_enabled = false;
        $user->google2fa_secret  = null;
        $user->save();

        return redirect()->route('dashboard')->with('success', '2FA disabled successfully.');
    }

    public function showVerifyForm()
    {
        $pageConfigs = ['myLayout' => 'blank'];

        return view('auth.2fa', ['pageConfigs' => $pageConfigs]);
    }

    // Verify 2FA Code
    public function verify(Request $request)
    {
        $request->validate(['code' => 'required|string']);

        $user = Auth::user();

        if (! $user->google2fa_secret) {
            return back()->with(['errors' => '2FA is not set up.']);
        }

        $isValid = $this->google2fa->verifyKey($user->google2fa_secret, $request->code);
        // dd($this->google2fa->getCurrentOtp($user->google2fa_secret));

        if ($isValid) {
            session(['2fa_authenticated' => true]);
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Invalid authentication code.');
    }
}
