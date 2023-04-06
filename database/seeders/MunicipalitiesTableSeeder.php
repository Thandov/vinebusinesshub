<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class MunicipalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipalities = [           
            [                'municipality' => 'Bushbuckridge Local',                'districtId' => 3,                'created_at' => now(),                'updated_at' => now()            ],
            [                'municipality' => 'City of Mbombela Local',                'districtId' => 3,                'created_at' => now(),                'updated_at' => now()            ],
            [                'municipality' => 'Nkomazi Local',                'districtId' => 3,                'created_at' => now(),                'updated_at' => now()            ],
            [                'municipality' => 'Thaba Chweu Local',                'districtId' => 3,                'created_at' => now(),                'updated_at' => now()            ],
            [                'municipality' => 'Ngwathe Local',                'districtId' => 5,                'created_at' => now(),                'updated_at' => now()            ],
            [                'municipality' => 'Mafube Local',                'districtId' => 5,                'created_at' => now(),                'updated_at' => now()            ],
            [                'municipality' => 'Metsimaholo Local',                'districtId' => 5,                'created_at' => now(),                'updated_at' => now()            ],
            [
                'municipality' => 'Merafong City Local',
                'districtId' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Mogale City Local',
                'districtId' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Rand West City Local',
                'districtId' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'AbaQulusi Local',
                'districtId' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'eDumbe Local',
                'districtId' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Nongoma Local',
                'districtId' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Ulundi Local',
                'districtId' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'uPhongolo Local',
                'districtId' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Okhahlamba Local',
                'districtId' => 16,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['municipality' => 'Merafong City Local', 'districtId' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['municipality' => 'Mogale City Local', 'districtId' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['municipality' => 'Rand West City Local', 'districtId' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['municipality' => 'AbaQulusi Local', 'districtId' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['municipality' => 'eDumbe Local', 'districtId' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['municipality' => 'Nongoma Local', 'districtId' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['municipality' => 'Ulundi Local', 'districtId' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['municipality' => 'uPhongolo Local', 'districtId' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['municipality' => 'Okhahlamba Local', 'districtId' => 16, 'created_at' => now(), 'updated_at' => now()],
            ['municipality' => 'Inkosi Langalibalele Local', 'districtId' => 16, 'created_at' => now(), 'updated_at' => now()],
            ['municipality' => 'Alfred Duma Local', 'districtId' => 16, 'created_at' => now(), 'updated_at' => now()],
            ['municipality' => 'Umvoti Local', 'districtId' => 17, 'created_at' => now(), 'updated_at' => now()],
            ['municipality' => 'Endumeni Local', 'districtId' => 17, 'created_at' => now(), 'updated_at' => now()],
            ['municipality' => 'Nquthu Local', 'districtId' => 17, 'created_at' => now(), 'updated_at' => now()],
            ['municipality' => 'uMsinga Local', 'districtId' => 17, 'created_at' => now(), 'updated_at' => now()],
            ['municipality' => 'Big 5 Hlabisa Local', 'districtId' => 18, 'created_at' => now(), 'updated_at' => now()],
            [
                'municipality' => 'Jozini Local',
                'districtId' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Mtubatuba Local',
                'districtId' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'uMhlabuyalingana Local',
                'districtId' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Impendle Local',
                'districtId' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'uMshwathi Local',
                'districtId' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'uMngeni Local',
                'districtId' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Richmond Local',
                'districtId' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Msunduzi Local',
                'districtId' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Mpofana Local',
                'districtId' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Mkhambathini Local',
                'districtId' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Umzumbe Local',
                'districtId' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Umuziwabantu Local',
                'districtId' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Umdoni Local',
                'districtId' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Ray Nkonyeni Local',
                'districtId' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'uMlalazi Local',
                'districtId' => 21,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'City of uMhlathuze Local',
                'districtId' => 21,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Mthonjaneni Local',
                'districtId' => 21,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Nkandla Local',
                'districtId' => 21,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'uMfolozi Local',
                'districtId' => 21,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['municipality' => 'KwaDukuza Local', 'districtId' => 22,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Mandeni Local', 'districtId' => 22,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Maphumulo Local', 'districtId' => 22,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Ndwedwe Local', 'districtId' => 22,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Dr Nkosazana Dlamini Zuma Local', 'districtId' => 23,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Greater Kokstad Local', 'districtId' => 23,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Ubuhlebezwe Local', 'districtId' => 23,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'uMzimkhulu Local', 'districtId' => 23,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Dannhauser Local', 'districtId' => 24,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'eMadlangeni Local', 'districtId' => 24,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Newcastle Local', 'districtId' => 24,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'eThekwini Metropolitan', 'districtId' => 25,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Blouberg Local', 'districtId' => 26,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Lepelle-Nkumpi Local', 'districtId' => 26,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Molemole Local', 'districtId' => 26,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Polokwane Local', 'districtId' => 26,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Maruleng Local', 'districtId' => 30,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Greater Tzaneen Local', 'districtId' => 30,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Greater Letaba Local', 'districtId' => 30,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Greater Giyani Local', 'districtId' => 30,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Ba-Phalaborwa Local', 'districtId' => 30,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Makhuduthamaga Local', 'districtId' => 29,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Fetakgomo Tubatse Local', 'districtId' => 29,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Ephraim Mogale Local', 'districtId' => 29,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Elias Motsoaledi Local', 'districtId' => 29,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Collins Chabane Local', 'districtId' => 28,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Makhado Local', 'districtId' => 28,'created_at' => now(),
            'updated_at' => now()],
            ['municipality' => 'Musina Local', 'districtId' => 28,'created_at' => now(),
            'updated_at' => now()],
            [                'municipality' => 'Musina Local',                'districtId' => 28,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipality' => 'Thulamela Local',                'districtId' => 28,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipality' => 'Bela-Bela Local',                'districtId' => 27,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipality' => 'Lephalale Local',                'districtId' => 27,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipality' => 'Modimolle-Mookgophong Local',                'districtId' => 27,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipality' => 'Mogalakwena Local',                'districtId' => 27,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipality' => 'Thabazimbi Local',                'districtId' => 27,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipality' => 'Victor Khanye Local',                'districtId' => 1,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipality' => 'Dr JS Moroka Local',                'districtId' => 1,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipality' => 'Emakhazeni Local',                'districtId' => 1,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipality' => 'Emalahleni Local',                'districtId' => 1,                'created_at' => now(),                'updated_at' => now(),            ],
            [                'municipality' => 'Steve Tshwete Local',                'districtId' => 1,                'created_at' => now(),                'updated_at' => now(),            ],
            [
                'municipality' => 'Thembisile Hani Local',
                'districtId' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Chief Albert Luthuli Local',
                'districtId' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Msukaligwa Local',
                'districtId' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Mkhondo Local',
                'districtId' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Lekwa Local',
                'districtId' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Govan Mbeki Local',
                'districtId' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Dr Pixley Ka Isaka Seme Local',
                'districtId' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Dipaleseng Local',
                'districtId' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Buffalo City Metropolitan',
                'districtId' => 31,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Nelson Mandela Bay Metropolitan',
                'districtId' => 32,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Matatiele Local',
                'districtId' => 33,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Ntabankulu Local',
                'districtId' => 33,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Umzimvubu Local',
                'districtId' => 33,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Winnie Madikizela-Mandela Local',
                'districtId' => 33,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Raymond Mhlaba Local',
                'districtId' => 34,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Ngqushwa Local',
                'districtId' => 34,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Mnquma Local',
                'districtId' => 34,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Mbhashe Local',
                'districtId' => 34,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Great Kei Local',
                'districtId' => 34,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Amahlathi Local',
                'districtId' => 34,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Emalahleni Local',
                'districtId' => 35,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Engcobo Local',
                'districtId' => 35,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['municipality' => 'Ntabankulu Local', 'districtId' => 33, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['municipality' => 'Umzimvubu Local', 'districtId' => 33, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['municipality' => 'Winnie Madikizela-Mandela Local', 'districtId' => 33, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['municipality' => 'Raymond Mhlaba Local', 'districtId' => 34, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['municipality' => 'Ngqushwa Local', 'districtId' => 34, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['municipality' => 'Mnquma Local', 'districtId' => 34, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['municipality' => 'Mbhashe Local', 'districtId' => 34, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['municipality' => 'Great Kei Local', 'districtId' => 34, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['municipality' => 'Amahlathi Local', 'districtId' => 34, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['municipality' => 'Emalahleni Local', 'districtId' => 35, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['municipality' => 'Engcobo Local', 'districtId' => 35, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['municipality' => 'Enoch Mgijima Local', 'districtId' => 35, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['municipality' => 'Intsika Yethu Local', 'districtId' => 35, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['municipality' => 'Inxuba Yethemba Local', 'districtId' => 35, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['municipality' => 'Sakhisizwe Local', 'districtId' => 35, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['municipality' => 'Elundini Local', 'districtId' => 36, 'created_at' => NOW(), 'updated_at' => NOW()],
            [
                'municipality' => 'Senqu Local',
                'districtId' => 36,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Walter Sisulu Local',
                'districtId' => 36,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Ingquza Hill Local',
                'districtId' => 37,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'King Sabata Dalindyebo Local',
                'districtId' => 37,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Mhlontlo Local',
                'districtId' => 37,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Nyandeni Local',
                'districtId' => 37,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Port St Johns Local',
                'districtId' => 37,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Sundays River Valley Local',
                'districtId' => 38,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Blue Crane Route Local',
                'districtId' => 38,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Dr Beyers Naudé Local',
                'districtId' => 38,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Kouga Local',
                'districtId' => 38,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Koukamma Local',
                'districtId' => 38,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Makana Local',
                'districtId' => 38,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Ndlambe Local',
                'districtId' => 38,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Swartland Local',
                'districtId' => 39,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Saldanha Bay Local',
                'districtId' => 39,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Matzikama Local',
                'districtId' => 39,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Cederberg Local',
                'districtId' => 39,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Bergrivier Local',
                'districtId' => 39,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'City of Cape Town Metropolitan',
                'districtId' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Witzenberg Local',
                'districtId' => 41,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Stellenbosch Local',
                'districtId' => 41,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Langeberg Local',
                'districtId' => 41,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Drakenstein Local',
                'districtId' => 41,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Breede Valley Local',
                'districtId' => 41,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Beaufort West Local',
                'districtId' => 42,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Laingsburg Local',
                'districtId' => 42,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Beaufort West Local',
                'districtId' => 42,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Oudtshoorn Local',
                'districtId' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Mossel Bay Local',
                'districtId' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Knysna Local',
                'districtId' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Kannaland Local',
                'districtId' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Hessequa Local',
                'districtId' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'George Local',
                'districtId' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Bitou Local',
                'districtId' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Theewaterskloof Local',
                'districtId' => 44,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Swellendam Local',
                'districtId' => 44,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Overstrand Local',
                'districtId' => 44,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Cape Agulhas Local',
                'districtId' => 44,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Sol Plaatje Local',
                'districtId' => 49,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Phokwane Local',
                'districtId' => 49,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Magareng Local',
                'districtId' => 49,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Dikgatlong Local',
                'districtId' => 49,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Joe Morolong Local',
                'districtId' => 48,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Gamagara Local',
                'districtId' => 48,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Ga-Segonyana Local',
                'districtId' => 48,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Richtersveld Local',
                'districtId' => 47,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Nama Khoi Local',
                'districtId' => 47,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Khai-Ma Local',
                'districtId' => 47,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Karoo Hoogland Local',
                'districtId' => 47,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'municipality' => 'Kamiesberg Local',
                'districtId' => 47,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Hantam Local',
                'districtId' => 47,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Umsobomvu Local',
                'districtId' => 46,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Ubuntu Local',
                'districtId' => 46,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Thembelihle Local',
                'districtId' => 46,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Siyathemba Local',
                'districtId' => 46,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Siyancuma Local',
                'districtId' => 46,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Renosterberg Local',
                'districtId' => 46,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Kareeberg Local',
                'districtId' => 46,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Emthanjeni Local',
                'districtId' => 46,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Tsantsabane Local',
                'districtId' => 45,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Kgatelopele Local',
                'districtId' => 45,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'municipality' => 'Kai !Garib Local',
                'districtId' => 45,
                'created_at' => now(),
                'updated_at' => now()],
                [                'municipality' => 'Dawid Kruiper Local',                'districtId' => 45,                'created_at' => now(),                'updated_at' => now(),            ],
                [                'municipality' => '!Kheis Local',                'districtId' => 45,                'created_at' => now(),                'updated_at' => now(),            ],
                [                'municipality' => 'Kgetlengrivier Local',                'districtId' => 50,                'created_at' => now(),                'updated_at' => now(),            ],
                [                'municipality' => 'Madibeng Local',                'districtId' => 50,                'created_at' => now(),                'updated_at' => now(),            ],
                [                'municipality' => 'Moretele Local',                'districtId' => 50,                'created_at' => now(),                'updated_at' => now(),            ],
                [                'municipality' => 'Moses Kotane Local',                'districtId' => 50,                'created_at' => now(),                'updated_at' => now(),            ],
                [                'municipality' => 'Rustenburg Local',                'districtId' => 50,                'created_at' => now(),                'updated_at' => now(),            ],
                [                'municipality' => 'City of Matlosana Local',                'districtId' => 51,                'created_at' => now(),                'updated_at' => now(),            ],
                [                'municipality' => 'JB Marks Local',                'districtId' => 51,                'created_at' => now(),                'updated_at' => now(),            ],
                [                'municipality' => 'Maquassi Hills Local',                'districtId' => 51,                'created_at' => now(),                'updated_at' => now(),            ],
                [                'municipality' => 'Greater Taung Local',                'districtId' => 52,                'created_at' => now(),                'updated_at' => now(),            ],
                [                'municipality' => 'Kagisano-Molopo Local',                'districtId' => 52,                'created_at' => now(),                'updated_at' => now(),            ],
                [                'municipality' => 'Lekwa-Teemane Local',                'districtId' => 52,                'created_at' => now(),                'updated_at' => now(),            ],
                [
                    'municipality' => 'Mamusa Local',
                    'districtId' => 52,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'municipality' => 'Naledi Local',
                    'districtId' => 52,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'municipality' => 'Ditsobotla Local',
                    'districtId' => 53,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'municipality' => 'Mahikeng Local',
                    'districtId' => 53,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'municipality' => 'Ramotshere Moiloa Local',
                    'districtId' => 53,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'municipality' => 'Ratlou Local',
                    'districtId' => 53,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'municipality' => 'Tswaing Local',
                    'districtId' => 53,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
        ];

        DB::table('municipalities')->insert($municipalities);
    }
}
