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
            //Fezile Dabi District
            ['Mafube Local', 8],
            ['Metsimaholo Local', 8],
            ['Moqhaka Local', 8],
            ['Ngwathe Local', 8],
            //Thabo Mofutsanyana District
            ['Dihlabeng Local', 6],
            ['Maluti-A-Phofung Local', 6],
            ['Mantsopa Local', 6],
            ['Nketoana Local', 6],
            ['Phumelela Local', 6],
            ['Setsoto Local', 6],
            //Mangaung Metropolitan
            ['Mangaung Metropolitan', 4],
            //Xhariep District
            ['Kopanong Local', 5],
            ['Letsemeng Local', 5],
            ['Mohokare Local', 5],
            //Lejweleputswa District
            ['Masilonyana Local', 7],
            ['Matjhabeng Local', 7],
            ['Nala Local', 7],
            ['Tokologo Local', 7],
            ['Tswelopele Local', 7],
            //City of Ekurhuleni Metropolitan
            ['City of Ekurhuleni Metropolitan', 11],
            //City of Johannesburg Metropolitan
            ['City of Johannesburg Metropolitan', 12],
            //City of Tshwane Metropolitan
            ['City of Tshwane Metropolitan', 13],
            //Sedibeng District
            ['Emfuleni Local', 10],
            ['Lesedi Local', 10],
            ['Midvaal Local', 10],
            //West Rand District
            ['Mogale City Local', 9],
            ['Merafong City Local', 9],
            ['Rand West City Local', 9],
            //eThekwini Metropolitan
            ['Rand West City Local', 24],
            //Amajuba District
            ['Dannhauser Local', 23],
            ['eMadlangeni Local', 23],
            ['Newcastle Local', 23],
            //Harry Gwala District
            ['Dr Nkosazana Dlamini Zuma Local', 22],
            ['Greater Kokstad Local', 22],
            ['Ubuhlebezwe Local', 22],
            ['Umzimkhulu Local', 22],
            //iLembe District
            ['KwaDukuza Local', 21],
            ['Mandeni Local', 21],
            ['Maphumulo Local', 21],
            ['Ndwedwe Locall', 21],
            //King Cetshwayo District
            ['City of uMhlathuze Local', 20],
            ['Mthonjaneni Local', 20],
            ['Nkandla Local', 20],
            ['uMfolozi Local', 20],
            ['uMlalazi Local', 20],
            //Ugu District
            ['Ray Nkonyeni Local', 19],
            ['Umdoni Local', 19],
            ['Umuziwabantu Local', 19],
            ['Umzumbe Local', 19],
            //uMgungundlovu District
            ['Impendle Local', 18],
            ['Mkhambathini Local', 18],
            ['Mpofana Local', 18],
            ['Msunduzi Local', 18],
            ['Richmond Local', 18],
            ['uMngeni Local', 18],
            ['uMshwathi Local', 18],
            //uMkhanyakude District
            ['Big 5 Hlabisa Local', 17],
            ['Jozini Local', 17],
            ['Mtubatuba Local', 17],
            ['uMhlabuyalingana Local', 17],
            //uMzinyathi District
            ['Endumeni Local', 16],
            ['uMsinga Local', 16],
            ['Nquthu Local', 16],
            ['Umvoti Local', 16],
            //uThukela District
            ['Alfred Duma Local', 15],
            ['Inkosi Langalibalele Local', 15],
            ['Okhahlamba Local', 15],
            //Zululand District
            ['AbaQulusi Local', 14],
            ['eDumbe Local', 14],
            ['Nongoma Local', 14],
            ['Ulundi Local', 14],
            ['uPhongolo Local', 14],
            //Capricorn District
            ['Blouberg Local', 25],
            ['Lepelle-Nkumpi Local', 25],
            ['Molemole Local', 25],
            ['Polokwane Local', 25],
            //Mopani District
            ['Ba-Phalaborwa Local', 29],
            ['Greater Giyani Local', 29],
            ['Greater Letaba Local', 29],
            ['Greater Tzaneen Local', 29],
            ['Maruleng Local', 29],
            //Sekhukhune District
            ['Elias Motsoaledi Local', 28],
            ['Ephraim Mogale Local', 28],
            ['Fetakgomo Tubatse Local', 28],
            ['Makhuduthamaga Local', 28],
            //Vhembe District
            ['Collins Chabane Local', 27],
            ['Makhado Local', 27],
            ['Musina Local', 27],
            ['Thulamela Local', 27],
            //Waterberg District
            ['Bela-Bela Local', 26],
            ['Lephalale Local', 26],
            ['Modimolle-Mookgophong Local', 26],
            ['Mogalakwena Local', 26],
            ['Thabazimbi Local', 26],
            //Ehlanzeni District
            ['Bushbuckridge Local', 3],
            ['City of Mbombela Local', 3],
            ['Nkomazi Local', 3],
            ['Thaba Chweu Local', 3],
            //Gert Sibande District
            ['Chief Albert Luthuli Local', 2],
            ['Msukaligwa Local', 2],
            ['Mkhondo Local', 2],
            ['Lekwa Local', 2],
            ['Govan Mbeki Local', 2],
            ['Dr Pixley Ka Isaka Seme Local', 2],
            ['Dipaleseng Local', 2],
            //Nkangala District
            ['Victor Khanye Local', 1],
            ['Dr JS Moroka Local', 1],
            ['Emakhazeni Local', 1],
            ['Emalahleni Local', 1],
            ['Steve Tshwete Local', 1],
            ['Thembisile Hani Local', 1],
            //Frances Baard District
            ['Dikgatlong Local', 48],
            ['Magareng Local', 48],
            ['Phokwane Local', 48],
            ['Phokwane Local', 48],
            ['Sol Plaatje Local', 48],
            //John Taolo Gaetsewe District
            ['Ga-Segonyana Local', 47],
            ['Gamagara Local', 47],
            ['Joe Morolong Local', 47],
            //Namakwa District
            ['Hantam Local', 46],
            ['Kamiesberg Local', 46],
            ['Karoo Hoogland Local', 46],
            ['Khai-Ma Local', 46],
            ['Nama Khoi Local', 46],
            ['Richtersveld Local', 46],
            //Pixley Ka Seme District
            ['Emthanjeni Local', 45],
            ['Kareeberg Local', 45],
            ['Renosterberg Local', 45],
            ['Siyancuma Local', 45],
            ['Siyathemba Local', 45],
            ['Thembelihle Local', 45],
            ['Ubuntu Local', 45],
            ['Umsobomvu Local', 45],
            //ZF Mgcawu District
            ['!Kheis Local', 44],
            ['Dawid Kruiper Local', 44],
            ['Kai !Garib Local', 44],
            ['Kgatelopele Local', 44],
            ['Tsantsabane Local', 44],
            //Bojanala Platinum District
            ['Kgetlengrivier Local', 49],
            ['Madibeng Local', 49],
            ['Moretele Local', 49],
            ['Moses Kotane Local', 49],
            ['Rustenburg Local', 49],
            //Dr Kenneth Kaunda District
            ['JB Marks Local', 50],
            ['City of Matlosana Local', 50],
            ['Maquassi Hills Local', 50],
            //Dr Ruth Segomotsi Mompati District
            ['Greater Taung Local', 51],
            ['Kagisano-Molopo Local', 51],
            ['Lekwa-Teemane Local', 51],
            ['Mamusa Local', 51],
            ['Naledi Local', 51],
            //Ngaka Modiri Molema District
            ['Ditsobotla Local', 52],
            ['Mahikeng Local', 52],
            ['Ramotshere Moiloa Local', 52],
            ['Ratlou Local', 52],
            ['Tswaing Local', 52],
            //City of Cape Town Metropolitan
            ['City of Cape Town Metropolitan', 39],
            //Cape Winelands District
            ['Breede Valley Local', 40],
            ['Drakenstein Local', 40],
            ['Langeberg Local', 40],
            ['Stellenbosch Local', 40],
            ['Witzenberg Local', 40],
            //cerntal Karoo District
            ['Beaufort West Local', 41],
            ['Laingsburg Local', 41],
            ['Prince Albert Local', 41],
            //Garden Route District
            ['Bitou Local', 42],
            ['George Local', 42],
            ['Hessequa Local', 42],
            ['Kannaland Local', 42],
            ['Knysna Local', 42],
            ['Mossel Bay Local', 42],
            ['Oudtshoorn Local', 42],
            //Overberg District
            ['Cape Agulhas Local', 43],
            ['Overstrand Local', 43],
            ['Swellendam Local', 43],
            ['Theewaterskloof Local', 43],
            //West Coast District
            ['Bergrivier Local', 38],
            ['Cederberg Local', 38],
            ['Matzikama Local', 38],
            ['Saldanha Bay Local', 38],
            ['Swartland Local', 38],
            //Buffalo City Metropolitan
            ['Buffalo City Metropolitan', 30],
            //Nelson Mandela Bay Metropolitan
            ['Nelson Mandela Bay Metropolitan', 31],
            //Alfred Nzo District
            ['Matatiele Local', 32],
            ['Ntabankulu Local', 32],
            ['Umzimvubu Local', 32],
            ['Winnie Madikizela-Mandela Local', 32],
            //Amathole District
            ['Amahlathi Local', 33],
            ['Great Kei Local', 33],
            ['Mbhashe Local', 33],
            ['Mnquma Local', 33],
            ['Ngqushwa Local', 33],
            ['Raymond Mhlaba Local', 33],
            //Chris Hani District
            ['Dr AB Xuma Local', 34],
            ['Emalahleni Locall', 34],
            ['Enoch Mgijima Local', 34],
            ['Intsika Yethu Local', 34],
            ['Inxuba Yethemba Local', 34],
            ['Sakhisizwe Local', 34],
            //Joe Gqabi District
            ['Elundini Local', 35],
            ['Senqu Local', 35],
            ['Walter Sisulu Local', 35],
            //OR Tambo District
            ['Ingquza Hill Local', 36],
            ['King Sabata Dalindyebo Local', 36],
            ['Mhlontlo Local', 36],
            ['Nyandeni Local', 36],
            ['Port St Johns Local', 36],
            //Sarah Baartman District
            ['Blue Crane Route Local', 37],
            ['Dr Beyers Naudé Local', 37],
            ['Kouga Local', 37],
            ['Koukamma Local', 37],
            ['Makana Local', 37],
            ['Ndlambe Local', 37],
            ['Sundays River Valley Local', 37],

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
