<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Ledger;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return view('admin.users.add', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('assets/media/avatars/'), $filename);
            $image = 'public/assets/media/avatars/' . $filename;
        } else {
            $image = 'public/assets/media/avatars/blank.png';
        }

        /**generate random password */
        $password = random_int(10000000, 99999999);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
        ] + ['image' => $image]);

        $data['email'] = $request->email;
        $data['password'] = $password;

        try {
            // Mail::to($request->email)->send(new UserRegister($data));
            return redirect()->route('admin.users.index')->with('success', 'User created successfully');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with(['status' => false, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if ($id != 'get_user') {
            $user = User::findOrFail($id);
        } else {
            $id = request('id');
            $user = User::findOrFail(request('id'));
        }
        return response()->json(['data' => $user, 'status' => 200, 'success' => true], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::select('id', 'name', 'email')->findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => "required|email|unique:users,email,$id",
            'password' => 'required|min:6',
        ]);

        $user = User::find($id);
        if ($request->hasfile('image')) {
            $destination = 'public/assets/media/avatars/' . $user->image;
            if (File::exists($destination) || File::exists($user->image)) {
                File::delete($destination);
                File::delete($user->image);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/assets/media/avatars/', $filename);
            $image = 'public/assets/media/avatars/' . $filename;
        } else {
            $image = $user->image;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ] + ['image' => $image]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', 'User deleted successfully');
    }
    public function statusChange(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user->is_active = $request->selectedValue;
        $user->save();
        $status = $user->is_active;
        return response()->json(['status' => $status], 200);
    }

}
