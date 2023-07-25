<?php

namespace Tests\Feature;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnggotaControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testIndexPage()
    {
        # code...
        $user = User::find(1);
        // $product = Product::latest()->limit(1)->get();
        // masukkan session user untuk login
        $this->actingAs($user)
            ->get('/anggota')
            ->assertStatus(200);
    }
    public function testStoreAnggota()
    {
        $user = User::find(1);
        $count_data = Anggota::count();
        $data =  [
            'nik' => '4782821921123' . $count_data + 1,
            'nama' => 'Puspita',
            'tempat_lahir' => 'Jombang',
            'tanggal_lahir' => '1999-08-10',
            'gender' => 'Perempuan',
            'agama' => 'Islam',
            'golongan_darah' => 'B',
            'status_perkawinan' => 'Belum Menikah',
            'pendidikan' => 'Sarjana',
            'institusi_pendidikan' => 'Universitas Negeri',
            'pekerjaan' => 'Swasta',
            'telpon' => '0812312312',
            'sayap_pan' => '',
            'provinsi' => 'Jawa Timur',
            'kabupaten' => 'Jombang',
            'kecamatan' => 'Jombang',
            'desa' => 'Jombang',
            'rt' => '01',
            'rw' => '01',
            'alamat' => 'dusun jombang',
        ];
        $this->actingAs($user);
        $this->post('/anggota', $data)
            ->assertRedirect("/anggota");
        // cek success status
        // ->assertSessionHas("success", "Data Anggota has been created!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        $this->assertDatabaseCount('anggota', $count_data + 1);
        $this->assertDatabaseHas('anggota', [
            'id' => "ANGGOTA TEST" . $count_data + 1
        ]);
    }
    public function testUpdateAnggota()
    {
        $user = User::find(1);
        //get last data anggota
        $anggota = Anggota::latest()->first();
        $count_data = Anggota::count();
        $data =  [
            "anggota_name" => "ANGGOTA TEST UPDATE " . $count_data,
        ];
        $this->actingAs($user);
        $this->put(
            route('anggota.update', $anggota->id),
            $data
        )
            ->assertRedirect("/anggota");
        // ->assertSessionHas("success", "Data Employee has been updated!");
        // cek junkah data dari tabel apakah bertambah atau tidak
        // $this->assertDatabaseCount('anggota', $count_data + 1);
        $this->assertDatabaseHas('anggota', [
            'anggota_name' => "ANGGOTA TEST UPDATE " . $count_data,
        ]);
    }
    public function testDeleteAnggota()
    {
        $user = User::find(1);
        $anggota = Anggota::latest()->first();
        $this->actingAs($user);
        $this->delete(route('anggota.destroy', $anggota->id))
            ->assertRedirect("/anggota");
        // ->assertSessionHas("success", "Data Product has been deleted!");
        // cek apakah data sudah kosong setelah dihapus
        $this->assertEmpty(Anggota::find($anggota->id));
    }
}
