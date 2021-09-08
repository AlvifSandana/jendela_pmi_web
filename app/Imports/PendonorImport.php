<?php

namespace App\Imports;

use App\Pendonor;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

// no heading row format
HeadingRowFormatter::default('none');

class PendonorImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // dd($row);
            // create new user
            $id = $this->createUser($row);

            Pendonor::create([
                'nama_pendonor' => $row['nama_pendonor'],
                'email'         => $row['email'],
                'password'      => Hash::make($row['password']),
                'alamat'        => $row['alamat'],
                'telepon'       => $row['telepon'],
                'ttl'           => $row['ttl'],
                'golongan_darah' => $row['golongan_darah'],
                'status'        => $row['status'],
                'photo'         => $row['photo'],
                'api_token'     => Hash::make($row['email']),
                'remember_token' => '',
                'roles_id'      => 2,
                'user_id'       => $id    # mendapatkan user id
            ]);
        }
    }

    public function createUser($row)
    {
        $name = $row['nama_pendonor'];
        $email = $row['email'];
        $password = $row['password'];

        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();

        return $user->id;
    }

    /**
     * define heading row
     *
     * @return int
     */
    public function headingRow(): int
    {
        return 1;
    }
}
