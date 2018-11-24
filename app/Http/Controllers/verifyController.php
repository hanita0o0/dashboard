<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class verifyController extends Controller
{
    /** verify usr with a given activation_no
     * @param string  $activation_no
     * @return \Illuminate\Http\RedirectResponse
     */

    public function verify($activation_no){
        User::where('activation_no',$activation_no)->firstOrFail()
        ->update(['activation_no'=>null]);
        return redirect()
            ->route('home')
            ->with('success','account verified');
    }

}
