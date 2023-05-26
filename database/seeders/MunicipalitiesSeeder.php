<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MunicipalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipalities = [
            ['Bushbuckridge Local', 3],
            ['City of Mbombela Local', 3],
            ['Nkomazi Local', 3],
            ['Thaba Chweu Local', 3],
            ['Ngwathe Local', 5],
            ['Mafube Local', 5],
            ['Metsimaholo Local', 5],
            ['Moqhaka Local', 5],
            ['City of Ekurhuleni Metropolitan', 12],
            ['City of Johannesburg Metropolitan', 13],
            ['City of Tshwane Metropolitan', 14],
            ['Midvaal Local', 11],
            ['Lesedi Local', 11],
            ['Emfuleni Local', 11],
            ['Merafong City Local', 10],
            ['Mogale City Local', 10],
            ['Rand West City Local', 10],
            ['AbaQulusi Local', 15],
            ['eDumbe Local', 15],
            ['Nongoma Local', 15],
            ['Ulundi Local', 15],
            ['uPhongolo Local', 15],
            ['Okhahlamba Local', 16],
            ['Inkosi Langalibalele Local', 16],
            ['Alfred Duma Local', 16],
            ['Umvoti Local', 17],
            ['Endumeni Local', 17],
            ['Nquthu Local', 17],
            ['uMsinga Local', 17],
            ['Big 5 Hlabisa Local', 18],
            ['Jozini Local', 18],
            ['Mtubatuba Local', 18],
            ['uMhlabuyalingana Local', 18],
            ['Impendle Local', 19],
            ['uMshwathi Local', 19],
            ['uMngeni Local', 19],
            ['Richmond Local', 19],
            ['Msunduzi Local', 19],
            ['Mpofana Local', 19],
            ['Mkhambathini Local', 19],
            ['Umzumbe Local', 20],
            ['Umuziwabantu Local', 20],
            ['Umdoni Local', 20],
            ['Ray Nkonyeni Local', 20],
            ['uMlalazi Local', 21],
            ['City of uMhlathuze Local', 21],
            ['Mthonjaneni Local', 21],
            ['Nkandla Local', 21],
            ['uMfolozi Local', 21],
            ['KwaDukuza Local', 22],
            ['Mandeni Local', 22],
            ['Maphumulo Local', 22],
            ['Ndwedwe Local', 22],
            ['Dr Nkosazana Dlamini Zuma Local', 23],
            ['Greater Kokstad Local', 23],
            ['Ubuhlebezwe Local', 23],
            ['uMzimkhulu Local', 23],
            ['Dannhauser Local', 24],
            ['eMadlangeni Local', 24],
            ['Newcastle Local', 24],
            ['eThekwini Metropolitan', 25],
            ['Blouberg Local', 26],
            ['Lepelle-Nkumpi Local', 26],
            ['Molemole Local', 26],
            ['Polokwane Local', 26],
            ['Maruleng Local', 30],
            ['Greater Tzaneen Local', 30],
            ['Greater Letaba Local', 30],
            ['Greater Giyani Local', 30],
            ['Ba-Phalaborwa Local', 30],
            ['Makhuduthamaga Local', 29],
            ['Fetakgomo Tubatse Local', 29],
            ['Ephraim Mogale Local', 29],
            ['Elias Motsoaledi Local', 29],
            ['Collins Chabane Local', 28],
            ['Makhado Local', 28],
            ['Musina Local', 28],
            ['Thulamela Local', 28],
            ['Bela-Bela Local', 27],
            ['Lephalale Local', 27],
            ['Modimolle-Mookgophong Local', 27],
            ['Mogalakwena Local', 27],
            ['Thabazimbi Local', 27],
            ['Victor Khanye Local', 1],
            ['Dr JS Moroka Local', 1],
            ['Emakhazeni Local', 1],
            ['Emalahleni Local', 1],
            ['Steve Tshwete Local', 1],
            ['Thembisile Hani Local', 1],
            ['Chief Albert Luthuli Local', 2],
            ['Msukaligwa Local', 2],
            ['Mkhondo Local', 2],
            ['Lekwa Local', 2],
            ['Govan Mbeki Local', 2],
            ['Dr Pixley Ka Isaka Seme Local', 2],
            ['Dipaleseng Local', 2],
            ['Buffalo City Metropolitan', 31],
            ['Nelson Mandela Bay Metropolitan', 32],
            ['Matatiele Local', 33],
            ['Ntabankulu Local', 33],
            ['Umzimvubu Local', 33],
            ['Winnie Madikizela-Mandela Local', 33],
            ['Raymond Mhlaba Local', 34],
            ['Ngqushwa Local', 34],
            ['Mnquma Local', 34],
            ['Mbhashe Local', 34],
            ['Great Kei Local', 34],
            ['Amahlathi Local', 34],
            ['Emalahleni Local', 35],
            ['Engcobo Local', 35],
            ['Enoch Mgijima Local', 35],
            ['Intsika Yethu Local', 35],
            ['Inxuba Yethemba Local', 35],
            ['Sakhisizwe Local', 35],
            ['Elundini Local', 36],
            ['Senqu Local', 36],
            ['Walter Sisulu Local', 36],
            ['Ingquza Hill Local', 37],
            ['King Sabata Dalindyebo Local', 37],
            ['Mhlontlo Local', 37],
            ['Nyandeni Local', 37],
            ['Port St Johns Local', 37],
            ['Sundays River Valley Local', 38],
            ['Blue Crane Route Local', 38],
            ['Dr Beyers Naudé Local', 38],
            ['Kouga Local', 38],
            ['Koukamma Local', 38],
            ['Makana Local', 38],
            ['Ndlambe Local', 38],
            ['Swartland Local', 39],
            ['Saldanha Bay Local', 39],
            ['Matzikama Local', 39],
            ['Cederberg Local', 39],
            ['Bergrivier Local', 39],
            ['City of Cape Town Metropolitan', 40],
            ['Witzenberg Local', 41],
            ['Stellenbosch Local', 41],
            ['Langeberg Local', 41],
            ['Drakenstein Local', 41],
            ['Breede Valley Local', 41],
            ['Beaufort West Local', 42],
            ['Laingsburg Local', 42],
            ['Beaufort West Local', 42],
            ['Oudtshoorn Local', 43],
            ['Mossel Bay Local', 43],
            ['Knysna Local', 43],
            ['Kannaland Local', 43],
            ['Hessequa Local', 43],
            ['George Local', 43],
            ['Bitou Local', 43],
            ['Theewaterskloof Local', 44],
            ['Swellendam Local', 44],
            ['Overstrand Local', 44],
            ['Cape Agulhas Local', 44],
            ['Sol Plaatje Local', 49],
            ['Phokwane Local', 49],
            ['Magareng Local', 49],
            ['Dikgatlong Local', 49],
            ['Joe Morolong Local', 48],
            ['Gamagara Local', 48],
            ['Ga-Segonyana Local', 48],
            ['Richtersveld Local', 47],
            ['Nama Khoi Local', 47],
            ['Khai-Ma Local', 47],
            ['Karoo Hoogland Local', 47],
            ['Kamiesberg Local', 47],
            ['Hantam Local', 47],
            ['Umsobomvu Local', 46],
            ['Ubuntu Local', 46],
            ['Thembelihle Local', 46],
            ['Siyathemba Local', 46],
            ['Siyancuma Local', 46],
            ['Renosterberg Local', 46],
            ['Kareeberg Local', 46],
            ['Emthanjeni Local', 46],
            ['Tsantsabane Local', 45],
            ['Kgatelopele Local', 45],
            ['Kai !Garib Local', 45],
            ['Dawid Kruiper Local', 45],
            ['!Kheis Local', 45],
            ['Kgetlengrivier Local', 50],
            ['Madibeng Local', 50],
            ['Moretele Local', 50],
            ['Moses Kotane Local', 50],
            ['Rustenburg Local', 50],
            ['City of Matlosana Local', 51],
            ['JB Marks Local', 51],
            ['Maquassi Hills Local', 51],
            ['Greater Taung Local', 52],
            ['Kagisano-Molopo Local', 52],
            ['Lekwa-Teemane Local', 52],
            ['Mamusa Local', 52],
            ['Naledi Local', 52],
            ['Ditsobotla Local', 52],
            ['Mahikeng Local', 52],
            ['Ramotshere Moiloa Local', 52],
            ['Ratlou Local', 52],
            ['Tswaing Local', 52],
        ];

        foreach ($municipalities as $municipality) {
            DB::table('municipalities')->insert([
                'municipality' => $municipality[0],
                'districtId' => $municipality[1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}