<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::with('programStudi') // pastikan relasi dimuat
            ->get()
            ->map(function ($user) {
                return [
                    'name' => $user->name,
                    'email' => $user->email,
                    'nim' => $user->nim,
                    'program_studi' => $user->programStudi->nama_prodi ?? 'N/A',
                    'created_at' => $user->created_at->format('Y-m-d H:i:s'),
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'NIM',
            'Program Studi',
            'Created At',
        ];
    }
}
