<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    // Menampilkan daftar semua peserta dengan fitur pencarian dan pagination
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Participant::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
        }

        $participants = $query->orderBy('id')->paginate(10);

        return view('participants.index', compact('participants'));
    }

    // Menampilkan form tambah peserta baru
    public function create()
    {
        return view('participants.create');
    }

    // Menyimpan data peserta baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
        ]);

        Participant::create($request->only('name', 'address', 'phone'));

        return redirect()->route('participants.index')
                         ->with('success', 'Peserta baru berhasil ditambahkan.');
    }

    // Menampilkan detail peserta
    public function show($id)
    {
        $participant = Participant::findOrFail($id);
        return view('participants.show', compact('participant'));
    }

    // Menampilkan form edit peserta
    public function edit($id)
    {
        $participant = Participant::findOrFail($id);
        return view('participants.edit', compact('participant'));
    }

    // Memperbarui data peserta
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
        ]);

        $participant = Participant::findOrFail($id);
        $participant->update($request->only('name', 'address', 'phone'));

        return redirect()->route('participants.index')
                         ->with('success', 'Data peserta berhasil diperbarui.');
    }

    // Menghapus peserta
    public function destroy($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();

        return redirect()->route('participants.index')
                         ->with('success', 'Peserta berhasil dihapus.');
    }
}
