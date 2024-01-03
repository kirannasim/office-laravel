<?php

use Illuminate\Database\Seeder;

class SuburbTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	ini_set('memory_limit','256M');

        DB::table('suburbs')->insert([
        	[
				"postcode" => "0200",
				"suburb" => "AUSTRALIAN NATIONAL UNIVERSITY",
				"state" => "ACT",
				"lat" => "-35.277272",
				"lon" => "149.117136"
			],
			[
				"postcode" => "0221",
				"suburb" => "BARTON",
				"state" => "ACT",
				"lat" => "-35.201372",
				"lon" => "149.095065"
			],
			[
				"postcode" => "0800",
				"suburb" => "DARWIN",
				"state" => "NT",
				"lat" => "-12.801028",
				"lon" => "130.955789"
			],
			[
				"postcode" => "0801",
				"suburb" => "DARWIN",
				"state" => "NT",
				"lat" => "-12.801028",
				"lon" => "130.955789"
			],
			[
				"postcode" => "0804",
				"suburb" => "PARAP",
				"state" => "NT",
				"lat" => "-12.432181",
				"lon" => "130.84331"
			],
			[
				"postcode" => "0810",
				"suburb" => "ALAWA",
				"state" => "NT",
				"lat" => "-12.378451",
				"lon" => "130.877014"
			],
			[
				"postcode" => "0810",
				"suburb" => "BRINKIN",
				"state" => "NT",
				"lat" => "-12.367769",
				"lon" => "130.869808"
			],
			[
				"postcode" => "0810",
				"suburb" => "CASUARINA",
				"state" => "NT",
				"lat" => "-12.376597",
				"lon" => "130.850489"
			],
			[
				"postcode" => "0810",
				"suburb" => "JINGILI",
				"state" => "NT",
				"lat" => "-12.385761",
				"lon" => "130.873726"
			],
			[
				"postcode" => "0810",
				"suburb" => "LEE POINT",
				"state" => "NT",
				"lat" => "-12.360865",
				"lon" => "130.891349"
			],
			[
				"postcode" => "0810",
				"suburb" => "MILLNER",
				"state" => "NT",
				"lat" => "-12.39087",
				"lon" => "130.864144"
			],
			[
				"postcode" => "0810",
				"suburb" => "MOIL",
				"state" => "NT",
				"lat" => "-12.387001",
				"lon" => "130.879351"
			],
			[
				"postcode" => "0810",
				"suburb" => "NAKARA",
				"state" => "NT",
				"lat" => "-12.369175",
				"lon" => "130.87899"
			],
			[
				"postcode" => "0810",
				"suburb" => "NIGHTCLIFF",
				"state" => "NT",
				"lat" => "-12.382572",
				"lon" => "130.853877"
			],
			[
				"postcode" => "0810",
				"suburb" => "RAPID CREEK",
				"state" => "NT",
				"lat" => "-12.387231",
				"lon" => "130.864402"
			],
			[
				"postcode" => "0810",
				"suburb" => "TIWI",
				"state" => "NT",
				"lat" => "-12.363913",
				"lon" => "130.87719"
			],
			[
				"postcode" => "0810",
				"suburb" => "WAGAMAN",
				"state" => "NT",
				"lat" => "-12.379955",
				"lon" => "130.886362"
			],
			[
				"postcode" => "0810",
				"suburb" => "WANGURI",
				"state" => "NT",
				"lat" => "-12.37041",
				"lon" => "130.888433"
			],
			[
				"postcode" => "0811",
				"suburb" => "CASUARINA",
				"state" => "NT",
				"lat" => "-12.376597",
				"lon" => "130.850489"
			],
			[
				"postcode" => "0812",
				"suburb" => "KARAMA",
				"state" => "NT",
				"lat" => "-12.400091",
				"lon" => "130.913672"
			],
			[
				"postcode" => "0812",
				"suburb" => "LEANYER",
				"state" => "NT",
				"lat" => "-12.376727",
				"lon" => "130.900653"
			],
			[
				"postcode" => "0812",
				"suburb" => "MALAK",
				"state" => "NT",
				"lat" => "-12.392528",
				"lon" => "130.904018"
			],
			[
				"postcode" => "0812",
				"suburb" => "MARRARA",
				"state" => "NT",
				"lat" => "-12.396566",
				"lon" => "130.882733"
			],
			[
				"postcode" => "0812",
				"suburb" => "WULAGI",
				"state" => "NT",
				"lat" => "-12.384714",
				"lon" => "130.897765"
			],
			[
				"postcode" => "0814",
				"suburb" => "NIGHTCLIFF",
				"state" => "NT",
				"lat" => "-12.382572",
				"lon" => "130.853877"
			],
			[
				"postcode" => "0820",
				"suburb" => "BAGOT",
				"state" => "NT",
				"lat" => "-12.410444",
				"lon" => "130.856124"
			],
			[
				"postcode" => "0820",
				"suburb" => "BAYVIEW",
				"state" => "NT",
				"lat" => "-12.440944",
				"lon" => "130.856539"
			],
			[
				"postcode" => "0820",
				"suburb" => "CHARLES DARWIN",
				"state" => "NT",
				"lat" => "-12.443893",
				"lon" => "130.844191"
			],
			[
				"postcode" => "0820",
				"suburb" => "COONAWARRA",
				"state" => "NT",
				"lat" => "-12.430427",
				"lon" => "130.882375"
			],
			[
				"postcode" => "0820",
				"suburb" => "CULLEN BAY",
				"state" => "NT",
				"lat" => "-12.454108",
				"lon" => "130.822898"
			],
			[
				"postcode" => "0820",
				"suburb" => "EAST POINT",
				"state" => "NT",
				"lat" => "-12.426947",
				"lon" => "130.836128"
			],
			[
				"postcode" => "0820",
				"suburb" => "FANNIE BAY",
				"state" => "NT",
				"lat" => "-12.423707",
				"lon" => "130.836623"
			],
			[
				"postcode" => "0820",
				"suburb" => "LARRAKEYAH",
				"state" => "NT",
				"lat" => "-12.459211",
				"lon" => "130.830686"
			],
			[
				"postcode" => "0820",
				"suburb" => "LUDMILLA",
				"state" => "NT",
				"lat" => "-12.425888",
				"lon" => "130.851446"
			],
			[
				"postcode" => "0820",
				"suburb" => "PARAP",
				"state" => "NT",
				"lat" => "-12.432181",
				"lon" => "130.84331"
			],
			[
				"postcode" => "0820",
				"suburb" => "STUART PARK",
				"state" => "NT",
				"lat" => "-12.4389",
				"lon" => "130.843067"
			],
			[
				"postcode" => "0820",
				"suburb" => "THE GARDENS",
				"state" => "NT",
				"lat" => "-12.46303",
				"lon" => "130.841596"
			],
			[
				"postcode" => "0820",
				"suburb" => "THE NARROWS",
				"state" => "NT",
				"lat" => "-12.425149",
				"lon" => "130.859165"
			],
			[
				"postcode" => "0820",
				"suburb" => "WINNELLIE",
				"state" => "NT",
				"lat" => "-12.426641",
				"lon" => "130.882367"
			],
			[
				"postcode" => "0820",
				"suburb" => "WOOLNER",
				"state" => "NT",
				"lat" => "-12.43754",
				"lon" => "130.848872"
			],
			[
				"postcode" => "0821",
				"suburb" => "WINNELLIE",
				"state" => "NT",
				"lat" => "-12.426641",
				"lon" => "130.882367"
			],
			[
				"postcode" => "0822",
				"suburb" => "ACACIA HILLS",
				"state" => "NT",
				"lat" => "-12.799278",
				"lon" => "131.131697"
			],
			[
				"postcode" => "0822",
				"suburb" => "BEES CREEK",
				"state" => "NT",
				"lat" => "-12.571462",
				"lon" => "131.059047"
			],
			[
				"postcode" => "0822",
				"suburb" => "COX PENINSULA",
				"state" => "NT",
				"lat" => "-12.715959",
				"lon" => "130.875404"
			],
			[
				"postcode" => "0822",
				"suburb" => "DALY RIVER",
				"state" => "NT",
				"lat" => "-13.988234",
				"lon" => "130.402149"
			],
			[
				"postcode" => "0822",
				"suburb" => "FLEMING",
				"state" => "NT",
				"lat" => "-14.05834",
				"lon" => "131.412028"
			],
			[
				"postcode" => "0822",
				"suburb" => "GUNN POINT",
				"state" => "NT",
				"lat" => "-12.316964",
				"lon" => "131.129559"
			],
			[
				"postcode" => "0822",
				"suburb" => "LAMBELLS LAGOON",
				"state" => "NT",
				"lat" => "-12.569228",
				"lon" => "131.237821"
			],
			[
				"postcode" => "0822",
				"suburb" => "LIVINGSTONE",
				"state" => "NT",
				"lat" => "-12.730838",
				"lon" => "131.038993"
			],
			[
				"postcode" => "0822",
				"suburb" => "MANINGRIDA",
				"state" => "NT",
				"lat" => "-12.086972",
				"lon" => "134.271016"
			],
			[
				"postcode" => "0822",
				"suburb" => "MARRAKAI",
				"state" => "NT",
				"lat" => "-12.361331",
				"lon" => "130.876795"
			],
			[
				"postcode" => "0822",
				"suburb" => "MCMINNS LAGOON",
				"state" => "NT",
				"lat" => "-12.542204",
				"lon" => "131.079417"
			],
			[
				"postcode" => "0822",
				"suburb" => "MIDDLE POINT",
				"state" => "NT",
				"lat" => "-12.646157",
				"lon" => "131.015033"
			],
			[
				"postcode" => "0822",
				"suburb" => "MILIKAPITI",
				"state" => "NT",
				"lat" => "-12.411749",
				"lon" => "130.948361"
			],
			[
				"postcode" => "0822",
				"suburb" => "NGUIU",
				"state" => "NT",
				"lat" => "-11.764711",
				"lon" => "130.314401"
			],
			[
				"postcode" => "0822",
				"suburb" => "OENPELLI",
				"state" => "NT",
				"lat" => "-12.414984",
				"lon" => "132.987357"
			],
			[
				"postcode" => "0822",
				"suburb" => "POINT STEPHENS",
				"state" => "NT",
				"lat" => "-23.721252",
				"lon" => "133.884318"
			],
			[
				"postcode" => "0822",
				"suburb" => "PULARUMPI",
				"state" => "NT",
				"lat" => "-12.447299",
				"lon" => "131.004516"
			],
			[
				"postcode" => "0822",
				"suburb" => "SOUTHPORT",
				"state" => "NT",
				"lat" => "-12.742355",
				"lon" => "130.956082"
			],
			[
				"postcode" => "0822",
				"suburb" => "UMBAKUMBA",
				"state" => "NT",
				"lat" => "-13.848676",
				"lon" => "136.428043"
			],
			[
				"postcode" => "0822",
				"suburb" => "WADEYE",
				"state" => "NT",
				"lat" => "-14.17407",
				"lon" => "130.13833"
			],
			[
				"postcode" => "0822",
				"suburb" => "WAGAIT BEACH",
				"state" => "NT",
				"lat" => "-12.433507",
				"lon" => "130.748017"
			],
			[
				"postcode" => "0822",
				"suburb" => "WEDDELL",
				"state" => "NT",
				"lat" => "-12.434023",
				"lon" => "130.84112"
			],
			[
				"postcode" => "0822",
				"suburb" => "WINNELLIE",
				"state" => "NT",
				"lat" => "-12.426641",
				"lon" => "130.882367"
			],
			[
				"postcode" => "0822",
				"suburb" => "WOOLANING",
				"state" => "NT",
				"lat" => "-12.419838",
				"lon" => "130.949418"
			],
			[
				"postcode" => "0828",
				"suburb" => "BERRIMAH",
				"state" => "NT",
				"lat" => "-12.474896",
				"lon" => "130.907378"
			],
			[
				"postcode" => "0828",
				"suburb" => "KNUCKEY LAGOON",
				"state" => "NT",
				"lat" => "-12.426825",
				"lon" => "130.934141"
			],
			[
				"postcode" => "0829",
				"suburb" => "HOLTZE",
				"state" => "NT",
				"lat" => "-14.460879",
				"lon" => "132.280002"
			],
			[
				"postcode" => "0830",
				"suburb" => "DRIVER",
				"state" => "NT",
				"lat" => "-12.487233",
				"lon" => "130.972637"
			],
			[
				"postcode" => "0830",
				"suburb" => "DURACK",
				"state" => "NT",
				"lat" => "-12.193006",
				"lon" => "136.763961"
			],
			[
				"postcode" => "0830",
				"suburb" => "FARRAR",
				"state" => "NT",
				"lat" => "-12.480219",
				"lon" => "130.997607"
			],
			[
				"postcode" => "0830",
				"suburb" => "GRAY",
				"state" => "NT",
				"lat" => "-12.384847",
				"lon" => "130.872981"
			],
			[
				"postcode" => "0830",
				"suburb" => "MARLOW LAGOON",
				"state" => "NT",
				"lat" => "-12.446554",
				"lon" => "130.923435"
			],
			[
				"postcode" => "0830",
				"suburb" => "MOULDEN",
				"state" => "NT",
				"lat" => "-12.511316",
				"lon" => "130.974467"
			],
			[
				"postcode" => "0830",
				"suburb" => "PALMERSTON",
				"state" => "NT",
				"lat" => "-12.480066",
				"lon" => "130.984006"
			],
			[
				"postcode" => "0830",
				"suburb" => "SHOAL BAY",
				"state" => "NT",
				"lat" => "-12.394902",
				"lon" => "130.924268"
			],
			[
				"postcode" => "0830",
				"suburb" => "WOODROFFE",
				"state" => "NT",
				"lat" => "-12.504958",
				"lon" => "130.981903"
			],
			[
				"postcode" => "0830",
				"suburb" => "YARRAWONGA",
				"state" => "NT",
				"lat" => "-12.471149",
				"lon" => "130.984917"
			],
			[
				"postcode" => "0831",
				"suburb" => "PALMERSTON",
				"state" => "NT",
				"lat" => "-12.480066",
				"lon" => "130.984006"
			],
			[
				"postcode" => "0832",
				"suburb" => "GUNN",
				"state" => "NT",
				"lat" => "-12.492269",
				"lon" => "130.990891"
			],
			[
				"postcode" => "0832",
				"suburb" => "MITCHELL",
				"state" => "NT",
				"lat" => "-12.460386",
				"lon" => "130.837001"
			],
			[
				"postcode" => "0832",
				"suburb" => "ROSEBERY",
				"state" => "NT",
				"lat" => "-12.501969",
				"lon" => "130.988349"
			],
			[
				"postcode" => "0832",
				"suburb" => "ROSEBERY HEIGHTS",
				"state" => "NT",
				"lat" => "-12.501969",
				"lon" => "130.988349"
			],
			[
				"postcode" => "0835",
				"suburb" => "HOWARD SPRINGS",
				"state" => "NT",
				"lat" => "-12.48138",
				"lon" => "131.029173"
			],
			[
				"postcode" => "0835",
				"suburb" => "VIRGINIA",
				"state" => "NT",
				"lat" => "-12.545626",
				"lon" => "131.029268"
			],
			[
				"postcode" => "0836",
				"suburb" => "GIRRAWEEN",
				"state" => "NT",
				"lat" => "-12.525546",
				"lon" => "131.103025"
			],
			[
				"postcode" => "0836",
				"suburb" => "HERBERT",
				"state" => "NT",
				"lat" => "-14.462901",
				"lon" => "132.280885"
			],
			[
				"postcode" => "0837",
				"suburb" => "MANTON",
				"state" => "NT",
				"lat" => "-12.460094",
				"lon" => "130.842663"
			],
			[
				"postcode" => "0838",
				"suburb" => "BERRY SPRINGS",
				"state" => "NT",
				"lat" => "-12.709507",
				"lon" => "130.995407"
			],
			[
				"postcode" => "0840",
				"suburb" => "DUNDEE BEACH",
				"state" => "NT",
				"lat" => "-12.717562",
				"lon" => "130.351316"
			],
			[
				"postcode" => "0840",
				"suburb" => "DUNDEE DOWNS",
				"state" => "NT",
				"lat" => "-12.771275",
				"lon" => "130.527516"
			],
			[
				"postcode" => "0840",
				"suburb" => "DUNDEE FOREST",
				"state" => "NT",
				"lat" => "-12.749956",
				"lon" => "130.524993"
			],
			[
				"postcode" => "0841",
				"suburb" => "DARWIN RIVER",
				"state" => "NT",
				"lat" => "-12.801028",
				"lon" => "130.955789"
			],
			[
				"postcode" => "0845",
				"suburb" => "BATCHELOR",
				"state" => "NT",
				"lat" => "-13.038663",
				"lon" => "131.072091"
			],
			[
				"postcode" => "0846",
				"suburb" => "ADELAIDE RIVER",
				"state" => "NT",
				"lat" => "-13.226806",
				"lon" => "131.098416"
			],
			[
				"postcode" => "0847",
				"suburb" => "PINE CREEK",
				"state" => "NT",
				"lat" => "-13.824123",
				"lon" => "131.835799"
			],
			[
				"postcode" => "0850",
				"suburb" => "KATHERINE",
				"state" => "NT",
				"lat" => "-14.464497",
				"lon" => "132.262021"
			],
			[
				"postcode" => "0851",
				"suburb" => "KATHERINE",
				"state" => "NT",
				"lat" => "-14.464497",
				"lon" => "132.262021"
			],
			[
				"postcode" => "0852",
				"suburb" => "BESWICK",
				"state" => "NT",
				"lat" => "-14.92267",
				"lon" => "133.064654"
			],
			[
				"postcode" => "0852",
				"suburb" => "DALY WATERS",
				"state" => "NT",
				"lat" => "-16.252155",
				"lon" => "133.367852"
			],
			[
				"postcode" => "0852",
				"suburb" => "KATHERINE",
				"state" => "NT",
				"lat" => "-14.464497",
				"lon" => "132.262021"
			],
			[
				"postcode" => "0852",
				"suburb" => "LAJAMANU",
				"state" => "NT",
				"lat" => "-19.141443",
				"lon" => "130.051529"
			],
			[
				"postcode" => "0852",
				"suburb" => "LARRIMAH",
				"state" => "NT",
				"lat" => "-15.62712",
				"lon" => "132.944488"
			],
			[
				"postcode" => "0852",
				"suburb" => "MANBULLOO",
				"state" => "NT",
				"lat" => "-12.360929",
				"lon" => "130.880316"
			],
			[
				"postcode" => "0852",
				"suburb" => "NUMBULWAR",
				"state" => "NT",
				"lat" => "-14.65403",
				"lon" => "134.78167"
			],
			[
				"postcode" => "0852",
				"suburb" => "WAVE HILL",
				"state" => "NT",
				"lat" => "-17.450131",
				"lon" => "130.103437"
			],
			[
				"postcode" => "0854",
				"suburb" => "BORROLOOLA",
				"state" => "NT",
				"lat" => "-16.81839",
				"lon" => "137.14707"
			],
			[
				"postcode" => "0860",
				"suburb" => "TENNANT CREEK",
				"state" => "NT",
				"lat" => "-19.648306",
				"lon" => "134.186642"
			],
			[
				"postcode" => "0861",
				"suburb" => "BRUNCHILLY",
				"state" => "NT",
				"lat" => "-18.94406",
				"lon" => "134.318373"
			],
			[
				"postcode" => "0861",
				"suburb" => "TENNANT CREEK",
				"state" => "NT",
				"lat" => "-19.648306",
				"lon" => "134.186642"
			],
			[
				"postcode" => "0862",
				"suburb" => "AVON DOWNS",
				"state" => "NT",
				"lat" => "-20.231104",
				"lon" => "137.762232"
			],
			[
				"postcode" => "0862",
				"suburb" => "CRESSWELL DOWNS",
				"state" => "NT",
				"lat" => "-17.939922",
				"lon" => "135.588193"
			],
			[
				"postcode" => "0862",
				"suburb" => "ELLIOTT",
				"state" => "NT",
				"lat" => "-23.684",
				"lon" => "133.869007"
			],
			[
				"postcode" => "0862",
				"suburb" => "HELEN SPRINGS",
				"state" => "NT",
				"lat" => "-18.409609",
				"lon" => "133.882689"
			],
			[
				"postcode" => "0862",
				"suburb" => "MUCKATY STATION",
				"state" => "NT",
				"lat" => "-18.629682",
				"lon" => "133.906927"
			],
			[
				"postcode" => "0862",
				"suburb" => "NEWCASTLE WATERS",
				"state" => "NT",
				"lat" => "-17.54887",
				"lon" => "133.538826"
			],
			[
				"postcode" => "0862",
				"suburb" => "RENNER SPRINGS",
				"state" => "NT",
				"lat" => "-23.695949",
				"lon" => "133.889816"
			],
			[
				"postcode" => "0862",
				"suburb" => "TENNANT CREEK",
				"state" => "NT",
				"lat" => "-19.648306",
				"lon" => "134.186642"
			],
			[
				"postcode" => "0862",
				"suburb" => "WARREGO",
				"state" => "NT",
				"lat" => "-19.512201",
				"lon" => "134.068348"
			],
			[
				"postcode" => "0862",
				"suburb" => "WOLLOGORANG STATION",
				"state" => "NT",
				"lat" => "-17.142478",
				"lon" => "137.591784"
			],
			[
				"postcode" => "0870",
				"suburb" => "ALICE SPRINGS",
				"state" => "NT",
				"lat" => "-12.436101",
				"lon" => "130.84059"
			],
			[
				"postcode" => "0871",
				"suburb" => "ALICE SPRINGS",
				"state" => "NT",
				"lat" => "-12.436101",
				"lon" => "130.84059"
			],
			[
				"postcode" => "0872",
				"suburb" => "ALI CURUNG",
				"state" => "NT",
				"lat" => "-20.998545",
				"lon" => "134.3822"
			],
			[
				"postcode" => "0872",
				"suburb" => "ALICE SPRINGS",
				"state" => "NT",
				"lat" => "-12.436101",
				"lon" => "130.84059"
			],
			[
				"postcode" => "0872",
				"suburb" => "AMATA",
				"state" => "NT",
				"lat" => "-25.962716",
				"lon" => "131.606872"
			],
			[
				"postcode" => "0872",
				"suburb" => "AMOONGUNA",
				"state" => "NT",
				"lat" => "-23.747506",
				"lon" => "133.926632"
			],
			[
				"postcode" => "0872",
				"suburb" => "AREYONGA",
				"state" => "NT",
				"lat" => "-24.166937",
				"lon" => "132.286759"
			],
			[
				"postcode" => "0872",
				"suburb" => "ERLDUNDA",
				"state" => "NT",
				"lat" => "-12.364467",
				"lon" => "130.876251"
			],
			[
				"postcode" => "0872",
				"suburb" => "FINKE",
				"state" => "NT",
				"lat" => "-25.698005",
				"lon" => "134.339708"
			],
			[
				"postcode" => "0872",
				"suburb" => "GIBSON DESERT NORTH",
				"state" => "WA",
				"lat" => "-22.590927",
				"lon" => "125.664556"
			],
			[
				"postcode" => "0872",
				"suburb" => "HAASTS BLUFF",
				"state" => "NT",
				"lat" => "-23.509293",
				"lon" => "132.185203"
			],
			[
				"postcode" => "0872",
				"suburb" => "KINTORE",
				"state" => "NT",
				"lat" => "-12.486851",
				"lon" => "130.991347"
			],
			[
				"postcode" => "0872",
				"suburb" => "SANTA TERESA",
				"state" => "NT",
				"lat" => "-24.730598",
				"lon" => "135.332238"
			],
			[
				"postcode" => "0872",
				"suburb" => "TI TREE",
				"state" => "NT",
				"lat" => "-12.477758",
				"lon" => "131.068332"
			],
			[
				"postcode" => "0872",
				"suburb" => "ULURU",
				"state" => "NT",
				"lat" => "-12.486152",
				"lon" => "130.992541"
			],
			[
				"postcode" => "0872",
				"suburb" => "WILLOWRA",
				"state" => "NT",
				"lat" => "-21.717344",
				"lon" => "133.030085"
			],
			[
				"postcode" => "0872",
				"suburb" => "YUELAMU",
				"state" => "NT",
				"lat" => "-22.391277",
				"lon" => "132.11368"
			],
			[
				"postcode" => "0872",
				"suburb" => "YUENDUMU",
				"state" => "NT",
				"lat" => "-22.25909",
				"lon" => "131.808398"
			],
			[
				"postcode" => "0872",
				"suburb" => "YULARA",
				"state" => "NT",
				"lat" => "-25.242047",
				"lon" => "130.98556"
			],
			[
				"postcode" => "0880",
				"suburb" => "GOVE",
				"state" => "NT",
				"lat" => "-12.378064",
				"lon" => "130.871791"
			],
			[
				"postcode" => "0880",
				"suburb" => "NHULUNBUY",
				"state" => "NT",
				"lat" => "-12.18421",
				"lon" => "136.783889"
			],
			[
				"postcode" => "0881",
				"suburb" => "NHULUNBUY",
				"state" => "NT",
				"lat" => "-12.18421",
				"lon" => "136.783889"
			],
			[
				"postcode" => "0886",
				"suburb" => "JABIRU",
				"state" => "NT",
				"lat" => "-12.381028",
				"lon" => "130.893097"
			],
			[
				"postcode" => "0906",
				"suburb" => "WINNELLIE",
				"state" => "NT",
				"lat" => "-12.426641",
				"lon" => "130.882367"
			],
			[
				"postcode" => "0907",
				"suburb" => "WINNELLIE",
				"state" => "NT",
				"lat" => "-12.426641",
				"lon" => "130.882367"
			],
			[
				"postcode" => "1001",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1002",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1003",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1004",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1005",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1006",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1007",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1008",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1009",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1010",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1011",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1020",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1021",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1022",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1023",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1025",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1026",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1027",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1028",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1029",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1030",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1031",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1032",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.662834",
				"lon" => "150.874182"
			],
			[
				"postcode" => "1033",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1034",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1035",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1036",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1037",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1038",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1039",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1040",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1041",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1042",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1043",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1044",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1045",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1046",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1100",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1101",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1105",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1106",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1107",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1108",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1109",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1110",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1112",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1113",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1114",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1115",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1116",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.666729",
				"lon" => "150.866145"
			],
			[
				"postcode" => "1117",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.664575",
				"lon" => "150.87022"
			],
			[
				"postcode" => "1118",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1119",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1120",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1121",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1122",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1123",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1124",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1125",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1126",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1127",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1128",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1129",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1130",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1131",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1132",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.66279",
				"lon" => "150.874265"
			],
			[
				"postcode" => "1133",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1134",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1135",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1136",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1137",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1138",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1139",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1140",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1141",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1142",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1143",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1144",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1145",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1146",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1147",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1148",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1149",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1150",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1151",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1152",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1153",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1154",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1155",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1156",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1157",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1158",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1159",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1160",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1161",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1162",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1163",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1164",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1165",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1166",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1167",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1168",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1169",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1170",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1171",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1172",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1173",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1174",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1175",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1176",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1177",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1178",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1179",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1180",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1181",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1182",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1183",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1184",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1185",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1186",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1187",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1188",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1189",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1190",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1191",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1192",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-34.790684",
				"lon" => "147.685283"
			],
			[
				"postcode" => "1193",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1194",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1195",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1196",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1197",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1198",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1199",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1200",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1201",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1202",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1203",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1204",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1205",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1206",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1207",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1208",
				"suburb" => "HAYMARKET",
				"state" => "NSW",
				"lat" => "-29.816475",
				"lon" => "151.659454"
			],
			[
				"postcode" => "1209",
				"suburb" => "AUSTRALIA SQUARE",
				"state" => "NSW",
				"lat" => "-33.891788",
				"lon" => "151.176251"
			],
			[
				"postcode" => "1210",
				"suburb" => "AUSTRALIA SQUARE",
				"state" => "NSW",
				"lat" => "-33.891788",
				"lon" => "151.176251"
			],
			[
				"postcode" => "1211",
				"suburb" => "AUSTRALIA SQUARE",
				"state" => "NSW",
				"lat" => "-33.891788",
				"lon" => "151.176251"
			],
			[
				"postcode" => "1212",
				"suburb" => "AUSTRALIA SQUARE",
				"state" => "NSW",
				"lat" => "-33.891788",
				"lon" => "151.176251"
			],
			[
				"postcode" => "1213",
				"suburb" => "AUSTRALIA SQUARE",
				"state" => "NSW",
				"lat" => "-33.891788",
				"lon" => "151.176251"
			],
			[
				"postcode" => "1214",
				"suburb" => "AUSTRALIA SQUARE",
				"state" => "NSW",
				"lat" => "-33.891788",
				"lon" => "151.176251"
			],
			[
				"postcode" => "1215",
				"suburb" => "AUSTRALIA SQUARE",
				"state" => "NSW",
				"lat" => "-33.891788",
				"lon" => "151.176251"
			],
			[
				"postcode" => "1216",
				"suburb" => "GROSVENOR PLACE",
				"state" => "NSW",
				"lat" => "-33.741311",
				"lon" => "151.034025"
			],
			[
				"postcode" => "1217",
				"suburb" => "GROSVENOR PLACE",
				"state" => "NSW",
				"lat" => "-33.741311",
				"lon" => "151.034025"
			],
			[
				"postcode" => "1218",
				"suburb" => "GROSVENOR PLACE",
				"state" => "NSW",
				"lat" => "-33.741311",
				"lon" => "151.034025"
			],
			[
				"postcode" => "1219",
				"suburb" => "GROSVENOR PLACE",
				"state" => "NSW",
				"lat" => "-33.741311",
				"lon" => "151.034025"
			],
			[
				"postcode" => "1220",
				"suburb" => "GROSVENOR PLACE",
				"state" => "NSW",
				"lat" => "-33.741311",
				"lon" => "151.034025"
			],
			[
				"postcode" => "1221",
				"suburb" => "ROYAL EXCHANGE",
				"state" => "NSW",
				"lat" => "-33.86533",
				"lon" => "151.207905"
			],
			[
				"postcode" => "1222",
				"suburb" => "ROYAL EXCHANGE",
				"state" => "NSW",
				"lat" => "-33.86533",
				"lon" => "151.207905"
			],
			[
				"postcode" => "1223",
				"suburb" => "ROYAL EXCHANGE",
				"state" => "NSW",
				"lat" => "-33.86533",
				"lon" => "151.207905"
			],
			[
				"postcode" => "1224",
				"suburb" => "ROYAL EXCHANGE",
				"state" => "NSW",
				"lat" => "-33.86533",
				"lon" => "151.207905"
			],
			[
				"postcode" => "1225",
				"suburb" => "ROYAL EXCHANGE",
				"state" => "NSW",
				"lat" => "-33.86533",
				"lon" => "151.207905"
			],
			[
				"postcode" => "1226",
				"suburb" => "QUEEN VICTORIA BUILDING",
				"state" => "NSW",
				"lat" => "-33.871749",
				"lon" => "151.206708"
			],
			[
				"postcode" => "1227",
				"suburb" => "QUEEN VICTORIA BUILDING",
				"state" => "NSW",
				"lat" => "-33.871749",
				"lon" => "151.206708"
			],
			[
				"postcode" => "1228",
				"suburb" => "QUEEN VICTORIA BUILDING",
				"state" => "NSW",
				"lat" => "-33.871749",
				"lon" => "151.206708"
			],
			[
				"postcode" => "1229",
				"suburb" => "QUEEN VICTORIA BUILDING",
				"state" => "NSW",
				"lat" => "-33.871749",
				"lon" => "151.206708"
			],
			[
				"postcode" => "1230",
				"suburb" => "QUEEN VICTORIA BUILDING",
				"state" => "NSW",
				"lat" => "-33.871749",
				"lon" => "151.206708"
			],
			[
				"postcode" => "1231",
				"suburb" => "SYDNEY SOUTH",
				"state" => "NSW",
				"lat" => "-33.815551",
				"lon" => "151.042528"
			],
			[
				"postcode" => "1232",
				"suburb" => "SYDNEY SOUTH",
				"state" => "NSW",
				"lat" => "-33.815551",
				"lon" => "151.042528"
			],
			[
				"postcode" => "1233",
				"suburb" => "SYDNEY SOUTH",
				"state" => "NSW",
				"lat" => "-33.815551",
				"lon" => "151.042528"
			],
			[
				"postcode" => "1234",
				"suburb" => "SYDNEY SOUTH",
				"state" => "NSW",
				"lat" => "-33.815551",
				"lon" => "151.042528"
			],
			[
				"postcode" => "1235",
				"suburb" => "SYDNEY SOUTH",
				"state" => "NSW",
				"lat" => "-33.815551",
				"lon" => "151.042528"
			],
			[
				"postcode" => "1236",
				"suburb" => "HAYMARKET",
				"state" => "NSW",
				"lat" => "-29.816475",
				"lon" => "151.659454"
			],
			[
				"postcode" => "1237",
				"suburb" => "HAYMARKET",
				"state" => "NSW",
				"lat" => "-29.816475",
				"lon" => "151.659454"
			],
			[
				"postcode" => "1238",
				"suburb" => "HAYMARKET",
				"state" => "NSW",
				"lat" => "-29.816475",
				"lon" => "151.659454"
			],
			[
				"postcode" => "1239",
				"suburb" => "HAYMARKET",
				"state" => "NSW",
				"lat" => "-29.816475",
				"lon" => "151.659454"
			],
			[
				"postcode" => "1240",
				"suburb" => "HAYMARKET",
				"state" => "NSW",
				"lat" => "-29.816475",
				"lon" => "151.659454"
			],
			[
				"postcode" => "1291",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1292",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1293",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1294",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1295",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1296",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1297",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1298",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1299",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "1300",
				"suburb" => "DARLINGHURST",
				"state" => "NSW",
				"lat" => "-33.877331",
				"lon" => "151.220876"
			],
			[
				"postcode" => "1335",
				"suburb" => "POTTS POINT",
				"state" => "NSW",
				"lat" => "-33.82269",
				"lon" => "151.117575"
			],
			[
				"postcode" => "1340",
				"suburb" => "KINGS CROSS",
				"state" => "NSW",
				"lat" => "-35.537721",
				"lon" => "148.021014"
			],
			[
				"postcode" => "1355",
				"suburb" => "BONDI JUNCTION",
				"state" => "NSW",
				"lat" => "-33.893739",
				"lon" => "151.262502"
			],
			[
				"postcode" => "1360",
				"suburb" => "DOUBLE BAY",
				"state" => "NSW",
				"lat" => "-33.87584",
				"lon" => "151.241938"
			],
			[
				"postcode" => "1401",
				"suburb" => "BROADWAY",
				"state" => "NSW",
				"lat" => "-33.884217",
				"lon" => "151.199825"
			],
			[
				"postcode" => "1420",
				"suburb" => "STRAWBERRY HILLS",
				"state" => "NSW",
				"lat" => "-33.726098",
				"lon" => "150.931838"
			],
			[
				"postcode" => "1422",
				"suburb" => "STRAWBERRY HILLS",
				"state" => "NSW",
				"lat" => "-33.726098",
				"lon" => "150.931838"
			],
			[
				"postcode" => "1423",
				"suburb" => "STRAWBERRY HILLS",
				"state" => "NSW",
				"lat" => "-33.726098",
				"lon" => "150.931838"
			],
			[
				"postcode" => "1424",
				"suburb" => "STRAWBERRY HILLS",
				"state" => "NSW",
				"lat" => "-33.726098",
				"lon" => "150.931838"
			],
			[
				"postcode" => "1425",
				"suburb" => "STRAWBERRY HILLS",
				"state" => "NSW",
				"lat" => "-33.726098",
				"lon" => "150.931838"
			],
			[
				"postcode" => "1426",
				"suburb" => "STRAWBERRY HILLS",
				"state" => "NSW",
				"lat" => "-33.726098",
				"lon" => "150.931838"
			],
			[
				"postcode" => "1427",
				"suburb" => "STRAWBERRY HILLS",
				"state" => "NSW",
				"lat" => "-33.726098",
				"lon" => "150.931838"
			],
			[
				"postcode" => "1428",
				"suburb" => "STRAWBERRY HILLS",
				"state" => "NSW",
				"lat" => "-33.726098",
				"lon" => "150.931838"
			],
			[
				"postcode" => "1429",
				"suburb" => "STRAWBERRY HILLS",
				"state" => "NSW",
				"lat" => "-33.726098",
				"lon" => "150.931838"
			],
			[
				"postcode" => "1430",
				"suburb" => "EVELEIGH",
				"state" => "NSW",
				"lat" => "-33.890232",
				"lon" => "151.199489"
			],
			[
				"postcode" => "1435",
				"suburb" => "ALEXANDRIA",
				"state" => "NSW",
				"lat" => "-33.711785",
				"lon" => "151.108248"
			],
			[
				"postcode" => "1440",
				"suburb" => "WATERLOO",
				"state" => "NSW",
				"lat" => "-33.902836",
				"lon" => "151.057914"
			],
			[
				"postcode" => "1441",
				"suburb" => "WATERLOO",
				"state" => "NSW",
				"lat" => "-33.902836",
				"lon" => "151.057914"
			],
			[
				"postcode" => "1445",
				"suburb" => "ROSEBERY",
				"state" => "NSW",
				"lat" => "-34.083089",
				"lon" => "151.007691"
			],
			[
				"postcode" => "1450",
				"suburb" => "CAMPERDOWN",
				"state" => "NSW",
				"lat" => "-30.305815",
				"lon" => "153.13679"
			],
			[
				"postcode" => "1455",
				"suburb" => "BOTANY",
				"state" => "NSW",
				"lat" => "-33.947087",
				"lon" => "151.197644"
			],
			[
				"postcode" => "1460",
				"suburb" => "MASCOT",
				"state" => "NSW",
				"lat" => "-33.926669",
				"lon" => "151.210791"
			],
			[
				"postcode" => "1465",
				"suburb" => "KENSINGTON",
				"state" => "NSW",
				"lat" => "-33.888549",
				"lon" => "151.140735"
			],
			[
				"postcode" => "1466",
				"suburb" => "UNSW SYDNEY",
				"state" => "NSW",
				"lat" => "-33.906561",
				"lon" => "151.234417"
			],
			[
				"postcode" => "1470",
				"suburb" => "DRUMMOYNE",
				"state" => "NSW",
				"lat" => "-33.842999",
				"lon" => "151.151958"
			],
			[
				"postcode" => "1475",
				"suburb" => "MARRICKVILLE",
				"state" => "NSW",
				"lat" => "-33.90911",
				"lon" => "151.15334"
			],
			[
				"postcode" => "1476",
				"suburb" => "MARRICKVILLE",
				"state" => "NSW",
				"lat" => "-33.90911",
				"lon" => "151.15334"
			],
			[
				"postcode" => "1480",
				"suburb" => "KINGSGROVE",
				"state" => "NSW",
				"lat" => "-33.935923",
				"lon" => "151.100027"
			],
			[
				"postcode" => "1490",
				"suburb" => "MIRANDA",
				"state" => "NSW",
				"lat" => "-34.035878",
				"lon" => "151.107201"
			],
			[
				"postcode" => "1493",
				"suburb" => "HURSTVILLE",
				"state" => "NSW",
				"lat" => "-33.975869",
				"lon" => "151.088939"
			],
			[
				"postcode" => "1495",
				"suburb" => "CARINGBAH",
				"state" => "NSW",
				"lat" => "-34.046927",
				"lon" => "151.123943"
			],
			[
				"postcode" => "1499",
				"suburb" => "SUTHERLAND",
				"state" => "NSW",
				"lat" => "-34.015705",
				"lon" => "151.0622"
			],
			[
				"postcode" => "1515",
				"suburb" => "WEST CHATSWOOD",
				"state" => "NSW",
				"lat" => "-33.824607",
				"lon" => "151.207261"
			],
			[
				"postcode" => "1565",
				"suburb" => "MILSONS POINT",
				"state" => "NSW",
				"lat" => "-33.865367",
				"lon" => "151.193071"
			],
			[
				"postcode" => "1570",
				"suburb" => "ARTARMON",
				"state" => "NSW",
				"lat" => "-33.808087",
				"lon" => "151.192733"
			],
			[
				"postcode" => "1582",
				"suburb" => "CROWS NEST",
				"state" => "NSW",
				"lat" => "-33.83459",
				"lon" => "151.20085"
			],
			[
				"postcode" => "1585",
				"suburb" => "CROWS NEST",
				"state" => "NSW",
				"lat" => "-33.83459",
				"lon" => "151.20085"
			],
			[
				"postcode" => "1590",
				"suburb" => "ST LEONARDS",
				"state" => "NSW",
				"lat" => "-33.292001",
				"lon" => "151.468652"
			],
			[
				"postcode" => "1595",
				"suburb" => "LANE COVE",
				"state" => "NSW",
				"lat" => "-33.791875",
				"lon" => "151.187955"
			],
			[
				"postcode" => "1597",
				"suburb" => "LANE COVE",
				"state" => "NSW",
				"lat" => "-33.791875",
				"lon" => "151.187955"
			],
			[
				"postcode" => "1630",
				"suburb" => "HORNSBY",
				"state" => "NSW",
				"lat" => "-33.707684",
				"lon" => "151.099812"
			],
			[
				"postcode" => "1639",
				"suburb" => "FRENCHS FOREST",
				"state" => "NSW",
				"lat" => "-33.793137",
				"lon" => "151.246751"
			],
			[
				"postcode" => "1640",
				"suburb" => "FRENCHS FOREST",
				"state" => "NSW",
				"lat" => "-33.793137",
				"lon" => "151.246751"
			],
			[
				"postcode" => "1655",
				"suburb" => "MANLY",
				"state" => "NSW",
				"lat" => "-33.329799",
				"lon" => "151.505125"
			],
			[
				"postcode" => "1658",
				"suburb" => "MONA VALE",
				"state" => "NSW",
				"lat" => "-33.698773",
				"lon" => "151.216799"
			],
			[
				"postcode" => "1660",
				"suburb" => "MONA VALE",
				"state" => "NSW",
				"lat" => "-33.698773",
				"lon" => "151.216799"
			],
			[
				"postcode" => "1675",
				"suburb" => "GLADESVILLE",
				"state" => "NSW",
				"lat" => "-33.833033",
				"lon" => "151.139681"
			],
			[
				"postcode" => "1680",
				"suburb" => "RYDE",
				"state" => "NSW",
				"lat" => "-33.761498",
				"lon" => "151.137807"
			],
			[
				"postcode" => "1685",
				"suburb" => "WEST RYDE",
				"state" => "NSW",
				"lat" => "-33.80406",
				"lon" => "151.09064"
			],
			[
				"postcode" => "1700",
				"suburb" => "ERMINGTON",
				"state" => "NSW",
				"lat" => "-33.950299",
				"lon" => "151.206982"
			],
			[
				"postcode" => "1710",
				"suburb" => "EPPING",
				"state" => "NSW",
				"lat" => "-33.78417",
				"lon" => "151.116696"
			],
			[
				"postcode" => "1712",
				"suburb" => "EPPING",
				"state" => "NSW",
				"lat" => "-33.78417",
				"lon" => "151.116696"
			],
			[
				"postcode" => "1715",
				"suburb" => "PENNANT HILLS",
				"state" => "NSW",
				"lat" => "-33.758433",
				"lon" => "151.049106"
			],
			[
				"postcode" => "1730",
				"suburb" => "SEVEN HILLS",
				"state" => "NSW",
				"lat" => "-33.760263",
				"lon" => "150.966912"
			],
			[
				"postcode" => "1740",
				"suburb" => "PARRAMATTA",
				"state" => "NSW",
				"lat" => "-33.886166",
				"lon" => "151.139472"
			],
			[
				"postcode" => "1741",
				"suburb" => "PARRAMATTA",
				"state" => "NSW",
				"lat" => "-33.886166",
				"lon" => "151.139472"
			],
			[
				"postcode" => "1750",
				"suburb" => "NORTH PARRAMATTA",
				"state" => "NSW",
				"lat" => "-33.857053",
				"lon" => "151.023102"
			],
			[
				"postcode" => "1755",
				"suburb" => "BAULKHAM HILLS",
				"state" => "NSW",
				"lat" => "-33.767239",
				"lon" => "150.968177"
			],
			[
				"postcode" => "1765",
				"suburb" => "CASTLE HILL",
				"state" => "NSW",
				"lat" => "-33.735906",
				"lon" => "151.030535"
			],
			[
				"postcode" => "1771",
				"suburb" => "PENNANT HILLS",
				"state" => "NSW",
				"lat" => "-33.758433",
				"lon" => "151.049106"
			],
			[
				"postcode" => "1790",
				"suburb" => "ST MARYS",
				"state" => "NSW",
				"lat" => "-33.859047",
				"lon" => "151.19554"
			],
			[
				"postcode" => "1800",
				"suburb" => "ASHFIELD",
				"state" => "NSW",
				"lat" => "-34.096505",
				"lon" => "150.778939"
			],
			[
				"postcode" => "1805",
				"suburb" => "BURWOOD",
				"state" => "NSW",
				"lat" => "-33.891556",
				"lon" => "151.10082"
			],
			[
				"postcode" => "1811",
				"suburb" => "SILVERWATER",
				"state" => "NSW",
				"lat" => "-33.82328",
				"lon" => "151.051375"
			],
			[
				"postcode" => "1816",
				"suburb" => "STRATHFIELD",
				"state" => "NSW",
				"lat" => "-33.877139",
				"lon" => "151.093326"
			],
			[
				"postcode" => "1819",
				"suburb" => "STRATHFIELD",
				"state" => "NSW",
				"lat" => "-33.877139",
				"lon" => "151.093326"
			],
			[
				"postcode" => "1830",
				"suburb" => "GRANVILLE",
				"state" => "NSW",
				"lat" => "-33.859289",
				"lon" => "150.948582"
			],
			[
				"postcode" => "1831",
				"suburb" => "GRANVILLE",
				"state" => "NSW",
				"lat" => "-33.859289",
				"lon" => "150.948582"
			],
			[
				"postcode" => "1835",
				"suburb" => "AUBURN",
				"state" => "NSW",
				"lat" => "-33.883928",
				"lon" => "151.023796"
			],
			[
				"postcode" => "1848",
				"suburb" => "GUILDFORD",
				"state" => "NSW",
				"lat" => "-33.850193",
				"lon" => "150.966745"
			],
			[
				"postcode" => "1860",
				"suburb" => "FAIRFIELD",
				"state" => "NSW",
				"lat" => "-33.850457",
				"lon" => "150.961124"
			],
			[
				"postcode" => "1871",
				"suburb" => "LIVERPOOL",
				"state" => "NSW",
				"lat" => "-33.888327",
				"lon" => "151.103632"
			],
			[
				"postcode" => "1875",
				"suburb" => "MOOREBANK",
				"state" => "NSW",
				"lat" => "-33.954639",
				"lon" => "150.92236"
			],
			[
				"postcode" => "1885",
				"suburb" => "BANKSTOWN",
				"state" => "NSW",
				"lat" => "-33.907417",
				"lon" => "151.024581"
			],
			[
				"postcode" => "1888",
				"suburb" => "BANKSTOWN",
				"state" => "NSW",
				"lat" => "-33.907417",
				"lon" => "151.024581"
			],
			[
				"postcode" => "1890",
				"suburb" => "INGLEBURN",
				"state" => "NSW",
				"lat" => "-33.960035",
				"lon" => "150.802088"
			],
			[
				"postcode" => "1891",
				"suburb" => "MILPERRA",
				"state" => "NSW",
				"lat" => "-33.932221",
				"lon" => "151.000183"
			],
			[
				"postcode" => "2000",
				"suburb" => "DAWES POINT",
				"state" => "NSW",
				"lat" => "-33.855601",
				"lon" => "151.20822"
			],
			[
				"postcode" => "2000",
				"suburb" => "HAYMARKET",
				"state" => "NSW",
				"lat" => "-33.880777",
				"lon" => "151.202796"
			],
			[
				"postcode" => "2000",
				"suburb" => "MILLERS POINT",
				"state" => "NSW",
				"lat" => "-33.858315",
				"lon" => "151.203519"
			],
			[
				"postcode" => "2000",
				"suburb" => "PARLIAMENT HOUSE",
				"state" => "NSW",
				"lat" => "-33.867229",
				"lon" => "151.213051"
			],
			[
				"postcode" => "2000",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.867139",
				"lon" => "151.207114"
			],
			[
				"postcode" => "2000",
				"suburb" => "SYDNEY SOUTH",
				"state" => "NSW",
				"lat" => "-33.877718",
				"lon" => "151.205723"
			],
			[
				"postcode" => "2000",
				"suburb" => "THE ROCKS",
				"state" => "NSW",
				"lat" => "-33.859251",
				"lon" => "151.208782"
			],
			[
				"postcode" => "2001",
				"suburb" => "SYDNEY",
				"state" => "NSW",
				"lat" => "-33.794883",
				"lon" => "151.268071"
			],
			[
				"postcode" => "2002",
				"suburb" => "WORLD SQUARE",
				"state" => "NSW",
				"lat" => "-35.974434",
				"lon" => "146.40506"
			],
			[
				"postcode" => "2006",
				"suburb" => "THE UNIVERSITY OF SYDNEY",
				"state" => "NSW",
				"lat" => "-33.887926",
				"lon" => "151.186923"
			],
			[
				"postcode" => "2007",
				"suburb" => "BROADWAY",
				"state" => "NSW",
				"lat" => "-33.884366",
				"lon" => "151.196502"
			],
			[
				"postcode" => "2007",
				"suburb" => "ULTIMO",
				"state" => "NSW",
				"lat" => "-33.878416",
				"lon" => "151.197272"
			],
			[
				"postcode" => "2008",
				"suburb" => "CHIPPENDALE",
				"state" => "NSW",
				"lat" => "-33.886844",
				"lon" => "151.201715"
			],
			[
				"postcode" => "2008",
				"suburb" => "DARLINGTON",
				"state" => "NSW",
				"lat" => "-33.891348",
				"lon" => "151.191243"
			],
			[
				"postcode" => "2009",
				"suburb" => "PYRMONT",
				"state" => "NSW",
				"lat" => "-33.869709",
				"lon" => "151.19393"
			],
			[
				"postcode" => "2010",
				"suburb" => "DARLINGHURST",
				"state" => "NSW",
				"lat" => "-33.879825",
				"lon" => "151.21956"
			],
			[
				"postcode" => "2010",
				"suburb" => "SURRY HILLS",
				"state" => "NSW",
				"lat" => "-33.888821",
				"lon" => "151.213328"
			],
			[
				"postcode" => "2011",
				"suburb" => "ELIZABETH BAY",
				"state" => "NSW",
				"lat" => "-33.872829",
				"lon" => "151.226593"
			],
			[
				"postcode" => "2011",
				"suburb" => "HMAS KUTTABUL",
				"state" => "NSW",
				"lat" => "-33.867206",
				"lon" => "151.225205"
			],
			[
				"postcode" => "2011",
				"suburb" => "POTTS POINT",
				"state" => "NSW",
				"lat" => "-33.869026",
				"lon" => "151.225603"
			],
			[
				"postcode" => "2011",
				"suburb" => "RUSHCUTTERS BAY",
				"state" => "NSW",
				"lat" => "-33.87624",
				"lon" => "151.228614"
			],
			[
				"postcode" => "2011",
				"suburb" => "WOOLLOOMOOLOO",
				"state" => "NSW",
				"lat" => "-33.869283",
				"lon" => "151.220412"
			],
			[
				"postcode" => "2012",
				"suburb" => "STRAWBERRY HILLS",
				"state" => "NSW",
				"lat" => "-33.726098",
				"lon" => "150.931838"
			],
			[
				"postcode" => "2013",
				"suburb" => "STRAWBERRY HILLS",
				"state" => "NSW",
				"lat" => "-33.726098",
				"lon" => "150.931838"
			],
			[
				"postcode" => "2015",
				"suburb" => "ALEXANDRIA",
				"state" => "NSW",
				"lat" => "-33.897571",
				"lon" => "151.195567"
			],
			[
				"postcode" => "2015",
				"suburb" => "BEACONSFIELD",
				"state" => "NSW",
				"lat" => "-33.911613",
				"lon" => "151.20189"
			],
			[
				"postcode" => "2015",
				"suburb" => "EVELEIGH",
				"state" => "NSW",
				"lat" => "-33.897075",
				"lon" => "151.19113"
			],
			[
				"postcode" => "2016",
				"suburb" => "REDFERN",
				"state" => "NSW",
				"lat" => "-33.892778",
				"lon" => "151.203901"
			],
			[
				"postcode" => "2017",
				"suburb" => "WATERLOO",
				"state" => "NSW",
				"lat" => "-33.9004",
				"lon" => "151.206144"
			],
			[
				"postcode" => "2017",
				"suburb" => "ZETLAND",
				"state" => "NSW",
				"lat" => "-33.909938",
				"lon" => "151.206234"
			],
			[
				"postcode" => "2018",
				"suburb" => "EASTLAKES",
				"state" => "NSW",
				"lat" => "-33.925133",
				"lon" => "151.213199"
			],
			[
				"postcode" => "2018",
				"suburb" => "ROSEBERY",
				"state" => "NSW",
				"lat" => "-33.920412",
				"lon" => "151.203107"
			],
			[
				"postcode" => "2019",
				"suburb" => "BANKSMEADOW",
				"state" => "NSW",
				"lat" => "-33.95742",
				"lon" => "151.206715"
			],
			[
				"postcode" => "2019",
				"suburb" => "BOTANY",
				"state" => "NSW",
				"lat" => "-33.94477",
				"lon" => "151.196528"
			],
			[
				"postcode" => "2020",
				"suburb" => "MASCOT",
				"state" => "NSW",
				"lat" => "-33.931189",
				"lon" => "151.19431"
			],
			[
				"postcode" => "2020",
				"suburb" => "SYDNEY DOMESTIC AIRPORT",
				"state" => "NSW",
				"lat" => "-33.931479",
				"lon" => "151.184989"
			],
			[
				"postcode" => "2020",
				"suburb" => "SYDNEY INTERNATIONAL AIRPORT",
				"state" => "NSW",
				"lat" => "-33.932035",
				"lon" => "151.1687"
			],
			[
				"postcode" => "2021",
				"suburb" => "MOORE PARK",
				"state" => "NSW",
				"lat" => "-33.893632",
				"lon" => "151.219357"
			],
			[
				"postcode" => "2021",
				"suburb" => "PADDINGTON",
				"state" => "NSW",
				"lat" => "-33.885032",
				"lon" => "151.226475"
			],
			[
				"postcode" => "2022",
				"suburb" => "BONDI JUNCTION",
				"state" => "NSW",
				"lat" => "-33.892324",
				"lon" => "151.24733"
			],
			[
				"postcode" => "2022",
				"suburb" => "BONDI JUNCTION PLAZA",
				"state" => "NSW",
				"lat" => "-33.891431",
				"lon" => "151.250862"
			],
			[
				"postcode" => "2022",
				"suburb" => "QUEENS PARK",
				"state" => "NSW",
				"lat" => "-33.903188",
				"lon" => "151.247205"
			],
			[
				"postcode" => "2023",
				"suburb" => "BELLEVUE HILL",
				"state" => "NSW",
				"lat" => "-33.887189",
				"lon" => "151.258935"
			],
			[
				"postcode" => "2024",
				"suburb" => "BRONTE",
				"state" => "NSW",
				"lat" => "-33.902328",
				"lon" => "151.263838"
			],
			[
				"postcode" => "2024",
				"suburb" => "WAVERLEY",
				"state" => "NSW",
				"lat" => "-33.897955",
				"lon" => "151.252059"
			],
			[
				"postcode" => "2025",
				"suburb" => "WOOLLAHRA",
				"state" => "NSW",
				"lat" => "-33.885795",
				"lon" => "151.24413"
			],
			[
				"postcode" => "2026",
				"suburb" => "BONDI",
				"state" => "NSW",
				"lat" => "-33.893739",
				"lon" => "151.262502"
			],
			[
				"postcode" => "2026",
				"suburb" => "BONDI BEACH",
				"state" => "NSW",
				"lat" => "-33.890542",
				"lon" => "151.274856"
			],
			[
				"postcode" => "2026",
				"suburb" => "NORTH BONDI",
				"state" => "NSW",
				"lat" => "-33.8857",
				"lon" => "151.279788"
			],
			[
				"postcode" => "2026",
				"suburb" => "TAMARAMA",
				"state" => "NSW",
				"lat" => "-33.897439",
				"lon" => "151.271839"
			],
			[
				"postcode" => "2027",
				"suburb" => "DARLING POINT",
				"state" => "NSW",
				"lat" => "-33.873808",
				"lon" => "151.236683"
			],
			[
				"postcode" => "2027",
				"suburb" => "EDGECLIFF",
				"state" => "NSW",
				"lat" => "-33.878586",
				"lon" => "151.235106"
			],
			[
				"postcode" => "2027",
				"suburb" => "HMAS RUSHCUTTERS",
				"state" => "NSW",
				"lat" => "-33.872495",
				"lon" => "151.235668"
			],
			[
				"postcode" => "2027",
				"suburb" => "POINT PIPER",
				"state" => "NSW",
				"lat" => "-33.870083",
				"lon" => "151.252329"
			],
			[
				"postcode" => "2028",
				"suburb" => "DOUBLE BAY",
				"state" => "NSW",
				"lat" => "-33.87906",
				"lon" => "151.243095"
			],
			[
				"postcode" => "2029",
				"suburb" => "ROSE BAY",
				"state" => "NSW",
				"lat" => "-33.866555",
				"lon" => "151.280456"
			],
			[
				"postcode" => "2030",
				"suburb" => "DOVER HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.874405",
				"lon" => "151.280416"
			],
			[
				"postcode" => "2030",
				"suburb" => "HMAS WATSON",
				"state" => "NSW",
				"lat" => "-33.837706",
				"lon" => "151.281602"
			],
			[
				"postcode" => "2030",
				"suburb" => "ROSE BAY NORTH",
				"state" => "NSW",
				"lat" => "-33.866555",
				"lon" => "151.280456"
			],
			[
				"postcode" => "2030",
				"suburb" => "VAUCLUSE",
				"state" => "NSW",
				"lat" => "-33.859047",
				"lon" => "151.278434"
			],
			[
				"postcode" => "2030",
				"suburb" => "WATSONS BAY",
				"state" => "NSW",
				"lat" => "-33.844806",
				"lon" => "151.282368"
			],
			[
				"postcode" => "2031",
				"suburb" => "CLOVELLY",
				"state" => "NSW",
				"lat" => "-33.912639",
				"lon" => "151.262021"
			],
			[
				"postcode" => "2031",
				"suburb" => "CLOVELLY WEST",
				"state" => "NSW",
				"lat" => "-33.911604",
				"lon" => "151.254892"
			],
			[
				"postcode" => "2031",
				"suburb" => "RANDWICK",
				"state" => "NSW",
				"lat" => "-33.913164",
				"lon" => "151.241993"
			],
			[
				"postcode" => "2031",
				"suburb" => "ST PAULS",
				"state" => "NSW",
				"lat" => "-33.920227",
				"lon" => "151.242689"
			],
			[
				"postcode" => "2032",
				"suburb" => "DACEYVILLE",
				"state" => "NSW",
				"lat" => "-33.928043",
				"lon" => "151.22513"
			],
			[
				"postcode" => "2032",
				"suburb" => "KINGSFORD",
				"state" => "NSW",
				"lat" => "-33.924922",
				"lon" => "151.227811"
			],
			[
				"postcode" => "2033",
				"suburb" => "KENSINGTON",
				"state" => "NSW",
				"lat" => "-33.912997",
				"lon" => "151.219017"
			],
			[
				"postcode" => "2034",
				"suburb" => "COOGEE",
				"state" => "NSW",
				"lat" => "-33.920491",
				"lon" => "151.254401"
			],
			[
				"postcode" => "2034",
				"suburb" => "SOUTH COOGEE",
				"state" => "NSW",
				"lat" => "-33.931293",
				"lon" => "151.256089"
			],
			[
				"postcode" => "2035",
				"suburb" => "MAROUBRA",
				"state" => "NSW",
				"lat" => "-33.946123",
				"lon" => "151.242818"
			],
			[
				"postcode" => "2035",
				"suburb" => "MAROUBRA SOUTH",
				"state" => "NSW",
				"lat" => "-33.948856",
				"lon" => "151.246592"
			],
			[
				"postcode" => "2035",
				"suburb" => "PAGEWOOD",
				"state" => "NSW",
				"lat" => "-33.940108",
				"lon" => "151.228411"
			],
			[
				"postcode" => "2036",
				"suburb" => "CHIFLEY",
				"state" => "NSW",
				"lat" => "-33.976546",
				"lon" => "151.240248"
			],
			[
				"postcode" => "2036",
				"suburb" => "EASTGARDENS",
				"state" => "NSW",
				"lat" => "-33.946043",
				"lon" => "151.223301"
			],
			[
				"postcode" => "2036",
				"suburb" => "HILLSDALE",
				"state" => "NSW",
				"lat" => "-33.952685",
				"lon" => "151.231341"
			],
			[
				"postcode" => "2036",
				"suburb" => "LA PEROUSE",
				"state" => "NSW",
				"lat" => "-33.989634",
				"lon" => "151.231507"
			],
			[
				"postcode" => "2036",
				"suburb" => "LITTLE BAY",
				"state" => "NSW",
				"lat" => "-33.981177",
				"lon" => "151.243206"
			],
			[
				"postcode" => "2036",
				"suburb" => "MALABAR",
				"state" => "NSW",
				"lat" => "-33.965376",
				"lon" => "151.245969"
			],
			[
				"postcode" => "2036",
				"suburb" => "MATRAVILLE",
				"state" => "NSW",
				"lat" => "-33.957549",
				"lon" => "151.230846"
			],
			[
				"postcode" => "2036",
				"suburb" => "PHILLIP BAY",
				"state" => "NSW",
				"lat" => "-33.980556",
				"lon" => "151.236692"
			],
			[
				"postcode" => "2036",
				"suburb" => "PORT BOTANY",
				"state" => "NSW",
				"lat" => "-33.966245",
				"lon" => "151.225013"
			],
			[
				"postcode" => "2037",
				"suburb" => "FOREST LODGE",
				"state" => "NSW",
				"lat" => "-33.881215",
				"lon" => "151.181127"
			],
			[
				"postcode" => "2037",
				"suburb" => "GLEBE",
				"state" => "NSW",
				"lat" => "-33.880815",
				"lon" => "151.187791"
			],
			[
				"postcode" => "2038",
				"suburb" => "ANNANDALE",
				"state" => "NSW",
				"lat" => "-33.881435",
				"lon" => "151.170681"
			],
			[
				"postcode" => "2039",
				"suburb" => "ROZELLE",
				"state" => "NSW",
				"lat" => "-33.863063",
				"lon" => "151.170573"
			],
			[
				"postcode" => "2040",
				"suburb" => "LEICHHARDT",
				"state" => "NSW",
				"lat" => "-33.883793",
				"lon" => "151.157057"
			],
			[
				"postcode" => "2040",
				"suburb" => "LILYFIELD",
				"state" => "NSW",
				"lat" => "-33.872991",
				"lon" => "151.165788"
			],
			[
				"postcode" => "2041",
				"suburb" => "BALMAIN",
				"state" => "NSW",
				"lat" => "-33.856498",
				"lon" => "151.178009"
			],
			[
				"postcode" => "2041",
				"suburb" => "BALMAIN EAST",
				"state" => "NSW",
				"lat" => "-33.857833",
				"lon" => "151.190598"
			],
			[
				"postcode" => "2041",
				"suburb" => "BIRCHGROVE",
				"state" => "NSW",
				"lat" => "-33.853386",
				"lon" => "151.180609"
			],
			[
				"postcode" => "2042",
				"suburb" => "ENMORE",
				"state" => "NSW",
				"lat" => "-33.899362",
				"lon" => "151.171098"
			],
			[
				"postcode" => "2042",
				"suburb" => "NEWTOWN",
				"state" => "NSW",
				"lat" => "-33.896449",
				"lon" => "151.180013"
			],
			[
				"postcode" => "2043",
				"suburb" => "ERSKINEVILLE",
				"state" => "NSW",
				"lat" => "-33.902234",
				"lon" => "151.186192"
			],
			[
				"postcode" => "2044",
				"suburb" => "ST PETERS",
				"state" => "NSW",
				"lat" => "-33.911062",
				"lon" => "151.180126"
			],
			[
				"postcode" => "2044",
				"suburb" => "SYDENHAM",
				"state" => "NSW",
				"lat" => "-33.915222",
				"lon" => "151.166104"
			],
			[
				"postcode" => "2044",
				"suburb" => "TEMPE",
				"state" => "NSW",
				"lat" => "-33.924777",
				"lon" => "151.160747"
			],
			[
				"postcode" => "2045",
				"suburb" => "HABERFIELD",
				"state" => "NSW",
				"lat" => "-33.880496",
				"lon" => "151.138839"
			],
			[
				"postcode" => "2046",
				"suburb" => "ABBOTSFORD",
				"state" => "NSW",
				"lat" => "-33.852469",
				"lon" => "151.129453"
			],
			[
				"postcode" => "2046",
				"suburb" => "CANADA BAY",
				"state" => "NSW",
				"lat" => "-33.863194",
				"lon" => "151.116398"
			],
			[
				"postcode" => "2046",
				"suburb" => "CHISWICK",
				"state" => "NSW",
				"lat" => "-33.851437",
				"lon" => "151.135954"
			],
			[
				"postcode" => "2046",
				"suburb" => "FIVE DOCK",
				"state" => "NSW",
				"lat" => "-33.866368",
				"lon" => "151.130136"
			],
			[
				"postcode" => "2046",
				"suburb" => "RODD POINT",
				"state" => "NSW",
				"lat" => "-33.868208",
				"lon" => "151.141652"
			],
			[
				"postcode" => "2046",
				"suburb" => "RUSSELL LEA",
				"state" => "NSW",
				"lat" => "-33.86072",
				"lon" => "151.140711"
			],
			[
				"postcode" => "2046",
				"suburb" => "WAREEMBA",
				"state" => "NSW",
				"lat" => "-33.856828",
				"lon" => "151.130728"
			],
			[
				"postcode" => "2047",
				"suburb" => "DRUMMOYNE",
				"state" => "NSW",
				"lat" => "-33.851056",
				"lon" => "151.154542"
			],
			[
				"postcode" => "2048",
				"suburb" => "STANMORE",
				"state" => "NSW",
				"lat" => "-33.897351",
				"lon" => "151.16535"
			],
			[
				"postcode" => "2049",
				"suburb" => "LEWISHAM",
				"state" => "NSW",
				"lat" => "-33.894902",
				"lon" => "151.144413"
			],
			[
				"postcode" => "2049",
				"suburb" => "PETERSHAM",
				"state" => "NSW",
				"lat" => "-33.896242",
				"lon" => "151.154136"
			],
			[
				"postcode" => "2049",
				"suburb" => "PETERSHAM NORTH",
				"state" => "NSW",
				"lat" => "-33.889283",
				"lon" => "151.158575"
			],
			[
				"postcode" => "2050",
				"suburb" => "CAMPERDOWN",
				"state" => "NSW",
				"lat" => "-33.88866",
				"lon" => "151.177188"
			],
			[
				"postcode" => "2050",
				"suburb" => "MISSENDEN ROAD",
				"state" => "NSW",
				"lat" => "-33.888668",
				"lon" => "151.181531"
			],
			[
				"postcode" => "2052",
				"suburb" => "UNSW SYDNEY",
				"state" => "NSW",
				"lat" => "-33.906561",
				"lon" => "151.234417"
			],
			[
				"postcode" => "2055",
				"suburb" => "NORTH SYDNEY",
				"state" => "NSW",
				"lat" => "-33.802837",
				"lon" => "151.104935"
			],
			[
				"postcode" => "2057",
				"suburb" => "CHATSWOOD",
				"state" => "NSW",
				"lat" => "-33.791988",
				"lon" => "151.1899"
			],
			[
				"postcode" => "2059",
				"suburb" => "NORTH SYDNEY",
				"state" => "NSW",
				"lat" => "-33.802837",
				"lon" => "151.104935"
			],
			[
				"postcode" => "2060",
				"suburb" => "HMAS WATERHEN",
				"state" => "NSW",
				"lat" => "-33.840633",
				"lon" => "151.19497"
			],
			[
				"postcode" => "2060",
				"suburb" => "LAVENDER BAY",
				"state" => "NSW",
				"lat" => "-33.84307",
				"lon" => "151.208015"
			],
			[
				"postcode" => "2060",
				"suburb" => "MCMAHONS POINT",
				"state" => "NSW",
				"lat" => "-33.84464",
				"lon" => "151.20425"
			],
			[
				"postcode" => "2060",
				"suburb" => "NORTH SYDNEY",
				"state" => "NSW",
				"lat" => "-33.838265",
				"lon" => "151.206481"
			],
			[
				"postcode" => "2060",
				"suburb" => "NORTH SYDNEY SHOPPINGWORLD",
				"state" => "NSW",
				"lat" => "-33.837788",
				"lon" => "151.208276"
			],
			[
				"postcode" => "2060",
				"suburb" => "WAVERTON",
				"state" => "NSW",
				"lat" => "-33.839969",
				"lon" => "151.195808"
			],
			[
				"postcode" => "2061",
				"suburb" => "KIRRIBILLI",
				"state" => "NSW",
				"lat" => "-33.846275",
				"lon" => "151.212705"
			],
			[
				"postcode" => "2061",
				"suburb" => "MILSONS POINT",
				"state" => "NSW",
				"lat" => "-33.847526",
				"lon" => "151.211568"
			],
			[
				"postcode" => "2062",
				"suburb" => "CAMMERAY",
				"state" => "NSW",
				"lat" => "-33.821953",
				"lon" => "151.21043"
			],
			[
				"postcode" => "2063",
				"suburb" => "NORTHBRIDGE",
				"state" => "NSW",
				"lat" => "-33.815028",
				"lon" => "151.222266"
			],
			[
				"postcode" => "2064",
				"suburb" => "ARTARMON",
				"state" => "NSW",
				"lat" => "-33.807664",
				"lon" => "151.189662"
			],
			[
				"postcode" => "2065",
				"suburb" => "CROWS NEST",
				"state" => "NSW",
				"lat" => "-33.82609",
				"lon" => "151.199192"
			],
			[
				"postcode" => "2065",
				"suburb" => "GREENWICH",
				"state" => "NSW",
				"lat" => "-33.831958",
				"lon" => "151.186129"
			],
			[
				"postcode" => "2065",
				"suburb" => "NAREMBURN",
				"state" => "NSW",
				"lat" => "-33.817299",
				"lon" => "151.20116"
			],
			[
				"postcode" => "2065",
				"suburb" => "ROYAL NORTH SHORE HOSPITAL",
				"state" => "NSW",
				"lat" => "-33.821588",
				"lon" => "151.191396"
			],
			[
				"postcode" => "2065",
				"suburb" => "ST LEONARDS",
				"state" => "NSW",
				"lat" => "-33.823248",
				"lon" => "151.195504"
			],
			[
				"postcode" => "2065",
				"suburb" => "WOLLSTONECRAFT",
				"state" => "NSW",
				"lat" => "-33.828158",
				"lon" => "151.196621"
			],
			[
				"postcode" => "2066",
				"suburb" => "LANE COVE",
				"state" => "NSW",
				"lat" => "-33.814599",
				"lon" => "151.168722"
			],
			[
				"postcode" => "2066",
				"suburb" => "LANE COVE NORTH",
				"state" => "NSW",
				"lat" => "-33.807556",
				"lon" => "151.170912"
			],
			[
				"postcode" => "2066",
				"suburb" => "LANE COVE WEST",
				"state" => "NSW",
				"lat" => "-33.806246",
				"lon" => "151.153281"
			],
			[
				"postcode" => "2066",
				"suburb" => "LINLEY POINT",
				"state" => "NSW",
				"lat" => "-33.826777",
				"lon" => "151.148251"
			],
			[
				"postcode" => "2066",
				"suburb" => "LONGUEVILLE",
				"state" => "NSW",
				"lat" => "-33.833096",
				"lon" => "151.165342"
			],
			[
				"postcode" => "2066",
				"suburb" => "NORTHWOOD",
				"state" => "NSW",
				"lat" => "-33.829732",
				"lon" => "151.177751"
			],
			[
				"postcode" => "2066",
				"suburb" => "RIVERVIEW",
				"state" => "NSW",
				"lat" => "-33.825587",
				"lon" => "151.159934"
			],
			[
				"postcode" => "2067",
				"suburb" => "CHATSWOOD",
				"state" => "NSW",
				"lat" => "-33.795617",
				"lon" => "151.185329"
			],
			[
				"postcode" => "2067",
				"suburb" => "CHATSWOOD WEST",
				"state" => "NSW",
				"lat" => "-33.796332",
				"lon" => "151.167142"
			],
			[
				"postcode" => "2068",
				"suburb" => "CASTLECRAG",
				"state" => "NSW",
				"lat" => "-33.802403",
				"lon" => "151.212643"
			],
			[
				"postcode" => "2068",
				"suburb" => "MIDDLE COVE",
				"state" => "NSW",
				"lat" => "-33.794087",
				"lon" => "151.207975"
			],
			[
				"postcode" => "2068",
				"suburb" => "NORTH WILLOUGHBY",
				"state" => "NSW",
				"lat" => "-33.793089",
				"lon" => "151.195787"
			],
			[
				"postcode" => "2068",
				"suburb" => "WILLOUGHBY",
				"state" => "NSW",
				"lat" => "-33.801483",
				"lon" => "151.1986"
			],
			[
				"postcode" => "2068",
				"suburb" => "WILLOUGHBY EAST",
				"state" => "NSW",
				"lat" => "-33.802534",
				"lon" => "151.203505"
			],
			[
				"postcode" => "2068",
				"suburb" => "WILLOUGHBY NORTH",
				"state" => "NSW",
				"lat" => "-33.793089",
				"lon" => "151.195787"
			],
			[
				"postcode" => "2069",
				"suburb" => "CASTLE COVE",
				"state" => "NSW",
				"lat" => "-33.784165",
				"lon" => "151.199948"
			],
			[
				"postcode" => "2069",
				"suburb" => "ROSEVILLE",
				"state" => "NSW",
				"lat" => "-33.784635",
				"lon" => "151.177111"
			],
			[
				"postcode" => "2069",
				"suburb" => "ROSEVILLE CHASE",
				"state" => "NSW",
				"lat" => "-33.778902",
				"lon" => "151.195195"
			],
			[
				"postcode" => "2070",
				"suburb" => "EAST LINDFIELD",
				"state" => "NSW",
				"lat" => "-33.766415",
				"lon" => "151.186095"
			],
			[
				"postcode" => "2070",
				"suburb" => "LINDFIELD",
				"state" => "NSW",
				"lat" => "-33.776441",
				"lon" => "151.168736"
			],
			[
				"postcode" => "2070",
				"suburb" => "LINDFIELD WEST",
				"state" => "NSW",
				"lat" => "-33.784382",
				"lon" => "151.158141"
			],
			[
				"postcode" => "2071",
				"suburb" => "EAST KILLARA",
				"state" => "NSW",
				"lat" => "-33.753498",
				"lon" => "151.170003"
			],
			[
				"postcode" => "2071",
				"suburb" => "KILLARA",
				"state" => "NSW",
				"lat" => "-33.766376",
				"lon" => "151.162047"
			],
			[
				"postcode" => "2072",
				"suburb" => "GORDON",
				"state" => "NSW",
				"lat" => "-33.757349",
				"lon" => "151.155678"
			],
			[
				"postcode" => "2073",
				"suburb" => "PYMBLE",
				"state" => "NSW",
				"lat" => "-33.74414",
				"lon" => "151.141103"
			],
			[
				"postcode" => "2073",
				"suburb" => "WEST PYMBLE",
				"state" => "NSW",
				"lat" => "-33.760383",
				"lon" => "151.126038"
			],
			[
				"postcode" => "2074",
				"suburb" => "NORTH TURRAMURRA",
				"state" => "NSW",
				"lat" => "-33.713419",
				"lon" => "151.147146"
			],
			[
				"postcode" => "2074",
				"suburb" => "SOUTH TURRAMURRA",
				"state" => "NSW",
				"lat" => "-33.746027",
				"lon" => "151.113441"
			],
			[
				"postcode" => "2074",
				"suburb" => "TURRAMURRA",
				"state" => "NSW",
				"lat" => "-33.733244",
				"lon" => "151.129809"
			],
			[
				"postcode" => "2074",
				"suburb" => "WARRAWEE",
				"state" => "NSW",
				"lat" => "-33.722839",
				"lon" => "151.126134"
			],
			[
				"postcode" => "2075",
				"suburb" => "ST IVES",
				"state" => "NSW",
				"lat" => "-33.730601",
				"lon" => "151.158551"
			],
			[
				"postcode" => "2075",
				"suburb" => "ST IVES CHASE",
				"state" => "NSW",
				"lat" => "-33.707895",
				"lon" => "151.163446"
			],
			[
				"postcode" => "2076",
				"suburb" => "NORMANHURST",
				"state" => "NSW",
				"lat" => "-33.720999",
				"lon" => "151.097331"
			],
			[
				"postcode" => "2076",
				"suburb" => "NORTH WAHROONGA",
				"state" => "NSW",
				"lat" => "-33.702704",
				"lon" => "151.123179"
			],
			[
				"postcode" => "2076",
				"suburb" => "WAHROONGA",
				"state" => "NSW",
				"lat" => "-33.716405",
				"lon" => "151.118119"
			],
			[
				"postcode" => "2077",
				"suburb" => "ASQUITH",
				"state" => "NSW",
				"lat" => "-33.687484",
				"lon" => "151.108685"
			],
			[
				"postcode" => "2077",
				"suburb" => "HORNSBY",
				"state" => "NSW",
				"lat" => "-33.704748",
				"lon" => "151.098696"
			],
			[
				"postcode" => "2077",
				"suburb" => "HORNSBY HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.670086",
				"lon" => "151.095503"
			],
			[
				"postcode" => "2077",
				"suburb" => "WAITARA",
				"state" => "NSW",
				"lat" => "-33.709541",
				"lon" => "151.104136"
			],
			[
				"postcode" => "2079",
				"suburb" => "MOUNT COLAH",
				"state" => "NSW",
				"lat" => "-33.664817",
				"lon" => "151.117161"
			],
			[
				"postcode" => "2080",
				"suburb" => "MOUNT KURING-GAI",
				"state" => "NSW",
				"lat" => "-33.628729",
				"lon" => "151.226792"
			],
			[
				"postcode" => "2081",
				"suburb" => "BEROWRA",
				"state" => "NSW",
				"lat" => "-33.623581",
				"lon" => "151.150117"
			],
			[
				"postcode" => "2081",
				"suburb" => "COWAN",
				"state" => "NSW",
				"lat" => "-33.589491",
				"lon" => "151.171015"
			],
			[
				"postcode" => "2082",
				"suburb" => "BEROWRA HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.610968",
				"lon" => "151.136829"
			],
			[
				"postcode" => "2082",
				"suburb" => "BEROWRA WATERS",
				"state" => "NSW",
				"lat" => "-33.601653",
				"lon" => "151.11837"
			],
			[
				"postcode" => "2083",
				"suburb" => "BAR POINT",
				"state" => "NSW",
				"lat" => "-33.507463",
				"lon" => "151.163329"
			],
			[
				"postcode" => "2083",
				"suburb" => "BROOKLYN",
				"state" => "NSW",
				"lat" => "-33.548006",
				"lon" => "151.22519"
			],
			[
				"postcode" => "2083",
				"suburb" => "CHEERO POINT",
				"state" => "NSW",
				"lat" => "-33.514637",
				"lon" => "151.195142"
			],
			[
				"postcode" => "2083",
				"suburb" => "COGRA BAY",
				"state" => "NSW",
				"lat" => "-33.519596",
				"lon" => "151.223002"
			],
			[
				"postcode" => "2083",
				"suburb" => "DANGAR ISLAND",
				"state" => "NSW",
				"lat" => "-33.539357",
				"lon" => "151.241762"
			],
			[
				"postcode" => "2083",
				"suburb" => "MILSONS PASSAGE",
				"state" => "NSW",
				"lat" => "-33.518967",
				"lon" => "151.176541"
			],
			[
				"postcode" => "2083",
				"suburb" => "MOONEY MOONEY",
				"state" => "NSW",
				"lat" => "-33.490356",
				"lon" => "151.186179"
			],
			[
				"postcode" => "2084",
				"suburb" => "COTTAGE POINT",
				"state" => "NSW",
				"lat" => "-33.619578",
				"lon" => "151.203831"
			],
			[
				"postcode" => "2084",
				"suburb" => "DUFFYS FOREST",
				"state" => "NSW",
				"lat" => "-33.676775",
				"lon" => "151.199879"
			],
			[
				"postcode" => "2084",
				"suburb" => "TERREY HILLS",
				"state" => "NSW",
				"lat" => "-33.683644",
				"lon" => "151.22847"
			],
			[
				"postcode" => "2085",
				"suburb" => "BELROSE",
				"state" => "NSW",
				"lat" => "-33.739288",
				"lon" => "151.211439"
			],
			[
				"postcode" => "2085",
				"suburb" => "BELROSE WEST",
				"state" => "NSW",
				"lat" => "-33.761674",
				"lon" => "151.278773"
			],
			[
				"postcode" => "2085",
				"suburb" => "DAVIDSON",
				"state" => "NSW",
				"lat" => "-33.738731",
				"lon" => "151.194197"
			],
			[
				"postcode" => "2086",
				"suburb" => "FRENCHS FOREST",
				"state" => "NSW",
				"lat" => "-33.750964",
				"lon" => "151.226036"
			],
			[
				"postcode" => "2086",
				"suburb" => "FRENCHS FOREST EAST",
				"state" => "NSW",
				"lat" => "-33.751488",
				"lon" => "151.245461"
			],
			[
				"postcode" => "2087",
				"suburb" => "FORESTVILLE",
				"state" => "NSW",
				"lat" => "-33.762011",
				"lon" => "151.21406"
			],
			[
				"postcode" => "2087",
				"suburb" => "KILLARNEY HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.773728",
				"lon" => "151.216125"
			],
			[
				"postcode" => "2088",
				"suburb" => "MOSMAN",
				"state" => "NSW",
				"lat" => "-33.829077",
				"lon" => "151.24409"
			],
			[
				"postcode" => "2088",
				"suburb" => "SPIT JUNCTION",
				"state" => "NSW",
				"lat" => "-33.822964",
				"lon" => "151.242292"
			],
			[
				"postcode" => "2089",
				"suburb" => "NEUTRAL BAY",
				"state" => "NSW",
				"lat" => "-33.83112",
				"lon" => "151.221232"
			],
			[
				"postcode" => "2089",
				"suburb" => "NEUTRAL BAY JUNCTION",
				"state" => "NSW",
				"lat" => "-33.831529",
				"lon" => "151.222401"
			],
			[
				"postcode" => "2090",
				"suburb" => "CREMORNE",
				"state" => "NSW",
				"lat" => "-33.828131",
				"lon" => "151.230233"
			],
			[
				"postcode" => "2090",
				"suburb" => "CREMORNE JUNCTION",
				"state" => "NSW",
				"lat" => "-33.843075",
				"lon" => "151.228923"
			],
			[
				"postcode" => "2090",
				"suburb" => "CREMORNE POINT",
				"state" => "NSW",
				"lat" => "-33.84447",
				"lon" => "151.228231"
			],
			[
				"postcode" => "2092",
				"suburb" => "SEAFORTH",
				"state" => "NSW",
				"lat" => "-33.797106",
				"lon" => "151.251146"
			],
			[
				"postcode" => "2093",
				"suburb" => "BALGOWLAH",
				"state" => "NSW",
				"lat" => "-33.794121",
				"lon" => "151.26268"
			],
			[
				"postcode" => "2093",
				"suburb" => "BALGOWLAH HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.800553",
				"lon" => "151.257401"
			],
			[
				"postcode" => "2093",
				"suburb" => "CLONTARF",
				"state" => "NSW",
				"lat" => "-33.808238",
				"lon" => "151.255095"
			],
			[
				"postcode" => "2093",
				"suburb" => "MANLY VALE",
				"state" => "NSW",
				"lat" => "-33.784036",
				"lon" => "151.267315"
			],
			[
				"postcode" => "2093",
				"suburb" => "NORTH BALGOWLAH",
				"state" => "NSW",
				"lat" => "-33.787074",
				"lon" => "151.251721"
			],
			[
				"postcode" => "2094",
				"suburb" => "FAIRLIGHT",
				"state" => "NSW",
				"lat" => "-33.794163",
				"lon" => "151.273978"
			],
			[
				"postcode" => "2095",
				"suburb" => "MANLY",
				"state" => "NSW",
				"lat" => "-33.797144",
				"lon" => "151.28804"
			],
			[
				"postcode" => "2095",
				"suburb" => "MANLY EAST",
				"state" => "NSW",
				"lat" => "-33.801822",
				"lon" => "151.288876"
			],
			[
				"postcode" => "2096",
				"suburb" => "CURL CURL",
				"state" => "NSW",
				"lat" => "-33.768937",
				"lon" => "151.294035"
			],
			[
				"postcode" => "2096",
				"suburb" => "HARBORD",
				"state" => "NSW",
				"lat" => "-33.778663",
				"lon" => "151.285772"
			],
			[
				"postcode" => "2096",
				"suburb" => "QUEENSCLIFF",
				"state" => "NSW",
				"lat" => "-33.784595",
				"lon" => "151.287817"
			],
			[
				"postcode" => "2097",
				"suburb" => "COLLAROY",
				"state" => "NSW",
				"lat" => "-33.740969",
				"lon" => "151.303133"
			],
			[
				"postcode" => "2097",
				"suburb" => "COLLAROY BEACH",
				"state" => "NSW",
				"lat" => "-33.732122",
				"lon" => "151.301232"
			],
			[
				"postcode" => "2097",
				"suburb" => "COLLAROY PLATEAU WEST",
				"state" => "NSW",
				"lat" => "-33.728047",
				"lon" => "151.286514"
			],
			[
				"postcode" => "2097",
				"suburb" => "WHEELER HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.732476",
				"lon" => "151.277439"
			],
			[
				"postcode" => "2099",
				"suburb" => "CROMER",
				"state" => "NSW",
				"lat" => "-33.740353",
				"lon" => "151.278523"
			],
			[
				"postcode" => "2099",
				"suburb" => "DEE WHY",
				"state" => "NSW",
				"lat" => "-33.753451",
				"lon" => "151.28554"
			],
			[
				"postcode" => "2099",
				"suburb" => "NARRAWEENA",
				"state" => "NSW",
				"lat" => "-33.749912",
				"lon" => "151.274687"
			],
			[
				"postcode" => "2099",
				"suburb" => "NORTH CURL CURL",
				"state" => "NSW",
				"lat" => "-33.761652",
				"lon" => "151.295691"
			],
			[
				"postcode" => "2100",
				"suburb" => "ALLAMBIE HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.765076",
				"lon" => "151.248864"
			],
			[
				"postcode" => "2100",
				"suburb" => "BEACON HILL",
				"state" => "NSW",
				"lat" => "-33.752406",
				"lon" => "151.261272"
			],
			[
				"postcode" => "2100",
				"suburb" => "BROOKVALE",
				"state" => "NSW",
				"lat" => "-33.766629",
				"lon" => "151.273824"
			],
			[
				"postcode" => "2100",
				"suburb" => "NORTH MANLY",
				"state" => "NSW",
				"lat" => "-33.775702",
				"lon" => "151.269339"
			],
			[
				"postcode" => "2100",
				"suburb" => "OXFORD FALLS",
				"state" => "NSW",
				"lat" => "-33.730197",
				"lon" => "151.248218"
			],
			[
				"postcode" => "2100",
				"suburb" => "WARRINGAH MALL",
				"state" => "NSW",
				"lat" => "-33.767737",
				"lon" => "151.266062"
			],
			[
				"postcode" => "2101",
				"suburb" => "ELANORA HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.695015",
				"lon" => "151.280156"
			],
			[
				"postcode" => "2101",
				"suburb" => "INGLESIDE",
				"state" => "NSW",
				"lat" => "-33.683176",
				"lon" => "151.262322"
			],
			[
				"postcode" => "2101",
				"suburb" => "NARRABEEN",
				"state" => "NSW",
				"lat" => "-33.723127",
				"lon" => "151.287366"
			],
			[
				"postcode" => "2101",
				"suburb" => "NORTH NARRABEEN",
				"state" => "NSW",
				"lat" => "-33.702661",
				"lon" => "151.293622"
			],
			[
				"postcode" => "2102",
				"suburb" => "WARRIEWOOD",
				"state" => "NSW",
				"lat" => "-33.686265",
				"lon" => "151.29908"
			],
			[
				"postcode" => "2103",
				"suburb" => "MONA VALE",
				"state" => "NSW",
				"lat" => "-33.67707",
				"lon" => "151.300316"
			],
			[
				"postcode" => "2104",
				"suburb" => "BAYVIEW",
				"state" => "NSW",
				"lat" => "-33.66445",
				"lon" => "151.298945"
			],
			[
				"postcode" => "2105",
				"suburb" => "CHURCH POINT",
				"state" => "NSW",
				"lat" => "-33.644873",
				"lon" => "151.284352"
			],
			[
				"postcode" => "2105",
				"suburb" => "ELVINA BAY",
				"state" => "NSW",
				"lat" => "-33.642011",
				"lon" => "151.276109"
			],
			[
				"postcode" => "2105",
				"suburb" => "LOVETT BAY",
				"state" => "NSW",
				"lat" => "-33.637405",
				"lon" => "151.278429"
			],
			[
				"postcode" => "2105",
				"suburb" => "SCOTLAND ISLAND",
				"state" => "NSW",
				"lat" => "-33.641752",
				"lon" => "151.290116"
			],
			[
				"postcode" => "2106",
				"suburb" => "NEWPORT",
				"state" => "NSW",
				"lat" => "-33.659896",
				"lon" => "151.309312"
			],
			[
				"postcode" => "2106",
				"suburb" => "NEWPORT BEACH",
				"state" => "NSW",
				"lat" => "-33.652485",
				"lon" => "151.322776"
			],
			[
				"postcode" => "2107",
				"suburb" => "AVALON BEACH",
				"state" => "NSW",
				"lat" => "-33.636325",
				"lon" => "151.330596"
			],
			[
				"postcode" => "2107",
				"suburb" => "BILGOLA",
				"state" => "NSW",
				"lat" => "-33.645562",
				"lon" => "151.323857"
			],
			[
				"postcode" => "2107",
				"suburb" => "CAREEL BAY",
				"state" => "NSW",
				"lat" => "-33.623135",
				"lon" => "151.327046"
			],
			[
				"postcode" => "2107",
				"suburb" => "CLAREVILLE",
				"state" => "NSW",
				"lat" => "-33.634905",
				"lon" => "151.313321"
			],
			[
				"postcode" => "2107",
				"suburb" => "PARADISE BEACH",
				"state" => "NSW",
				"lat" => "-33.624257",
				"lon" => "151.31871"
			],
			[
				"postcode" => "2107",
				"suburb" => "TAYLORS POINT",
				"state" => "NSW",
				"lat" => "-33.637041",
				"lon" => "151.305538"
			],
			[
				"postcode" => "2107",
				"suburb" => "WHALE BEACH",
				"state" => "NSW",
				"lat" => "-33.614274",
				"lon" => "151.330438"
			],
			[
				"postcode" => "2108",
				"suburb" => "COASTERS RETREAT",
				"state" => "NSW",
				"lat" => "-33.6048",
				"lon" => "151.29883"
			],
			[
				"postcode" => "2108",
				"suburb" => "CURRAWONG BEACH",
				"state" => "NSW",
				"lat" => "-33.597338",
				"lon" => "151.298367"
			],
			[
				"postcode" => "2108",
				"suburb" => "GREAT MACKEREL BEACH",
				"state" => "NSW",
				"lat" => "-33.591729",
				"lon" => "151.300451"
			],
			[
				"postcode" => "2108",
				"suburb" => "MORNING BAY",
				"state" => "NSW",
				"lat" => "-33.623044",
				"lon" => "151.281623"
			],
			[
				"postcode" => "2108",
				"suburb" => "PALM BEACH",
				"state" => "NSW",
				"lat" => "-33.604282",
				"lon" => "151.321419"
			],
			[
				"postcode" => "2108",
				"suburb" => "THE BASIN",
				"state" => "NSW",
				"lat" => "-33.602384",
				"lon" => "151.293682"
			],
			[
				"postcode" => "2109",
				"suburb" => "MACQUARIE UNIVERSITY",
				"state" => "NSW",
				"lat" => "-33.774321",
				"lon" => "151.111988"
			],
			[
				"postcode" => "2110",
				"suburb" => "HUNTERS HILL",
				"state" => "NSW",
				"lat" => "-33.83484",
				"lon" => "151.154196"
			],
			[
				"postcode" => "2110",
				"suburb" => "WOOLWICH",
				"state" => "NSW",
				"lat" => "-33.838393",
				"lon" => "151.172535"
			],
			[
				"postcode" => "2111",
				"suburb" => "BORONIA PARK",
				"state" => "NSW",
				"lat" => "-33.820941",
				"lon" => "151.140067"
			],
			[
				"postcode" => "2111",
				"suburb" => "GLADESVILLE",
				"state" => "NSW",
				"lat" => "-33.832894",
				"lon" => "151.126964"
			],
			[
				"postcode" => "2111",
				"suburb" => "HENLEY",
				"state" => "NSW",
				"lat" => "-33.842216",
				"lon" => "151.135943"
			],
			[
				"postcode" => "2111",
				"suburb" => "HUNTLEYS COVE",
				"state" => "NSW",
				"lat" => "-33.839798",
				"lon" => "151.144587"
			],
			[
				"postcode" => "2111",
				"suburb" => "HUNTLEYS POINT",
				"state" => "NSW",
				"lat" => "-33.840088",
				"lon" => "151.145968"
			],
			[
				"postcode" => "2111",
				"suburb" => "MONASH PARK",
				"state" => "NSW",
				"lat" => "-33.82248",
				"lon" => "151.125215"
			],
			[
				"postcode" => "2111",
				"suburb" => "TENNYSON POINT",
				"state" => "NSW",
				"lat" => "-33.831448",
				"lon" => "151.117286"
			],
			[
				"postcode" => "2112",
				"suburb" => "DENISTONE EAST",
				"state" => "NSW",
				"lat" => "-33.797177",
				"lon" => "151.097546"
			],
			[
				"postcode" => "2112",
				"suburb" => "PUTNEY",
				"state" => "NSW",
				"lat" => "-33.824735",
				"lon" => "151.112549"
			],
			[
				"postcode" => "2112",
				"suburb" => "RYDE",
				"state" => "NSW",
				"lat" => "-33.812953",
				"lon" => "151.104942"
			],
			[
				"postcode" => "2113",
				"suburb" => "BLENHEIM ROAD",
				"state" => "NSW",
				"lat" => "-33.798595",
				"lon" => "151.133903"
			],
			[
				"postcode" => "2113",
				"suburb" => "EAST RYDE",
				"state" => "NSW",
				"lat" => "-33.813769",
				"lon" => "151.140289"
			],
			[
				"postcode" => "2113",
				"suburb" => "MACQUARIE CENTRE",
				"state" => "NSW",
				"lat" => "-33.777139",
				"lon" => "151.120702"
			],
			[
				"postcode" => "2113",
				"suburb" => "MACQUARIE PARK",
				"state" => "NSW",
				"lat" => "-33.779795",
				"lon" => "151.134041"
			],
			[
				"postcode" => "2113",
				"suburb" => "NORTH RYDE",
				"state" => "NSW",
				"lat" => "-33.79677",
				"lon" => "151.124355"
			],
			[
				"postcode" => "2114",
				"suburb" => "DENISTONE",
				"state" => "NSW",
				"lat" => "-33.799441",
				"lon" => "151.07959"
			],
			[
				"postcode" => "2114",
				"suburb" => "DENISTONE WEST",
				"state" => "NSW",
				"lat" => "-33.802382",
				"lon" => "151.066085"
			],
			[
				"postcode" => "2114",
				"suburb" => "MEADOWBANK",
				"state" => "NSW",
				"lat" => "-33.815912",
				"lon" => "151.090715"
			],
			[
				"postcode" => "2114",
				"suburb" => "MELROSE PARK",
				"state" => "NSW",
				"lat" => "-33.816575",
				"lon" => "151.076089"
			],
			[
				"postcode" => "2114",
				"suburb" => "WEST RYDE",
				"state" => "NSW",
				"lat" => "-33.807712",
				"lon" => "151.088724"
			],
			[
				"postcode" => "2115",
				"suburb" => "ERMINGTON",
				"state" => "NSW",
				"lat" => "-33.814144",
				"lon" => "151.054495"
			],
			[
				"postcode" => "2116",
				"suburb" => "RYDALMERE",
				"state" => "NSW",
				"lat" => "-33.811244",
				"lon" => "151.034464"
			],
			[
				"postcode" => "2117",
				"suburb" => "DUNDAS",
				"state" => "NSW",
				"lat" => "-33.799405",
				"lon" => "151.044189"
			],
			[
				"postcode" => "2117",
				"suburb" => "DUNDAS VALLEY",
				"state" => "NSW",
				"lat" => "-33.78724",
				"lon" => "151.061185"
			],
			[
				"postcode" => "2117",
				"suburb" => "OATLANDS",
				"state" => "NSW",
				"lat" => "-33.796298",
				"lon" => "151.026314"
			],
			[
				"postcode" => "2117",
				"suburb" => "TELOPEA",
				"state" => "NSW",
				"lat" => "-33.795986",
				"lon" => "151.045106"
			],
			[
				"postcode" => "2118",
				"suburb" => "CARLINGFORD",
				"state" => "NSW",
				"lat" => "-33.782959",
				"lon" => "151.047707"
			],
			[
				"postcode" => "2118",
				"suburb" => "CARLINGFORD COURT",
				"state" => "NSW",
				"lat" => "-33.776166",
				"lon" => "151.0524"
			],
			[
				"postcode" => "2118",
				"suburb" => "CARLINGFORD NORTH",
				"state" => "NSW",
				"lat" => "-33.763237",
				"lon" => "151.047719"
			],
			[
				"postcode" => "2118",
				"suburb" => "KINGSDENE",
				"state" => "NSW",
				"lat" => "-33.784272",
				"lon" => "151.02806"
			],
			[
				"postcode" => "2119",
				"suburb" => "BEECROFT",
				"state" => "NSW",
				"lat" => "-33.749498",
				"lon" => "151.064533"
			],
			[
				"postcode" => "2119",
				"suburb" => "CHELTENHAM",
				"state" => "NSW",
				"lat" => "-33.76169",
				"lon" => "151.079364"
			],
			[
				"postcode" => "2120",
				"suburb" => "PENNANT HILLS",
				"state" => "NSW",
				"lat" => "-33.738681",
				"lon" => "151.071433"
			],
			[
				"postcode" => "2120",
				"suburb" => "THORNLEIGH",
				"state" => "NSW",
				"lat" => "-33.730816",
				"lon" => "151.081226"
			],
			[
				"postcode" => "2120",
				"suburb" => "WESTLEIGH",
				"state" => "NSW",
				"lat" => "-33.711956",
				"lon" => "151.072836"
			],
			[
				"postcode" => "2121",
				"suburb" => "EPPING",
				"state" => "NSW",
				"lat" => "-33.772549",
				"lon" => "151.082365"
			],
			[
				"postcode" => "2121",
				"suburb" => "NORTH EPPING",
				"state" => "NSW",
				"lat" => "-33.759777",
				"lon" => "151.087742"
			],
			[
				"postcode" => "2122",
				"suburb" => "EASTWOOD",
				"state" => "NSW",
				"lat" => "-33.789986",
				"lon" => "151.080914"
			],
			[
				"postcode" => "2122",
				"suburb" => "MARSFIELD",
				"state" => "NSW",
				"lat" => "-33.783971",
				"lon" => "151.094241"
			],
			[
				"postcode" => "2123",
				"suburb" => "PARRAMATTA",
				"state" => "NSW",
				"lat" => "-33.886166",
				"lon" => "151.139472"
			],
			[
				"postcode" => "2124",
				"suburb" => "PARRAMATTA",
				"state" => "NSW",
				"lat" => "-33.886166",
				"lon" => "151.139472"
			],
			[
				"postcode" => "2125",
				"suburb" => "WEST PENNANT HILLS",
				"state" => "NSW",
				"lat" => "-33.753676",
				"lon" => "151.039113"
			],
			[
				"postcode" => "2126",
				"suburb" => "CHERRYBROOK",
				"state" => "NSW",
				"lat" => "-33.722019",
				"lon" => "151.041806"
			],
			[
				"postcode" => "2127",
				"suburb" => "HOMEBUSH BAY",
				"state" => "NSW",
				"lat" => "-33.85283",
				"lon" => "151.076186"
			],
			[
				"postcode" => "2127",
				"suburb" => "NEWINGTON",
				"state" => "NSW",
				"lat" => "-33.839276",
				"lon" => "151.054828"
			],
			[
				"postcode" => "2128",
				"suburb" => "SILVERWATER",
				"state" => "NSW",
				"lat" => "-33.835928",
				"lon" => "151.047591"
			],
			[
				"postcode" => "2129",
				"suburb" => "SYDNEY MARKETS",
				"state" => "NSW",
				"lat" => "-33.871209",
				"lon" => "151.191884"
			],
			[
				"postcode" => "2130",
				"suburb" => "SUMMER HILL",
				"state" => "NSW",
				"lat" => "-33.891712",
				"lon" => "151.137258"
			],
			[
				"postcode" => "2131",
				"suburb" => "ASHFIELD",
				"state" => "NSW",
				"lat" => "-33.889498",
				"lon" => "151.127444"
			],
			[
				"postcode" => "2132",
				"suburb" => "CROYDON",
				"state" => "NSW",
				"lat" => "-33.883163",
				"lon" => "151.114771"
			],
			[
				"postcode" => "2133",
				"suburb" => "CROYDON PARK",
				"state" => "NSW",
				"lat" => "-33.895299",
				"lon" => "151.108581"
			],
			[
				"postcode" => "2133",
				"suburb" => "ENFIELD SOUTH",
				"state" => "NSW",
				"lat" => "-33.895575",
				"lon" => "151.093456"
			],
			[
				"postcode" => "2134",
				"suburb" => "BURWOOD",
				"state" => "NSW",
				"lat" => "-33.877423",
				"lon" => "151.103682"
			],
			[
				"postcode" => "2134",
				"suburb" => "BURWOOD NORTH",
				"state" => "NSW",
				"lat" => "-33.876154",
				"lon" => "151.103933"
			],
			[
				"postcode" => "2135",
				"suburb" => "STRATHFIELD",
				"state" => "NSW",
				"lat" => "-33.873913",
				"lon" => "151.093993"
			],
			[
				"postcode" => "2136",
				"suburb" => "BURWOOD HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.888328",
				"lon" => "151.103412"
			],
			[
				"postcode" => "2136",
				"suburb" => "ENFIELD",
				"state" => "NSW",
				"lat" => "-33.886854",
				"lon" => "151.092425"
			],
			[
				"postcode" => "2136",
				"suburb" => "STRATHFIELD SOUTH",
				"state" => "NSW",
				"lat" => "-33.891711",
				"lon" => "151.082992"
			],
			[
				"postcode" => "2137",
				"suburb" => "BREAKFAST POINT",
				"state" => "NSW",
				"lat" => "-33.841583",
				"lon" => "151.107502"
			],
			[
				"postcode" => "2137",
				"suburb" => "CABARITA",
				"state" => "NSW",
				"lat" => "-33.849081",
				"lon" => "151.113765"
			],
			[
				"postcode" => "2137",
				"suburb" => "CONCORD",
				"state" => "NSW",
				"lat" => "-33.857857",
				"lon" => "151.103502"
			],
			[
				"postcode" => "2137",
				"suburb" => "MORTLAKE",
				"state" => "NSW",
				"lat" => "-33.843435",
				"lon" => "151.10698"
			],
			[
				"postcode" => "2137",
				"suburb" => "NORTH STRATHFIELD",
				"state" => "NSW",
				"lat" => "-33.85746",
				"lon" => "151.091954"
			],
			[
				"postcode" => "2138",
				"suburb" => "CONCORD WEST",
				"state" => "NSW",
				"lat" => "-33.848041",
				"lon" => "151.087326"
			],
			[
				"postcode" => "2138",
				"suburb" => "LIBERTY GROVE",
				"state" => "NSW",
				"lat" => "-33.841665",
				"lon" => "151.083609"
			],
			[
				"postcode" => "2138",
				"suburb" => "RHODES",
				"state" => "NSW",
				"lat" => "-33.830764",
				"lon" => "151.088105"
			],
			[
				"postcode" => "2139",
				"suburb" => "CONCORD REPATRIATION HOSPITAL",
				"state" => "NSW",
				"lat" => "-33.837702",
				"lon" => "151.095046"
			],
			[
				"postcode" => "2140",
				"suburb" => "HOMEBUSH",
				"state" => "NSW",
				"lat" => "-33.859654",
				"lon" => "151.081847"
			],
			[
				"postcode" => "2140",
				"suburb" => "HOMEBUSH SOUTH",
				"state" => "NSW",
				"lat" => "-33.867767",
				"lon" => "151.08447"
			],
			[
				"postcode" => "2140",
				"suburb" => "HOMEBUSH WEST",
				"state" => "NSW",
				"lat" => "-33.866788",
				"lon" => "151.069369"
			],
			[
				"postcode" => "2141",
				"suburb" => "BERALA",
				"state" => "NSW",
				"lat" => "-33.871904",
				"lon" => "151.031033"
			],
			[
				"postcode" => "2141",
				"suburb" => "LIDCOMBE",
				"state" => "NSW",
				"lat" => "-33.865218",
				"lon" => "151.043519"
			],
			[
				"postcode" => "2141",
				"suburb" => "LIDCOMBE NORTH",
				"state" => "NSW",
				"lat" => "-33.854197",
				"lon" => "151.047419"
			],
			[
				"postcode" => "2141",
				"suburb" => "ROOKWOOD",
				"state" => "NSW",
				"lat" => "-33.866398",
				"lon" => "151.058147"
			],
			[
				"postcode" => "2142",
				"suburb" => "BLAXCELL",
				"state" => "NSW",
				"lat" => "-33.853251",
				"lon" => "151.008129"
			],
			[
				"postcode" => "2142",
				"suburb" => "CAMELLIA",
				"state" => "NSW",
				"lat" => "-33.816872",
				"lon" => "151.022191"
			],
			[
				"postcode" => "2142",
				"suburb" => "CLYDE",
				"state" => "NSW",
				"lat" => "-33.832322",
				"lon" => "151.019414"
			],
			[
				"postcode" => "2142",
				"suburb" => "GRANVILLE",
				"state" => "NSW",
				"lat" => "-33.835887",
				"lon" => "151.01064"
			],
			[
				"postcode" => "2142",
				"suburb" => "HOLROYD",
				"state" => "NSW",
				"lat" => "-33.829836",
				"lon" => "150.993334"
			],
			[
				"postcode" => "2142",
				"suburb" => "ROSEHILL",
				"state" => "NSW",
				"lat" => "-33.819992",
				"lon" => "151.024558"
			],
			[
				"postcode" => "2142",
				"suburb" => "SOUTH GRANVILLE",
				"state" => "NSW",
				"lat" => "-33.863022",
				"lon" => "151.006224"
			],
			[
				"postcode" => "2143",
				"suburb" => "BIRRONG",
				"state" => "NSW",
				"lat" => "-33.89022",
				"lon" => "151.022398"
			],
			[
				"postcode" => "2143",
				"suburb" => "POTTS HILL",
				"state" => "NSW",
				"lat" => "-33.898247",
				"lon" => "151.031087"
			],
			[
				"postcode" => "2143",
				"suburb" => "REGENTS PARK",
				"state" => "NSW",
				"lat" => "-33.883928",
				"lon" => "151.023796"
			],
			[
				"postcode" => "2144",
				"suburb" => "AUBURN",
				"state" => "NSW",
				"lat" => "-33.849322",
				"lon" => "151.033421"
			],
			[
				"postcode" => "2145",
				"suburb" => "GIRRAWEEN",
				"state" => "NSW",
				"lat" => "-33.799843",
				"lon" => "150.947276"
			],
			[
				"postcode" => "2145",
				"suburb" => "GREYSTANES",
				"state" => "NSW",
				"lat" => "-33.829667",
				"lon" => "150.951452"
			],
			[
				"postcode" => "2145",
				"suburb" => "MAYS HILL",
				"state" => "NSW",
				"lat" => "-33.82066",
				"lon" => "150.990511"
			],
			[
				"postcode" => "2145",
				"suburb" => "PEMULWUY",
				"state" => "NSW",
				"lat" => "-33.821944",
				"lon" => "150.923752"
			],
			[
				"postcode" => "2145",
				"suburb" => "PENDLE HILL",
				"state" => "NSW",
				"lat" => "-33.801912",
				"lon" => "150.955614"
			],
			[
				"postcode" => "2145",
				"suburb" => "SOUTH WENTWORTHVILLE",
				"state" => "NSW",
				"lat" => "-33.823892",
				"lon" => "150.969376"
			],
			[
				"postcode" => "2145",
				"suburb" => "WENTWORTHVILLE",
				"state" => "NSW",
				"lat" => "-33.805922",
				"lon" => "150.970183"
			],
			[
				"postcode" => "2145",
				"suburb" => "WESTMEAD",
				"state" => "NSW",
				"lat" => "-33.805332",
				"lon" => "150.986608"
			],
			[
				"postcode" => "2146",
				"suburb" => "OLD TOONGABBIE",
				"state" => "NSW",
				"lat" => "-33.792713",
				"lon" => "150.974108"
			],
			[
				"postcode" => "2146",
				"suburb" => "TOONGABBIE",
				"state" => "NSW",
				"lat" => "-33.788942",
				"lon" => "150.950644"
			],
			[
				"postcode" => "2146",
				"suburb" => "TOONGABBIE EAST",
				"state" => "NSW",
				"lat" => "-33.788155",
				"lon" => "150.960639"
			],
			[
				"postcode" => "2147",
				"suburb" => "KINGS LANGLEY",
				"state" => "NSW",
				"lat" => "-33.742079",
				"lon" => "150.922711"
			],
			[
				"postcode" => "2147",
				"suburb" => "LALOR PARK",
				"state" => "NSW",
				"lat" => "-33.761339",
				"lon" => "150.930337"
			],
			[
				"postcode" => "2147",
				"suburb" => "SEVEN HILLS",
				"state" => "NSW",
				"lat" => "-33.775477",
				"lon" => "150.934257"
			],
			[
				"postcode" => "2147",
				"suburb" => "SEVEN HILLS WEST",
				"state" => "NSW",
				"lat" => "-33.771047",
				"lon" => "150.923871"
			],
			[
				"postcode" => "2148",
				"suburb" => "ARNDELL PARK",
				"state" => "NSW",
				"lat" => "-33.787266",
				"lon" => "150.871959"
			],
			[
				"postcode" => "2148",
				"suburb" => "BLACKTOWN",
				"state" => "NSW",
				"lat" => "-33.770184",
				"lon" => "150.908501"
			],
			[
				"postcode" => "2148",
				"suburb" => "BLACKTOWN WESTPOINT",
				"state" => "NSW",
				"lat" => "-33.770162",
				"lon" => "150.905148"
			],
			[
				"postcode" => "2148",
				"suburb" => "HUNTINGWOOD",
				"state" => "NSW",
				"lat" => "-33.797537",
				"lon" => "150.879863"
			],
			[
				"postcode" => "2148",
				"suburb" => "KINGS PARK",
				"state" => "NSW",
				"lat" => "-33.745736",
				"lon" => "150.904598"
			],
			[
				"postcode" => "2148",
				"suburb" => "MARAYONG",
				"state" => "NSW",
				"lat" => "-33.746168",
				"lon" => "150.898338"
			],
			[
				"postcode" => "2148",
				"suburb" => "PROSPECT",
				"state" => "NSW",
				"lat" => "-33.801553",
				"lon" => "150.916198"
			],
			[
				"postcode" => "2150",
				"suburb" => "HARRIS PARK",
				"state" => "NSW",
				"lat" => "-33.822427",
				"lon" => "151.008961"
			],
			[
				"postcode" => "2150",
				"suburb" => "PARRAMATTA",
				"state" => "NSW",
				"lat" => "-33.816957",
				"lon" => "151.003451"
			],
			[
				"postcode" => "2150",
				"suburb" => "PARRAMATTA WESTFIELD",
				"state" => "NSW",
				"lat" => "-33.817717",
				"lon" => "151.001359"
			],
			[
				"postcode" => "2151",
				"suburb" => "NORTH PARRAMATTA",
				"state" => "NSW",
				"lat" => "-33.798043",
				"lon" => "151.010707"
			],
			[
				"postcode" => "2151",
				"suburb" => "NORTH ROCKS",
				"state" => "NSW",
				"lat" => "-33.768119",
				"lon" => "151.02854"
			],
			[
				"postcode" => "2152",
				"suburb" => "NORTHMEAD",
				"state" => "NSW",
				"lat" => "-33.783849",
				"lon" => "150.994336"
			],
			[
				"postcode" => "2153",
				"suburb" => "BAULKHAM HILLS",
				"state" => "NSW",
				"lat" => "-33.758601",
				"lon" => "150.992887"
			],
			[
				"postcode" => "2153",
				"suburb" => "BELLA VISTA",
				"state" => "NSW",
				"lat" => "-33.737345",
				"lon" => "150.95501"
			],
			[
				"postcode" => "2153",
				"suburb" => "WINSTON HILLS",
				"state" => "NSW",
				"lat" => "-33.776054",
				"lon" => "150.987795"
			],
			[
				"postcode" => "2154",
				"suburb" => "CASTLE HILL",
				"state" => "NSW",
				"lat" => "-33.732307",
				"lon" => "151.005616"
			],
			[
				"postcode" => "2155",
				"suburb" => "BEAUMONT HILLS",
				"state" => "NSW",
				"lat" => "-33.703416",
				"lon" => "150.946875"
			],
			[
				"postcode" => "2155",
				"suburb" => "KELLYVILLE",
				"state" => "NSW",
				"lat" => "-33.712415",
				"lon" => "150.958009"
			],
			[
				"postcode" => "2155",
				"suburb" => "KELLYVILLE RIDGE",
				"state" => "NSW",
				"lat" => "-33.700104",
				"lon" => "150.92865"
			],
			[
				"postcode" => "2155",
				"suburb" => "ROUSE HILL",
				"state" => "NSW",
				"lat" => "-33.682068",
				"lon" => "150.915397"
			],
			[
				"postcode" => "2156",
				"suburb" => "ANNANGROVE",
				"state" => "NSW",
				"lat" => "-33.657772",
				"lon" => "150.943505"
			],
			[
				"postcode" => "2156",
				"suburb" => "GLENHAVEN",
				"state" => "NSW",
				"lat" => "-33.703218",
				"lon" => "151.006899"
			],
			[
				"postcode" => "2156",
				"suburb" => "KENTHURST",
				"state" => "NSW",
				"lat" => "-33.661023",
				"lon" => "151.005034"
			],
			[
				"postcode" => "2157",
				"suburb" => "CANOELANDS",
				"state" => "NSW",
				"lat" => "-33.508714",
				"lon" => "151.061148"
			],
			[
				"postcode" => "2157",
				"suburb" => "FOREST GLEN",
				"state" => "NSW",
				"lat" => "-33.549519",
				"lon" => "151.012846"
			],
			[
				"postcode" => "2157",
				"suburb" => "GLENORIE",
				"state" => "NSW",
				"lat" => "-33.620011",
				"lon" => "151.023035"
			],
			[
				"postcode" => "2158",
				"suburb" => "DURAL",
				"state" => "NSW",
				"lat" => "-33.681875",
				"lon" => "151.028435"
			],
			[
				"postcode" => "2158",
				"suburb" => "MIDDLE DURAL",
				"state" => "NSW",
				"lat" => "-33.648471",
				"lon" => "151.021276"
			],
			[
				"postcode" => "2158",
				"suburb" => "ROUND CORNER",
				"state" => "NSW",
				"lat" => "-33.695103",
				"lon" => "151.017906"
			],
			[
				"postcode" => "2159",
				"suburb" => "ARCADIA",
				"state" => "NSW",
				"lat" => "-33.623101",
				"lon" => "151.052726"
			],
			[
				"postcode" => "2159",
				"suburb" => "BERRILEE",
				"state" => "NSW",
				"lat" => "-33.61497",
				"lon" => "151.095573"
			],
			[
				"postcode" => "2159",
				"suburb" => "FIDDLETOWN",
				"state" => "NSW",
				"lat" => "-33.602321",
				"lon" => "151.055702"
			],
			[
				"postcode" => "2159",
				"suburb" => "GALSTON",
				"state" => "NSW",
				"lat" => "-33.652661",
				"lon" => "151.043059"
			],
			[
				"postcode" => "2160",
				"suburb" => "MERRYLANDS",
				"state" => "NSW",
				"lat" => "-33.836381",
				"lon" => "150.989219"
			],
			[
				"postcode" => "2160",
				"suburb" => "MERRYLANDS WEST",
				"state" => "NSW",
				"lat" => "-33.832864",
				"lon" => "150.972036"
			],
			[
				"postcode" => "2161",
				"suburb" => "GUILDFORD",
				"state" => "NSW",
				"lat" => "-33.853984",
				"lon" => "150.985958"
			],
			[
				"postcode" => "2161",
				"suburb" => "GUILDFORD WEST",
				"state" => "NSW",
				"lat" => "-33.851099",
				"lon" => "150.972299"
			],
			[
				"postcode" => "2161",
				"suburb" => "OLD GUILDFORD",
				"state" => "NSW",
				"lat" => "-33.867084",
				"lon" => "150.988073"
			],
			[
				"postcode" => "2161",
				"suburb" => "YENNORA",
				"state" => "NSW",
				"lat" => "-33.860889",
				"lon" => "150.969356"
			],
			[
				"postcode" => "2162",
				"suburb" => "CHESTER HILL",
				"state" => "NSW",
				"lat" => "-33.883157",
				"lon" => "151.001185"
			],
			[
				"postcode" => "2162",
				"suburb" => "SEFTON",
				"state" => "NSW",
				"lat" => "-33.885501",
				"lon" => "151.011469"
			],
			[
				"postcode" => "2163",
				"suburb" => "CARRAMAR",
				"state" => "NSW",
				"lat" => "-33.884558",
				"lon" => "150.961884"
			],
			[
				"postcode" => "2163",
				"suburb" => "LANSDOWNE",
				"state" => "NSW",
				"lat" => "-33.893687",
				"lon" => "150.971005"
			],
			[
				"postcode" => "2163",
				"suburb" => "VILLAWOOD",
				"state" => "NSW",
				"lat" => "-33.883679",
				"lon" => "150.976468"
			],
			[
				"postcode" => "2164",
				"suburb" => "SMITHFIELD",
				"state" => "NSW",
				"lat" => "-33.853546",
				"lon" => "150.940431"
			],
			[
				"postcode" => "2164",
				"suburb" => "SMITHFIELD WEST",
				"state" => "NSW",
				"lat" => "-33.850834",
				"lon" => "150.922215"
			],
			[
				"postcode" => "2164",
				"suburb" => "WETHERILL PARK",
				"state" => "NSW",
				"lat" => "-33.847512",
				"lon" => "150.913204"
			],
			[
				"postcode" => "2164",
				"suburb" => "WOODPARK",
				"state" => "NSW",
				"lat" => "-33.84063",
				"lon" => "150.961859"
			],
			[
				"postcode" => "2165",
				"suburb" => "FAIRFIELD",
				"state" => "NSW",
				"lat" => "-33.868529",
				"lon" => "150.955512"
			],
			[
				"postcode" => "2165",
				"suburb" => "FAIRFIELD EAST",
				"state" => "NSW",
				"lat" => "-33.869449",
				"lon" => "150.977528"
			],
			[
				"postcode" => "2165",
				"suburb" => "FAIRFIELD HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.864603",
				"lon" => "150.938451"
			],
			[
				"postcode" => "2165",
				"suburb" => "FAIRFIELD WEST",
				"state" => "NSW",
				"lat" => "-33.868955",
				"lon" => "150.922057"
			],
			[
				"postcode" => "2166",
				"suburb" => "CABRAMATTA",
				"state" => "NSW",
				"lat" => "-33.89507",
				"lon" => "150.935889"
			],
			[
				"postcode" => "2166",
				"suburb" => "CABRAMATTA WEST",
				"state" => "NSW",
				"lat" => "-33.899136",
				"lon" => "150.917514"
			],
			[
				"postcode" => "2166",
				"suburb" => "CANLEY HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.883633",
				"lon" => "150.923895"
			],
			[
				"postcode" => "2166",
				"suburb" => "CANLEY VALE",
				"state" => "NSW",
				"lat" => "-33.887291",
				"lon" => "150.943275"
			],
			[
				"postcode" => "2166",
				"suburb" => "LANSVALE",
				"state" => "NSW",
				"lat" => "-33.89733",
				"lon" => "150.952786"
			],
			[
				"postcode" => "2167",
				"suburb" => "GLENFIELD",
				"state" => "NSW",
				"lat" => "-33.971305",
				"lon" => "150.894517"
			],
			[
				"postcode" => "2168",
				"suburb" => "ASHCROFT",
				"state" => "NSW",
				"lat" => "-33.917587",
				"lon" => "150.899095"
			],
			[
				"postcode" => "2168",
				"suburb" => "BUSBY",
				"state" => "NSW",
				"lat" => "-33.910896",
				"lon" => "150.875155"
			],
			[
				"postcode" => "2168",
				"suburb" => "CARTWRIGHT",
				"state" => "NSW",
				"lat" => "-33.926577",
				"lon" => "150.890356"
			],
			[
				"postcode" => "2168",
				"suburb" => "GREEN VALLEY",
				"state" => "NSW",
				"lat" => "-33.903526",
				"lon" => "150.86636"
			],
			[
				"postcode" => "2168",
				"suburb" => "HECKENBERG",
				"state" => "NSW",
				"lat" => "-33.911083",
				"lon" => "150.889921"
			],
			[
				"postcode" => "2168",
				"suburb" => "HINCHINBROOK",
				"state" => "NSW",
				"lat" => "-33.916611",
				"lon" => "150.863863"
			],
			[
				"postcode" => "2168",
				"suburb" => "SADLEIR",
				"state" => "NSW",
				"lat" => "-33.920629",
				"lon" => "150.890212"
			],
			[
				"postcode" => "2170",
				"suburb" => "CASULA",
				"state" => "NSW",
				"lat" => "-33.94735",
				"lon" => "150.907753"
			],
			[
				"postcode" => "2170",
				"suburb" => "CASULA MALL",
				"state" => "NSW",
				"lat" => "-33.950422",
				"lon" => "150.909367"
			],
			[
				"postcode" => "2170",
				"suburb" => "CHIPPING NORTON",
				"state" => "NSW",
				"lat" => "-33.916829",
				"lon" => "150.961662"
			],
			[
				"postcode" => "2170",
				"suburb" => "HAMMONDVILLE",
				"state" => "NSW",
				"lat" => "-33.948113",
				"lon" => "150.953727"
			],
			[
				"postcode" => "2170",
				"suburb" => "LIVERPOOL",
				"state" => "NSW",
				"lat" => "-33.92505",
				"lon" => "150.924429"
			],
			[
				"postcode" => "2170",
				"suburb" => "LIVERPOOL SOUTH",
				"state" => "NSW",
				"lat" => "-33.933376",
				"lon" => "150.906608"
			],
			[
				"postcode" => "2170",
				"suburb" => "LIVERPOOL WESTFIELD",
				"state" => "NSW",
				"lat" => "-33.918951",
				"lon" => "150.923868"
			],
			[
				"postcode" => "2170",
				"suburb" => "LURNEA",
				"state" => "NSW",
				"lat" => "-33.931947",
				"lon" => "150.896105"
			],
			[
				"postcode" => "2170",
				"suburb" => "MOOREBANK",
				"state" => "NSW",
				"lat" => "-33.933805",
				"lon" => "150.953602"
			],
			[
				"postcode" => "2170",
				"suburb" => "MOUNT PRITCHARD",
				"state" => "NSW",
				"lat" => "-33.894817",
				"lon" => "150.90304"
			],
			[
				"postcode" => "2170",
				"suburb" => "PRESTONS",
				"state" => "NSW",
				"lat" => "-33.942903",
				"lon" => "150.872145"
			],
			[
				"postcode" => "2170",
				"suburb" => "WARWICK FARM",
				"state" => "NSW",
				"lat" => "-33.913423",
				"lon" => "150.932752"
			],
			[
				"postcode" => "2171",
				"suburb" => "CECIL HILLS",
				"state" => "NSW",
				"lat" => "-33.883696",
				"lon" => "150.853171"
			],
			[
				"postcode" => "2171",
				"suburb" => "HORNINGSEA PARK",
				"state" => "NSW",
				"lat" => "-33.945088",
				"lon" => "150.842975"
			],
			[
				"postcode" => "2171",
				"suburb" => "HOXTON PARK",
				"state" => "NSW",
				"lat" => "-33.92678",
				"lon" => "150.857888"
			],
			[
				"postcode" => "2171",
				"suburb" => "MIDDLETON GRANGE",
				"state" => "NSW",
				"lat" => "-33.914093",
				"lon" => "150.843547"
			],
			[
				"postcode" => "2171",
				"suburb" => "WEST HOXTON",
				"state" => "NSW",
				"lat" => "-33.922272",
				"lon" => "150.839967"
			],
			[
				"postcode" => "2172",
				"suburb" => "PLEASURE POINT",
				"state" => "NSW",
				"lat" => "-33.966909",
				"lon" => "150.98764"
			],
			[
				"postcode" => "2172",
				"suburb" => "SANDY POINT",
				"state" => "NSW",
				"lat" => "-33.975419",
				"lon" => "150.993967"
			],
			[
				"postcode" => "2172",
				"suburb" => "VOYAGER POINT",
				"state" => "NSW",
				"lat" => "-33.964547",
				"lon" => "150.97238"
			],
			[
				"postcode" => "2173",
				"suburb" => "HOLSWORTHY",
				"state" => "NSW",
				"lat" => "-33.950403",
				"lon" => "150.949972"
			],
			[
				"postcode" => "2173",
				"suburb" => "WATTLE GROVE",
				"state" => "NSW",
				"lat" => "-33.963316",
				"lon" => "150.936403"
			],
			[
				"postcode" => "2175",
				"suburb" => "HORSLEY PARK",
				"state" => "NSW",
				"lat" => "-33.845034",
				"lon" => "150.848192"
			],
			[
				"postcode" => "2176",
				"suburb" => "ABBOTSBURY",
				"state" => "NSW",
				"lat" => "-33.877538",
				"lon" => "150.867768"
			],
			[
				"postcode" => "2176",
				"suburb" => "BOSSLEY PARK",
				"state" => "NSW",
				"lat" => "-33.86626",
				"lon" => "150.88415"
			],
			[
				"postcode" => "2176",
				"suburb" => "EDENSOR PARK",
				"state" => "NSW",
				"lat" => "-33.877057",
				"lon" => "150.875292"
			],
			[
				"postcode" => "2176",
				"suburb" => "GREENFIELD PARK",
				"state" => "NSW",
				"lat" => "-33.872187",
				"lon" => "150.889408"
			],
			[
				"postcode" => "2176",
				"suburb" => "PRAIRIEWOOD",
				"state" => "NSW",
				"lat" => "-33.867342",
				"lon" => "150.90213"
			],
			[
				"postcode" => "2176",
				"suburb" => "ST JOHNS PARK",
				"state" => "NSW",
				"lat" => "-33.885824",
				"lon" => "150.905403"
			],
			[
				"postcode" => "2176",
				"suburb" => "WAKELEY",
				"state" => "NSW",
				"lat" => "-33.873966",
				"lon" => "150.90888"
			],
			[
				"postcode" => "2177",
				"suburb" => "BONNYRIGG",
				"state" => "NSW",
				"lat" => "-33.888801",
				"lon" => "150.886505"
			],
			[
				"postcode" => "2177",
				"suburb" => "BONNYRIGG HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.892667",
				"lon" => "150.868448"
			],
			[
				"postcode" => "2178",
				"suburb" => "CECIL PARK",
				"state" => "NSW",
				"lat" => "-33.87478",
				"lon" => "150.838225"
			],
			[
				"postcode" => "2178",
				"suburb" => "KEMPS CREEK",
				"state" => "NSW",
				"lat" => "-33.88013",
				"lon" => "150.790485"
			],
			[
				"postcode" => "2178",
				"suburb" => "MOUNT VERNON",
				"state" => "NSW",
				"lat" => "-33.862377",
				"lon" => "150.807887"
			],
			[
				"postcode" => "2179",
				"suburb" => "AUSTRAL",
				"state" => "NSW",
				"lat" => "-33.933109",
				"lon" => "150.812031"
			],
			[
				"postcode" => "2179",
				"suburb" => "LEPPINGTON",
				"state" => "NSW",
				"lat" => "-33.964333",
				"lon" => "150.81727"
			],
			[
				"postcode" => "2190",
				"suburb" => "CHULLORA",
				"state" => "NSW",
				"lat" => "-33.892441",
				"lon" => "151.055898"
			],
			[
				"postcode" => "2190",
				"suburb" => "GREENACRE",
				"state" => "NSW",
				"lat" => "-33.906744",
				"lon" => "151.057271"
			],
			[
				"postcode" => "2190",
				"suburb" => "MOUNT LEWIS",
				"state" => "NSW",
				"lat" => "-33.917157",
				"lon" => "151.047838"
			],
			[
				"postcode" => "2191",
				"suburb" => "BELFIELD",
				"state" => "NSW",
				"lat" => "-33.902107",
				"lon" => "151.083553"
			],
			[
				"postcode" => "2192",
				"suburb" => "BELMORE",
				"state" => "NSW",
				"lat" => "-33.916035",
				"lon" => "151.0875"
			],
			[
				"postcode" => "2193",
				"suburb" => "ASHBURY",
				"state" => "NSW",
				"lat" => "-33.901897",
				"lon" => "151.11932"
			],
			[
				"postcode" => "2193",
				"suburb" => "CANTERBURY",
				"state" => "NSW",
				"lat" => "-33.910848",
				"lon" => "151.121145"
			],
			[
				"postcode" => "2193",
				"suburb" => "HURLSTONE PARK",
				"state" => "NSW",
				"lat" => "-33.909964",
				"lon" => "151.13224"
			],
			[
				"postcode" => "2194",
				"suburb" => "CAMPSIE",
				"state" => "NSW",
				"lat" => "-33.914373",
				"lon" => "151.103465"
			],
			[
				"postcode" => "2195",
				"suburb" => "LAKEMBA",
				"state" => "NSW",
				"lat" => "-33.920457",
				"lon" => "151.075921"
			],
			[
				"postcode" => "2195",
				"suburb" => "WILEY PARK",
				"state" => "NSW",
				"lat" => "-33.922464",
				"lon" => "151.068194"
			],
			[
				"postcode" => "2196",
				"suburb" => "PUNCHBOWL",
				"state" => "NSW",
				"lat" => "-33.925686",
				"lon" => "151.054635"
			],
			[
				"postcode" => "2196",
				"suburb" => "ROSELANDS",
				"state" => "NSW",
				"lat" => "-33.933167",
				"lon" => "151.073197"
			],
			[
				"postcode" => "2197",
				"suburb" => "BASS HILL",
				"state" => "NSW",
				"lat" => "-33.900608",
				"lon" => "150.992888"
			],
			[
				"postcode" => "2198",
				"suburb" => "GEORGES HALL",
				"state" => "NSW",
				"lat" => "-33.912851",
				"lon" => "150.982469"
			],
			[
				"postcode" => "2199",
				"suburb" => "YAGOONA",
				"state" => "NSW",
				"lat" => "-33.907725",
				"lon" => "151.026108"
			],
			[
				"postcode" => "2199",
				"suburb" => "YAGOONA WEST",
				"state" => "NSW",
				"lat" => "-33.918726",
				"lon" => "151.037007"
			],
			[
				"postcode" => "2200",
				"suburb" => "BANKSTOWN",
				"state" => "NSW",
				"lat" => "-33.919539",
				"lon" => "151.034909"
			],
			[
				"postcode" => "2200",
				"suburb" => "BANKSTOWN AERODROME",
				"state" => "NSW",
				"lat" => "-33.920032",
				"lon" => "150.995041"
			],
			[
				"postcode" => "2200",
				"suburb" => "BANKSTOWN NORTH",
				"state" => "NSW",
				"lat" => "-33.904622",
				"lon" => "151.039298"
			],
			[
				"postcode" => "2200",
				"suburb" => "BANKSTOWN SQUARE",
				"state" => "NSW",
				"lat" => "-33.916017",
				"lon" => "151.038538"
			],
			[
				"postcode" => "2200",
				"suburb" => "CONDELL PARK",
				"state" => "NSW",
				"lat" => "-33.922034",
				"lon" => "151.011619"
			],
			[
				"postcode" => "2200",
				"suburb" => "MANAHAN",
				"state" => "NSW",
				"lat" => "-33.916293",
				"lon" => "151.005545"
			],
			[
				"postcode" => "2200",
				"suburb" => "MOUNT LEWIS",
				"state" => "NSW",
				"lat" => "-33.917157",
				"lon" => "151.047838"
			],
			[
				"postcode" => "2203",
				"suburb" => "DULWICH HILL",
				"state" => "NSW",
				"lat" => "-33.904689",
				"lon" => "151.138774"
			],
			[
				"postcode" => "2204",
				"suburb" => "MARRICKVILLE",
				"state" => "NSW",
				"lat" => "-33.910923",
				"lon" => "151.157187"
			],
			[
				"postcode" => "2204",
				"suburb" => "MARRICKVILLE METRO",
				"state" => "NSW",
				"lat" => "-33.906781",
				"lon" => "151.171858"
			],
			[
				"postcode" => "2204",
				"suburb" => "MARRICKVILLE SOUTH",
				"state" => "NSW",
				"lat" => "-33.915178",
				"lon" => "151.151568"
			],
			[
				"postcode" => "2205",
				"suburb" => "ARNCLIFFE",
				"state" => "NSW",
				"lat" => "-33.936592",
				"lon" => "151.146805"
			],
			[
				"postcode" => "2205",
				"suburb" => "TURRELLA",
				"state" => "NSW",
				"lat" => "-33.929963",
				"lon" => "151.140643"
			],
			[
				"postcode" => "2205",
				"suburb" => "WOLLI CREEK",
				"state" => "NSW",
				"lat" => "-33.930744",
				"lon" => "151.155272"
			],
			[
				"postcode" => "2206",
				"suburb" => "CLEMTON PARK",
				"state" => "NSW",
				"lat" => "-33.925357",
				"lon" => "151.103282"
			],
			[
				"postcode" => "2206",
				"suburb" => "EARLWOOD",
				"state" => "NSW",
				"lat" => "-33.92651",
				"lon" => "151.12648"
			],
			[
				"postcode" => "2207",
				"suburb" => "BARDWELL PARK",
				"state" => "NSW",
				"lat" => "-33.93207",
				"lon" => "151.125594"
			],
			[
				"postcode" => "2207",
				"suburb" => "BARDWELL VALLEY",
				"state" => "NSW",
				"lat" => "-33.935083",
				"lon" => "151.134686"
			],
			[
				"postcode" => "2207",
				"suburb" => "BEXLEY",
				"state" => "NSW",
				"lat" => "-33.949135",
				"lon" => "151.12721"
			],
			[
				"postcode" => "2207",
				"suburb" => "BEXLEY NORTH",
				"state" => "NSW",
				"lat" => "-33.938306",
				"lon" => "151.114186"
			],
			[
				"postcode" => "2207",
				"suburb" => "BEXLEY SOUTH",
				"state" => "NSW",
				"lat" => "-33.959548",
				"lon" => "151.117388"
			],
			[
				"postcode" => "2208",
				"suburb" => "KINGSGROVE",
				"state" => "NSW",
				"lat" => "-33.939481",
				"lon" => "151.098941"
			],
			[
				"postcode" => "2209",
				"suburb" => "BEVERLY HILLS",
				"state" => "NSW",
				"lat" => "-33.954218",
				"lon" => "151.076364"
			],
			[
				"postcode" => "2209",
				"suburb" => "NARWEE",
				"state" => "NSW",
				"lat" => "-33.948609",
				"lon" => "151.069628"
			],
			[
				"postcode" => "2210",
				"suburb" => "LUGARNO",
				"state" => "NSW",
				"lat" => "-33.982956",
				"lon" => "151.046942"
			],
			[
				"postcode" => "2210",
				"suburb" => "PEAKHURST",
				"state" => "NSW",
				"lat" => "-33.959715",
				"lon" => "151.062187"
			],
			[
				"postcode" => "2210",
				"suburb" => "PEAKHURST HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.968127",
				"lon" => "151.057596"
			],
			[
				"postcode" => "2210",
				"suburb" => "RIVERWOOD",
				"state" => "NSW",
				"lat" => "-33.949859",
				"lon" => "151.052469"
			],
			[
				"postcode" => "2211",
				"suburb" => "PADSTOW",
				"state" => "NSW",
				"lat" => "-33.953915",
				"lon" => "151.038163"
			],
			[
				"postcode" => "2211",
				"suburb" => "PADSTOW HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.971073",
				"lon" => "151.030955"
			],
			[
				"postcode" => "2212",
				"suburb" => "REVESBY",
				"state" => "NSW",
				"lat" => "-33.951507",
				"lon" => "151.017247"
			],
			[
				"postcode" => "2212",
				"suburb" => "REVESBY HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.968802",
				"lon" => "151.015063"
			],
			[
				"postcode" => "2212",
				"suburb" => "REVESBY NORTH",
				"state" => "NSW",
				"lat" => "-33.943582",
				"lon" => "151.007296"
			],
			[
				"postcode" => "2213",
				"suburb" => "EAST HILLS",
				"state" => "NSW",
				"lat" => "-33.963359",
				"lon" => "150.986695"
			],
			[
				"postcode" => "2213",
				"suburb" => "PANANIA",
				"state" => "NSW",
				"lat" => "-33.95613",
				"lon" => "150.998047"
			],
			[
				"postcode" => "2213",
				"suburb" => "PICNIC POINT",
				"state" => "NSW",
				"lat" => "-33.979303",
				"lon" => "151.000056"
			],
			[
				"postcode" => "2214",
				"suburb" => "MILPERRA",
				"state" => "NSW",
				"lat" => "-33.937834",
				"lon" => "150.989263"
			],
			[
				"postcode" => "2216",
				"suburb" => "BANKSIA",
				"state" => "NSW",
				"lat" => "-33.945237",
				"lon" => "151.140161"
			],
			[
				"postcode" => "2216",
				"suburb" => "BRIGHTON-LE-SANDS",
				"state" => "NSW",
				"lat" => "-33.960538",
				"lon" => "151.155362"
			],
			[
				"postcode" => "2216",
				"suburb" => "KYEEMAGH",
				"state" => "NSW",
				"lat" => "-33.951452",
				"lon" => "151.159943"
			],
			[
				"postcode" => "2216",
				"suburb" => "ROCKDALE",
				"state" => "NSW",
				"lat" => "-33.952747",
				"lon" => "151.137624"
			],
			[
				"postcode" => "2217",
				"suburb" => "BEVERLEY PARK",
				"state" => "NSW",
				"lat" => "-33.975135",
				"lon" => "151.131345"
			],
			[
				"postcode" => "2217",
				"suburb" => "KOGARAH",
				"state" => "NSW",
				"lat" => "-33.963107",
				"lon" => "151.133462"
			],
			[
				"postcode" => "2217",
				"suburb" => "KOGARAH BAY",
				"state" => "NSW",
				"lat" => "-33.979117",
				"lon" => "151.123296"
			],
			[
				"postcode" => "2217",
				"suburb" => "MONTEREY",
				"state" => "NSW",
				"lat" => "-33.973068",
				"lon" => "151.150983"
			],
			[
				"postcode" => "2217",
				"suburb" => "RAMSGATE",
				"state" => "NSW",
				"lat" => "-33.984683",
				"lon" => "151.139847"
			],
			[
				"postcode" => "2217",
				"suburb" => "RAMSGATE BEACH",
				"state" => "NSW",
				"lat" => "-33.981114",
				"lon" => "151.1483"
			],
			[
				"postcode" => "2218",
				"suburb" => "ALLAWAH",
				"state" => "NSW",
				"lat" => "-33.970018",
				"lon" => "151.114517"
			],
			[
				"postcode" => "2218",
				"suburb" => "CARLTON",
				"state" => "NSW",
				"lat" => "-33.968523",
				"lon" => "151.124528"
			],
			[
				"postcode" => "2219",
				"suburb" => "DOLLS POINT",
				"state" => "NSW",
				"lat" => "-33.993495",
				"lon" => "151.146801"
			],
			[
				"postcode" => "2219",
				"suburb" => "SANDRINGHAM",
				"state" => "NSW",
				"lat" => "-33.998763",
				"lon" => "151.139252"
			],
			[
				"postcode" => "2219",
				"suburb" => "SANS SOUCI",
				"state" => "NSW",
				"lat" => "-33.990614",
				"lon" => "151.133074"
			],
			[
				"postcode" => "2220",
				"suburb" => "HURSTVILLE",
				"state" => "NSW",
				"lat" => "-33.965923",
				"lon" => "151.101184"
			],
			[
				"postcode" => "2220",
				"suburb" => "HURSTVILLE GROVE",
				"state" => "NSW",
				"lat" => "-33.980653",
				"lon" => "151.091136"
			],
			[
				"postcode" => "2220",
				"suburb" => "HURSTVILLE WESTFIELD",
				"state" => "NSW",
				"lat" => "-33.965517",
				"lon" => "151.104903"
			],
			[
				"postcode" => "2221",
				"suburb" => "BLAKEHURST",
				"state" => "NSW",
				"lat" => "-33.988743",
				"lon" => "151.112314"
			],
			[
				"postcode" => "2221",
				"suburb" => "CARSS PARK",
				"state" => "NSW",
				"lat" => "-33.986556",
				"lon" => "151.119041"
			],
			[
				"postcode" => "2221",
				"suburb" => "CONNELLS POINT",
				"state" => "NSW",
				"lat" => "-33.991871",
				"lon" => "151.089495"
			],
			[
				"postcode" => "2221",
				"suburb" => "KYLE BAY",
				"state" => "NSW",
				"lat" => "-33.991238",
				"lon" => "151.098301"
			],
			[
				"postcode" => "2221",
				"suburb" => "SOUTH HURSTVILLE",
				"state" => "NSW",
				"lat" => "-33.977595",
				"lon" => "151.104909"
			],
			[
				"postcode" => "2222",
				"suburb" => "PENSHURST",
				"state" => "NSW",
				"lat" => "-33.963346",
				"lon" => "151.086744"
			],
			[
				"postcode" => "2223",
				"suburb" => "MORTDALE",
				"state" => "NSW",
				"lat" => "-33.972239",
				"lon" => "151.075391"
			],
			[
				"postcode" => "2223",
				"suburb" => "OATLEY",
				"state" => "NSW",
				"lat" => "-33.981428",
				"lon" => "151.082765"
			],
			[
				"postcode" => "2224",
				"suburb" => "KANGAROO POINT",
				"state" => "NSW",
				"lat" => "-33.997972",
				"lon" => "151.096235"
			],
			[
				"postcode" => "2224",
				"suburb" => "SYLVANIA",
				"state" => "NSW",
				"lat" => "-34.008075",
				"lon" => "151.105104"
			],
			[
				"postcode" => "2224",
				"suburb" => "SYLVANIA SOUTHGATE",
				"state" => "NSW",
				"lat" => "-34.009895",
				"lon" => "151.104166"
			],
			[
				"postcode" => "2224",
				"suburb" => "SYLVANIA WATERS",
				"state" => "NSW",
				"lat" => "-34.019802",
				"lon" => "151.115847"
			],
			[
				"postcode" => "2225",
				"suburb" => "CARAVAN HEAD",
				"state" => "NSW",
				"lat" => "-33.997441",
				"lon" => "151.087892"
			],
			[
				"postcode" => "2225",
				"suburb" => "OYSTER BAY",
				"state" => "NSW",
				"lat" => "-34.006894",
				"lon" => "151.081067"
			],
			[
				"postcode" => "2226",
				"suburb" => "BONNET BAY",
				"state" => "NSW",
				"lat" => "-34.009518",
				"lon" => "151.054252"
			],
			[
				"postcode" => "2226",
				"suburb" => "COMO",
				"state" => "NSW",
				"lat" => "-34.004186",
				"lon" => "151.068288"
			],
			[
				"postcode" => "2226",
				"suburb" => "JANNALI",
				"state" => "NSW",
				"lat" => "-34.017074",
				"lon" => "151.065081"
			],
			[
				"postcode" => "2227",
				"suburb" => "GYMEA",
				"state" => "NSW",
				"lat" => "-34.033142",
				"lon" => "151.085421"
			],
			[
				"postcode" => "2227",
				"suburb" => "GYMEA BAY",
				"state" => "NSW",
				"lat" => "-34.048156",
				"lon" => "151.086087"
			],
			[
				"postcode" => "2228",
				"suburb" => "MIRANDA",
				"state" => "NSW",
				"lat" => "-34.034014",
				"lon" => "151.100428"
			],
			[
				"postcode" => "2228",
				"suburb" => "YOWIE BAY",
				"state" => "NSW",
				"lat" => "-34.049866",
				"lon" => "151.104325"
			],
			[
				"postcode" => "2229",
				"suburb" => "CARINGBAH",
				"state" => "NSW",
				"lat" => "-34.04316",
				"lon" => "151.123102"
			],
			[
				"postcode" => "2229",
				"suburb" => "DOLANS BAY",
				"state" => "NSW",
				"lat" => "-34.05968",
				"lon" => "151.126746"
			],
			[
				"postcode" => "2229",
				"suburb" => "LILLI PILLI",
				"state" => "NSW",
				"lat" => "-34.069836",
				"lon" => "151.114032"
			],
			[
				"postcode" => "2229",
				"suburb" => "PORT HACKING",
				"state" => "NSW",
				"lat" => "-34.067503",
				"lon" => "151.122449"
			],
			[
				"postcode" => "2229",
				"suburb" => "TAREN POINT",
				"state" => "NSW",
				"lat" => "-34.012545",
				"lon" => "151.125456"
			],
			[
				"postcode" => "2229",
				"suburb" => "WARUMBUL",
				"state" => "NSW",
				"lat" => "-34.078313",
				"lon" => "151.102646"
			],
			[
				"postcode" => "2230",
				"suburb" => "BUNDEENA",
				"state" => "NSW",
				"lat" => "-34.085064",
				"lon" => "151.151259"
			],
			[
				"postcode" => "2230",
				"suburb" => "BURRANEER",
				"state" => "NSW",
				"lat" => "-34.065063",
				"lon" => "151.137171"
			],
			[
				"postcode" => "2230",
				"suburb" => "CRONULLA",
				"state" => "NSW",
				"lat" => "-34.051972",
				"lon" => "151.153662"
			],
			[
				"postcode" => "2230",
				"suburb" => "MAIANBAR",
				"state" => "NSW",
				"lat" => "-34.081826",
				"lon" => "151.129788"
			],
			[
				"postcode" => "2230",
				"suburb" => "WOOLOOWARE",
				"state" => "NSW",
				"lat" => "-34.048276",
				"lon" => "151.141431"
			],
			[
				"postcode" => "2231",
				"suburb" => "KURNELL",
				"state" => "NSW",
				"lat" => "-34.008487",
				"lon" => "151.204879"
			],
			[
				"postcode" => "2232",
				"suburb" => "AUDLEY",
				"state" => "NSW",
				"lat" => "-34.075295",
				"lon" => "151.056519"
			],
			[
				"postcode" => "2232",
				"suburb" => "GARIE",
				"state" => "NSW",
				"lat" => "-34.171841",
				"lon" => "151.062842"
			],
			[
				"postcode" => "2232",
				"suburb" => "GRAYS POINT",
				"state" => "NSW",
				"lat" => "-34.05884",
				"lon" => "151.081652"
			],
			[
				"postcode" => "2232",
				"suburb" => "KAREELA",
				"state" => "NSW",
				"lat" => "-34.014668",
				"lon" => "151.082733"
			],
			[
				"postcode" => "2232",
				"suburb" => "KIRRAWEE",
				"state" => "NSW",
				"lat" => "-34.033743",
				"lon" => "151.071196"
			],
			[
				"postcode" => "2232",
				"suburb" => "LOFTUS",
				"state" => "NSW",
				"lat" => "-34.048075",
				"lon" => "151.051176"
			],
			[
				"postcode" => "2232",
				"suburb" => "SUTHERLAND",
				"state" => "NSW",
				"lat" => "-34.031432",
				"lon" => "151.057965"
			],
			[
				"postcode" => "2232",
				"suburb" => "WORONORA",
				"state" => "NSW",
				"lat" => "-34.020654",
				"lon" => "151.047946"
			],
			[
				"postcode" => "2233",
				"suburb" => "ENGADINE",
				"state" => "NSW",
				"lat" => "-34.065716",
				"lon" => "151.012663"
			],
			[
				"postcode" => "2233",
				"suburb" => "HEATHCOTE",
				"state" => "NSW",
				"lat" => "-34.079112",
				"lon" => "151.008619"
			],
			[
				"postcode" => "2233",
				"suburb" => "WATERFALL",
				"state" => "NSW",
				"lat" => "-34.1352",
				"lon" => "150.994957"
			],
			[
				"postcode" => "2233",
				"suburb" => "WORONORA HEIGHTS",
				"state" => "NSW",
				"lat" => "-34.034836",
				"lon" => "151.027656"
			],
			[
				"postcode" => "2233",
				"suburb" => "YARRAWARRAH",
				"state" => "NSW",
				"lat" => "-34.058462",
				"lon" => "151.03279"
			],
			[
				"postcode" => "2234",
				"suburb" => "ALFORDS POINT",
				"state" => "NSW",
				"lat" => "-33.993303",
				"lon" => "151.024751"
			],
			[
				"postcode" => "2234",
				"suburb" => "BANGOR",
				"state" => "NSW",
				"lat" => "-34.018876",
				"lon" => "151.030057"
			],
			[
				"postcode" => "2234",
				"suburb" => "BARDEN RIDGE",
				"state" => "NSW",
				"lat" => "-34.032851",
				"lon" => "151.005396"
			],
			[
				"postcode" => "2234",
				"suburb" => "ILLAWONG",
				"state" => "NSW",
				"lat" => "-33.998018",
				"lon" => "151.042591"
			],
			[
				"postcode" => "2234",
				"suburb" => "LUCAS HEIGHTS",
				"state" => "NSW",
				"lat" => "-34.047985",
				"lon" => "150.988369"
			],
			[
				"postcode" => "2234",
				"suburb" => "MENAI",
				"state" => "NSW",
				"lat" => "-34.012564",
				"lon" => "151.014645"
			],
			[
				"postcode" => "2234",
				"suburb" => "MENAI CENTRAL",
				"state" => "NSW",
				"lat" => "-33.998425",
				"lon" => "151.063767"
			],
			[
				"postcode" => "2250",
				"suburb" => "BUCKETTY",
				"state" => "NSW",
				"lat" => "-33.111273",
				"lon" => "151.138861"
			],
			[
				"postcode" => "2250",
				"suburb" => "CALGA",
				"state" => "NSW",
				"lat" => "-33.43835",
				"lon" => "151.236467"
			],
			[
				"postcode" => "2250",
				"suburb" => "CENTRAL MANGROVE",
				"state" => "NSW",
				"lat" => "-33.292384",
				"lon" => "151.234661"
			],
			[
				"postcode" => "2250",
				"suburb" => "EAST GOSFORD",
				"state" => "NSW",
				"lat" => "-33.438534",
				"lon" => "151.354167"
			],
			[
				"postcode" => "2250",
				"suburb" => "ERINA",
				"state" => "NSW",
				"lat" => "-33.437893",
				"lon" => "151.383648"
			],
			[
				"postcode" => "2250",
				"suburb" => "ERINA FAIR",
				"state" => "NSW",
				"lat" => "-33.437221",
				"lon" => "151.394139"
			],
			[
				"postcode" => "2250",
				"suburb" => "GLENWORTH VALLEY",
				"state" => "NSW",
				"lat" => "-33.423807",
				"lon" => "151.17688"
			],
			[
				"postcode" => "2250",
				"suburb" => "GOSFORD",
				"state" => "NSW",
				"lat" => "-33.426938",
				"lon" => "151.341843"
			],
			[
				"postcode" => "2250",
				"suburb" => "GREENGROVE",
				"state" => "NSW",
				"lat" => "-33.382712",
				"lon" => "151.145126"
			],
			[
				"postcode" => "2250",
				"suburb" => "HOLGATE",
				"state" => "NSW",
				"lat" => "-33.409747",
				"lon" => "151.405406"
			],
			[
				"postcode" => "2250",
				"suburb" => "KARIONG",
				"state" => "NSW",
				"lat" => "-33.439733",
				"lon" => "151.293333"
			],
			[
				"postcode" => "2250",
				"suburb" => "KULNURA",
				"state" => "NSW",
				"lat" => "-33.225924",
				"lon" => "151.222101"
			],
			[
				"postcode" => "2250",
				"suburb" => "LISAROW",
				"state" => "NSW",
				"lat" => "-33.380843",
				"lon" => "151.371283"
			],
			[
				"postcode" => "2250",
				"suburb" => "LOWER MANGROVE",
				"state" => "NSW",
				"lat" => "-33.412045",
				"lon" => "151.150688"
			],
			[
				"postcode" => "2250",
				"suburb" => "MANGROVE CREEK",
				"state" => "NSW",
				"lat" => "-33.359231",
				"lon" => "151.146082"
			],
			[
				"postcode" => "2250",
				"suburb" => "MANGROVE MOUNTAIN",
				"state" => "NSW",
				"lat" => "-33.300847",
				"lon" => "151.191661"
			],
			[
				"postcode" => "2250",
				"suburb" => "MATCHAM",
				"state" => "NSW",
				"lat" => "-33.417004",
				"lon" => "151.420834"
			],
			[
				"postcode" => "2250",
				"suburb" => "MOONEY MOONEY CREEK",
				"state" => "NSW",
				"lat" => "-33.439621",
				"lon" => "151.244578"
			],
			[
				"postcode" => "2250",
				"suburb" => "MOUNT ELLIOT",
				"state" => "NSW",
				"lat" => "-33.399915",
				"lon" => "151.385524"
			],
			[
				"postcode" => "2250",
				"suburb" => "MOUNT WHITE",
				"state" => "NSW",
				"lat" => "-33.461404",
				"lon" => "151.190612"
			],
			[
				"postcode" => "2250",
				"suburb" => "NARARA",
				"state" => "NSW",
				"lat" => "-33.395807",
				"lon" => "151.346114"
			],
			[
				"postcode" => "2250",
				"suburb" => "NIAGARA PARK",
				"state" => "NSW",
				"lat" => "-33.381996",
				"lon" => "151.355782"
			],
			[
				"postcode" => "2250",
				"suburb" => "NORTH GOSFORD",
				"state" => "NSW",
				"lat" => "-33.41684",
				"lon" => "151.348821"
			],
			[
				"postcode" => "2250",
				"suburb" => "PEATS RIDGE",
				"state" => "NSW",
				"lat" => "-33.351199",
				"lon" => "151.229736"
			],
			[
				"postcode" => "2250",
				"suburb" => "POINT CLARE",
				"state" => "NSW",
				"lat" => "-33.436772",
				"lon" => "151.320952"
			],
			[
				"postcode" => "2250",
				"suburb" => "POINT FREDERICK",
				"state" => "NSW",
				"lat" => "-33.449407",
				"lon" => "151.341896"
			],
			[
				"postcode" => "2250",
				"suburb" => "SOMERSBY",
				"state" => "NSW",
				"lat" => "-33.360992",
				"lon" => "151.291053"
			],
			[
				"postcode" => "2250",
				"suburb" => "SPRINGFIELD",
				"state" => "NSW",
				"lat" => "-33.430406",
				"lon" => "151.370764"
			],
			[
				"postcode" => "2250",
				"suburb" => "TASCOTT",
				"state" => "NSW",
				"lat" => "-33.450818",
				"lon" => "151.319442"
			],
			[
				"postcode" => "2250",
				"suburb" => "TEN MILE HOLLOW",
				"state" => "NSW",
				"lat" => "-33.324602",
				"lon" => "151.089946"
			],
			[
				"postcode" => "2250",
				"suburb" => "UPPER MANGROVE",
				"state" => "NSW",
				"lat" => "-33.293327",
				"lon" => "151.122269"
			],
			[
				"postcode" => "2250",
				"suburb" => "WENDOREE PARK",
				"state" => "NSW",
				"lat" => "-33.455552",
				"lon" => "151.155631"
			],
			[
				"postcode" => "2250",
				"suburb" => "WEST GOSFORD",
				"state" => "NSW",
				"lat" => "-33.420829",
				"lon" => "151.321753"
			],
			[
				"postcode" => "2250",
				"suburb" => "WYOMING",
				"state" => "NSW",
				"lat" => "-33.40485",
				"lon" => "151.350776"
			],
			[
				"postcode" => "2251",
				"suburb" => "AVOCA BEACH",
				"state" => "NSW",
				"lat" => "-33.464937",
				"lon" => "151.432387"
			],
			[
				"postcode" => "2251",
				"suburb" => "BENSVILLE",
				"state" => "NSW",
				"lat" => "-33.498579",
				"lon" => "151.381089"
			],
			[
				"postcode" => "2251",
				"suburb" => "BOUDDI",
				"state" => "NSW",
				"lat" => "-33.511538",
				"lon" => "151.400793"
			],
			[
				"postcode" => "2251",
				"suburb" => "COPACABANA",
				"state" => "NSW",
				"lat" => "-33.48994",
				"lon" => "151.430558"
			],
			[
				"postcode" => "2251",
				"suburb" => "DAVISTOWN",
				"state" => "NSW",
				"lat" => "-33.485685",
				"lon" => "151.360521"
			],
			[
				"postcode" => "2251",
				"suburb" => "GREEN POINT",
				"state" => "NSW",
				"lat" => "-33.451762",
				"lon" => "151.360909"
			],
			[
				"postcode" => "2251",
				"suburb" => "KINCUMBER",
				"state" => "NSW",
				"lat" => "-33.467738",
				"lon" => "151.382147"
			],
			[
				"postcode" => "2251",
				"suburb" => "KINCUMBER SOUTH",
				"state" => "NSW",
				"lat" => "-33.487271",
				"lon" => "151.381035"
			],
			[
				"postcode" => "2251",
				"suburb" => "MACMASTERS BEACH",
				"state" => "NSW",
				"lat" => "-33.492821",
				"lon" => "151.416479"
			],
			[
				"postcode" => "2251",
				"suburb" => "PICKETTS VALLEY",
				"state" => "NSW",
				"lat" => "-33.456914",
				"lon" => "151.412831"
			],
			[
				"postcode" => "2251",
				"suburb" => "SARATOGA",
				"state" => "NSW",
				"lat" => "-33.475692",
				"lon" => "151.354149"
			],
			[
				"postcode" => "2251",
				"suburb" => "YATTALUNGA",
				"state" => "NSW",
				"lat" => "-33.470568",
				"lon" => "151.360536"
			],
			[
				"postcode" => "2256",
				"suburb" => "BLACKWALL",
				"state" => "NSW",
				"lat" => "-33.503434",
				"lon" => "151.327632"
			],
			[
				"postcode" => "2256",
				"suburb" => "HORSFIELD BAY",
				"state" => "NSW",
				"lat" => "-33.49347",
				"lon" => "151.299908"
			],
			[
				"postcode" => "2256",
				"suburb" => "KOOLEWONG",
				"state" => "NSW",
				"lat" => "-33.46632",
				"lon" => "151.31816"
			],
			[
				"postcode" => "2256",
				"suburb" => "LITTLE WOBBY",
				"state" => "NSW",
				"lat" => "-33.548076",
				"lon" => "151.252911"
			],
			[
				"postcode" => "2256",
				"suburb" => "PATONGA",
				"state" => "NSW",
				"lat" => "-33.546452",
				"lon" => "151.27119"
			],
			[
				"postcode" => "2256",
				"suburb" => "PEARL BEACH",
				"state" => "NSW",
				"lat" => "-33.538915",
				"lon" => "151.302813"
			],
			[
				"postcode" => "2256",
				"suburb" => "PHEGANS BAY",
				"state" => "NSW",
				"lat" => "-33.48859",
				"lon" => "151.308453"
			],
			[
				"postcode" => "2256",
				"suburb" => "WONDABYNE",
				"state" => "NSW",
				"lat" => "-33.49159",
				"lon" => "151.256944"
			],
			[
				"postcode" => "2256",
				"suburb" => "WOY WOY",
				"state" => "NSW",
				"lat" => "-33.485855",
				"lon" => "151.324775"
			],
			[
				"postcode" => "2256",
				"suburb" => "WOY WOY BAY",
				"state" => "NSW",
				"lat" => "-33.484478",
				"lon" => "151.312108"
			],
			[
				"postcode" => "2257",
				"suburb" => "BOOKER BAY",
				"state" => "NSW",
				"lat" => "-33.511566",
				"lon" => "151.34478"
			],
			[
				"postcode" => "2257",
				"suburb" => "BOX HEAD",
				"state" => "NSW",
				"lat" => "-33.536016",
				"lon" => "151.344489"
			],
			[
				"postcode" => "2257",
				"suburb" => "DALEYS POINT",
				"state" => "NSW",
				"lat" => "-33.50569",
				"lon" => "151.348181"
			],
			[
				"postcode" => "2257",
				"suburb" => "EMPIRE BAY",
				"state" => "NSW",
				"lat" => "-33.494186",
				"lon" => "151.362188"
			],
			[
				"postcode" => "2257",
				"suburb" => "ETTALONG BEACH",
				"state" => "NSW",
				"lat" => "-33.513696",
				"lon" => "151.335289"
			],
			[
				"postcode" => "2257",
				"suburb" => "HARDYS BAY",
				"state" => "NSW",
				"lat" => "-33.525157",
				"lon" => "151.35744"
			],
			[
				"postcode" => "2257",
				"suburb" => "KILLCARE",
				"state" => "NSW",
				"lat" => "-33.525978",
				"lon" => "151.362657"
			],
			[
				"postcode" => "2257",
				"suburb" => "KILLCARE HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.52257",
				"lon" => "151.370994"
			],
			[
				"postcode" => "2257",
				"suburb" => "PRETTY BEACH",
				"state" => "NSW",
				"lat" => "-33.52536",
				"lon" => "151.351281"
			],
			[
				"postcode" => "2257",
				"suburb" => "ST HUBERTS ISLAND",
				"state" => "NSW",
				"lat" => "-33.495721",
				"lon" => "151.344441"
			],
			[
				"postcode" => "2257",
				"suburb" => "UMINA BEACH",
				"state" => "NSW",
				"lat" => "-33.528746",
				"lon" => "151.307503"
			],
			[
				"postcode" => "2257",
				"suburb" => "WAGSTAFFE",
				"state" => "NSW",
				"lat" => "-33.523185",
				"lon" => "151.342598"
			],
			[
				"postcode" => "2258",
				"suburb" => "FOUNTAINDALE",
				"state" => "NSW",
				"lat" => "-33.338303",
				"lon" => "151.392826"
			],
			[
				"postcode" => "2258",
				"suburb" => "KANGY ANGY",
				"state" => "NSW",
				"lat" => "-33.322397",
				"lon" => "151.395063"
			],
			[
				"postcode" => "2258",
				"suburb" => "OURIMBAH",
				"state" => "NSW",
				"lat" => "-33.359703",
				"lon" => "151.36965"
			],
			[
				"postcode" => "2258",
				"suburb" => "PALM GROVE",
				"state" => "NSW",
				"lat" => "-33.326275",
				"lon" => "151.311454"
			],
			[
				"postcode" => "2258",
				"suburb" => "PALMDALE",
				"state" => "NSW",
				"lat" => "-33.331864",
				"lon" => "151.373158"
			],
			[
				"postcode" => "2259",
				"suburb" => "ALISON",
				"state" => "NSW",
				"lat" => "-33.265998",
				"lon" => "151.403858"
			],
			[
				"postcode" => "2259",
				"suburb" => "BUSHELLS RIDGE",
				"state" => "NSW",
				"lat" => "-33.210392",
				"lon" => "151.476534"
			],
			[
				"postcode" => "2259",
				"suburb" => "CEDAR BRUSH CREEK",
				"state" => "NSW",
				"lat" => "-33.147255",
				"lon" => "151.258292"
			],
			[
				"postcode" => "2259",
				"suburb" => "CHAIN VALLEY BAY",
				"state" => "NSW",
				"lat" => "-33.174102",
				"lon" => "151.580195"
			],
			[
				"postcode" => "2259",
				"suburb" => "CRANGAN BAY",
				"state" => "NSW",
				"lat" => "-33.175697",
				"lon" => "151.590424"
			],
			[
				"postcode" => "2259",
				"suburb" => "DOORALONG",
				"state" => "NSW",
				"lat" => "-33.189384",
				"lon" => "151.350215"
			],
			[
				"postcode" => "2259",
				"suburb" => "DURREN DURREN",
				"state" => "NSW",
				"lat" => "-33.171431",
				"lon" => "151.382288"
			],
			[
				"postcode" => "2259",
				"suburb" => "FRAZER PARK",
				"state" => "NSW",
				"lat" => "-33.186687",
				"lon" => "151.621139"
			],
			[
				"postcode" => "2259",
				"suburb" => "FREEMANS",
				"state" => "NSW",
				"lat" => "-33.203791",
				"lon" => "151.595646"
			],
			[
				"postcode" => "2259",
				"suburb" => "GWANDALAN",
				"state" => "NSW",
				"lat" => "-33.139561",
				"lon" => "151.587572"
			],
			[
				"postcode" => "2259",
				"suburb" => "HALLORAN",
				"state" => "NSW",
				"lat" => "-33.239446",
				"lon" => "151.439518"
			],
			[
				"postcode" => "2259",
				"suburb" => "HAMLYN TERRACE",
				"state" => "NSW",
				"lat" => "-33.250574",
				"lon" => "151.469872"
			],
			[
				"postcode" => "2259",
				"suburb" => "JILLIBY",
				"state" => "NSW",
				"lat" => "-33.230854",
				"lon" => "151.391869"
			],
			[
				"postcode" => "2259",
				"suburb" => "KANWAL",
				"state" => "NSW",
				"lat" => "-33.263412",
				"lon" => "151.479653"
			],
			[
				"postcode" => "2259",
				"suburb" => "KIAR",
				"state" => "NSW",
				"lat" => "-33.197478",
				"lon" => "151.436954"
			],
			[
				"postcode" => "2259",
				"suburb" => "LAKE MUNMORAH",
				"state" => "NSW",
				"lat" => "-33.194148",
				"lon" => "151.57042"
			],
			[
				"postcode" => "2259",
				"suburb" => "LEMON TREE",
				"state" => "NSW",
				"lat" => "-33.146102",
				"lon" => "151.364803"
			],
			[
				"postcode" => "2259",
				"suburb" => "LITTLE JILLIBY",
				"state" => "NSW",
				"lat" => "-33.235928",
				"lon" => "151.349661"
			],
			[
				"postcode" => "2259",
				"suburb" => "MANNERING PARK",
				"state" => "NSW",
				"lat" => "-33.150538",
				"lon" => "151.537603"
			],
			[
				"postcode" => "2259",
				"suburb" => "MARDI",
				"state" => "NSW",
				"lat" => "-33.28342",
				"lon" => "151.404775"
			],
			[
				"postcode" => "2259",
				"suburb" => "MOONEE",
				"state" => "NSW",
				"lat" => "-33.166162",
				"lon" => "151.612046"
			],
			[
				"postcode" => "2259",
				"suburb" => "POINT WOLSTONCROFT",
				"state" => "NSW",
				"lat" => "-33.110021",
				"lon" => "151.583516"
			],
			[
				"postcode" => "2259",
				"suburb" => "RAVENSDALE",
				"state" => "NSW",
				"lat" => "-33.14747",
				"lon" => "151.288584"
			],
			[
				"postcode" => "2259",
				"suburb" => "ROCKY POINT",
				"state" => "NSW",
				"lat" => "-33.294922",
				"lon" => "151.471707"
			],
			[
				"postcode" => "2259",
				"suburb" => "SUMMERLAND POINT",
				"state" => "NSW",
				"lat" => "-33.139085",
				"lon" => "151.565431"
			],
			[
				"postcode" => "2259",
				"suburb" => "TACOMA",
				"state" => "NSW",
				"lat" => "-33.285489",
				"lon" => "151.453689"
			],
			[
				"postcode" => "2259",
				"suburb" => "TACOMA SOUTH",
				"state" => "NSW",
				"lat" => "-33.289592",
				"lon" => "151.457044"
			],
			[
				"postcode" => "2259",
				"suburb" => "TUGGERAH",
				"state" => "NSW",
				"lat" => "-33.30701",
				"lon" => "151.415901"
			],
			[
				"postcode" => "2259",
				"suburb" => "TUGGERAWONG",
				"state" => "NSW",
				"lat" => "-33.280657",
				"lon" => "151.476312"
			],
			[
				"postcode" => "2259",
				"suburb" => "WADALBA",
				"state" => "NSW",
				"lat" => "-33.273033",
				"lon" => "151.465618"
			],
			[
				"postcode" => "2259",
				"suburb" => "WALLARAH",
				"state" => "NSW",
				"lat" => "-33.241851",
				"lon" => "151.456522"
			],
			[
				"postcode" => "2259",
				"suburb" => "WARNERVALE",
				"state" => "NSW",
				"lat" => "-33.242434",
				"lon" => "151.459786"
			],
			[
				"postcode" => "2259",
				"suburb" => "WATANOBBI",
				"state" => "NSW",
				"lat" => "-33.269072",
				"lon" => "151.431783"
			],
			[
				"postcode" => "2259",
				"suburb" => "WOONGARRAH",
				"state" => "NSW",
				"lat" => "-33.246082",
				"lon" => "151.477239"
			],
			[
				"postcode" => "2259",
				"suburb" => "WYBUNG",
				"state" => "NSW",
				"lat" => "-33.193536",
				"lon" => "151.596796"
			],
			[
				"postcode" => "2259",
				"suburb" => "WYEE",
				"state" => "NSW",
				"lat" => "-33.175844",
				"lon" => "151.484958"
			],
			[
				"postcode" => "2259",
				"suburb" => "WYEE POINT",
				"state" => "NSW",
				"lat" => "-33.143718",
				"lon" => "151.520566"
			],
			[
				"postcode" => "2259",
				"suburb" => "WYONG",
				"state" => "NSW",
				"lat" => "-33.28348",
				"lon" => "151.422404"
			],
			[
				"postcode" => "2259",
				"suburb" => "WYONG CREEK",
				"state" => "NSW",
				"lat" => "-33.270222",
				"lon" => "151.363156"
			],
			[
				"postcode" => "2259",
				"suburb" => "WYONGAH",
				"state" => "NSW",
				"lat" => "-33.274859",
				"lon" => "151.49038"
			],
			[
				"postcode" => "2259",
				"suburb" => "YARRAMALONG",
				"state" => "NSW",
				"lat" => "-33.222529",
				"lon" => "151.277495"
			],
			[
				"postcode" => "2260",
				"suburb" => "ERINA HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.426949",
				"lon" => "151.413211"
			],
			[
				"postcode" => "2260",
				"suburb" => "FORRESTERS BEACH",
				"state" => "NSW",
				"lat" => "-33.407108",
				"lon" => "151.463884"
			],
			[
				"postcode" => "2260",
				"suburb" => "NORTH AVOCA",
				"state" => "NSW",
				"lat" => "-33.459007",
				"lon" => "151.435833"
			],
			[
				"postcode" => "2260",
				"suburb" => "TERRIGAL",
				"state" => "NSW",
				"lat" => "-33.448011",
				"lon" => "151.444461"
			],
			[
				"postcode" => "2260",
				"suburb" => "WAMBERAL",
				"state" => "NSW",
				"lat" => "-33.418298",
				"lon" => "151.446193"
			],
			[
				"postcode" => "2261",
				"suburb" => "BATEAU BAY",
				"state" => "NSW",
				"lat" => "-33.381213",
				"lon" => "151.479104"
			],
			[
				"postcode" => "2261",
				"suburb" => "BAY VILLAGE",
				"state" => "NSW",
				"lat" => "-33.376325",
				"lon" => "151.473838"
			],
			[
				"postcode" => "2261",
				"suburb" => "BERKELEY VALE",
				"state" => "NSW",
				"lat" => "-33.341788",
				"lon" => "151.43163"
			],
			[
				"postcode" => "2261",
				"suburb" => "BLUE BAY",
				"state" => "NSW",
				"lat" => "-33.357184",
				"lon" => "151.500048"
			],
			[
				"postcode" => "2261",
				"suburb" => "CHITTAWAY BAY",
				"state" => "NSW",
				"lat" => "-33.32776",
				"lon" => "151.429428"
			],
			[
				"postcode" => "2261",
				"suburb" => "CHITTAWAY POINT",
				"state" => "NSW",
				"lat" => "-33.326616",
				"lon" => "151.463661"
			],
			[
				"postcode" => "2261",
				"suburb" => "GLENNING VALLEY",
				"state" => "NSW",
				"lat" => "-33.353709",
				"lon" => "151.425996"
			],
			[
				"postcode" => "2261",
				"suburb" => "KILLARNEY VALE",
				"state" => "NSW",
				"lat" => "-33.369601",
				"lon" => "151.459783"
			],
			[
				"postcode" => "2261",
				"suburb" => "LONG JETTY",
				"state" => "NSW",
				"lat" => "-33.359163",
				"lon" => "151.484178"
			],
			[
				"postcode" => "2261",
				"suburb" => "MAGENTA",
				"state" => "NSW",
				"lat" => "-33.313335",
				"lon" => "151.519517"
			],
			[
				"postcode" => "2261",
				"suburb" => "SHELLY BEACH",
				"state" => "NSW",
				"lat" => "-33.368675",
				"lon" => "151.485687"
			],
			[
				"postcode" => "2261",
				"suburb" => "THE ENTRANCE",
				"state" => "NSW",
				"lat" => "-33.344648",
				"lon" => "151.496394"
			],
			[
				"postcode" => "2261",
				"suburb" => "THE ENTRANCE NORTH",
				"state" => "NSW",
				"lat" => "-33.326254",
				"lon" => "151.511249"
			],
			[
				"postcode" => "2261",
				"suburb" => "TOOWOON BAY",
				"state" => "NSW",
				"lat" => "-33.35802",
				"lon" => "151.496592"
			],
			[
				"postcode" => "2261",
				"suburb" => "TUMBI UMBI",
				"state" => "NSW",
				"lat" => "-33.362679",
				"lon" => "151.447302"
			],
			[
				"postcode" => "2262",
				"suburb" => "BLUE HAVEN",
				"state" => "NSW",
				"lat" => "-33.207351",
				"lon" => "151.492751"
			],
			[
				"postcode" => "2262",
				"suburb" => "BUDGEWOI",
				"state" => "NSW",
				"lat" => "-33.234349",
				"lon" => "151.554753"
			],
			[
				"postcode" => "2262",
				"suburb" => "BUDGEWOI PENINSULA",
				"state" => "NSW",
				"lat" => "-33.21956",
				"lon" => "151.584067"
			],
			[
				"postcode" => "2262",
				"suburb" => "BUFF POINT",
				"state" => "NSW",
				"lat" => "-33.238196",
				"lon" => "151.535266"
			],
			[
				"postcode" => "2262",
				"suburb" => "COLONGRA",
				"state" => "NSW",
				"lat" => "-33.210058",
				"lon" => "151.54323"
			],
			[
				"postcode" => "2262",
				"suburb" => "DOYALSON",
				"state" => "NSW",
				"lat" => "-33.197168",
				"lon" => "151.521116"
			],
			[
				"postcode" => "2262",
				"suburb" => "DOYALSON NORTH",
				"state" => "NSW",
				"lat" => "-33.185292",
				"lon" => "151.546219"
			],
			[
				"postcode" => "2262",
				"suburb" => "HALEKULANI",
				"state" => "NSW",
				"lat" => "-33.223484",
				"lon" => "151.550635"
			],
			[
				"postcode" => "2262",
				"suburb" => "SAN REMO",
				"state" => "NSW",
				"lat" => "-33.209738",
				"lon" => "151.51616"
			],
			[
				"postcode" => "2263",
				"suburb" => "CANTON BEACH",
				"state" => "NSW",
				"lat" => "-33.271922",
				"lon" => "151.544045"
			],
			[
				"postcode" => "2263",
				"suburb" => "CHARMHAVEN",
				"state" => "NSW",
				"lat" => "-33.229912",
				"lon" => "151.502912"
			],
			[
				"postcode" => "2263",
				"suburb" => "GOROKAN",
				"state" => "NSW",
				"lat" => "-33.257544",
				"lon" => "151.510399"
			],
			[
				"postcode" => "2263",
				"suburb" => "LAKE HAVEN",
				"state" => "NSW",
				"lat" => "-33.240092",
				"lon" => "151.501928"
			],
			[
				"postcode" => "2263",
				"suburb" => "NORAH HEAD",
				"state" => "NSW",
				"lat" => "-33.279786",
				"lon" => "151.555053"
			],
			[
				"postcode" => "2263",
				"suburb" => "NORAVILLE",
				"state" => "NSW",
				"lat" => "-33.265942",
				"lon" => "151.559914"
			],
			[
				"postcode" => "2263",
				"suburb" => "TOUKLEY",
				"state" => "NSW",
				"lat" => "-33.265459",
				"lon" => "151.540695"
			],
			[
				"postcode" => "2264",
				"suburb" => "BALCOLYN",
				"state" => "NSW",
				"lat" => "-33.095642",
				"lon" => "151.553169"
			],
			[
				"postcode" => "2264",
				"suburb" => "BONNELLS BAY",
				"state" => "NSW",
				"lat" => "-33.107405",
				"lon" => "151.518263"
			],
			[
				"postcode" => "2264",
				"suburb" => "BRIGHTWATERS",
				"state" => "NSW",
				"lat" => "-33.114455",
				"lon" => "151.545925"
			],
			[
				"postcode" => "2264",
				"suburb" => "DORA CREEK",
				"state" => "NSW",
				"lat" => "-33.083587",
				"lon" => "151.501807"
			],
			[
				"postcode" => "2264",
				"suburb" => "ERARING",
				"state" => "NSW",
				"lat" => "-33.071249",
				"lon" => "151.522946"
			],
			[
				"postcode" => "2264",
				"suburb" => "MANDALONG",
				"state" => "NSW",
				"lat" => "-33.145241",
				"lon" => "151.414627"
			],
			[
				"postcode" => "2264",
				"suburb" => "MIRRABOOKA",
				"state" => "NSW",
				"lat" => "-33.108634",
				"lon" => "151.555006"
			],
			[
				"postcode" => "2264",
				"suburb" => "MORISSET",
				"state" => "NSW",
				"lat" => "-33.108336",
				"lon" => "151.487758"
			],
			[
				"postcode" => "2264",
				"suburb" => "MORISSET PARK",
				"state" => "NSW",
				"lat" => "-33.121406",
				"lon" => "151.530773"
			],
			[
				"postcode" => "2264",
				"suburb" => "MYUNA BAY",
				"state" => "NSW",
				"lat" => "-33.061626",
				"lon" => "151.550074"
			],
			[
				"postcode" => "2264",
				"suburb" => "SILVERWATER",
				"state" => "NSW",
				"lat" => "-33.101384",
				"lon" => "151.56199"
			],
			[
				"postcode" => "2264",
				"suburb" => "WINDERMERE PARK",
				"state" => "NSW",
				"lat" => "-33.115951",
				"lon" => "151.531184"
			],
			[
				"postcode" => "2264",
				"suburb" => "YARRAWONGA PARK",
				"state" => "NSW",
				"lat" => "-33.100922",
				"lon" => "151.544375"
			],
			[
				"postcode" => "2265",
				"suburb" => "COORANBONG",
				"state" => "NSW",
				"lat" => "-33.076609",
				"lon" => "151.453989"
			],
			[
				"postcode" => "2265",
				"suburb" => "MARTINSVILLE",
				"state" => "NSW",
				"lat" => "-33.055785",
				"lon" => "151.406243"
			],
			[
				"postcode" => "2267",
				"suburb" => "WANGI WANGI",
				"state" => "NSW",
				"lat" => "-33.071491",
				"lon" => "151.584366"
			],
			[
				"postcode" => "2278",
				"suburb" => "BARNSLEY",
				"state" => "NSW",
				"lat" => "-32.932412",
				"lon" => "151.590415"
			],
			[
				"postcode" => "2278",
				"suburb" => "KILLINGWORTH",
				"state" => "NSW",
				"lat" => "-32.934544",
				"lon" => "151.560841"
			],
			[
				"postcode" => "2278",
				"suburb" => "WAKEFIELD",
				"state" => "NSW",
				"lat" => "-32.956584",
				"lon" => "151.560504"
			],
			[
				"postcode" => "2280",
				"suburb" => "BELMONT",
				"state" => "NSW",
				"lat" => "-33.036057",
				"lon" => "151.660563"
			],
			[
				"postcode" => "2280",
				"suburb" => "BELMONT NORTH",
				"state" => "NSW",
				"lat" => "-33.022228",
				"lon" => "151.672028"
			],
			[
				"postcode" => "2280",
				"suburb" => "BELMONT SOUTH",
				"state" => "NSW",
				"lat" => "-33.05317",
				"lon" => "151.654854"
			],
			[
				"postcode" => "2280",
				"suburb" => "CROUDACE BAY",
				"state" => "NSW",
				"lat" => "-33.00492",
				"lon" => "151.643488"
			],
			[
				"postcode" => "2280",
				"suburb" => "FLORAVILLE",
				"state" => "NSW",
				"lat" => "-33.009036",
				"lon" => "151.664654"
			],
			[
				"postcode" => "2280",
				"suburb" => "JEWELLS",
				"state" => "NSW",
				"lat" => "-33.014125",
				"lon" => "151.683174"
			],
			[
				"postcode" => "2280",
				"suburb" => "MARKS POINT",
				"state" => "NSW",
				"lat" => "-33.055212",
				"lon" => "151.646098"
			],
			[
				"postcode" => "2280",
				"suburb" => "VALENTINE",
				"state" => "NSW",
				"lat" => "-33.008886",
				"lon" => "151.635155"
			],
			[
				"postcode" => "2281",
				"suburb" => "BLACKSMITHS",
				"state" => "NSW",
				"lat" => "-33.077161",
				"lon" => "151.652305"
			],
			[
				"postcode" => "2281",
				"suburb" => "CAMS WHARF",
				"state" => "NSW",
				"lat" => "-33.127824",
				"lon" => "151.621585"
			],
			[
				"postcode" => "2281",
				"suburb" => "CATHERINE HILL BAY",
				"state" => "NSW",
				"lat" => "-33.161795",
				"lon" => "151.626395"
			],
			[
				"postcode" => "2281",
				"suburb" => "CAVES BEACH",
				"state" => "NSW",
				"lat" => "-33.108212",
				"lon" => "151.640147"
			],
			[
				"postcode" => "2281",
				"suburb" => "LITTLE PELICAN",
				"state" => "NSW",
				"lat" => "-33.083828",
				"lon" => "151.641633"
			],
			[
				"postcode" => "2281",
				"suburb" => "MIDDLE CAMP",
				"state" => "NSW",
				"lat" => "-33.13447",
				"lon" => "151.626476"
			],
			[
				"postcode" => "2281",
				"suburb" => "MURRAYS BEACH",
				"state" => "NSW",
				"lat" => "-34.927534",
				"lon" => "150.766973"
			],
			[
				"postcode" => "2281",
				"suburb" => "NORDS WHARF",
				"state" => "NSW",
				"lat" => "-33.135175",
				"lon" => "151.603972"
			],
			[
				"postcode" => "2281",
				"suburb" => "PELICAN",
				"state" => "NSW",
				"lat" => "-33.078506",
				"lon" => "151.649587"
			],
			[
				"postcode" => "2281",
				"suburb" => "PINNY BEACH",
				"state" => "NSW",
				"lat" => "-33.132314",
				"lon" => "151.644656"
			],
			[
				"postcode" => "2281",
				"suburb" => "SWANSEA",
				"state" => "NSW",
				"lat" => "-33.089429",
				"lon" => "151.637046"
			],
			[
				"postcode" => "2281",
				"suburb" => "SWANSEA HEADS",
				"state" => "NSW",
				"lat" => "-33.09521",
				"lon" => "151.657053"
			],
			[
				"postcode" => "2282",
				"suburb" => "ELEEBANA",
				"state" => "NSW",
				"lat" => "-32.993626",
				"lon" => "151.635401"
			],
			[
				"postcode" => "2282",
				"suburb" => "LAKELANDS",
				"state" => "NSW",
				"lat" => "-32.961483",
				"lon" => "151.650876"
			],
			[
				"postcode" => "2282",
				"suburb" => "WARNERS BAY",
				"state" => "NSW",
				"lat" => "-32.975418",
				"lon" => "151.644682"
			],
			[
				"postcode" => "2283",
				"suburb" => "ARCADIA VALE",
				"state" => "NSW",
				"lat" => "-33.060343",
				"lon" => "151.575815"
			],
			[
				"postcode" => "2283",
				"suburb" => "AWABA",
				"state" => "NSW",
				"lat" => "-33.007739",
				"lon" => "151.543407"
			],
			[
				"postcode" => "2283",
				"suburb" => "BALMORAL",
				"state" => "NSW",
				"lat" => "-33.047456",
				"lon" => "151.579865"
			],
			[
				"postcode" => "2283",
				"suburb" => "BLACKALLS PARK",
				"state" => "NSW",
				"lat" => "-33.000441",
				"lon" => "151.584635"
			],
			[
				"postcode" => "2283",
				"suburb" => "BOLTON POINT",
				"state" => "NSW",
				"lat" => "-33.000417",
				"lon" => "151.610354"
			],
			[
				"postcode" => "2283",
				"suburb" => "BUTTABA",
				"state" => "NSW",
				"lat" => "-33.050936",
				"lon" => "151.571937"
			],
			[
				"postcode" => "2283",
				"suburb" => "CAREY BAY",
				"state" => "NSW",
				"lat" => "-33.027126",
				"lon" => "151.605836"
			],
			[
				"postcode" => "2283",
				"suburb" => "COAL POINT",
				"state" => "NSW",
				"lat" => "-33.041296",
				"lon" => "151.612172"
			],
			[
				"postcode" => "2283",
				"suburb" => "FASSIFERN",
				"state" => "NSW",
				"lat" => "-32.988368",
				"lon" => "151.583244"
			],
			[
				"postcode" => "2283",
				"suburb" => "FENNELL BAY",
				"state" => "NSW",
				"lat" => "-32.992104",
				"lon" => "151.600093"
			],
			[
				"postcode" => "2283",
				"suburb" => "FISHING POINT",
				"state" => "NSW",
				"lat" => "-33.050652",
				"lon" => "151.590191"
			],
			[
				"postcode" => "2283",
				"suburb" => "KILABEN BAY",
				"state" => "NSW",
				"lat" => "-33.024534",
				"lon" => "151.587294"
			],
			[
				"postcode" => "2283",
				"suburb" => "RATHMINES",
				"state" => "NSW",
				"lat" => "-33.045785",
				"lon" => "151.59415"
			],
			[
				"postcode" => "2283",
				"suburb" => "RYHOPE",
				"state" => "NSW",
				"lat" => "-32.989191",
				"lon" => "151.522302"
			],
			[
				"postcode" => "2283",
				"suburb" => "TORONTO",
				"state" => "NSW",
				"lat" => "-33.01329",
				"lon" => "151.593162"
			],
			[
				"postcode" => "2284",
				"suburb" => "ARGENTON",
				"state" => "NSW",
				"lat" => "-32.934813",
				"lon" => "151.630879"
			],
			[
				"postcode" => "2284",
				"suburb" => "BOOLAROO",
				"state" => "NSW",
				"lat" => "-32.955269",
				"lon" => "151.622332"
			],
			[
				"postcode" => "2284",
				"suburb" => "BOORAGUL",
				"state" => "NSW",
				"lat" => "-32.976125",
				"lon" => "151.60589"
			],
			[
				"postcode" => "2284",
				"suburb" => "MARMONG POINT",
				"state" => "NSW",
				"lat" => "-32.983019",
				"lon" => "151.618115"
			],
			[
				"postcode" => "2284",
				"suburb" => "SPEERS POINT",
				"state" => "NSW",
				"lat" => "-32.973543",
				"lon" => "151.631366"
			],
			[
				"postcode" => "2284",
				"suburb" => "TERALBA",
				"state" => "NSW",
				"lat" => "-32.963727",
				"lon" => "151.605035"
			],
			[
				"postcode" => "2284",
				"suburb" => "WOODRISING",
				"state" => "NSW",
				"lat" => "-32.982483",
				"lon" => "151.605192"
			],
			[
				"postcode" => "2285",
				"suburb" => "CAMERON PARK",
				"state" => "NSW",
				"lat" => "-32.933952",
				"lon" => "151.655731"
			],
			[
				"postcode" => "2285",
				"suburb" => "CARDIFF",
				"state" => "NSW",
				"lat" => "-32.939705",
				"lon" => "151.659343"
			],
			[
				"postcode" => "2285",
				"suburb" => "CARDIFF HEIGHTS",
				"state" => "NSW",
				"lat" => "-32.936219",
				"lon" => "151.672253"
			],
			[
				"postcode" => "2285",
				"suburb" => "CARDIFF SOUTH",
				"state" => "NSW",
				"lat" => "-32.957742",
				"lon" => "151.661447"
			],
			[
				"postcode" => "2285",
				"suburb" => "EDGEWORTH",
				"state" => "NSW",
				"lat" => "-32.923766",
				"lon" => "151.622249"
			],
			[
				"postcode" => "2285",
				"suburb" => "GLENDALE",
				"state" => "NSW",
				"lat" => "-32.926823",
				"lon" => "151.650189"
			],
			[
				"postcode" => "2285",
				"suburb" => "MACQUARIE HILLS",
				"state" => "NSW",
				"lat" => "-32.953151",
				"lon" => "151.647116"
			],
			[
				"postcode" => "2286",
				"suburb" => "HOLMESVILLE",
				"state" => "NSW",
				"lat" => "-32.913661",
				"lon" => "151.576847"
			],
			[
				"postcode" => "2286",
				"suburb" => "SEAHAMPTON",
				"state" => "NSW",
				"lat" => "-32.888493",
				"lon" => "151.580565"
			],
			[
				"postcode" => "2286",
				"suburb" => "WEST WALLSEND",
				"state" => "NSW",
				"lat" => "-32.902476",
				"lon" => "151.582846"
			],
			[
				"postcode" => "2287",
				"suburb" => "BIRMINGHAM GARDENS",
				"state" => "NSW",
				"lat" => "-32.890844",
				"lon" => "151.690829"
			],
			[
				"postcode" => "2287",
				"suburb" => "ELERMORE VALE",
				"state" => "NSW",
				"lat" => "-32.916279",
				"lon" => "151.675532"
			],
			[
				"postcode" => "2287",
				"suburb" => "FLETCHER",
				"state" => "NSW",
				"lat" => "-32.876573",
				"lon" => "151.637463"
			],
			[
				"postcode" => "2287",
				"suburb" => "MARYLAND",
				"state" => "NSW",
				"lat" => "-32.879833",
				"lon" => "151.660453"
			],
			[
				"postcode" => "2287",
				"suburb" => "MINMI",
				"state" => "NSW",
				"lat" => "-32.877152",
				"lon" => "151.617789"
			],
			[
				"postcode" => "2287",
				"suburb" => "RANKIN PARK",
				"state" => "NSW",
				"lat" => "-32.928388",
				"lon" => "151.682894"
			],
			[
				"postcode" => "2287",
				"suburb" => "SUMMER HILL",
				"state" => "NSW",
				"lat" => "-32.478428",
				"lon" => "151.519413"
			],
			[
				"postcode" => "2287",
				"suburb" => "WALLSEND",
				"state" => "NSW",
				"lat" => "-32.904103",
				"lon" => "151.667396"
			],
			[
				"postcode" => "2287",
				"suburb" => "WALLSEND SOUTH",
				"state" => "NSW",
				"lat" => "-32.920748",
				"lon" => "151.675016"
			],
			[
				"postcode" => "2289",
				"suburb" => "ADAMSTOWN",
				"state" => "NSW",
				"lat" => "-32.932538",
				"lon" => "151.72625"
			],
			[
				"postcode" => "2289",
				"suburb" => "ADAMSTOWN HEIGHTS",
				"state" => "NSW",
				"lat" => "-32.950984",
				"lon" => "151.717695"
			],
			[
				"postcode" => "2289",
				"suburb" => "GARDEN SUBURB",
				"state" => "NSW",
				"lat" => "-32.948355",
				"lon" => "151.683365"
			],
			[
				"postcode" => "2289",
				"suburb" => "HIGHFIELDS",
				"state" => "NSW",
				"lat" => "-32.955758",
				"lon" => "151.712668"
			],
			[
				"postcode" => "2289",
				"suburb" => "KOTARA",
				"state" => "NSW",
				"lat" => "-32.93995",
				"lon" => "151.694692"
			],
			[
				"postcode" => "2289",
				"suburb" => "KOTARA SOUTH",
				"state" => "NSW",
				"lat" => "-32.950811",
				"lon" => "151.694264"
			],
			[
				"postcode" => "2290",
				"suburb" => "BENNETTS GREEN",
				"state" => "NSW",
				"lat" => "-32.995468",
				"lon" => "151.689084"
			],
			[
				"postcode" => "2290",
				"suburb" => "CHARLESTOWN",
				"state" => "NSW",
				"lat" => "-32.965671",
				"lon" => "151.695454"
			],
			[
				"postcode" => "2290",
				"suburb" => "DUDLEY",
				"state" => "NSW",
				"lat" => "-32.989684",
				"lon" => "151.71958"
			],
			[
				"postcode" => "2290",
				"suburb" => "GATESHEAD",
				"state" => "NSW",
				"lat" => "-32.989025",
				"lon" => "151.693851"
			],
			[
				"postcode" => "2290",
				"suburb" => "HILLSBOROUGH",
				"state" => "NSW",
				"lat" => "-32.957981",
				"lon" => "151.67229"
			],
			[
				"postcode" => "2290",
				"suburb" => "KAHIBAH",
				"state" => "NSW",
				"lat" => "-32.961795",
				"lon" => "151.712351"
			],
			[
				"postcode" => "2290",
				"suburb" => "MOUNT HUTTON",
				"state" => "NSW",
				"lat" => "-32.985365",
				"lon" => "151.670747"
			],
			[
				"postcode" => "2290",
				"suburb" => "REDHEAD",
				"state" => "NSW",
				"lat" => "-33.013487",
				"lon" => "151.714385"
			],
			[
				"postcode" => "2290",
				"suburb" => "TINGIRA HEIGHTS",
				"state" => "NSW",
				"lat" => "-32.997187",
				"lon" => "151.669719"
			],
			[
				"postcode" => "2290",
				"suburb" => "WHITEBRIDGE",
				"state" => "NSW",
				"lat" => "-32.981227",
				"lon" => "151.711319"
			],
			[
				"postcode" => "2291",
				"suburb" => "MEREWETHER",
				"state" => "NSW",
				"lat" => "-32.942237",
				"lon" => "151.751451"
			],
			[
				"postcode" => "2291",
				"suburb" => "MEREWETHER HEIGHTS",
				"state" => "NSW",
				"lat" => "-32.948242",
				"lon" => "151.736231"
			],
			[
				"postcode" => "2291",
				"suburb" => "THE JUNCTION",
				"state" => "NSW",
				"lat" => "-32.937528",
				"lon" => "151.759625"
			],
			[
				"postcode" => "2292",
				"suburb" => "BROADMEADOW",
				"state" => "NSW",
				"lat" => "-32.924165",
				"lon" => "151.737829"
			],
			[
				"postcode" => "2292",
				"suburb" => "HAMILTON NORTH",
				"state" => "NSW",
				"lat" => "-32.912413",
				"lon" => "151.73779"
			],
			[
				"postcode" => "2293",
				"suburb" => "MARYVILLE",
				"state" => "NSW",
				"lat" => "-32.911844",
				"lon" => "151.753662"
			],
			[
				"postcode" => "2293",
				"suburb" => "WICKHAM",
				"state" => "NSW",
				"lat" => "-32.920973",
				"lon" => "151.76003"
			],
			[
				"postcode" => "2294",
				"suburb" => "CARRINGTON",
				"state" => "NSW",
				"lat" => "-32.916023",
				"lon" => "151.765725"
			],
			[
				"postcode" => "2295",
				"suburb" => "FERN BAY",
				"state" => "NSW",
				"lat" => "-32.854436",
				"lon" => "151.810346"
			],
			[
				"postcode" => "2295",
				"suburb" => "STOCKTON",
				"state" => "NSW",
				"lat" => "-32.91612",
				"lon" => "151.78438"
			],
			[
				"postcode" => "2296",
				"suburb" => "ISLINGTON",
				"state" => "NSW",
				"lat" => "-32.911915",
				"lon" => "151.745721"
			],
			[
				"postcode" => "2297",
				"suburb" => "TIGHES HILL",
				"state" => "NSW",
				"lat" => "-32.908014",
				"lon" => "151.751115"
			],
			[
				"postcode" => "2298",
				"suburb" => "GEORGETOWN",
				"state" => "NSW",
				"lat" => "-32.907814",
				"lon" => "151.7286"
			],
			[
				"postcode" => "2298",
				"suburb" => "WARATAH",
				"state" => "NSW",
				"lat" => "-32.908152",
				"lon" => "151.72722"
			],
			[
				"postcode" => "2298",
				"suburb" => "WARATAH WEST",
				"state" => "NSW",
				"lat" => "-32.89879",
				"lon" => "151.711762"
			],
			[
				"postcode" => "2299",
				"suburb" => "JESMOND",
				"state" => "NSW",
				"lat" => "-32.903131",
				"lon" => "151.690858"
			],
			[
				"postcode" => "2299",
				"suburb" => "LAMBTON",
				"state" => "NSW",
				"lat" => "-32.911447",
				"lon" => "151.707393"
			],
			[
				"postcode" => "2299",
				"suburb" => "NORTH LAMBTON",
				"state" => "NSW",
				"lat" => "-32.90539",
				"lon" => "151.70628"
			],
			[
				"postcode" => "2300",
				"suburb" => "BAR BEACH",
				"state" => "NSW",
				"lat" => "-32.939962",
				"lon" => "151.768383"
			],
			[
				"postcode" => "2300",
				"suburb" => "COOKS HILL",
				"state" => "NSW",
				"lat" => "-32.93413",
				"lon" => "151.769244"
			],
			[
				"postcode" => "2300",
				"suburb" => "NEWCASTLE",
				"state" => "NSW",
				"lat" => "-32.926357",
				"lon" => "151.78122"
			],
			[
				"postcode" => "2300",
				"suburb" => "NEWCASTLE EAST",
				"state" => "NSW",
				"lat" => "-32.927881",
				"lon" => "151.788039"
			],
			[
				"postcode" => "2300",
				"suburb" => "THE HILL",
				"state" => "NSW",
				"lat" => "-32.929808",
				"lon" => "151.777382"
			],
			[
				"postcode" => "2302",
				"suburb" => "NEWCASTLE WEST",
				"state" => "NSW",
				"lat" => "-32.924908",
				"lon" => "151.761141"
			],
			[
				"postcode" => "2303",
				"suburb" => "HAMILTON",
				"state" => "NSW",
				"lat" => "-32.924042",
				"lon" => "151.746874"
			],
			[
				"postcode" => "2303",
				"suburb" => "HAMILTON EAST",
				"state" => "NSW",
				"lat" => "-32.929301",
				"lon" => "151.754137"
			],
			[
				"postcode" => "2303",
				"suburb" => "HAMILTON SOUTH",
				"state" => "NSW",
				"lat" => "-32.934003",
				"lon" => "151.747248"
			],
			[
				"postcode" => "2304",
				"suburb" => "KOORAGANG",
				"state" => "NSW",
				"lat" => "-32.875728",
				"lon" => "151.74598"
			],
			[
				"postcode" => "2304",
				"suburb" => "MAYFIELD",
				"state" => "NSW",
				"lat" => "-32.898847",
				"lon" => "151.738544"
			],
			[
				"postcode" => "2304",
				"suburb" => "MAYFIELD EAST",
				"state" => "NSW",
				"lat" => "-32.900017",
				"lon" => "151.750102"
			],
			[
				"postcode" => "2304",
				"suburb" => "MAYFIELD NORTH",
				"state" => "NSW",
				"lat" => "-32.883841",
				"lon" => "151.739289"
			],
			[
				"postcode" => "2304",
				"suburb" => "MAYFIELD WEST",
				"state" => "NSW",
				"lat" => "-32.890539",
				"lon" => "151.7255"
			],
			[
				"postcode" => "2304",
				"suburb" => "SANDGATE",
				"state" => "NSW",
				"lat" => "-32.867845",
				"lon" => "151.708214"
			],
			[
				"postcode" => "2304",
				"suburb" => "WARABROOK",
				"state" => "NSW",
				"lat" => "-32.887886",
				"lon" => "151.719957"
			],
			[
				"postcode" => "2305",
				"suburb" => "KOTARA EAST",
				"state" => "NSW",
				"lat" => "-32.934986",
				"lon" => "151.707216"
			],
			[
				"postcode" => "2305",
				"suburb" => "NEW LAMBTON",
				"state" => "NSW",
				"lat" => "-32.923932",
				"lon" => "151.713174"
			],
			[
				"postcode" => "2305",
				"suburb" => "NEW LAMBTON HEIGHTS",
				"state" => "NSW",
				"lat" => "-32.932574",
				"lon" => "151.690553"
			],
			[
				"postcode" => "2306",
				"suburb" => "WINDALE",
				"state" => "NSW",
				"lat" => "-32.997694",
				"lon" => "151.681053"
			],
			[
				"postcode" => "2307",
				"suburb" => "SHORTLAND",
				"state" => "NSW",
				"lat" => "-32.880873",
				"lon" => "151.691533"
			],
			[
				"postcode" => "2308",
				"suburb" => "CALLAGHAN",
				"state" => "NSW",
				"lat" => "-35.125235",
				"lon" => "147.322357"
			],
			[
				"postcode" => "2308",
				"suburb" => "NEWCASTLE UNIVERSITY",
				"state" => "NSW",
				"lat" => "-32.890876",
				"lon" => "151.703024"
			],
			[
				"postcode" => "2309",
				"suburb" => "DANGAR",
				"state" => "NSW",
				"lat" => "-30.352158",
				"lon" => "148.890775"
			],
			[
				"postcode" => "2311",
				"suburb" => "ALLYNBROOK",
				"state" => "NSW",
				"lat" => "-32.363343",
				"lon" => "151.536229"
			],
			[
				"postcode" => "2311",
				"suburb" => "BINGLEBURRA",
				"state" => "NSW",
				"lat" => "-32.376234",
				"lon" => "151.615941"
			],
			[
				"postcode" => "2311",
				"suburb" => "CARRABOLLA",
				"state" => "NSW",
				"lat" => "-32.291617",
				"lon" => "151.405936"
			],
			[
				"postcode" => "2311",
				"suburb" => "EAST GRESFORD",
				"state" => "NSW",
				"lat" => "-32.428616",
				"lon" => "151.553227"
			],
			[
				"postcode" => "2311",
				"suburb" => "ECCLESTON",
				"state" => "NSW",
				"lat" => "-32.267959",
				"lon" => "151.490657"
			],
			[
				"postcode" => "2311",
				"suburb" => "GRESFORD",
				"state" => "NSW",
				"lat" => "-32.427031",
				"lon" => "151.537784"
			],
			[
				"postcode" => "2311",
				"suburb" => "HALTON",
				"state" => "NSW",
				"lat" => "-32.315135",
				"lon" => "151.514133"
			],
			[
				"postcode" => "2311",
				"suburb" => "LEWINSBROOK",
				"state" => "NSW",
				"lat" => "-32.442954",
				"lon" => "151.587866"
			],
			[
				"postcode" => "2311",
				"suburb" => "LOSTOCK",
				"state" => "NSW",
				"lat" => "-32.32626",
				"lon" => "151.459683"
			],
			[
				"postcode" => "2311",
				"suburb" => "MOUNT RIVERS",
				"state" => "NSW",
				"lat" => "-32.373161",
				"lon" => "151.488213"
			],
			[
				"postcode" => "2311",
				"suburb" => "UPPER ALLYN",
				"state" => "NSW",
				"lat" => "-32.212331",
				"lon" => "151.50897"
			],
			[
				"postcode" => "2312",
				"suburb" => "MINIMBAH",
				"state" => "NSW",
				"lat" => "-32.148267",
				"lon" => "152.361412"
			],
			[
				"postcode" => "2312",
				"suburb" => "NABIAC",
				"state" => "NSW",
				"lat" => "-32.098694",
				"lon" => "152.377769"
			],
			[
				"postcode" => "2314",
				"suburb" => "WILLIAMTOWN RAAF",
				"state" => "NSW",
				"lat" => "-32.797365",
				"lon" => "151.83699"
			],
			[
				"postcode" => "2315",
				"suburb" => "CORLETTE",
				"state" => "NSW",
				"lat" => "-32.721158",
				"lon" => "152.106782"
			],
			[
				"postcode" => "2315",
				"suburb" => "FINGAL BAY",
				"state" => "NSW",
				"lat" => "-32.748113",
				"lon" => "152.170141"
			],
			[
				"postcode" => "2315",
				"suburb" => "NELSON BAY",
				"state" => "NSW",
				"lat" => "-32.717075",
				"lon" => "152.154863"
			],
			[
				"postcode" => "2315",
				"suburb" => "SHOAL BAY",
				"state" => "NSW",
				"lat" => "-32.724136",
				"lon" => "152.174979"
			],
			[
				"postcode" => "2316",
				"suburb" => "ANNA BAY",
				"state" => "NSW",
				"lat" => "-32.776919",
				"lon" => "152.083274"
			],
			[
				"postcode" => "2316",
				"suburb" => "BOAT HARBOUR",
				"state" => "NSW",
				"lat" => "-32.78842",
				"lon" => "152.109056"
			],
			[
				"postcode" => "2316",
				"suburb" => "BOBS FARM",
				"state" => "NSW",
				"lat" => "-32.767544",
				"lon" => "152.012739"
			],
			[
				"postcode" => "2316",
				"suburb" => "FISHERMANS BAY",
				"state" => "NSW",
				"lat" => "-32.788423",
				"lon" => "152.090407"
			],
			[
				"postcode" => "2316",
				"suburb" => "ONE MILE",
				"state" => "NSW",
				"lat" => "-32.770639",
				"lon" => "152.114949"
			],
			[
				"postcode" => "2316",
				"suburb" => "TAYLORS BEACH",
				"state" => "NSW",
				"lat" => "-32.737002",
				"lon" => "152.05635"
			],
			[
				"postcode" => "2317",
				"suburb" => "SALAMANDER BAY",
				"state" => "NSW",
				"lat" => "-32.720937",
				"lon" => "152.076399"
			],
			[
				"postcode" => "2317",
				"suburb" => "SOLDIERS POINT",
				"state" => "NSW",
				"lat" => "-32.710492",
				"lon" => "152.064758"
			],
			[
				"postcode" => "2318",
				"suburb" => "CAMPVALE",
				"state" => "NSW",
				"lat" => "-32.769906",
				"lon" => "151.851897"
			],
			[
				"postcode" => "2318",
				"suburb" => "FERODALE",
				"state" => "NSW",
				"lat" => "-32.737609",
				"lon" => "151.841618"
			],
			[
				"postcode" => "2318",
				"suburb" => "FULLERTON COVE",
				"state" => "NSW",
				"lat" => "-32.841049",
				"lon" => "151.837968"
			],
			[
				"postcode" => "2318",
				"suburb" => "MEDOWIE",
				"state" => "NSW",
				"lat" => "-32.741486",
				"lon" => "151.86757"
			],
			[
				"postcode" => "2318",
				"suburb" => "OYSTER COVE",
				"state" => "NSW",
				"lat" => "-32.735352",
				"lon" => "151.952662"
			],
			[
				"postcode" => "2318",
				"suburb" => "SALT ASH",
				"state" => "NSW",
				"lat" => "-32.78874",
				"lon" => "151.907238"
			],
			[
				"postcode" => "2318",
				"suburb" => "WILLIAMTOWN",
				"state" => "NSW",
				"lat" => "-32.806831",
				"lon" => "151.844224"
			],
			[
				"postcode" => "2319",
				"suburb" => "LEMON TREE PASSAGE",
				"state" => "NSW",
				"lat" => "-32.730927",
				"lon" => "152.039551"
			],
			[
				"postcode" => "2319",
				"suburb" => "MALLABULA",
				"state" => "NSW",
				"lat" => "-32.72898",
				"lon" => "152.011748"
			],
			[
				"postcode" => "2319",
				"suburb" => "TANILBA BAY",
				"state" => "NSW",
				"lat" => "-32.732589",
				"lon" => "152.002389"
			],
			[
				"postcode" => "2320",
				"suburb" => "ABERGLASSLYN",
				"state" => "NSW",
				"lat" => "-32.694656",
				"lon" => "151.534607"
			],
			[
				"postcode" => "2320",
				"suburb" => "ALLANDALE",
				"state" => "NSW",
				"lat" => "-32.710687",
				"lon" => "151.42353"
			],
			[
				"postcode" => "2320",
				"suburb" => "ANAMBAH",
				"state" => "NSW",
				"lat" => "-32.676068",
				"lon" => "151.495133"
			],
			[
				"postcode" => "2320",
				"suburb" => "BOLWARRA",
				"state" => "NSW",
				"lat" => "-32.712817",
				"lon" => "151.572048"
			],
			[
				"postcode" => "2320",
				"suburb" => "BOLWARRA HEIGHTS",
				"state" => "NSW",
				"lat" => "-32.700579",
				"lon" => "151.584708"
			],
			[
				"postcode" => "2320",
				"suburb" => "FARLEY",
				"state" => "NSW",
				"lat" => "-32.729063",
				"lon" => "151.512185"
			],
			[
				"postcode" => "2320",
				"suburb" => "GLEN OAK",
				"state" => "NSW",
				"lat" => "-32.613853",
				"lon" => "151.70917"
			],
			[
				"postcode" => "2320",
				"suburb" => "GOSFORTH",
				"state" => "NSW",
				"lat" => "-32.656714",
				"lon" => "151.488152"
			],
			[
				"postcode" => "2320",
				"suburb" => "HILLSBOROUGH",
				"state" => "NSW",
				"lat" => "-32.636821",
				"lon" => "151.467756"
			],
			[
				"postcode" => "2320",
				"suburb" => "HORSESHOE BEND",
				"state" => "NSW",
				"lat" => "-32.734708",
				"lon" => "151.572608"
			],
			[
				"postcode" => "2320",
				"suburb" => "KEINBAH",
				"state" => "NSW",
				"lat" => "-32.760031",
				"lon" => "151.399632"
			],
			[
				"postcode" => "2320",
				"suburb" => "LARGS",
				"state" => "NSW",
				"lat" => "-32.702528",
				"lon" => "151.602415"
			],
			[
				"postcode" => "2320",
				"suburb" => "LORN",
				"state" => "NSW",
				"lat" => "-32.728578",
				"lon" => "151.557064"
			],
			[
				"postcode" => "2320",
				"suburb" => "LOUTH PARK",
				"state" => "NSW",
				"lat" => "-32.752138",
				"lon" => "151.55845"
			],
			[
				"postcode" => "2320",
				"suburb" => "MAITLAND",
				"state" => "NSW",
				"lat" => "-32.734714",
				"lon" => "151.558573"
			],
			[
				"postcode" => "2320",
				"suburb" => "MAITLAND NORTH",
				"state" => "NSW",
				"lat" => "-32.714976",
				"lon" => "151.528575"
			],
			[
				"postcode" => "2320",
				"suburb" => "MAITLAND VALE",
				"state" => "NSW",
				"lat" => "-32.677299",
				"lon" => "151.559855"
			],
			[
				"postcode" => "2320",
				"suburb" => "MELVILLE",
				"state" => "NSW",
				"lat" => "-32.687086",
				"lon" => "151.518995"
			],
			[
				"postcode" => "2320",
				"suburb" => "MINDARIBBA",
				"state" => "NSW",
				"lat" => "-32.650468",
				"lon" => "151.588499"
			],
			[
				"postcode" => "2320",
				"suburb" => "MOUNT DEE",
				"state" => "NSW",
				"lat" => "-32.739118",
				"lon" => "151.543831"
			],
			[
				"postcode" => "2320",
				"suburb" => "OAKHAMPTON",
				"state" => "NSW",
				"lat" => "-32.69783",
				"lon" => "151.557322"
			],
			[
				"postcode" => "2320",
				"suburb" => "OAKHAMPTON HEIGHTS",
				"state" => "NSW",
				"lat" => "-32.712551",
				"lon" => "151.554468"
			],
			[
				"postcode" => "2320",
				"suburb" => "POKOLBIN",
				"state" => "NSW",
				"lat" => "-32.771323",
				"lon" => "151.290973"
			],
			[
				"postcode" => "2320",
				"suburb" => "ROSEBROOK",
				"state" => "NSW",
				"lat" => "-32.651493",
				"lon" => "151.511329"
			],
			[
				"postcode" => "2320",
				"suburb" => "ROTHBURY",
				"state" => "NSW",
				"lat" => "-32.737997",
				"lon" => "151.3317"
			],
			[
				"postcode" => "2320",
				"suburb" => "RUTHERFORD",
				"state" => "NSW",
				"lat" => "-32.716413",
				"lon" => "151.527921"
			],
			[
				"postcode" => "2320",
				"suburb" => "SOUTH MAITLAND",
				"state" => "NSW",
				"lat" => "-32.742294",
				"lon" => "151.566213"
			],
			[
				"postcode" => "2320",
				"suburb" => "TELARAH",
				"state" => "NSW",
				"lat" => "-32.729499",
				"lon" => "151.536856"
			],
			[
				"postcode" => "2320",
				"suburb" => "WALLALONG",
				"state" => "NSW",
				"lat" => "-32.696224",
				"lon" => "151.649868"
			],
			[
				"postcode" => "2320",
				"suburb" => "WINDELLA",
				"state" => "NSW",
				"lat" => "-32.696956",
				"lon" => "151.48097"
			],
			[
				"postcode" => "2321",
				"suburb" => "BERRY PARK",
				"state" => "NSW",
				"lat" => "-32.755266",
				"lon" => "151.650248"
			],
			[
				"postcode" => "2321",
				"suburb" => "BUTTERWICK",
				"state" => "NSW",
				"lat" => "-32.658257",
				"lon" => "151.639005"
			],
			[
				"postcode" => "2321",
				"suburb" => "CLARENCE TOWN",
				"state" => "NSW",
				"lat" => "-32.583661",
				"lon" => "151.779596"
			],
			[
				"postcode" => "2321",
				"suburb" => "CLIFTLEIGH",
				"state" => "NSW",
				"lat" => "-32.784916",
				"lon" => "151.523259"
			],
			[
				"postcode" => "2321",
				"suburb" => "DUCKENFIELD",
				"state" => "NSW",
				"lat" => "-32.740212",
				"lon" => "151.684977"
			],
			[
				"postcode" => "2321",
				"suburb" => "DUNS CREEK",
				"state" => "NSW",
				"lat" => "-32.580313",
				"lon" => "151.78275"
			],
			[
				"postcode" => "2321",
				"suburb" => "GILLIESTON HEIGHTS",
				"state" => "NSW",
				"lat" => "-32.766353",
				"lon" => "151.527365"
			],
			[
				"postcode" => "2321",
				"suburb" => "GLEN MARTIN",
				"state" => "NSW",
				"lat" => "-32.53878",
				"lon" => "151.825623"
			],
			[
				"postcode" => "2321",
				"suburb" => "GLEN WILLIAM",
				"state" => "NSW",
				"lat" => "-32.521508",
				"lon" => "151.79757"
			],
			[
				"postcode" => "2321",
				"suburb" => "HARPERS HILL",
				"state" => "NSW",
				"lat" => "-32.700507",
				"lon" => "151.412711"
			],
			[
				"postcode" => "2321",
				"suburb" => "HEDDON GRETA",
				"state" => "NSW",
				"lat" => "-32.804507",
				"lon" => "151.509565"
			],
			[
				"postcode" => "2321",
				"suburb" => "HINTON",
				"state" => "NSW",
				"lat" => "-32.716588",
				"lon" => "151.651388"
			],
			[
				"postcode" => "2321",
				"suburb" => "LOCHINVAR",
				"state" => "NSW",
				"lat" => "-32.699039",
				"lon" => "151.45479"
			],
			[
				"postcode" => "2321",
				"suburb" => "LUSKINTYRE",
				"state" => "NSW",
				"lat" => "-32.64939",
				"lon" => "151.431085"
			],
			[
				"postcode" => "2321",
				"suburb" => "MORPETH",
				"state" => "NSW",
				"lat" => "-32.724882",
				"lon" => "151.626663"
			],
			[
				"postcode" => "2321",
				"suburb" => "OSWALD",
				"state" => "NSW",
				"lat" => "-32.702548",
				"lon" => "151.421295"
			],
			[
				"postcode" => "2321",
				"suburb" => "PHOENIX PARK",
				"state" => "NSW",
				"lat" => "-32.709593",
				"lon" => "151.629529"
			],
			[
				"postcode" => "2321",
				"suburb" => "RAWORTH",
				"state" => "NSW",
				"lat" => "-32.735981",
				"lon" => "151.607064"
			],
			[
				"postcode" => "2321",
				"suburb" => "WOODVILLE",
				"state" => "NSW",
				"lat" => "-32.676183",
				"lon" => "151.60995"
			],
			[
				"postcode" => "2322",
				"suburb" => "BERESFIELD",
				"state" => "NSW",
				"lat" => "-32.801094",
				"lon" => "151.657881"
			],
			[
				"postcode" => "2322",
				"suburb" => "BLACK HILL",
				"state" => "NSW",
				"lat" => "-32.823598",
				"lon" => "151.583655"
			],
			[
				"postcode" => "2322",
				"suburb" => "HEXHAM",
				"state" => "NSW",
				"lat" => "-32.830649",
				"lon" => "151.685483"
			],
			[
				"postcode" => "2322",
				"suburb" => "LENAGHAN",
				"state" => "NSW",
				"lat" => "-32.849201",
				"lon" => "151.627282"
			],
			[
				"postcode" => "2322",
				"suburb" => "STOCKRINGTON",
				"state" => "NSW",
				"lat" => "-32.861825",
				"lon" => "151.60608"
			],
			[
				"postcode" => "2322",
				"suburb" => "TARRO",
				"state" => "NSW",
				"lat" => "-32.808847",
				"lon" => "151.668182"
			],
			[
				"postcode" => "2322",
				"suburb" => "THORNTON",
				"state" => "NSW",
				"lat" => "-32.776905",
				"lon" => "151.638803"
			],
			[
				"postcode" => "2322",
				"suburb" => "TOMAGO",
				"state" => "NSW",
				"lat" => "-32.818383",
				"lon" => "151.757485"
			],
			[
				"postcode" => "2322",
				"suburb" => "WOODBERRY",
				"state" => "NSW",
				"lat" => "-32.793692",
				"lon" => "151.665395"
			],
			[
				"postcode" => "2323",
				"suburb" => "ASHTONFIELD",
				"state" => "NSW",
				"lat" => "-32.77382",
				"lon" => "151.601"
			],
			[
				"postcode" => "2323",
				"suburb" => "BRUNKERVILLE",
				"state" => "NSW",
				"lat" => "-32.948838",
				"lon" => "151.478758"
			],
			[
				"postcode" => "2323",
				"suburb" => "BUCHANAN",
				"state" => "NSW",
				"lat" => "-32.825353",
				"lon" => "151.529302"
			],
			[
				"postcode" => "2323",
				"suburb" => "BUTTAI",
				"state" => "NSW",
				"lat" => "-32.819352",
				"lon" => "151.56066"
			],
			[
				"postcode" => "2323",
				"suburb" => "EAST MAITLAND",
				"state" => "NSW",
				"lat" => "-32.75112",
				"lon" => "151.589963"
			],
			[
				"postcode" => "2323",
				"suburb" => "FREEMANS WATERHOLE",
				"state" => "NSW",
				"lat" => "-32.981679",
				"lon" => "151.483971"
			],
			[
				"postcode" => "2323",
				"suburb" => "GREEN HILLS",
				"state" => "NSW",
				"lat" => "-30.298341",
				"lon" => "151.801542"
			],
			[
				"postcode" => "2323",
				"suburb" => "METFORD",
				"state" => "NSW",
				"lat" => "-32.765913",
				"lon" => "151.6092"
			],
			[
				"postcode" => "2323",
				"suburb" => "MOUNT VINCENT",
				"state" => "NSW",
				"lat" => "-32.917382",
				"lon" => "151.477444"
			],
			[
				"postcode" => "2323",
				"suburb" => "MULBRING",
				"state" => "NSW",
				"lat" => "-32.900377",
				"lon" => "151.483"
			],
			[
				"postcode" => "2323",
				"suburb" => "PITNACREE",
				"state" => "NSW",
				"lat" => "-32.730455",
				"lon" => "151.593483"
			],
			[
				"postcode" => "2323",
				"suburb" => "RICHMOND VALE",
				"state" => "NSW",
				"lat" => "-32.871313",
				"lon" => "151.478622"
			],
			[
				"postcode" => "2323",
				"suburb" => "TENAMBIT",
				"state" => "NSW",
				"lat" => "-32.743257",
				"lon" => "151.604325"
			],
			[
				"postcode" => "2324",
				"suburb" => "BALICKERA",
				"state" => "NSW",
				"lat" => "-32.673022",
				"lon" => "151.805367"
			],
			[
				"postcode" => "2324",
				"suburb" => "BRANDY HILL",
				"state" => "NSW",
				"lat" => "-32.693797",
				"lon" => "151.694171"
			],
			[
				"postcode" => "2324",
				"suburb" => "BUNDABAH",
				"state" => "NSW",
				"lat" => "-32.662213",
				"lon" => "152.074063"
			],
			[
				"postcode" => "2324",
				"suburb" => "CARRINGTON",
				"state" => "NSW",
				"lat" => "-32.664342",
				"lon" => "152.018722"
			],
			[
				"postcode" => "2324",
				"suburb" => "CELLS RIVER",
				"state" => "NSW",
				"lat" => "-31.553043",
				"lon" => "152.062941"
			],
			[
				"postcode" => "2324",
				"suburb" => "EAGLETON",
				"state" => "NSW",
				"lat" => "-32.698008",
				"lon" => "151.756421"
			],
			[
				"postcode" => "2324",
				"suburb" => "EAST SEAHAM",
				"state" => "NSW",
				"lat" => "-32.665424",
				"lon" => "151.741458"
			],
			[
				"postcode" => "2324",
				"suburb" => "HAWKS NEST",
				"state" => "NSW",
				"lat" => "-32.671611",
				"lon" => "152.177506"
			],
			[
				"postcode" => "2324",
				"suburb" => "HEATHERBRAE",
				"state" => "NSW",
				"lat" => "-32.787426",
				"lon" => "151.732386"
			],
			[
				"postcode" => "2324",
				"suburb" => "KARUAH",
				"state" => "NSW",
				"lat" => "-32.654064",
				"lon" => "151.961443"
			],
			[
				"postcode" => "2324",
				"suburb" => "LIMEBURNERS CREEK",
				"state" => "NSW",
				"lat" => "-32.589168",
				"lon" => "151.907551"
			],
			[
				"postcode" => "2324",
				"suburb" => "MILLERS FOREST",
				"state" => "NSW",
				"lat" => "-32.763539",
				"lon" => "151.702595"
			],
			[
				"postcode" => "2324",
				"suburb" => "NELSONS PLAINS",
				"state" => "NSW",
				"lat" => "-32.702329",
				"lon" => "151.710584"
			],
			[
				"postcode" => "2324",
				"suburb" => "NORTH ARM COVE",
				"state" => "NSW",
				"lat" => "-32.65912",
				"lon" => "152.037583"
			],
			[
				"postcode" => "2324",
				"suburb" => "OSTERLEY",
				"state" => "NSW",
				"lat" => "-32.724756",
				"lon" => "151.700846"
			],
			[
				"postcode" => "2324",
				"suburb" => "PINDIMAR",
				"state" => "NSW",
				"lat" => "-32.684153",
				"lon" => "152.098138"
			],
			[
				"postcode" => "2324",
				"suburb" => "RAYMOND TERRACE",
				"state" => "NSW",
				"lat" => "-32.765051",
				"lon" => "151.743023"
			],
			[
				"postcode" => "2324",
				"suburb" => "RAYMOND TERRACE EAST",
				"state" => "NSW",
				"lat" => "-32.760671",
				"lon" => "151.776788"
			],
			[
				"postcode" => "2324",
				"suburb" => "SEAHAM",
				"state" => "NSW",
				"lat" => "-32.657672",
				"lon" => "151.721912"
			],
			[
				"postcode" => "2324",
				"suburb" => "SWAN BAY",
				"state" => "NSW",
				"lat" => "-32.702421",
				"lon" => "151.965498"
			],
			[
				"postcode" => "2324",
				"suburb" => "TAHLEE",
				"state" => "NSW",
				"lat" => "-32.667511",
				"lon" => "152.004792"
			],
			[
				"postcode" => "2324",
				"suburb" => "TEA GARDENS",
				"state" => "NSW",
				"lat" => "-32.667386",
				"lon" => "152.160372"
			],
			[
				"postcode" => "2324",
				"suburb" => "TWELVE MILE CREEK",
				"state" => "NSW",
				"lat" => "-32.635386",
				"lon" => "151.871462"
			],
			[
				"postcode" => "2325",
				"suburb" => "ABERDARE",
				"state" => "NSW",
				"lat" => "-32.8442",
				"lon" => "151.376514"
			],
			[
				"postcode" => "2325",
				"suburb" => "ABERNETHY",
				"state" => "NSW",
				"lat" => "-32.883242",
				"lon" => "151.396677"
			],
			[
				"postcode" => "2325",
				"suburb" => "BELLBIRD",
				"state" => "NSW",
				"lat" => "-32.859961",
				"lon" => "151.317661"
			],
			[
				"postcode" => "2325",
				"suburb" => "BELLBIRD HEIGHTS",
				"state" => "NSW",
				"lat" => "-32.84801",
				"lon" => "151.329529"
			],
			[
				"postcode" => "2325",
				"suburb" => "BOREE",
				"state" => "NSW",
				"lat" => "-33.062394",
				"lon" => "151.021701"
			],
			[
				"postcode" => "2325",
				"suburb" => "CEDAR CREEK",
				"state" => "NSW",
				"lat" => "-32.865953",
				"lon" => "151.191636"
			],
			[
				"postcode" => "2325",
				"suburb" => "CESSNOCK",
				"state" => "NSW",
				"lat" => "-32.832943",
				"lon" => "151.353993"
			],
			[
				"postcode" => "2325",
				"suburb" => "CESSNOCK WEST",
				"state" => "NSW",
				"lat" => "-32.840026",
				"lon" => "151.341115"
			],
			[
				"postcode" => "2325",
				"suburb" => "CONGEWAI",
				"state" => "NSW",
				"lat" => "-32.996509",
				"lon" => "151.301843"
			],
			[
				"postcode" => "2325",
				"suburb" => "CORRABARE",
				"state" => "NSW",
				"lat" => "-32.959255",
				"lon" => "151.238952"
			],
			[
				"postcode" => "2325",
				"suburb" => "ELLALONG",
				"state" => "NSW",
				"lat" => "-32.912261",
				"lon" => "151.311291"
			],
			[
				"postcode" => "2325",
				"suburb" => "ELRINGTON",
				"state" => "NSW",
				"lat" => "-32.869859",
				"lon" => "151.425092"
			],
			[
				"postcode" => "2325",
				"suburb" => "GRETA MAIN",
				"state" => "NSW",
				"lat" => "-32.888482",
				"lon" => "151.284361"
			],
			[
				"postcode" => "2325",
				"suburb" => "KEARSLEY",
				"state" => "NSW",
				"lat" => "-32.858649",
				"lon" => "151.395667"
			],
			[
				"postcode" => "2325",
				"suburb" => "KITCHENER",
				"state" => "NSW",
				"lat" => "-32.879602",
				"lon" => "151.36667"
			],
			[
				"postcode" => "2325",
				"suburb" => "LAGUNA",
				"state" => "NSW",
				"lat" => "-32.994585",
				"lon" => "151.127788"
			],
			[
				"postcode" => "2325",
				"suburb" => "LOVEDALE",
				"state" => "NSW",
				"lat" => "-32.772453",
				"lon" => "151.384846"
			],
			[
				"postcode" => "2325",
				"suburb" => "MILLFIELD",
				"state" => "NSW",
				"lat" => "-32.888506",
				"lon" => "151.264273"
			],
			[
				"postcode" => "2325",
				"suburb" => "MORUBEN",
				"state" => "NSW",
				"lat" => "-33.052927",
				"lon" => "150.889563"
			],
			[
				"postcode" => "2325",
				"suburb" => "MOUNT VIEW",
				"state" => "NSW",
				"lat" => "-32.852431",
				"lon" => "151.270297"
			],
			[
				"postcode" => "2325",
				"suburb" => "NULKABA",
				"state" => "NSW",
				"lat" => "-32.809622",
				"lon" => "151.349641"
			],
			[
				"postcode" => "2325",
				"suburb" => "OLNEY",
				"state" => "NSW",
				"lat" => "-33.03347",
				"lon" => "151.293808"
			],
			[
				"postcode" => "2325",
				"suburb" => "PAXTON",
				"state" => "NSW",
				"lat" => "-32.902045",
				"lon" => "151.279669"
			],
			[
				"postcode" => "2325",
				"suburb" => "PAYNES CROSSING",
				"state" => "NSW",
				"lat" => "-32.885782",
				"lon" => "151.102746"
			],
			[
				"postcode" => "2325",
				"suburb" => "PELTON",
				"state" => "NSW",
				"lat" => "-32.879521",
				"lon" => "151.301339"
			],
			[
				"postcode" => "2325",
				"suburb" => "QUORROBOLONG",
				"state" => "NSW",
				"lat" => "-32.92247",
				"lon" => "151.363966"
			],
			[
				"postcode" => "2325",
				"suburb" => "SWEETMANS CREEK",
				"state" => "NSW",
				"lat" => "-32.888045",
				"lon" => "151.190697"
			],
			[
				"postcode" => "2325",
				"suburb" => "WOLLOMBI",
				"state" => "NSW",
				"lat" => "-32.9376",
				"lon" => "151.142665"
			],
			[
				"postcode" => "2326",
				"suburb" => "ABERMAIN",
				"state" => "NSW",
				"lat" => "-32.810815",
				"lon" => "151.428668"
			],
			[
				"postcode" => "2326",
				"suburb" => "BISHOPS BRIDGE",
				"state" => "NSW",
				"lat" => "-32.746391",
				"lon" => "151.467064"
			],
			[
				"postcode" => "2326",
				"suburb" => "LOXFORD",
				"state" => "NSW",
				"lat" => "-32.797774",
				"lon" => "151.482992"
			],
			[
				"postcode" => "2326",
				"suburb" => "NEATH",
				"state" => "NSW",
				"lat" => "-32.827058",
				"lon" => "151.408291"
			],
			[
				"postcode" => "2326",
				"suburb" => "SAWYERS GULLY",
				"state" => "NSW",
				"lat" => "-32.769359",
				"lon" => "151.437112"
			],
			[
				"postcode" => "2326",
				"suburb" => "WESTON",
				"state" => "NSW",
				"lat" => "-32.813899",
				"lon" => "151.459018"
			],
			[
				"postcode" => "2327",
				"suburb" => "KURRI KURRI",
				"state" => "NSW",
				"lat" => "-32.817312",
				"lon" => "151.482952"
			],
			[
				"postcode" => "2327",
				"suburb" => "PELAW MAIN",
				"state" => "NSW",
				"lat" => "-32.833664",
				"lon" => "151.480398"
			],
			[
				"postcode" => "2327",
				"suburb" => "STANFORD MERTHYR",
				"state" => "NSW",
				"lat" => "-32.825065",
				"lon" => "151.493709"
			],
			[
				"postcode" => "2328",
				"suburb" => "BUREEN",
				"state" => "NSW",
				"lat" => "-32.457341",
				"lon" => "150.741969"
			],
			[
				"postcode" => "2328",
				"suburb" => "DALSWINTON",
				"state" => "NSW",
				"lat" => "-32.417614",
				"lon" => "150.701753"
			],
			[
				"postcode" => "2328",
				"suburb" => "DENMAN",
				"state" => "NSW",
				"lat" => "-32.389403",
				"lon" => "150.686422"
			],
			[
				"postcode" => "2328",
				"suburb" => "GIANTS CREEK",
				"state" => "NSW",
				"lat" => "-32.3264",
				"lon" => "150.548403"
			],
			[
				"postcode" => "2328",
				"suburb" => "HOLLYDEEN",
				"state" => "NSW",
				"lat" => "-32.33281",
				"lon" => "150.618599"
			],
			[
				"postcode" => "2328",
				"suburb" => "KERRABEE",
				"state" => "NSW",
				"lat" => "-32.424077",
				"lon" => "150.309048"
			],
			[
				"postcode" => "2328",
				"suburb" => "MANGOOLA",
				"state" => "NSW",
				"lat" => "-32.331601",
				"lon" => "150.73005"
			],
			[
				"postcode" => "2328",
				"suburb" => "MARTINDALE",
				"state" => "NSW",
				"lat" => "-32.454407",
				"lon" => "150.67"
			],
			[
				"postcode" => "2328",
				"suburb" => "WIDDEN",
				"state" => "NSW",
				"lat" => "-32.462139",
				"lon" => "150.390199"
			],
			[
				"postcode" => "2328",
				"suburb" => "YARRAWA",
				"state" => "NSW",
				"lat" => "-32.401201",
				"lon" => "150.586633"
			],
			[
				"postcode" => "2329",
				"suburb" => "BORAMBIL",
				"state" => "NSW",
				"lat" => "-31.50643",
				"lon" => "150.642146"
			],
			[
				"postcode" => "2329",
				"suburb" => "CASSILIS",
				"state" => "NSW",
				"lat" => "-32.007883",
				"lon" => "149.980435"
			],
			[
				"postcode" => "2329",
				"suburb" => "MERRIWA",
				"state" => "NSW",
				"lat" => "-32.139419",
				"lon" => "150.355719"
			],
			[
				"postcode" => "2329",
				"suburb" => "UARBRY",
				"state" => "NSW",
				"lat" => "-32.047263",
				"lon" => "149.765034"
			],
			[
				"postcode" => "2330",
				"suburb" => "APPLETREE FLAT",
				"state" => "NSW",
				"lat" => "-32.512305",
				"lon" => "150.864848"
			],
			[
				"postcode" => "2330",
				"suburb" => "BIG RIDGE",
				"state" => "NSW",
				"lat" => "-32.581942",
				"lon" => "151.223277"
			],
			[
				"postcode" => "2330",
				"suburb" => "BIG YENGO",
				"state" => "NSW",
				"lat" => "-32.975222",
				"lon" => "151.013495"
			],
			[
				"postcode" => "2330",
				"suburb" => "BOWMANS CREEK",
				"state" => "NSW",
				"lat" => "-32.282912",
				"lon" => "151.113873"
			],
			[
				"postcode" => "2330",
				"suburb" => "BRIDGMAN",
				"state" => "NSW",
				"lat" => "-32.437932",
				"lon" => "151.151748"
			],
			[
				"postcode" => "2330",
				"suburb" => "BROKE",
				"state" => "NSW",
				"lat" => "-32.751222",
				"lon" => "151.103474"
			],
			[
				"postcode" => "2330",
				"suburb" => "BULGA",
				"state" => "NSW",
				"lat" => "-32.644624",
				"lon" => "151.03792"
			],
			[
				"postcode" => "2330",
				"suburb" => "CAMBERWELL",
				"state" => "NSW",
				"lat" => "-32.479701",
				"lon" => "151.092002"
			],
			[
				"postcode" => "2330",
				"suburb" => "CARROWBROOK",
				"state" => "NSW",
				"lat" => "-32.270899",
				"lon" => "151.306284"
			],
			[
				"postcode" => "2330",
				"suburb" => "CLYDESDALE",
				"state" => "NSW",
				"lat" => "-32.570928",
				"lon" => "151.214234"
			],
			[
				"postcode" => "2330",
				"suburb" => "COMBO",
				"state" => "NSW",
				"lat" => "-32.554627",
				"lon" => "151.18248"
			],
			[
				"postcode" => "2330",
				"suburb" => "DARLINGTON",
				"state" => "NSW",
				"lat" => "-32.558283",
				"lon" => "151.159556"
			],
			[
				"postcode" => "2330",
				"suburb" => "DOYLES CREEK",
				"state" => "NSW",
				"lat" => "-32.51643",
				"lon" => "150.804343"
			],
			[
				"postcode" => "2330",
				"suburb" => "DUNOLLY",
				"state" => "NSW",
				"lat" => "-32.559609",
				"lon" => "151.166703"
			],
			[
				"postcode" => "2330",
				"suburb" => "DURAL",
				"state" => "NSW",
				"lat" => "-32.568858",
				"lon" => "150.843642"
			],
			[
				"postcode" => "2330",
				"suburb" => "DYRRING",
				"state" => "NSW",
				"lat" => "-32.490355",
				"lon" => "151.233795"
			],
			[
				"postcode" => "2330",
				"suburb" => "FALBROOK",
				"state" => "NSW",
				"lat" => "-32.408245",
				"lon" => "151.141179"
			],
			[
				"postcode" => "2330",
				"suburb" => "FERN GULLY",
				"state" => "NSW",
				"lat" => "-32.554319",
				"lon" => "151.198916"
			],
			[
				"postcode" => "2330",
				"suburb" => "FORDWICH",
				"state" => "NSW",
				"lat" => "-32.70997",
				"lon" => "151.061673"
			],
			[
				"postcode" => "2330",
				"suburb" => "GARLAND VALLEY",
				"state" => "NSW",
				"lat" => "-32.922725",
				"lon" => "150.72052"
			],
			[
				"postcode" => "2330",
				"suburb" => "GLENDON",
				"state" => "NSW",
				"lat" => "-32.586672",
				"lon" => "151.279715"
			],
			[
				"postcode" => "2330",
				"suburb" => "GLENNIES CREEK",
				"state" => "NSW",
				"lat" => "-32.457424",
				"lon" => "151.111864"
			],
			[
				"postcode" => "2330",
				"suburb" => "GLENRIDDING",
				"state" => "NSW",
				"lat" => "-32.581778",
				"lon" => "151.157167"
			],
			[
				"postcode" => "2330",
				"suburb" => "GOORANGOOLA",
				"state" => "NSW",
				"lat" => "-32.292105",
				"lon" => "151.175339"
			],
			[
				"postcode" => "2330",
				"suburb" => "GOULDSVILLE",
				"state" => "NSW",
				"lat" => "-32.573642",
				"lon" => "151.090647"
			],
			[
				"postcode" => "2330",
				"suburb" => "GOWRIE",
				"state" => "NSW",
				"lat" => "-32.560224",
				"lon" => "151.144183"
			],
			[
				"postcode" => "2330",
				"suburb" => "GREENLANDS",
				"state" => "NSW",
				"lat" => "-32.392346",
				"lon" => "151.173823"
			],
			[
				"postcode" => "2330",
				"suburb" => "HAMBLEDON HILL",
				"state" => "NSW",
				"lat" => "-32.59765",
				"lon" => "151.123201"
			],
			[
				"postcode" => "2330",
				"suburb" => "HEBDEN",
				"state" => "NSW",
				"lat" => "-32.385723",
				"lon" => "151.064804"
			],
			[
				"postcode" => "2330",
				"suburb" => "HOWES VALLEY",
				"state" => "NSW",
				"lat" => "-32.844284",
				"lon" => "150.835756"
			],
			[
				"postcode" => "2330",
				"suburb" => "HOWICK",
				"state" => "NSW",
				"lat" => "-32.416319",
				"lon" => "150.966022"
			],
			[
				"postcode" => "2330",
				"suburb" => "HUNTERVIEW",
				"state" => "NSW",
				"lat" => "-32.544357",
				"lon" => "151.173899"
			],
			[
				"postcode" => "2330",
				"suburb" => "JERRYS PLAINS",
				"state" => "NSW",
				"lat" => "-32.491864",
				"lon" => "150.904925"
			],
			[
				"postcode" => "2330",
				"suburb" => "LEMINGTON",
				"state" => "NSW",
				"lat" => "-32.489404",
				"lon" => "150.973392"
			],
			[
				"postcode" => "2330",
				"suburb" => "LONG POINT",
				"state" => "NSW",
				"lat" => "-32.568903",
				"lon" => "151.109612"
			],
			[
				"postcode" => "2330",
				"suburb" => "MAISON DIEU",
				"state" => "NSW",
				"lat" => "-32.535177",
				"lon" => "151.094293"
			],
			[
				"postcode" => "2330",
				"suburb" => "MCDOUGALLS HILL",
				"state" => "NSW",
				"lat" => "-32.551514",
				"lon" => "151.152271"
			],
			[
				"postcode" => "2330",
				"suburb" => "MIDDLE FALBROOK",
				"state" => "NSW",
				"lat" => "-32.449636",
				"lon" => "151.149698"
			],
			[
				"postcode" => "2330",
				"suburb" => "MILBRODALE",
				"state" => "NSW",
				"lat" => "-32.696346",
				"lon" => "150.979002"
			],
			[
				"postcode" => "2330",
				"suburb" => "MIRANNIE",
				"state" => "NSW",
				"lat" => "-32.396608",
				"lon" => "151.377575"
			],
			[
				"postcode" => "2330",
				"suburb" => "MITCHELLS FLAT",
				"state" => "NSW",
				"lat" => "-32.558246",
				"lon" => "151.288741"
			],
			[
				"postcode" => "2330",
				"suburb" => "MOUNT OLIVE",
				"state" => "NSW",
				"lat" => "-32.387126",
				"lon" => "151.227392"
			],
			[
				"postcode" => "2330",
				"suburb" => "MOUNT ROYAL",
				"state" => "NSW",
				"lat" => "-32.234247",
				"lon" => "151.256831"
			],
			[
				"postcode" => "2330",
				"suburb" => "MOUNT THORLEY",
				"state" => "NSW",
				"lat" => "-32.619373",
				"lon" => "151.10295"
			],
			[
				"postcode" => "2330",
				"suburb" => "OBANVALE",
				"state" => "NSW",
				"lat" => "-32.507843",
				"lon" => "151.167327"
			],
			[
				"postcode" => "2330",
				"suburb" => "PUTTY",
				"state" => "NSW",
				"lat" => "-32.969803",
				"lon" => "150.674177"
			],
			[
				"postcode" => "2330",
				"suburb" => "RAVENSWORTH",
				"state" => "NSW",
				"lat" => "-32.443258",
				"lon" => "151.054961"
			],
			[
				"postcode" => "2330",
				"suburb" => "REDBOURNBERRY",
				"state" => "NSW",
				"lat" => "-32.560421",
				"lon" => "151.18943"
			],
			[
				"postcode" => "2330",
				"suburb" => "REEDY CREEK",
				"state" => "NSW",
				"lat" => "-32.484279",
				"lon" => "151.334603"
			],
			[
				"postcode" => "2330",
				"suburb" => "RIXS CREEK",
				"state" => "NSW",
				"lat" => "-32.525523",
				"lon" => "151.134221"
			],
			[
				"postcode" => "2330",
				"suburb" => "ROUGHIT",
				"state" => "NSW",
				"lat" => "-32.566895",
				"lon" => "151.25113"
			],
			[
				"postcode" => "2330",
				"suburb" => "SCOTTS FLAT",
				"state" => "NSW",
				"lat" => "-32.6124",
				"lon" => "151.242339"
			],
			[
				"postcode" => "2330",
				"suburb" => "SEDGEFIELD",
				"state" => "NSW",
				"lat" => "-32.54412",
				"lon" => "151.244895"
			],
			[
				"postcode" => "2330",
				"suburb" => "SINGLETON",
				"state" => "NSW",
				"lat" => "-32.564025",
				"lon" => "151.168367"
			],
			[
				"postcode" => "2330",
				"suburb" => "SINGLETON HEIGHTS",
				"state" => "NSW",
				"lat" => "-32.546727",
				"lon" => "151.162145"
			],
			[
				"postcode" => "2330",
				"suburb" => "ST CLAIR",
				"state" => "NSW",
				"lat" => "-32.341363",
				"lon" => "151.294669"
			],
			[
				"postcode" => "2330",
				"suburb" => "WARKWORTH",
				"state" => "NSW",
				"lat" => "-32.548788",
				"lon" => "151.010847"
			],
			[
				"postcode" => "2330",
				"suburb" => "WATTLE PONDS",
				"state" => "NSW",
				"lat" => "-32.516603",
				"lon" => "151.180978"
			],
			[
				"postcode" => "2330",
				"suburb" => "WESTBROOK",
				"state" => "NSW",
				"lat" => "-32.457122",
				"lon" => "151.299766"
			],
			[
				"postcode" => "2330",
				"suburb" => "WHITTINGHAM",
				"state" => "NSW",
				"lat" => "-32.604494",
				"lon" => "151.201067"
			],
			[
				"postcode" => "2330",
				"suburb" => "WOLLEMI",
				"state" => "NSW",
				"lat" => "-32.989358",
				"lon" => "150.375863"
			],
			[
				"postcode" => "2330",
				"suburb" => "WYLIES FLAT",
				"state" => "NSW",
				"lat" => "-32.580782",
				"lon" => "151.127733"
			],
			[
				"postcode" => "2331",
				"suburb" => "SINGLETON MILITARY AREA",
				"state" => "NSW",
				"lat" => "-32.688569",
				"lon" => "151.180153"
			],
			[
				"postcode" => "2333",
				"suburb" => "BAERAMI",
				"state" => "NSW",
				"lat" => "-32.389105",
				"lon" => "150.470217"
			],
			[
				"postcode" => "2333",
				"suburb" => "BAERAMI CREEK",
				"state" => "NSW",
				"lat" => "-32.520217",
				"lon" => "150.454381"
			],
			[
				"postcode" => "2333",
				"suburb" => "BENGALLA",
				"state" => "NSW",
				"lat" => "-32.275835",
				"lon" => "150.83798"
			],
			[
				"postcode" => "2333",
				"suburb" => "CASTLE ROCK",
				"state" => "NSW",
				"lat" => "-32.210062",
				"lon" => "150.732863"
			],
			[
				"postcode" => "2333",
				"suburb" => "EDDERTON",
				"state" => "NSW",
				"lat" => "-32.380998",
				"lon" => "150.822205"
			],
			[
				"postcode" => "2333",
				"suburb" => "GUNGAL",
				"state" => "NSW",
				"lat" => "-32.225912",
				"lon" => "150.469254"
			],
			[
				"postcode" => "2333",
				"suburb" => "KAYUGA",
				"state" => "NSW",
				"lat" => "-32.206995",
				"lon" => "150.869014"
			],
			[
				"postcode" => "2333",
				"suburb" => "LIDDELL",
				"state" => "NSW",
				"lat" => "-32.402764",
				"lon" => "151.018323"
			],
			[
				"postcode" => "2333",
				"suburb" => "MANOBALAI",
				"state" => "NSW",
				"lat" => "-32.215821",
				"lon" => "150.672754"
			],
			[
				"postcode" => "2333",
				"suburb" => "MCCULLYS GAP",
				"state" => "NSW",
				"lat" => "-32.202913",
				"lon" => "150.978704"
			],
			[
				"postcode" => "2333",
				"suburb" => "MUSCLE CREEK",
				"state" => "NSW",
				"lat" => "-32.270449",
				"lon" => "150.997754"
			],
			[
				"postcode" => "2333",
				"suburb" => "MUSWELLBROOK",
				"state" => "NSW",
				"lat" => "-32.263323",
				"lon" => "150.888821"
			],
			[
				"postcode" => "2333",
				"suburb" => "SANDY HOLLOW",
				"state" => "NSW",
				"lat" => "-32.33475",
				"lon" => "150.566792"
			],
			[
				"postcode" => "2333",
				"suburb" => "WYBONG",
				"state" => "NSW",
				"lat" => "-32.277754",
				"lon" => "150.657226"
			],
			[
				"postcode" => "2334",
				"suburb" => "GRETA",
				"state" => "NSW",
				"lat" => "-32.677443",
				"lon" => "151.388741"
			],
			[
				"postcode" => "2335",
				"suburb" => "BELFORD",
				"state" => "NSW",
				"lat" => "-32.653434",
				"lon" => "151.275212"
			],
			[
				"postcode" => "2335",
				"suburb" => "BRANXTON",
				"state" => "NSW",
				"lat" => "-32.658246",
				"lon" => "151.352048"
			],
			[
				"postcode" => "2335",
				"suburb" => "DALWOOD",
				"state" => "NSW",
				"lat" => "-32.634345",
				"lon" => "151.418774"
			],
			[
				"postcode" => "2335",
				"suburb" => "EAST BRANXTON",
				"state" => "NSW",
				"lat" => "-32.655999",
				"lon" => "151.363965"
			],
			[
				"postcode" => "2335",
				"suburb" => "ELDERSLIE",
				"state" => "NSW",
				"lat" => "-32.591783",
				"lon" => "151.332509"
			],
			[
				"postcode" => "2335",
				"suburb" => "LAMBS VALLEY",
				"state" => "NSW",
				"lat" => "-32.596003",
				"lon" => "151.446425"
			],
			[
				"postcode" => "2335",
				"suburb" => "LECONFIELD",
				"state" => "NSW",
				"lat" => "-32.651348",
				"lon" => "151.392441"
			],
			[
				"postcode" => "2335",
				"suburb" => "LOWER BELFORD",
				"state" => "NSW",
				"lat" => "-32.608791",
				"lon" => "151.286484"
			],
			[
				"postcode" => "2335",
				"suburb" => "NORTH ROTHBURY",
				"state" => "NSW",
				"lat" => "-32.69748",
				"lon" => "151.341011"
			],
			[
				"postcode" => "2335",
				"suburb" => "STANHOPE",
				"state" => "NSW",
				"lat" => "-32.607338",
				"lon" => "151.388821"
			],
			[
				"postcode" => "2336",
				"suburb" => "ABERDEEN",
				"state" => "NSW",
				"lat" => "-32.162396",
				"lon" => "150.890118"
			],
			[
				"postcode" => "2336",
				"suburb" => "DARTBROOK",
				"state" => "NSW",
				"lat" => "-32.149399",
				"lon" => "150.849591"
			],
			[
				"postcode" => "2336",
				"suburb" => "DAVIS CREEK",
				"state" => "NSW",
				"lat" => "-32.152417",
				"lon" => "151.122519"
			],
			[
				"postcode" => "2336",
				"suburb" => "ROSSGOLE",
				"state" => "NSW",
				"lat" => "-32.136103",
				"lon" => "150.729162"
			],
			[
				"postcode" => "2336",
				"suburb" => "ROUCHEL",
				"state" => "NSW",
				"lat" => "-32.148376",
				"lon" => "151.061442"
			],
			[
				"postcode" => "2336",
				"suburb" => "ROUCHEL BROOK",
				"state" => "NSW",
				"lat" => "-32.183093",
				"lon" => "151.101252"
			],
			[
				"postcode" => "2336",
				"suburb" => "UPPER DARTBROOK",
				"state" => "NSW",
				"lat" => "-31.938204",
				"lon" => "150.697181"
			],
			[
				"postcode" => "2336",
				"suburb" => "UPPER ROUCHEL",
				"state" => "NSW",
				"lat" => "-32.123533",
				"lon" => "151.090225"
			],
			[
				"postcode" => "2337",
				"suburb" => "BELLTREES",
				"state" => "NSW",
				"lat" => "-31.993284",
				"lon" => "151.124461"
			],
			[
				"postcode" => "2337",
				"suburb" => "BRAWBOY",
				"state" => "NSW",
				"lat" => "-31.93927",
				"lon" => "150.635778"
			],
			[
				"postcode" => "2337",
				"suburb" => "BUNNAN",
				"state" => "NSW",
				"lat" => "-32.06868",
				"lon" => "150.602156"
			],
			[
				"postcode" => "2337",
				"suburb" => "DRY CREEK",
				"state" => "NSW",
				"lat" => "-31.900818",
				"lon" => "150.808673"
			],
			[
				"postcode" => "2337",
				"suburb" => "ELLERSTON",
				"state" => "NSW",
				"lat" => "-31.821731",
				"lon" => "151.30337"
			],
			[
				"postcode" => "2337",
				"suburb" => "GLENBAWN",
				"state" => "NSW",
				"lat" => "-32.104684",
				"lon" => "150.983991"
			],
			[
				"postcode" => "2337",
				"suburb" => "GLENROCK",
				"state" => "NSW",
				"lat" => "-31.666832",
				"lon" => "151.417947"
			],
			[
				"postcode" => "2337",
				"suburb" => "GUNDY",
				"state" => "NSW",
				"lat" => "-32.014475",
				"lon" => "150.996749"
			],
			[
				"postcode" => "2337",
				"suburb" => "KARS SPRINGS",
				"state" => "NSW",
				"lat" => "-31.928566",
				"lon" => "150.54748"
			],
			[
				"postcode" => "2337",
				"suburb" => "MIDDLE BROOK",
				"state" => "NSW",
				"lat" => "-31.934061",
				"lon" => "150.802501"
			],
			[
				"postcode" => "2337",
				"suburb" => "MOOBI",
				"state" => "NSW",
				"lat" => "-32.077726",
				"lon" => "150.794116"
			],
			[
				"postcode" => "2337",
				"suburb" => "MOONAN BROOK",
				"state" => "NSW",
				"lat" => "-31.9354",
				"lon" => "151.262562"
			],
			[
				"postcode" => "2337",
				"suburb" => "MOONAN FLAT",
				"state" => "NSW",
				"lat" => "-31.926434",
				"lon" => "151.235462"
			],
			[
				"postcode" => "2337",
				"suburb" => "MURULLA",
				"state" => "NSW",
				"lat" => "-31.837755",
				"lon" => "150.920692"
			],
			[
				"postcode" => "2337",
				"suburb" => "OMADALE",
				"state" => "NSW",
				"lat" => "-31.863149",
				"lon" => "151.296412"
			],
			[
				"postcode" => "2337",
				"suburb" => "OWENS GAP",
				"state" => "NSW",
				"lat" => "-32.025551",
				"lon" => "150.718094"
			],
			[
				"postcode" => "2337",
				"suburb" => "PAGES CREEK",
				"state" => "NSW",
				"lat" => "-31.709668",
				"lon" => "151.214032"
			],
			[
				"postcode" => "2337",
				"suburb" => "PARKVILLE",
				"state" => "NSW",
				"lat" => "-31.981159",
				"lon" => "150.865404"
			],
			[
				"postcode" => "2337",
				"suburb" => "SCONE",
				"state" => "NSW",
				"lat" => "-32.050707",
				"lon" => "150.867527"
			],
			[
				"postcode" => "2337",
				"suburb" => "SEGENHOE",
				"state" => "NSW",
				"lat" => "-32.128983",
				"lon" => "150.918335"
			],
			[
				"postcode" => "2337",
				"suburb" => "STEWARTS BROOK",
				"state" => "NSW",
				"lat" => "-32.001384",
				"lon" => "151.270253"
			],
			[
				"postcode" => "2337",
				"suburb" => "TOMALLA",
				"state" => "NSW",
				"lat" => "-31.838798",
				"lon" => "151.476941"
			],
			[
				"postcode" => "2337",
				"suburb" => "WAVERLY",
				"state" => "NSW",
				"lat" => "-31.875369",
				"lon" => "151.074992"
			],
			[
				"postcode" => "2337",
				"suburb" => "WINGEN",
				"state" => "NSW",
				"lat" => "-31.894215",
				"lon" => "150.880095"
			],
			[
				"postcode" => "2337",
				"suburb" => "WOOLOOMA",
				"state" => "NSW",
				"lat" => "-31.994328",
				"lon" => "151.219601"
			],
			[
				"postcode" => "2338",
				"suburb" => "ARDGLEN",
				"state" => "NSW",
				"lat" => "-31.734505",
				"lon" => "150.785588"
			],
			[
				"postcode" => "2338",
				"suburb" => "BLANDFORD",
				"state" => "NSW",
				"lat" => "-31.793098",
				"lon" => "150.928753"
			],
			[
				"postcode" => "2338",
				"suburb" => "CRAWNEY",
				"state" => "NSW",
				"lat" => "-31.633535",
				"lon" => "151.060479"
			],
			[
				"postcode" => "2338",
				"suburb" => "GREEN CREEK",
				"state" => "NSW",
				"lat" => "-31.775047",
				"lon" => "151.037157"
			],
			[
				"postcode" => "2338",
				"suburb" => "MURRURUNDI",
				"state" => "NSW",
				"lat" => "-31.763687",
				"lon" => "150.834935"
			],
			[
				"postcode" => "2338",
				"suburb" => "PAGES RIVER",
				"state" => "NSW",
				"lat" => "-31.795503",
				"lon" => "150.763836"
			],
			[
				"postcode" => "2338",
				"suburb" => "SANDY CREEK",
				"state" => "NSW",
				"lat" => "-31.795985",
				"lon" => "150.967371"
			],
			[
				"postcode" => "2338",
				"suburb" => "SCOTTS CREEK",
				"state" => "NSW",
				"lat" => "-31.726274",
				"lon" => "150.958375"
			],
			[
				"postcode" => "2338",
				"suburb" => "TIMOR",
				"state" => "NSW",
				"lat" => "-31.776789",
				"lon" => "151.079799"
			],
			[
				"postcode" => "2339",
				"suburb" => "BIG JACKS CREEK",
				"state" => "NSW",
				"lat" => "-31.773148",
				"lon" => "150.615611"
			],
			[
				"postcode" => "2339",
				"suburb" => "BRAEFIELD",
				"state" => "NSW",
				"lat" => "-31.559051",
				"lon" => "150.6963"
			],
			[
				"postcode" => "2339",
				"suburb" => "CATTLE CREEK",
				"state" => "NSW",
				"lat" => "-31.753212",
				"lon" => "150.300912"
			],
			[
				"postcode" => "2339",
				"suburb" => "CHILCOTTS CREEK",
				"state" => "NSW",
				"lat" => "-31.665737",
				"lon" => "150.828805"
			],
			[
				"postcode" => "2339",
				"suburb" => "LITTLE JACKS CREEK",
				"state" => "NSW",
				"lat" => "-31.77093",
				"lon" => "150.540776"
			],
			[
				"postcode" => "2339",
				"suburb" => "MACDONALDS CREEK",
				"state" => "NSW",
				"lat" => "-31.794621",
				"lon" => "150.453103"
			],
			[
				"postcode" => "2339",
				"suburb" => "PARRAWEENA",
				"state" => "NSW",
				"lat" => "-31.72374",
				"lon" => "150.410675"
			],
			[
				"postcode" => "2339",
				"suburb" => "WARRAH",
				"state" => "NSW",
				"lat" => "-31.669946",
				"lon" => "150.667254"
			],
			[
				"postcode" => "2339",
				"suburb" => "WARRAH CREEK",
				"state" => "NSW",
				"lat" => "-31.71574",
				"lon" => "150.651204"
			],
			[
				"postcode" => "2339",
				"suburb" => "WILLOW TREE",
				"state" => "NSW",
				"lat" => "-31.648589",
				"lon" => "150.726216"
			],
			[
				"postcode" => "2340",
				"suburb" => "APPLEBY",
				"state" => "NSW",
				"lat" => "-30.964928",
				"lon" => "150.825148"
			],
			[
				"postcode" => "2340",
				"suburb" => "BARRY",
				"state" => "NSW",
				"lat" => "-31.581575",
				"lon" => "151.316427"
			],
			[
				"postcode" => "2340",
				"suburb" => "BECTIVE",
				"state" => "NSW",
				"lat" => "-30.988172",
				"lon" => "150.772119"
			],
			[
				"postcode" => "2340",
				"suburb" => "BITHRAMERE",
				"state" => "NSW",
				"lat" => "-31.122884",
				"lon" => "150.767937"
			],
			[
				"postcode" => "2340",
				"suburb" => "BOWLING ALLEY POINT",
				"state" => "NSW",
				"lat" => "-31.397895",
				"lon" => "151.145266"
			],
			[
				"postcode" => "2340",
				"suburb" => "CALALA",
				"state" => "NSW",
				"lat" => "-31.129764",
				"lon" => "150.946878"
			],
			[
				"postcode" => "2340",
				"suburb" => "CARROLL",
				"state" => "NSW",
				"lat" => "-30.986643",
				"lon" => "150.44492"
			],
			[
				"postcode" => "2340",
				"suburb" => "DARUKA",
				"state" => "NSW",
				"lat" => "-31.035042",
				"lon" => "150.962594"
			],
			[
				"postcode" => "2340",
				"suburb" => "DUNCANS CREEK",
				"state" => "NSW",
				"lat" => "-31.381934",
				"lon" => "151.192366"
			],
			[
				"postcode" => "2340",
				"suburb" => "DUNGOWAN",
				"state" => "NSW",
				"lat" => "-31.214552",
				"lon" => "151.12012"
			],
			[
				"postcode" => "2340",
				"suburb" => "EAST TAMWORTH",
				"state" => "NSW",
				"lat" => "-31.10529",
				"lon" => "150.949994"
			],
			[
				"postcode" => "2340",
				"suburb" => "GAROO",
				"state" => "NSW",
				"lat" => "-31.427121",
				"lon" => "150.93302"
			],
			[
				"postcode" => "2340",
				"suburb" => "GIDLEY",
				"state" => "NSW",
				"lat" => "-31.006945",
				"lon" => "150.847637"
			],
			[
				"postcode" => "2340",
				"suburb" => "GOONOO GOONOO",
				"state" => "NSW",
				"lat" => "-31.288177",
				"lon" => "150.919699"
			],
			[
				"postcode" => "2340",
				"suburb" => "GOWRIE",
				"state" => "NSW",
				"lat" => "-31.333017",
				"lon" => "150.858393"
			],
			[
				"postcode" => "2340",
				"suburb" => "HALLSVILLE",
				"state" => "NSW",
				"lat" => "-31.025229",
				"lon" => "150.88197"
			],
			[
				"postcode" => "2340",
				"suburb" => "HANGING ROCK",
				"state" => "NSW",
				"lat" => "-31.484462",
				"lon" => "151.228537"
			],
			[
				"postcode" => "2340",
				"suburb" => "HILLVUE",
				"state" => "NSW",
				"lat" => "-31.118432",
				"lon" => "150.917009"
			],
			[
				"postcode" => "2340",
				"suburb" => "KEEPIT",
				"state" => "NSW",
				"lat" => "-30.886935",
				"lon" => "150.491217"
			],
			[
				"postcode" => "2340",
				"suburb" => "KINGSWOOD",
				"state" => "NSW",
				"lat" => "-31.16588",
				"lon" => "150.919441"
			],
			[
				"postcode" => "2340",
				"suburb" => "LOOMBERAH",
				"state" => "NSW",
				"lat" => "-31.225388",
				"lon" => "151.051391"
			],
			[
				"postcode" => "2340",
				"suburb" => "MOORE CREEK",
				"state" => "NSW",
				"lat" => "-31.004396",
				"lon" => "150.944154"
			],
			[
				"postcode" => "2340",
				"suburb" => "NEMINGHA",
				"state" => "NSW",
				"lat" => "-31.123654",
				"lon" => "150.990412"
			],
			[
				"postcode" => "2340",
				"suburb" => "NORTH TAMWORTH",
				"state" => "NSW",
				"lat" => "-31.076267",
				"lon" => "150.930058"
			],
			[
				"postcode" => "2340",
				"suburb" => "NUNDLE",
				"state" => "NSW",
				"lat" => "-31.462548",
				"lon" => "151.127044"
			],
			[
				"postcode" => "2340",
				"suburb" => "OGUNBIL",
				"state" => "NSW",
				"lat" => "-31.343763",
				"lon" => "151.289004"
			],
			[
				"postcode" => "2340",
				"suburb" => "OXLEY VALE",
				"state" => "NSW",
				"lat" => "-31.06203",
				"lon" => "150.900142"
			],
			[
				"postcode" => "2340",
				"suburb" => "PIALLAMORE",
				"state" => "NSW",
				"lat" => "-31.141698",
				"lon" => "151.029858"
			],
			[
				"postcode" => "2340",
				"suburb" => "SOMERTON",
				"state" => "NSW",
				"lat" => "-30.938654",
				"lon" => "150.637122"
			],
			[
				"postcode" => "2340",
				"suburb" => "SOUTH TAMWORTH",
				"state" => "NSW",
				"lat" => "-31.11097",
				"lon" => "150.916779"
			],
			[
				"postcode" => "2340",
				"suburb" => "TAMINDA",
				"state" => "NSW",
				"lat" => "-31.099235",
				"lon" => "150.900252"
			],
			[
				"postcode" => "2340",
				"suburb" => "TAMWORTH",
				"state" => "NSW",
				"lat" => "-31.091743",
				"lon" => "150.930821"
			],
			[
				"postcode" => "2340",
				"suburb" => "TIMBUMBURI",
				"state" => "NSW",
				"lat" => "-31.203391",
				"lon" => "150.917132"
			],
			[
				"postcode" => "2340",
				"suburb" => "WALLAMORE",
				"state" => "NSW",
				"lat" => "-31.062814",
				"lon" => "150.821314"
			],
			[
				"postcode" => "2340",
				"suburb" => "WARRAL",
				"state" => "NSW",
				"lat" => "-31.139251",
				"lon" => "150.877953"
			],
			[
				"postcode" => "2340",
				"suburb" => "WEABONGA",
				"state" => "NSW",
				"lat" => "-31.21391",
				"lon" => "151.322159"
			],
			[
				"postcode" => "2340",
				"suburb" => "WEST TAMWORTH",
				"state" => "NSW",
				"lat" => "-31.105379",
				"lon" => "150.898483"
			],
			[
				"postcode" => "2340",
				"suburb" => "WESTDALE",
				"state" => "NSW",
				"lat" => "-31.272046",
				"lon" => "150.96962"
			],
			[
				"postcode" => "2340",
				"suburb" => "WOOLOMIN",
				"state" => "NSW",
				"lat" => "-31.284859",
				"lon" => "151.14899"
			],
			[
				"postcode" => "2341",
				"suburb" => "WERRIS CREEK",
				"state" => "NSW",
				"lat" => "-31.345921",
				"lon" => "150.619915"
			],
			[
				"postcode" => "2342",
				"suburb" => "CURRABUBULA",
				"state" => "NSW",
				"lat" => "-31.262722",
				"lon" => "150.734256"
			],
			[
				"postcode" => "2342",
				"suburb" => "PIALLAWAY",
				"state" => "NSW",
				"lat" => "-31.158508",
				"lon" => "150.581385"
			],
			[
				"postcode" => "2343",
				"suburb" => "BLACKVILLE",
				"state" => "NSW",
				"lat" => "-31.65821",
				"lon" => "150.30281"
			],
			[
				"postcode" => "2343",
				"suburb" => "BUNDELLA",
				"state" => "NSW",
				"lat" => "-31.553061",
				"lon" => "150.239451"
			],
			[
				"postcode" => "2343",
				"suburb" => "CAROONA",
				"state" => "NSW",
				"lat" => "-31.399114",
				"lon" => "150.427946"
			],
			[
				"postcode" => "2343",
				"suburb" => "COLLY BLUE",
				"state" => "NSW",
				"lat" => "-31.459597",
				"lon" => "150.200081"
			],
			[
				"postcode" => "2343",
				"suburb" => "COOMOO COOMOO",
				"state" => "NSW",
				"lat" => "-31.593287",
				"lon" => "150.118776"
			],
			[
				"postcode" => "2343",
				"suburb" => "PINE RIDGE",
				"state" => "NSW",
				"lat" => "-31.4798",
				"lon" => "150.512227"
			],
			[
				"postcode" => "2343",
				"suburb" => "QUIPOLLY",
				"state" => "NSW",
				"lat" => "-31.4563",
				"lon" => "150.58581"
			],
			[
				"postcode" => "2343",
				"suburb" => "QUIRINDI",
				"state" => "NSW",
				"lat" => "-31.508146",
				"lon" => "150.680052"
			],
			[
				"postcode" => "2343",
				"suburb" => "SPRING RIDGE",
				"state" => "NSW",
				"lat" => "-31.498483",
				"lon" => "150.683758"
			],
			[
				"postcode" => "2343",
				"suburb" => "WALLABADAH",
				"state" => "NSW",
				"lat" => "-31.523266",
				"lon" => "150.758768"
			],
			[
				"postcode" => "2343",
				"suburb" => "WARRAH RIDGE",
				"state" => "NSW",
				"lat" => "-31.573609",
				"lon" => "150.535899"
			],
			[
				"postcode" => "2343",
				"suburb" => "WINDY",
				"state" => "NSW",
				"lat" => "-31.546246",
				"lon" => "150.414081"
			],
			[
				"postcode" => "2343",
				"suburb" => "YANNERGEE",
				"state" => "NSW",
				"lat" => "-31.40909",
				"lon" => "150.013794"
			],
			[
				"postcode" => "2344",
				"suburb" => "DURI",
				"state" => "NSW",
				"lat" => "-31.219024",
				"lon" => "150.819076"
			],
			[
				"postcode" => "2344",
				"suburb" => "WINTON",
				"state" => "NSW",
				"lat" => "-31.079338",
				"lon" => "150.763349"
			],
			[
				"postcode" => "2345",
				"suburb" => "ATTUNGA",
				"state" => "NSW",
				"lat" => "-30.930991",
				"lon" => "150.847933"
			],
			[
				"postcode" => "2345",
				"suburb" => "GARTHOWEN",
				"state" => "NSW",
				"lat" => "-30.857557",
				"lon" => "150.889261"
			],
			[
				"postcode" => "2346",
				"suburb" => "BORAH CREEK",
				"state" => "NSW",
				"lat" => "-30.609264",
				"lon" => "150.50534"
			],
			[
				"postcode" => "2346",
				"suburb" => "HALLS CREEK",
				"state" => "NSW",
				"lat" => "-30.761588",
				"lon" => "150.914624"
			],
			[
				"postcode" => "2346",
				"suburb" => "KLORI",
				"state" => "NSW",
				"lat" => "-30.806657",
				"lon" => "150.757082"
			],
			[
				"postcode" => "2346",
				"suburb" => "MANILLA",
				"state" => "NSW",
				"lat" => "-30.747753",
				"lon" => "150.72025"
			],
			[
				"postcode" => "2346",
				"suburb" => "NAMOI RIVER",
				"state" => "NSW",
				"lat" => "-30.639977",
				"lon" => "150.812358"
			],
			[
				"postcode" => "2346",
				"suburb" => "NEW MEXICO",
				"state" => "NSW",
				"lat" => "-30.744174",
				"lon" => "150.63718"
			],
			[
				"postcode" => "2346",
				"suburb" => "RUSHES CREEK",
				"state" => "NSW",
				"lat" => "-30.803044",
				"lon" => "150.602886"
			],
			[
				"postcode" => "2346",
				"suburb" => "UPPER MANILLA",
				"state" => "NSW",
				"lat" => "-30.565763",
				"lon" => "150.632502"
			],
			[
				"postcode" => "2346",
				"suburb" => "WARRABAH",
				"state" => "NSW",
				"lat" => "-30.483177",
				"lon" => "150.978596"
			],
			[
				"postcode" => "2346",
				"suburb" => "WONGO CREEK",
				"state" => "NSW",
				"lat" => "-30.718752",
				"lon" => "150.552963"
			],
			[
				"postcode" => "2347",
				"suburb" => "BANOON",
				"state" => "NSW",
				"lat" => "-30.527226",
				"lon" => "150.44311"
			],
			[
				"postcode" => "2347",
				"suburb" => "BARRABA",
				"state" => "NSW",
				"lat" => "-30.378339",
				"lon" => "150.610642"
			],
			[
				"postcode" => "2347",
				"suburb" => "CARODA",
				"state" => "NSW",
				"lat" => "-30.020601",
				"lon" => "150.363496"
			],
			[
				"postcode" => "2347",
				"suburb" => "COBBADAH",
				"state" => "NSW",
				"lat" => "-30.23171",
				"lon" => "150.578145"
			],
			[
				"postcode" => "2347",
				"suburb" => "GULF CREEK",
				"state" => "NSW",
				"lat" => "-30.215214",
				"lon" => "150.784262"
			],
			[
				"postcode" => "2347",
				"suburb" => "GUNDAMULDA",
				"state" => "NSW",
				"lat" => "-30.286927",
				"lon" => "150.715683"
			],
			[
				"postcode" => "2347",
				"suburb" => "IRONBARK",
				"state" => "NSW",
				"lat" => "-30.288978",
				"lon" => "150.798007"
			],
			[
				"postcode" => "2347",
				"suburb" => "LINDESAY",
				"state" => "NSW",
				"lat" => "-30.368649",
				"lon" => "150.351282"
			],
			[
				"postcode" => "2347",
				"suburb" => "LONGARM",
				"state" => "NSW",
				"lat" => "-30.489306",
				"lon" => "150.543032"
			],
			[
				"postcode" => "2347",
				"suburb" => "MAYVALE",
				"state" => "NSW",
				"lat" => "-30.387173",
				"lon" => "150.417028"
			],
			[
				"postcode" => "2347",
				"suburb" => "RED HILL",
				"state" => "NSW",
				"lat" => "-30.44902",
				"lon" => "150.630393"
			],
			[
				"postcode" => "2347",
				"suburb" => "THIRLOENE",
				"state" => "NSW",
				"lat" => "-30.327017",
				"lon" => "150.935024"
			],
			[
				"postcode" => "2347",
				"suburb" => "UPPER HORTON",
				"state" => "NSW",
				"lat" => "-30.14094",
				"lon" => "150.4471"
			],
			[
				"postcode" => "2347",
				"suburb" => "WOODSREEF",
				"state" => "NSW",
				"lat" => "-30.399749",
				"lon" => "150.740885"
			],
			[
				"postcode" => "2350",
				"suburb" => "ABERFOYLE",
				"state" => "NSW",
				"lat" => "-30.240605",
				"lon" => "152.012929"
			],
			[
				"postcode" => "2350",
				"suburb" => "ABINGTON",
				"state" => "NSW",
				"lat" => "-30.326739",
				"lon" => "151.240618"
			],
			[
				"postcode" => "2350",
				"suburb" => "ARGYLE",
				"state" => "NSW",
				"lat" => "-30.523571",
				"lon" => "151.791612"
			],
			[
				"postcode" => "2350",
				"suburb" => "ARMIDALE",
				"state" => "NSW",
				"lat" => "-30.514166",
				"lon" => "151.668986"
			],
			[
				"postcode" => "2350",
				"suburb" => "BONA VISTA",
				"state" => "NSW",
				"lat" => "-30.522294",
				"lon" => "151.639142"
			],
			[
				"postcode" => "2350",
				"suburb" => "BOOROLONG",
				"state" => "NSW",
				"lat" => "-30.329789",
				"lon" => "151.53254"
			],
			[
				"postcode" => "2350",
				"suburb" => "CASTLE DOYLE",
				"state" => "NSW",
				"lat" => "-30.586704",
				"lon" => "151.75801"
			],
			[
				"postcode" => "2350",
				"suburb" => "DANGARSLEIGH",
				"state" => "NSW",
				"lat" => "-30.614162",
				"lon" => "151.677892"
			],
			[
				"postcode" => "2350",
				"suburb" => "DONALD CREEK",
				"state" => "NSW",
				"lat" => "-30.448075",
				"lon" => "151.73312"
			],
			[
				"postcode" => "2350",
				"suburb" => "DUMARESQ",
				"state" => "NSW",
				"lat" => "-30.471304",
				"lon" => "151.615768"
			],
			[
				"postcode" => "2350",
				"suburb" => "DUVAL",
				"state" => "NSW",
				"lat" => "-30.491998",
				"lon" => "151.671187"
			],
			[
				"postcode" => "2350",
				"suburb" => "ENMORE",
				"state" => "NSW",
				"lat" => "-30.721541",
				"lon" => "151.731619"
			],
			[
				"postcode" => "2350",
				"suburb" => "HILLGROVE",
				"state" => "NSW",
				"lat" => "-30.569822",
				"lon" => "151.904484"
			],
			[
				"postcode" => "2350",
				"suburb" => "INVERGOWRIE",
				"state" => "NSW",
				"lat" => "-30.497561",
				"lon" => "151.498196"
			],
			[
				"postcode" => "2350",
				"suburb" => "JEOGLA",
				"state" => "NSW",
				"lat" => "-30.571894",
				"lon" => "152.110822"
			],
			[
				"postcode" => "2350",
				"suburb" => "KELLYS PLAINS",
				"state" => "NSW",
				"lat" => "-30.554866",
				"lon" => "151.633136"
			],
			[
				"postcode" => "2350",
				"suburb" => "LYNDHURST",
				"state" => "NSW",
				"lat" => "-30.367137",
				"lon" => "151.988725"
			],
			[
				"postcode" => "2350",
				"suburb" => "PUDDLEDOCK",
				"state" => "NSW",
				"lat" => "-30.384216",
				"lon" => "151.748624"
			],
			[
				"postcode" => "2350",
				"suburb" => "SAUMAREZ",
				"state" => "NSW",
				"lat" => "-30.556537",
				"lon" => "151.585106"
			],
			[
				"postcode" => "2350",
				"suburb" => "SAUMAREZ PONDS",
				"state" => "NSW",
				"lat" => "-30.507476",
				"lon" => "151.568904"
			],
			[
				"postcode" => "2350",
				"suburb" => "THALGARRAH",
				"state" => "NSW",
				"lat" => "-30.447361",
				"lon" => "151.850631"
			],
			[
				"postcode" => "2350",
				"suburb" => "TILBUSTER",
				"state" => "NSW",
				"lat" => "-30.474503",
				"lon" => "151.679436"
			],
			[
				"postcode" => "2350",
				"suburb" => "WARDS MISTAKE",
				"state" => "NSW",
				"lat" => "-30.133611",
				"lon" => "152.005072"
			],
			[
				"postcode" => "2350",
				"suburb" => "WEST ARMIDALE",
				"state" => "NSW",
				"lat" => "-30.502957",
				"lon" => "151.650203"
			],
			[
				"postcode" => "2350",
				"suburb" => "WOLLOMOMBI",
				"state" => "NSW",
				"lat" => "-30.51134",
				"lon" => "152.045007"
			],
			[
				"postcode" => "2350",
				"suburb" => "WONGWIBINDA",
				"state" => "NSW",
				"lat" => "-30.298431",
				"lon" => "152.170806"
			],
			[
				"postcode" => "2351",
				"suburb" => "UNIVERSITY OF NEW ENGLAND",
				"state" => "NSW",
				"lat" => "-30.49299",
				"lon" => "151.639714"
			],
			[
				"postcode" => "2352",
				"suburb" => "KOOTINGAL",
				"state" => "NSW",
				"lat" => "-31.057413",
				"lon" => "151.054338"
			],
			[
				"postcode" => "2352",
				"suburb" => "LIMBRI",
				"state" => "NSW",
				"lat" => "-31.039192",
				"lon" => "151.154777"
			],
			[
				"postcode" => "2352",
				"suburb" => "MULLA CREEK",
				"state" => "NSW",
				"lat" => "-31.149235",
				"lon" => "151.165893"
			],
			[
				"postcode" => "2352",
				"suburb" => "TINTINHULL",
				"state" => "NSW",
				"lat" => "-31.080983",
				"lon" => "151.002154"
			],
			[
				"postcode" => "2353",
				"suburb" => "MOONBI",
				"state" => "NSW",
				"lat" => "-30.951431",
				"lon" => "151.045963"
			],
			[
				"postcode" => "2354",
				"suburb" => "BRANGA PLAINS",
				"state" => "NSW",
				"lat" => "-31.266104",
				"lon" => "151.549993"
			],
			[
				"postcode" => "2354",
				"suburb" => "KENTUCKY",
				"state" => "NSW",
				"lat" => "-30.757842",
				"lon" => "151.45129"
			],
			[
				"postcode" => "2354",
				"suburb" => "KENTUCKY SOUTH",
				"state" => "NSW",
				"lat" => "-30.803987",
				"lon" => "151.440954"
			],
			[
				"postcode" => "2354",
				"suburb" => "MOONA PLAINS",
				"state" => "NSW",
				"lat" => "-31.019837",
				"lon" => "151.861894"
			],
			[
				"postcode" => "2354",
				"suburb" => "NIANGALA",
				"state" => "NSW",
				"lat" => "-31.342381",
				"lon" => "151.365245"
			],
			[
				"postcode" => "2354",
				"suburb" => "NOWENDOC",
				"state" => "NSW",
				"lat" => "-31.515203",
				"lon" => "151.719541"
			],
			[
				"postcode" => "2354",
				"suburb" => "WALCHA",
				"state" => "NSW",
				"lat" => "-30.992066",
				"lon" => "151.592052"
			],
			[
				"postcode" => "2354",
				"suburb" => "WALCHA ROAD",
				"state" => "NSW",
				"lat" => "-30.944669",
				"lon" => "151.402728"
			],
			[
				"postcode" => "2354",
				"suburb" => "WOLLUN",
				"state" => "NSW",
				"lat" => "-30.84132",
				"lon" => "151.429837"
			],
			[
				"postcode" => "2354",
				"suburb" => "WOOLBROOK",
				"state" => "NSW",
				"lat" => "-30.944911",
				"lon" => "151.342556"
			],
			[
				"postcode" => "2354",
				"suburb" => "YARROWITCH",
				"state" => "NSW",
				"lat" => "-31.264506",
				"lon" => "152.026224"
			],
			[
				"postcode" => "2355",
				"suburb" => "BENDEMEER",
				"state" => "NSW",
				"lat" => "-30.878399",
				"lon" => "151.159905"
			],
			[
				"postcode" => "2355",
				"suburb" => "WATSONS CREEK",
				"state" => "NSW",
				"lat" => "-30.718587",
				"lon" => "151.010763"
			],
			[
				"postcode" => "2356",
				"suburb" => "GWABEGAR",
				"state" => "NSW",
				"lat" => "-30.619798",
				"lon" => "148.96949"
			],
			[
				"postcode" => "2357",
				"suburb" => "BOMERA",
				"state" => "NSW",
				"lat" => "-31.50933",
				"lon" => "149.793251"
			],
			[
				"postcode" => "2357",
				"suburb" => "BUGALDIE",
				"state" => "NSW",
				"lat" => "-31.122204",
				"lon" => "149.110038"
			],
			[
				"postcode" => "2357",
				"suburb" => "COONABARABRAN",
				"state" => "NSW",
				"lat" => "-31.273439",
				"lon" => "149.277272"
			],
			[
				"postcode" => "2357",
				"suburb" => "DANDRY",
				"state" => "NSW",
				"lat" => "-31.051413",
				"lon" => "149.323274"
			],
			[
				"postcode" => "2357",
				"suburb" => "GOWANG",
				"state" => "NSW",
				"lat" => "-31.425633",
				"lon" => "149.080961"
			],
			[
				"postcode" => "2357",
				"suburb" => "PURLEWAUGH",
				"state" => "NSW",
				"lat" => "-31.379731",
				"lon" => "149.640953"
			],
			[
				"postcode" => "2357",
				"suburb" => "ROCKY GLEN",
				"state" => "NSW",
				"lat" => "-31.115131",
				"lon" => "149.566422"
			],
			[
				"postcode" => "2357",
				"suburb" => "TANNABAR",
				"state" => "NSW",
				"lat" => "-31.385533",
				"lon" => "149.186659"
			],
			[
				"postcode" => "2357",
				"suburb" => "ULAMAMBRI",
				"state" => "NSW",
				"lat" => "-31.332232",
				"lon" => "149.384556"
			],
			[
				"postcode" => "2358",
				"suburb" => "ARDING",
				"state" => "NSW",
				"lat" => "-30.588547",
				"lon" => "151.556745"
			],
			[
				"postcode" => "2358",
				"suburb" => "BAKERS CREEK",
				"state" => "NSW",
				"lat" => "-30.268999",
				"lon" => "151.015214"
			],
			[
				"postcode" => "2358",
				"suburb" => "BALALA",
				"state" => "NSW",
				"lat" => "-30.612086",
				"lon" => "151.335783"
			],
			[
				"postcode" => "2358",
				"suburb" => "ENMORE",
				"state" => "NSW",
				"lat" => "-30.721541",
				"lon" => "151.731619"
			],
			[
				"postcode" => "2358",
				"suburb" => "GOSTWYCK",
				"state" => "NSW",
				"lat" => "-30.702244",
				"lon" => "151.632544"
			],
			[
				"postcode" => "2358",
				"suburb" => "KINGSTOWN",
				"state" => "NSW",
				"lat" => "-30.505549",
				"lon" => "151.117523"
			],
			[
				"postcode" => "2358",
				"suburb" => "MIHI",
				"state" => "NSW",
				"lat" => "-30.72282",
				"lon" => "151.677281"
			],
			[
				"postcode" => "2358",
				"suburb" => "ROCKY RIVER",
				"state" => "NSW",
				"lat" => "-30.603862",
				"lon" => "151.479368"
			],
			[
				"postcode" => "2358",
				"suburb" => "SALISBURY PLAINS",
				"state" => "NSW",
				"lat" => "-30.788221",
				"lon" => "151.540658"
			],
			[
				"postcode" => "2358",
				"suburb" => "TORRYBURN",
				"state" => "NSW",
				"lat" => "-30.455128",
				"lon" => "151.205775"
			],
			[
				"postcode" => "2358",
				"suburb" => "URALLA",
				"state" => "NSW",
				"lat" => "-30.642829",
				"lon" => "151.502566"
			],
			[
				"postcode" => "2358",
				"suburb" => "YARROWYCK",
				"state" => "NSW",
				"lat" => "-30.465485",
				"lon" => "151.313513"
			],
			[
				"postcode" => "2359",
				"suburb" => "ABERDEEN",
				"state" => "NSW",
				"lat" => "-29.996058",
				"lon" => "151.080554"
			],
			[
				"postcode" => "2359",
				"suburb" => "BUNDARRA",
				"state" => "NSW",
				"lat" => "-30.17137",
				"lon" => "151.075836"
			],
			[
				"postcode" => "2359",
				"suburb" => "CAMERONS CREEK",
				"state" => "NSW",
				"lat" => "-30.337816",
				"lon" => "151.105149"
			],
			[
				"postcode" => "2360",
				"suburb" => "AUBURN VALE",
				"state" => "NSW",
				"lat" => "-29.83895",
				"lon" => "151.041719"
			],
			[
				"postcode" => "2360",
				"suburb" => "BRODIES PLAINS",
				"state" => "NSW",
				"lat" => "-29.814077",
				"lon" => "151.195745"
			],
			[
				"postcode" => "2360",
				"suburb" => "BUKKULLA",
				"state" => "NSW",
				"lat" => "-29.503137",
				"lon" => "151.129034"
			],
			[
				"postcode" => "2360",
				"suburb" => "CHERRY TREE HILL",
				"state" => "NSW",
				"lat" => "-29.512375",
				"lon" => "150.987211"
			],
			[
				"postcode" => "2360",
				"suburb" => "COPETON",
				"state" => "NSW",
				"lat" => "-29.913309",
				"lon" => "150.938151"
			],
			[
				"postcode" => "2360",
				"suburb" => "ELSMORE",
				"state" => "NSW",
				"lat" => "-29.803303",
				"lon" => "151.270899"
			],
			[
				"postcode" => "2360",
				"suburb" => "GILGAI",
				"state" => "NSW",
				"lat" => "-29.852316",
				"lon" => "151.117347"
			],
			[
				"postcode" => "2360",
				"suburb" => "GRAMAN",
				"state" => "NSW",
				"lat" => "-29.467465",
				"lon" => "150.926679"
			],
			[
				"postcode" => "2360",
				"suburb" => "GUM FLAT",
				"state" => "NSW",
				"lat" => "-29.794334",
				"lon" => "150.929554"
			],
			[
				"postcode" => "2360",
				"suburb" => "HOWELL",
				"state" => "NSW",
				"lat" => "-29.940705",
				"lon" => "151.060621"
			],
			[
				"postcode" => "2360",
				"suburb" => "INVERELL",
				"state" => "NSW",
				"lat" => "-29.775667",
				"lon" => "151.112928"
			],
			[
				"postcode" => "2360",
				"suburb" => "KINGS PLAINS",
				"state" => "NSW",
				"lat" => "-29.635562",
				"lon" => "151.447321"
			],
			[
				"postcode" => "2360",
				"suburb" => "LITTLE PLAIN",
				"state" => "NSW",
				"lat" => "-29.729067",
				"lon" => "150.950762"
			],
			[
				"postcode" => "2360",
				"suburb" => "LONG PLAIN",
				"state" => "NSW",
				"lat" => "-29.748424",
				"lon" => "151.229884"
			],
			[
				"postcode" => "2360",
				"suburb" => "MOUNT RUSSELL",
				"state" => "NSW",
				"lat" => "-29.678007",
				"lon" => "150.930115"
			],
			[
				"postcode" => "2360",
				"suburb" => "NEWSTEAD",
				"state" => "NSW",
				"lat" => "-29.819084",
				"lon" => "151.338656"
			],
			[
				"postcode" => "2360",
				"suburb" => "NULLAMANNA",
				"state" => "NSW",
				"lat" => "-29.671265",
				"lon" => "151.22239"
			],
			[
				"postcode" => "2360",
				"suburb" => "PARADISE",
				"state" => "NSW",
				"lat" => "-29.878499",
				"lon" => "151.463267"
			],
			[
				"postcode" => "2360",
				"suburb" => "ROB ROY",
				"state" => "NSW",
				"lat" => "-29.739631",
				"lon" => "151.007813"
			],
			[
				"postcode" => "2360",
				"suburb" => "SAPPHIRE",
				"state" => "NSW",
				"lat" => "-29.68897",
				"lon" => "151.337248"
			],
			[
				"postcode" => "2360",
				"suburb" => "SPRING MOUNTAIN",
				"state" => "NSW",
				"lat" => "-29.81194",
				"lon" => "151.474937"
			],
			[
				"postcode" => "2360",
				"suburb" => "STANBOROUGH",
				"state" => "NSW",
				"lat" => "-29.960427",
				"lon" => "151.119671"
			],
			[
				"postcode" => "2360",
				"suburb" => "SWANBROOK",
				"state" => "NSW",
				"lat" => "-29.710174",
				"lon" => "151.222339"
			],
			[
				"postcode" => "2360",
				"suburb" => "WALLANGRA",
				"state" => "NSW",
				"lat" => "-29.158464",
				"lon" => "150.883868"
			],
			[
				"postcode" => "2360",
				"suburb" => "WANDERA",
				"state" => "NSW",
				"lat" => "-29.669811",
				"lon" => "151.147093"
			],
			[
				"postcode" => "2360",
				"suburb" => "WOODSTOCK",
				"state" => "NSW",
				"lat" => "-29.732366",
				"lon" => "151.364377"
			],
			[
				"postcode" => "2361",
				"suburb" => "ASHFORD",
				"state" => "NSW",
				"lat" => "-29.321245",
				"lon" => "151.096081"
			],
			[
				"postcode" => "2361",
				"suburb" => "ATHOLWOOD",
				"state" => "NSW",
				"lat" => "-28.999641",
				"lon" => "151.058013"
			],
			[
				"postcode" => "2361",
				"suburb" => "BONSHAW",
				"state" => "NSW",
				"lat" => "-29.050296",
				"lon" => "151.275344"
			],
			[
				"postcode" => "2361",
				"suburb" => "LIMESTONE",
				"state" => "NSW",
				"lat" => "-29.180106",
				"lon" => "151.052956"
			],
			[
				"postcode" => "2361",
				"suburb" => "PINDAROI",
				"state" => "NSW",
				"lat" => "-29.515891",
				"lon" => "151.285412"
			],
			[
				"postcode" => "2365",
				"suburb" => "BACKWATER",
				"state" => "NSW",
				"lat" => "-30.075367",
				"lon" => "151.880535"
			],
			[
				"postcode" => "2365",
				"suburb" => "BALD BLAIR",
				"state" => "NSW",
				"lat" => "-30.181416",
				"lon" => "151.795706"
			],
			[
				"postcode" => "2365",
				"suburb" => "BALDERSLEIGH",
				"state" => "NSW",
				"lat" => "-30.263771",
				"lon" => "151.430274"
			],
			[
				"postcode" => "2365",
				"suburb" => "BASSENDEAN",
				"state" => "NSW",
				"lat" => "-30.056088",
				"lon" => "151.173708"
			],
			[
				"postcode" => "2365",
				"suburb" => "BEN LOMOND",
				"state" => "NSW",
				"lat" => "-30.017361",
				"lon" => "151.658"
			],
			[
				"postcode" => "2365",
				"suburb" => "BLACK MOUNTAIN",
				"state" => "NSW",
				"lat" => "-30.308042",
				"lon" => "151.650342"
			],
			[
				"postcode" => "2365",
				"suburb" => "BRIARBROOK",
				"state" => "NSW",
				"lat" => "-30.188076",
				"lon" => "151.415638"
			],
			[
				"postcode" => "2365",
				"suburb" => "BROCKLEY",
				"state" => "NSW",
				"lat" => "-30.263377",
				"lon" => "151.853511"
			],
			[
				"postcode" => "2365",
				"suburb" => "BRUSHY CREEK",
				"state" => "NSW",
				"lat" => "-30.165432",
				"lon" => "151.472385"
			],
			[
				"postcode" => "2365",
				"suburb" => "FALCONER",
				"state" => "NSW",
				"lat" => "-30.200115",
				"lon" => "151.720844"
			],
			[
				"postcode" => "2365",
				"suburb" => "GEORGES CREEK",
				"state" => "NSW",
				"lat" => "-30.179128",
				"lon" => "151.191525"
			],
			[
				"postcode" => "2365",
				"suburb" => "GLEN NEVIS",
				"state" => "NSW",
				"lat" => "-29.873415",
				"lon" => "152.28346"
			],
			[
				"postcode" => "2365",
				"suburb" => "GLENCOE",
				"state" => "NSW",
				"lat" => "-29.925888",
				"lon" => "151.726757"
			],
			[
				"postcode" => "2365",
				"suburb" => "GREEN HILLS",
				"state" => "NSW",
				"lat" => "-30.28028",
				"lon" => "151.778311"
			],
			[
				"postcode" => "2365",
				"suburb" => "GUYRA",
				"state" => "NSW",
				"lat" => "-30.217184",
				"lon" => "151.673119"
			],
			[
				"postcode" => "2365",
				"suburb" => "LLANGOTHLIN",
				"state" => "NSW",
				"lat" => "-30.123004",
				"lon" => "151.686706"
			],
			[
				"postcode" => "2365",
				"suburb" => "MAYBOLE",
				"state" => "NSW",
				"lat" => "-29.910265",
				"lon" => "151.58306"
			],
			[
				"postcode" => "2365",
				"suburb" => "MOUNT MITCHELL",
				"state" => "NSW",
				"lat" => "-29.945069",
				"lon" => "151.821368"
			],
			[
				"postcode" => "2365",
				"suburb" => "NEW VALLEY",
				"state" => "NSW",
				"lat" => "-30.061501",
				"lon" => "151.32728"
			],
			[
				"postcode" => "2365",
				"suburb" => "OBAN",
				"state" => "NSW",
				"lat" => "-30.104532",
				"lon" => "151.8646"
			],
			[
				"postcode" => "2365",
				"suburb" => "SOUTH GUYRA",
				"state" => "NSW",
				"lat" => "-30.235762",
				"lon" => "151.67116"
			],
			[
				"postcode" => "2365",
				"suburb" => "TENTERDEN",
				"state" => "NSW",
				"lat" => "-30.125057",
				"lon" => "151.433857"
			],
			[
				"postcode" => "2365",
				"suburb" => "THE BASIN",
				"state" => "NSW",
				"lat" => "-30.220774",
				"lon" => "151.285036"
			],
			[
				"postcode" => "2365",
				"suburb" => "TUBBAMURRA",
				"state" => "NSW",
				"lat" => "-30.110708",
				"lon" => "151.783314"
			],
			[
				"postcode" => "2365",
				"suburb" => "WANDSWORTH",
				"state" => "NSW",
				"lat" => "-30.055998",
				"lon" => "151.513694"
			],
			[
				"postcode" => "2369",
				"suburb" => "OLD MILL",
				"state" => "NSW",
				"lat" => "-29.908381",
				"lon" => "151.205576"
			],
			[
				"postcode" => "2369",
				"suburb" => "STANNIFER",
				"state" => "NSW",
				"lat" => "-29.865293",
				"lon" => "151.226372"
			],
			[
				"postcode" => "2369",
				"suburb" => "TINGHA",
				"state" => "NSW",
				"lat" => "-29.955586",
				"lon" => "151.212232"
			],
			[
				"postcode" => "2370",
				"suburb" => "BALD NOB",
				"state" => "NSW",
				"lat" => "-29.644588",
				"lon" => "151.962405"
			],
			[
				"postcode" => "2370",
				"suburb" => "DIEHARD",
				"state" => "NSW",
				"lat" => "-29.675395",
				"lon" => "152.088176"
			],
			[
				"postcode" => "2370",
				"suburb" => "DUNDEE",
				"state" => "NSW",
				"lat" => "-29.566687",
				"lon" => "151.865748"
			],
			[
				"postcode" => "2370",
				"suburb" => "FURRACABAD",
				"state" => "NSW",
				"lat" => "-29.778195",
				"lon" => "151.649581"
			],
			[
				"postcode" => "2370",
				"suburb" => "GIBRALTAR RANGE",
				"state" => "NSW",
				"lat" => "-29.643366",
				"lon" => "152.216845"
			],
			[
				"postcode" => "2370",
				"suburb" => "GLEN ELGIN",
				"state" => "NSW",
				"lat" => "-29.580089",
				"lon" => "152.192901"
			],
			[
				"postcode" => "2370",
				"suburb" => "GLEN INNES",
				"state" => "NSW",
				"lat" => "-29.735655",
				"lon" => "151.738526"
			],
			[
				"postcode" => "2370",
				"suburb" => "KINGSGATE",
				"state" => "NSW",
				"lat" => "-29.811793",
				"lon" => "151.998286"
			],
			[
				"postcode" => "2370",
				"suburb" => "KOOKABOOKRA",
				"state" => "NSW",
				"lat" => "-29.990302",
				"lon" => "152.014534"
			],
			[
				"postcode" => "2370",
				"suburb" => "LAMBS VALLEY",
				"state" => "NSW",
				"lat" => "-29.781063",
				"lon" => "151.790514"
			],
			[
				"postcode" => "2370",
				"suburb" => "MATHESON",
				"state" => "NSW",
				"lat" => "-29.720184",
				"lon" => "151.589632"
			],
			[
				"postcode" => "2370",
				"suburb" => "MOGGS SWAMP",
				"state" => "NSW",
				"lat" => "-29.938544",
				"lon" => "152.015823"
			],
			[
				"postcode" => "2370",
				"suburb" => "MOOGEM",
				"state" => "NSW",
				"lat" => "-29.378306",
				"lon" => "152.250071"
			],
			[
				"postcode" => "2370",
				"suburb" => "MORVEN",
				"state" => "NSW",
				"lat" => "-29.38184",
				"lon" => "152.146998"
			],
			[
				"postcode" => "2370",
				"suburb" => "NEWTON BOYD",
				"state" => "NSW",
				"lat" => "-29.75201",
				"lon" => "152.244432"
			],
			[
				"postcode" => "2370",
				"suburb" => "PINKETT",
				"state" => "NSW",
				"lat" => "-29.877975",
				"lon" => "151.94758"
			],
			[
				"postcode" => "2370",
				"suburb" => "RANGERS VALLEY",
				"state" => "NSW",
				"lat" => "-29.529787",
				"lon" => "151.761712"
			],
			[
				"postcode" => "2370",
				"suburb" => "RED RANGE",
				"state" => "NSW",
				"lat" => "-29.794136",
				"lon" => "151.832385"
			],
			[
				"postcode" => "2370",
				"suburb" => "REDDESTONE",
				"state" => "NSW",
				"lat" => "-29.624161",
				"lon" => "151.6709"
			],
			[
				"postcode" => "2370",
				"suburb" => "SHANNON VALE",
				"state" => "NSW",
				"lat" => "-29.731641",
				"lon" => "151.822956"
			],
			[
				"postcode" => "2370",
				"suburb" => "SWAN VALE",
				"state" => "NSW",
				"lat" => "-29.769753",
				"lon" => "151.484701"
			],
			[
				"postcode" => "2370",
				"suburb" => "WELLINGROVE",
				"state" => "NSW",
				"lat" => "-29.64352",
				"lon" => "151.567162"
			],
			[
				"postcode" => "2370",
				"suburb" => "YARROWFORD",
				"state" => "NSW",
				"lat" => "-29.658",
				"lon" => "151.78221"
			],
			[
				"postcode" => "2371",
				"suburb" => "CAPOOMPETA",
				"state" => "NSW",
				"lat" => "-29.393231",
				"lon" => "152.041527"
			],
			[
				"postcode" => "2371",
				"suburb" => "DEEPWATER",
				"state" => "NSW",
				"lat" => "-29.44232",
				"lon" => "151.847464"
			],
			[
				"postcode" => "2371",
				"suburb" => "EMMAVILLE",
				"state" => "NSW",
				"lat" => "-29.443987",
				"lon" => "151.598632"
			],
			[
				"postcode" => "2371",
				"suburb" => "ROCKY CREEK",
				"state" => "NSW",
				"lat" => "-29.280205",
				"lon" => "151.347728"
			],
			[
				"postcode" => "2371",
				"suburb" => "STANNUM",
				"state" => "NSW",
				"lat" => "-29.325076",
				"lon" => "151.790639"
			],
			[
				"postcode" => "2371",
				"suburb" => "TENT HILL",
				"state" => "NSW",
				"lat" => "-29.430034",
				"lon" => "151.655592"
			],
			[
				"postcode" => "2371",
				"suburb" => "THE GULF",
				"state" => "NSW",
				"lat" => "-30.128052",
				"lon" => "152.209727"
			],
			[
				"postcode" => "2371",
				"suburb" => "TORRINGTON",
				"state" => "NSW",
				"lat" => "-29.311987",
				"lon" => "151.696579"
			],
			[
				"postcode" => "2371",
				"suburb" => "WELLINGTON VALE",
				"state" => "NSW",
				"lat" => "-29.426596",
				"lon" => "151.74859"
			],
			[
				"postcode" => "2371",
				"suburb" => "YELLOW DAM",
				"state" => "NSW",
				"lat" => "-29.391357",
				"lon" => "151.404143"
			],
			[
				"postcode" => "2372",
				"suburb" => "BACK CREEK",
				"state" => "NSW",
				"lat" => "-28.931739",
				"lon" => "151.702544"
			],
			[
				"postcode" => "2372",
				"suburb" => "BILLYRIMBA",
				"state" => "NSW",
				"lat" => "-29.173229",
				"lon" => "152.224654"
			],
			[
				"postcode" => "2372",
				"suburb" => "BLACK SWAMP",
				"state" => "NSW",
				"lat" => "-28.990487",
				"lon" => "152.137344"
			],
			[
				"postcode" => "2372",
				"suburb" => "BLUFF ROCK",
				"state" => "NSW",
				"lat" => "-29.168104",
				"lon" => "152.00509"
			],
			[
				"postcode" => "2372",
				"suburb" => "BOLIVIA",
				"state" => "NSW",
				"lat" => "-29.299434",
				"lon" => "151.950188"
			],
			[
				"postcode" => "2372",
				"suburb" => "BOONOO BOONOO",
				"state" => "NSW",
				"lat" => "-28.874075",
				"lon" => "152.102287"
			],
			[
				"postcode" => "2372",
				"suburb" => "BOOROOK",
				"state" => "NSW",
				"lat" => "-28.85927",
				"lon" => "152.245747"
			],
			[
				"postcode" => "2372",
				"suburb" => "BRYANS GAP",
				"state" => "NSW",
				"lat" => "-29.010506",
				"lon" => "152.080323"
			],
			[
				"postcode" => "2372",
				"suburb" => "BUNGULLA",
				"state" => "NSW",
				"lat" => "-29.121121",
				"lon" => "151.997171"
			],
			[
				"postcode" => "2372",
				"suburb" => "CARROLLS CREEK",
				"state" => "NSW",
				"lat" => "-28.83012",
				"lon" => "152.093666"
			],
			[
				"postcode" => "2372",
				"suburb" => "CULLENDORE",
				"state" => "NSW",
				"lat" => "-28.513813",
				"lon" => "152.276759"
			],
			[
				"postcode" => "2372",
				"suburb" => "JENNINGS",
				"state" => "NSW",
				"lat" => "-28.927903",
				"lon" => "151.927109"
			],
			[
				"postcode" => "2372",
				"suburb" => "LEECHS GULLY",
				"state" => "NSW",
				"lat" => "-29.012297",
				"lon" => "152.032025"
			],
			[
				"postcode" => "2372",
				"suburb" => "LISTON",
				"state" => "NSW",
				"lat" => "-28.647747",
				"lon" => "152.086292"
			],
			[
				"postcode" => "2372",
				"suburb" => "MINGOOLA",
				"state" => "NSW",
				"lat" => "-28.990857",
				"lon" => "151.527234"
			],
			[
				"postcode" => "2372",
				"suburb" => "MOLE RIVER",
				"state" => "NSW",
				"lat" => "-29.006939",
				"lon" => "151.564636"
			],
			[
				"postcode" => "2372",
				"suburb" => "MOUNT MACKENZIE",
				"state" => "NSW",
				"lat" => "-29.083289",
				"lon" => "151.950141"
			],
			[
				"postcode" => "2372",
				"suburb" => "PYES CREEK",
				"state" => "NSW",
				"lat" => "-29.230075",
				"lon" => "151.839078"
			],
			[
				"postcode" => "2372",
				"suburb" => "RIVERTREE",
				"state" => "NSW",
				"lat" => "-28.627663",
				"lon" => "152.294309"
			],
			[
				"postcode" => "2372",
				"suburb" => "ROCKY RIVER",
				"state" => "NSW",
				"lat" => "-29.111355",
				"lon" => "152.354169"
			],
			[
				"postcode" => "2372",
				"suburb" => "SANDY FLAT",
				"state" => "NSW",
				"lat" => "-29.233738",
				"lon" => "152.005604"
			],
			[
				"postcode" => "2372",
				"suburb" => "SANDY HILL",
				"state" => "NSW",
				"lat" => "-28.92217",
				"lon" => "152.244322"
			],
			[
				"postcode" => "2372",
				"suburb" => "SILENT GROVE",
				"state" => "NSW",
				"lat" => "-29.147162",
				"lon" => "151.666126"
			],
			[
				"postcode" => "2372",
				"suburb" => "STEINBROOK",
				"state" => "NSW",
				"lat" => "-29.090908",
				"lon" => "152.093607"
			],
			[
				"postcode" => "2372",
				"suburb" => "SUNNYSIDE",
				"state" => "NSW",
				"lat" => "-29.002863",
				"lon" => "151.940619"
			],
			[
				"postcode" => "2372",
				"suburb" => "TARBAN",
				"state" => "NSW",
				"lat" => "-28.974138",
				"lon" => "151.912927"
			],
			[
				"postcode" => "2372",
				"suburb" => "TENTERFIELD",
				"state" => "NSW",
				"lat" => "-29.041657",
				"lon" => "152.021335"
			],
			[
				"postcode" => "2372",
				"suburb" => "THE SCRUB",
				"state" => "NSW",
				"lat" => "-29.149099",
				"lon" => "152.095979"
			],
			[
				"postcode" => "2372",
				"suburb" => "TIMBARRA",
				"state" => "NSW",
				"lat" => "-29.013088",
				"lon" => "152.222653"
			],
			[
				"postcode" => "2372",
				"suburb" => "WILLSONS DOWNFALL",
				"state" => "NSW",
				"lat" => "-28.692134",
				"lon" => "152.089665"
			],
			[
				"postcode" => "2372",
				"suburb" => "WYLIE CREEK",
				"state" => "NSW",
				"lat" => "-28.541481",
				"lon" => "152.152444"
			],
			[
				"postcode" => "2379",
				"suburb" => "GOOLHI",
				"state" => "NSW",
				"lat" => "-31.067541",
				"lon" => "149.712049"
			],
			[
				"postcode" => "2379",
				"suburb" => "MULLALEY",
				"state" => "NSW",
				"lat" => "-31.098523",
				"lon" => "149.908463"
			],
			[
				"postcode" => "2379",
				"suburb" => "NAPIER LANE",
				"state" => "NSW",
				"lat" => "-31.279731",
				"lon" => "149.489254"
			],
			[
				"postcode" => "2379",
				"suburb" => "NOMBI",
				"state" => "NSW",
				"lat" => "-31.203747",
				"lon" => "149.737251"
			],
			[
				"postcode" => "2380",
				"suburb" => "BLUE VALE",
				"state" => "NSW",
				"lat" => "-30.798568",
				"lon" => "150.199631"
			],
			[
				"postcode" => "2380",
				"suburb" => "EMERALD HILL",
				"state" => "NSW",
				"lat" => "-30.868526",
				"lon" => "150.114688"
			],
			[
				"postcode" => "2380",
				"suburb" => "GHOOLENDAADI",
				"state" => "NSW",
				"lat" => "-30.948106",
				"lon" => "149.918776"
			],
			[
				"postcode" => "2380",
				"suburb" => "GUNNEDAH",
				"state" => "NSW",
				"lat" => "-30.978589",
				"lon" => "150.255412"
			],
			[
				"postcode" => "2380",
				"suburb" => "KELVIN",
				"state" => "NSW",
				"lat" => "-30.792246",
				"lon" => "150.35467"
			],
			[
				"postcode" => "2380",
				"suburb" => "MARYS MOUNT",
				"state" => "NSW",
				"lat" => "-31.007802",
				"lon" => "150.06122"
			],
			[
				"postcode" => "2380",
				"suburb" => "MILROY",
				"state" => "NSW",
				"lat" => "-31.116818",
				"lon" => "150.148128"
			],
			[
				"postcode" => "2380",
				"suburb" => "ORANGE GROVE",
				"state" => "NSW",
				"lat" => "-30.969686",
				"lon" => "150.393835"
			],
			[
				"postcode" => "2380",
				"suburb" => "RANGARI",
				"state" => "NSW",
				"lat" => "-30.676765",
				"lon" => "150.442817"
			],
			[
				"postcode" => "2381",
				"suburb" => "BREEZA",
				"state" => "NSW",
				"lat" => "-31.244175",
				"lon" => "150.457901"
			],
			[
				"postcode" => "2381",
				"suburb" => "CURLEWIS",
				"state" => "NSW",
				"lat" => "-31.117342",
				"lon" => "150.264679"
			],
			[
				"postcode" => "2381",
				"suburb" => "PREMER",
				"state" => "NSW",
				"lat" => "-31.452598",
				"lon" => "149.902147"
			],
			[
				"postcode" => "2381",
				"suburb" => "TAMBAR SPRINGS",
				"state" => "NSW",
				"lat" => "-31.345202",
				"lon" => "149.82918"
			],
			[
				"postcode" => "2382",
				"suburb" => "BOGGABRI",
				"state" => "NSW",
				"lat" => "-30.704728",
				"lon" => "150.042508"
			],
			[
				"postcode" => "2382",
				"suburb" => "MAULES CREEK",
				"state" => "NSW",
				"lat" => "-30.483004",
				"lon" => "150.080679"
			],
			[
				"postcode" => "2382",
				"suburb" => "WEAN",
				"state" => "NSW",
				"lat" => "-30.680651",
				"lon" => "150.233767"
			],
			[
				"postcode" => "2382",
				"suburb" => "WILLALA",
				"state" => "NSW",
				"lat" => "-30.79757",
				"lon" => "149.857295"
			],
			[
				"postcode" => "2386",
				"suburb" => "BURREN JUNCTION",
				"state" => "NSW",
				"lat" => "-30.105176",
				"lon" => "148.965674"
			],
			[
				"postcode" => "2386",
				"suburb" => "DRILDOOL",
				"state" => "NSW",
				"lat" => "-30.258922",
				"lon" => "149.031594"
			],
			[
				"postcode" => "2386",
				"suburb" => "NOWLEY",
				"state" => "NSW",
				"lat" => "-29.982046",
				"lon" => "149.187347"
			],
			[
				"postcode" => "2387",
				"suburb" => "BULYEROI",
				"state" => "NSW",
				"lat" => "-29.780297",
				"lon" => "149.090561"
			],
			[
				"postcode" => "2387",
				"suburb" => "ROWENA",
				"state" => "NSW",
				"lat" => "-29.796578",
				"lon" => "148.935905"
			],
			[
				"postcode" => "2388",
				"suburb" => "BOOLCARROLL",
				"state" => "NSW",
				"lat" => "-30.087425",
				"lon" => "149.438586"
			],
			[
				"postcode" => "2388",
				"suburb" => "CUTTABRI",
				"state" => "NSW",
				"lat" => "-30.329854",
				"lon" => "149.221121"
			],
			[
				"postcode" => "2388",
				"suburb" => "JEWS LAGOON",
				"state" => "NSW",
				"lat" => "-29.919034",
				"lon" => "149.435524"
			],
			[
				"postcode" => "2388",
				"suburb" => "MERAH NORTH",
				"state" => "NSW",
				"lat" => "-30.145758",
				"lon" => "149.215721"
			],
			[
				"postcode" => "2388",
				"suburb" => "PILLIGA",
				"state" => "NSW",
				"lat" => "-30.351861",
				"lon" => "148.890833"
			],
			[
				"postcode" => "2388",
				"suburb" => "SPRING PLAINS",
				"state" => "NSW",
				"lat" => "-29.99844",
				"lon" => "149.312765"
			],
			[
				"postcode" => "2388",
				"suburb" => "THE PILLIGA",
				"state" => "NSW",
				"lat" => "-30.351861",
				"lon" => "148.890833"
			],
			[
				"postcode" => "2388",
				"suburb" => "WEE WAA",
				"state" => "NSW",
				"lat" => "-30.224868",
				"lon" => "149.444421"
			],
			[
				"postcode" => "2388",
				"suburb" => "YARRIE LAKE",
				"state" => "NSW",
				"lat" => "-30.395737",
				"lon" => "149.536629"
			],
			[
				"postcode" => "2390",
				"suburb" => "BAAN BAA",
				"state" => "NSW",
				"lat" => "-30.60138",
				"lon" => "149.966153"
			],
			[
				"postcode" => "2390",
				"suburb" => "BACK CREEK",
				"state" => "NSW",
				"lat" => "-30.108145",
				"lon" => "150.275755"
			],
			[
				"postcode" => "2390",
				"suburb" => "BERRIGAL",
				"state" => "NSW",
				"lat" => "-29.901785",
				"lon" => "149.900377"
			],
			[
				"postcode" => "2390",
				"suburb" => "BOHENA CREEK",
				"state" => "NSW",
				"lat" => "-30.439473",
				"lon" => "149.66193"
			],
			[
				"postcode" => "2390",
				"suburb" => "BULLAWA CREEK",
				"state" => "NSW",
				"lat" => "-30.307143",
				"lon" => "149.996476"
			],
			[
				"postcode" => "2390",
				"suburb" => "COURADDA",
				"state" => "NSW",
				"lat" => "-30.035799",
				"lon" => "149.990921"
			],
			[
				"postcode" => "2390",
				"suburb" => "EDGEROI",
				"state" => "NSW",
				"lat" => "-30.117398",
				"lon" => "149.799587"
			],
			[
				"postcode" => "2390",
				"suburb" => "EULAH CREEK",
				"state" => "NSW",
				"lat" => "-30.336194",
				"lon" => "149.984659"
			],
			[
				"postcode" => "2390",
				"suburb" => "HARPARARY",
				"state" => "NSW",
				"lat" => "-30.532363",
				"lon" => "150.010416"
			],
			[
				"postcode" => "2390",
				"suburb" => "JACKS CREEK",
				"state" => "NSW",
				"lat" => "-30.454703",
				"lon" => "149.739878"
			],
			[
				"postcode" => "2390",
				"suburb" => "KAPUTAR",
				"state" => "NSW",
				"lat" => "-30.282413",
				"lon" => "150.153021"
			],
			[
				"postcode" => "2390",
				"suburb" => "NARRABRI",
				"state" => "NSW",
				"lat" => "-30.324835",
				"lon" => "149.782833"
			],
			[
				"postcode" => "2390",
				"suburb" => "NARRABRI WEST",
				"state" => "NSW",
				"lat" => "-30.34053",
				"lon" => "149.756588"
			],
			[
				"postcode" => "2390",
				"suburb" => "ROCKY CREEK",
				"state" => "NSW",
				"lat" => "-30.038727",
				"lon" => "150.270094"
			],
			[
				"postcode" => "2390",
				"suburb" => "TARRIARO",
				"state" => "NSW",
				"lat" => "-30.428548",
				"lon" => "149.926389"
			],
			[
				"postcode" => "2390",
				"suburb" => "TURRAWAN",
				"state" => "NSW",
				"lat" => "-30.456477",
				"lon" => "149.885748"
			],
			[
				"postcode" => "2395",
				"suburb" => "BINNAWAY",
				"state" => "NSW",
				"lat" => "-31.552115",
				"lon" => "149.378497"
			],
			[
				"postcode" => "2395",
				"suburb" => "ROPERS ROAD",
				"state" => "NSW",
				"lat" => "-31.539932",
				"lon" => "149.442658"
			],
			[
				"postcode" => "2395",
				"suburb" => "WEETALIBA",
				"state" => "NSW",
				"lat" => "-31.643631",
				"lon" => "149.586456"
			],
			[
				"postcode" => "2396",
				"suburb" => "BARADINE",
				"state" => "NSW",
				"lat" => "-30.943207",
				"lon" => "149.065815"
			],
			[
				"postcode" => "2396",
				"suburb" => "BARWON",
				"state" => "NSW",
				"lat" => "-31.036134",
				"lon" => "148.979059"
			],
			[
				"postcode" => "2396",
				"suburb" => "GOORIANAWA",
				"state" => "NSW",
				"lat" => "-31.067394",
				"lon" => "149.020018"
			],
			[
				"postcode" => "2396",
				"suburb" => "KENEBRI",
				"state" => "NSW",
				"lat" => "-30.748118",
				"lon" => "148.923272"
			],
			[
				"postcode" => "2397",
				"suburb" => "BELLATA",
				"state" => "NSW",
				"lat" => "-29.919624",
				"lon" => "149.790978"
			],
			[
				"postcode" => "2397",
				"suburb" => "MILLIE",
				"state" => "NSW",
				"lat" => "-29.814588",
				"lon" => "149.563278"
			],
			[
				"postcode" => "2397",
				"suburb" => "THALABA",
				"state" => "NSW",
				"lat" => "-29.795542",
				"lon" => "149.284514"
			],
			[
				"postcode" => "2398",
				"suburb" => "GURLEY",
				"state" => "NSW",
				"lat" => "-29.735601",
				"lon" => "149.79988"
			],
			[
				"postcode" => "2399",
				"suburb" => "BINIGUY",
				"state" => "NSW",
				"lat" => "-29.580064",
				"lon" => "150.136946"
			],
			[
				"postcode" => "2399",
				"suburb" => "PALLAMALLAWA",
				"state" => "NSW",
				"lat" => "-29.475108",
				"lon" => "150.136975"
			],
			[
				"postcode" => "2400",
				"suburb" => "ASHLEY",
				"state" => "NSW",
				"lat" => "-29.317772",
				"lon" => "149.808064"
			],
			[
				"postcode" => "2400",
				"suburb" => "BULLARAH",
				"state" => "NSW",
				"lat" => "-29.465149",
				"lon" => "149.081732"
			],
			[
				"postcode" => "2400",
				"suburb" => "CROOBLE",
				"state" => "NSW",
				"lat" => "-29.269206",
				"lon" => "150.252228"
			],
			[
				"postcode" => "2400",
				"suburb" => "MALLOWA",
				"state" => "NSW",
				"lat" => "-29.653014",
				"lon" => "149.383525"
			],
			[
				"postcode" => "2400",
				"suburb" => "MOREE",
				"state" => "NSW",
				"lat" => "-29.462975",
				"lon" => "149.841581"
			],
			[
				"postcode" => "2400",
				"suburb" => "MOREE EAST",
				"state" => "NSW",
				"lat" => "-29.471256",
				"lon" => "149.846553"
			],
			[
				"postcode" => "2400",
				"suburb" => "TERRY HIE HIE",
				"state" => "NSW",
				"lat" => "-29.795598",
				"lon" => "150.151075"
			],
			[
				"postcode" => "2400",
				"suburb" => "TULLOONA",
				"state" => "NSW",
				"lat" => "-28.851636",
				"lon" => "150.077217"
			],
			[
				"postcode" => "2400",
				"suburb" => "YARRAMAN",
				"state" => "NSW",
				"lat" => "-31.669437",
				"lon" => "150.14975"
			],
			[
				"postcode" => "2401",
				"suburb" => "GRAVESEND",
				"state" => "NSW",
				"lat" => "-29.582339",
				"lon" => "150.337609"
			],
			[
				"postcode" => "2402",
				"suburb" => "BALFOURS PEAK",
				"state" => "NSW",
				"lat" => "-29.510948",
				"lon" => "150.751185"
			],
			[
				"postcode" => "2402",
				"suburb" => "COOLATAI",
				"state" => "NSW",
				"lat" => "-29.268259",
				"lon" => "150.734491"
			],
			[
				"postcode" => "2402",
				"suburb" => "WARIALDA",
				"state" => "NSW",
				"lat" => "-29.541176",
				"lon" => "150.576165"
			],
			[
				"postcode" => "2402",
				"suburb" => "WARIALDA RAIL",
				"state" => "NSW",
				"lat" => "-29.583725",
				"lon" => "150.536881"
			],
			[
				"postcode" => "2403",
				"suburb" => "DELUNGRA",
				"state" => "NSW",
				"lat" => "-29.652485",
				"lon" => "150.830948"
			],
			[
				"postcode" => "2403",
				"suburb" => "GRAGIN",
				"state" => "NSW",
				"lat" => "-29.558672",
				"lon" => "150.763816"
			],
			[
				"postcode" => "2403",
				"suburb" => "MYALL CREEK",
				"state" => "NSW",
				"lat" => "-29.751957",
				"lon" => "150.700503"
			],
			[
				"postcode" => "2404",
				"suburb" => "BANGHEET",
				"state" => "NSW",
				"lat" => "-29.804159",
				"lon" => "150.478053"
			],
			[
				"postcode" => "2404",
				"suburb" => "BINGARA",
				"state" => "NSW",
				"lat" => "-29.868713",
				"lon" => "150.571783"
			],
			[
				"postcode" => "2404",
				"suburb" => "DINOGA",
				"state" => "NSW",
				"lat" => "-29.913543",
				"lon" => "150.639454"
			],
			[
				"postcode" => "2404",
				"suburb" => "ELCOMBE",
				"state" => "NSW",
				"lat" => "-29.853824",
				"lon" => "150.514282"
			],
			[
				"postcode" => "2404",
				"suburb" => "GINEROI",
				"state" => "NSW",
				"lat" => "-29.680079",
				"lon" => "150.45112"
			],
			[
				"postcode" => "2404",
				"suburb" => "KEERA",
				"state" => "NSW",
				"lat" => "-29.989848",
				"lon" => "150.87219"
			],
			[
				"postcode" => "2404",
				"suburb" => "PALLAL",
				"state" => "NSW",
				"lat" => "-29.97024",
				"lon" => "150.428611"
			],
			[
				"postcode" => "2404",
				"suburb" => "RIVERVIEW",
				"state" => "NSW",
				"lat" => "-29.904643",
				"lon" => "150.687307"
			],
			[
				"postcode" => "2404",
				"suburb" => "UPPER BINGARA",
				"state" => "NSW",
				"lat" => "-30.05898",
				"lon" => "150.644229"
			],
			[
				"postcode" => "2405",
				"suburb" => "BOOMI",
				"state" => "NSW",
				"lat" => "-28.725412",
				"lon" => "149.57915"
			],
			[
				"postcode" => "2405",
				"suburb" => "GARAH",
				"state" => "NSW",
				"lat" => "-29.075482",
				"lon" => "149.636398"
			],
			[
				"postcode" => "2406",
				"suburb" => "MUNGINDI",
				"state" => "NSW",
				"lat" => "-28.999013",
				"lon" => "149.100731"
			],
			[
				"postcode" => "2406",
				"suburb" => "WEEMELAH",
				"state" => "NSW",
				"lat" => "-29.017622",
				"lon" => "149.253657"
			],
			[
				"postcode" => "2408",
				"suburb" => "NORTH STAR",
				"state" => "NSW",
				"lat" => "-28.93259",
				"lon" => "150.391368"
			],
			[
				"postcode" => "2409",
				"suburb" => "BOGGABILLA",
				"state" => "NSW",
				"lat" => "-28.744821",
				"lon" => "150.415347"
			],
			[
				"postcode" => "2409",
				"suburb" => "BOONAL",
				"state" => "NSW",
				"lat" => "-28.785002",
				"lon" => "150.523603"
			],
			[
				"postcode" => "2410",
				"suburb" => "BLUE NOBBY",
				"state" => "NSW",
				"lat" => "-29.045063",
				"lon" => "150.644388"
			],
			[
				"postcode" => "2410",
				"suburb" => "TWIN RIVERS",
				"state" => "NSW",
				"lat" => "-28.651569",
				"lon" => "150.731604"
			],
			[
				"postcode" => "2410",
				"suburb" => "YETMAN",
				"state" => "NSW",
				"lat" => "-28.902557",
				"lon" => "150.780675"
			],
			[
				"postcode" => "2411",
				"suburb" => "CROPPA CREEK",
				"state" => "NSW",
				"lat" => "-29.129441",
				"lon" => "150.381167"
			],
			[
				"postcode" => "2411",
				"suburb" => "YALLAROI",
				"state" => "NSW",
				"lat" => "-29.119429",
				"lon" => "150.480818"
			],
			[
				"postcode" => "2415",
				"suburb" => "MONKERAI",
				"state" => "NSW",
				"lat" => "-32.292336",
				"lon" => "151.859784"
			],
			[
				"postcode" => "2415",
				"suburb" => "NOOROO",
				"state" => "NSW",
				"lat" => "-32.3805",
				"lon" => "151.887703"
			],
			[
				"postcode" => "2415",
				"suburb" => "STROUD ROAD",
				"state" => "NSW",
				"lat" => "-32.344759",
				"lon" => "151.929068"
			],
			[
				"postcode" => "2415",
				"suburb" => "UPPER KARUAH RIVER",
				"state" => "NSW",
				"lat" => "-32.195999",
				"lon" => "151.792437"
			],
			[
				"postcode" => "2415",
				"suburb" => "WEISMANTELS",
				"state" => "NSW",
				"lat" => "-32.258251",
				"lon" => "151.93837"
			],
			[
				"postcode" => "2420",
				"suburb" => "ALISON",
				"state" => "NSW",
				"lat" => "-32.434801",
				"lon" => "151.771934"
			],
			[
				"postcode" => "2420",
				"suburb" => "BANDON GROVE",
				"state" => "NSW",
				"lat" => "-32.299862",
				"lon" => "151.71589"
			],
			[
				"postcode" => "2420",
				"suburb" => "BENDOLBA",
				"state" => "NSW",
				"lat" => "-32.326976",
				"lon" => "151.725998"
			],
			[
				"postcode" => "2420",
				"suburb" => "BROOKFIELD",
				"state" => "NSW",
				"lat" => "-32.505586",
				"lon" => "151.762128"
			],
			[
				"postcode" => "2420",
				"suburb" => "CAMBRA",
				"state" => "NSW",
				"lat" => "-32.455835",
				"lon" => "151.83046"
			],
			[
				"postcode" => "2420",
				"suburb" => "CHICHESTER",
				"state" => "NSW",
				"lat" => "-32.195437",
				"lon" => "151.618784"
			],
			[
				"postcode" => "2420",
				"suburb" => "DUNGOG",
				"state" => "NSW",
				"lat" => "-32.403867",
				"lon" => "151.757171"
			],
			[
				"postcode" => "2420",
				"suburb" => "FLAT TOPS",
				"state" => "NSW",
				"lat" => "-32.461896",
				"lon" => "151.812104"
			],
			[
				"postcode" => "2420",
				"suburb" => "FOSTERTON",
				"state" => "NSW",
				"lat" => "-32.324801",
				"lon" => "151.751205"
			],
			[
				"postcode" => "2420",
				"suburb" => "HANLEYS CREEK",
				"state" => "NSW",
				"lat" => "-32.423202",
				"lon" => "151.69674"
			],
			[
				"postcode" => "2420",
				"suburb" => "HILLDALE",
				"state" => "NSW",
				"lat" => "-32.503221",
				"lon" => "151.65007"
			],
			[
				"postcode" => "2420",
				"suburb" => "MAIN CREEK",
				"state" => "NSW",
				"lat" => "-32.341469",
				"lon" => "151.822523"
			],
			[
				"postcode" => "2420",
				"suburb" => "MARSHDALE",
				"state" => "NSW",
				"lat" => "-32.444218",
				"lon" => "151.789236"
			],
			[
				"postcode" => "2420",
				"suburb" => "MARTINS CREEK",
				"state" => "NSW",
				"lat" => "-32.555529",
				"lon" => "151.612337"
			],
			[
				"postcode" => "2420",
				"suburb" => "MUNNI",
				"state" => "NSW",
				"lat" => "-32.306105",
				"lon" => "151.680478"
			],
			[
				"postcode" => "2420",
				"suburb" => "SALISBURY",
				"state" => "NSW",
				"lat" => "-32.214984",
				"lon" => "151.559446"
			],
			[
				"postcode" => "2420",
				"suburb" => "STROUD HILL",
				"state" => "NSW",
				"lat" => "-32.37666",
				"lon" => "151.811875"
			],
			[
				"postcode" => "2420",
				"suburb" => "SUGARLOAF",
				"state" => "NSW",
				"lat" => "-32.387123",
				"lon" => "151.714048"
			],
			[
				"postcode" => "2420",
				"suburb" => "TABBIL CREEK",
				"state" => "NSW",
				"lat" => "-32.426194",
				"lon" => "151.737957"
			],
			[
				"postcode" => "2420",
				"suburb" => "UNDERBANK",
				"state" => "NSW",
				"lat" => "-32.248825",
				"lon" => "151.600986"
			],
			[
				"postcode" => "2420",
				"suburb" => "WALLARINGA",
				"state" => "NSW",
				"lat" => "-32.452694",
				"lon" => "151.681448"
			],
			[
				"postcode" => "2420",
				"suburb" => "WALLAROBBA",
				"state" => "NSW",
				"lat" => "-32.497237",
				"lon" => "151.697483"
			],
			[
				"postcode" => "2420",
				"suburb" => "WIRRAGULLA",
				"state" => "NSW",
				"lat" => "-32.467491",
				"lon" => "151.739257"
			],
			[
				"postcode" => "2421",
				"suburb" => "FISHERS HILL",
				"state" => "NSW",
				"lat" => "-32.507287",
				"lon" => "151.532802"
			],
			[
				"postcode" => "2421",
				"suburb" => "PATERSON",
				"state" => "NSW",
				"lat" => "-32.599153",
				"lon" => "151.618293"
			],
			[
				"postcode" => "2421",
				"suburb" => "TOCAL",
				"state" => "NSW",
				"lat" => "-32.639957",
				"lon" => "151.591246"
			],
			[
				"postcode" => "2421",
				"suburb" => "TORRYBURN",
				"state" => "NSW",
				"lat" => "-32.474783",
				"lon" => "151.588794"
			],
			[
				"postcode" => "2421",
				"suburb" => "VACY",
				"state" => "NSW",
				"lat" => "-32.543458",
				"lon" => "151.57715"
			],
			[
				"postcode" => "2421",
				"suburb" => "WEBBERS CREEK",
				"state" => "NSW",
				"lat" => "-32.588677",
				"lon" => "151.528436"
			],
			[
				"postcode" => "2422",
				"suburb" => "BACK CREEK",
				"state" => "NSW",
				"lat" => "-31.972237",
				"lon" => "152.065675"
			],
			[
				"postcode" => "2422",
				"suburb" => "BAKERS CREEK",
				"state" => "NSW",
				"lat" => "-31.960468",
				"lon" => "152.108511"
			],
			[
				"postcode" => "2422",
				"suburb" => "BARRINGTON",
				"state" => "NSW",
				"lat" => "-31.973631",
				"lon" => "151.910491"
			],
			[
				"postcode" => "2422",
				"suburb" => "BARRINGTON TOPS",
				"state" => "NSW",
				"lat" => "-31.897867",
				"lon" => "151.570361"
			],
			[
				"postcode" => "2422",
				"suburb" => "BAXTERS RIDGE",
				"state" => "NSW",
				"lat" => "-31.711123",
				"lon" => "151.854774"
			],
			[
				"postcode" => "2422",
				"suburb" => "BELBORA",
				"state" => "NSW",
				"lat" => "-32.003282",
				"lon" => "152.157652"
			],
			[
				"postcode" => "2422",
				"suburb" => "BERRICO",
				"state" => "NSW",
				"lat" => "-32.067785",
				"lon" => "151.831818"
			],
			[
				"postcode" => "2422",
				"suburb" => "BINDERA",
				"state" => "NSW",
				"lat" => "-32.026657",
				"lon" => "151.820301"
			],
			[
				"postcode" => "2422",
				"suburb" => "BOWMAN",
				"state" => "NSW",
				"lat" => "-31.933384",
				"lon" => "151.830381"
			],
			[
				"postcode" => "2422",
				"suburb" => "BOWMAN FARM",
				"state" => "NSW",
				"lat" => "-31.925318",
				"lon" => "151.920288"
			],
			[
				"postcode" => "2422",
				"suburb" => "BRETTI",
				"state" => "NSW",
				"lat" => "-31.786844",
				"lon" => "151.923449"
			],
			[
				"postcode" => "2422",
				"suburb" => "BULLIAC",
				"state" => "NSW",
				"lat" => "-31.91636",
				"lon" => "152.036957"
			],
			[
				"postcode" => "2422",
				"suburb" => "BUNDOOK",
				"state" => "NSW",
				"lat" => "-31.907461",
				"lon" => "152.136524"
			],
			[
				"postcode" => "2422",
				"suburb" => "CALLAGHANS CREEK",
				"state" => "NSW",
				"lat" => "-31.842276",
				"lon" => "152.060743"
			],
			[
				"postcode" => "2422",
				"suburb" => "COBARK",
				"state" => "NSW",
				"lat" => "-31.926551",
				"lon" => "151.68542"
			],
			[
				"postcode" => "2422",
				"suburb" => "CONEAC",
				"state" => "NSW",
				"lat" => "-31.875586",
				"lon" => "151.817527"
			],
			[
				"postcode" => "2422",
				"suburb" => "COPELAND",
				"state" => "NSW",
				"lat" => "-31.985892",
				"lon" => "151.805912"
			],
			[
				"postcode" => "2422",
				"suburb" => "CRAVEN",
				"state" => "NSW",
				"lat" => "-32.151073",
				"lon" => "151.944997"
			],
			[
				"postcode" => "2422",
				"suburb" => "CRAVEN PLATEAU",
				"state" => "NSW",
				"lat" => "-31.878916",
				"lon" => "151.775719"
			],
			[
				"postcode" => "2422",
				"suburb" => "CURRICABARK",
				"state" => "NSW",
				"lat" => "-31.740053",
				"lon" => "151.646726"
			],
			[
				"postcode" => "2422",
				"suburb" => "DEWITT",
				"state" => "NSW",
				"lat" => "-31.795148",
				"lon" => "151.777167"
			],
			[
				"postcode" => "2422",
				"suburb" => "FAULKLAND",
				"state" => "NSW",
				"lat" => "-32.062122",
				"lon" => "151.877539"
			],
			[
				"postcode" => "2422",
				"suburb" => "FORBESDALE",
				"state" => "NSW",
				"lat" => "-32.077564",
				"lon" => "151.936002"
			],
			[
				"postcode" => "2422",
				"suburb" => "GANGAT",
				"state" => "NSW",
				"lat" => "-32.021249",
				"lon" => "152.070217"
			],
			[
				"postcode" => "2422",
				"suburb" => "GIRO",
				"state" => "NSW",
				"lat" => "-31.736222",
				"lon" => "151.854292"
			],
			[
				"postcode" => "2422",
				"suburb" => "GLEN WARD",
				"state" => "NSW",
				"lat" => "-31.818233",
				"lon" => "151.651821"
			],
			[
				"postcode" => "2422",
				"suburb" => "GLOUCESTER",
				"state" => "NSW",
				"lat" => "-32.007036",
				"lon" => "151.958362"
			],
			[
				"postcode" => "2422",
				"suburb" => "GLOUCESTER TOPS",
				"state" => "NSW",
				"lat" => "-32.049433",
				"lon" => "151.625369"
			],
			[
				"postcode" => "2422",
				"suburb" => "INVERGORDON",
				"state" => "NSW",
				"lat" => "-32.045612",
				"lon" => "151.761866"
			],
			[
				"postcode" => "2422",
				"suburb" => "KIA ORA",
				"state" => "NSW",
				"lat" => "-31.960733",
				"lon" => "151.971566"
			],
			[
				"postcode" => "2422",
				"suburb" => "MARES RUN",
				"state" => "NSW",
				"lat" => "-31.635862",
				"lon" => "151.801761"
			],
			[
				"postcode" => "2422",
				"suburb" => "MERNOT",
				"state" => "NSW",
				"lat" => "-31.663808",
				"lon" => "151.564251"
			],
			[
				"postcode" => "2422",
				"suburb" => "MOGRANI",
				"state" => "NSW",
				"lat" => "-32.02044",
				"lon" => "152.03438"
			],
			[
				"postcode" => "2422",
				"suburb" => "MOPPY",
				"state" => "NSW",
				"lat" => "-31.979032",
				"lon" => "151.630965"
			],
			[
				"postcode" => "2422",
				"suburb" => "RAWDON VALE",
				"state" => "NSW",
				"lat" => "-31.995838",
				"lon" => "151.709186"
			],
			[
				"postcode" => "2422",
				"suburb" => "ROOKHURST",
				"state" => "NSW",
				"lat" => "-31.894146",
				"lon" => "151.879386"
			],
			[
				"postcode" => "2422",
				"suburb" => "STRATFORD",
				"state" => "NSW",
				"lat" => "-32.119279",
				"lon" => "151.937941"
			],
			[
				"postcode" => "2422",
				"suburb" => "TERREEL",
				"state" => "NSW",
				"lat" => "-32.23404",
				"lon" => "152.012742"
			],
			[
				"postcode" => "2422",
				"suburb" => "TIBBUC",
				"state" => "NSW",
				"lat" => "-31.822002",
				"lon" => "151.909262"
			],
			[
				"postcode" => "2422",
				"suburb" => "TITAATEE CREEK",
				"state" => "NSW",
				"lat" => "-32.04095",
				"lon" => "152.115324"
			],
			[
				"postcode" => "2422",
				"suburb" => "TUGRABAKH",
				"state" => "NSW",
				"lat" => "-31.970177",
				"lon" => "151.995245"
			],
			[
				"postcode" => "2422",
				"suburb" => "UPPER BOWMAN",
				"state" => "NSW",
				"lat" => "-31.922744",
				"lon" => "151.780768"
			],
			[
				"postcode" => "2422",
				"suburb" => "WALLANBAH",
				"state" => "NSW",
				"lat" => "-32.074933",
				"lon" => "152.100168"
			],
			[
				"postcode" => "2422",
				"suburb" => "WARDS RIVER",
				"state" => "NSW",
				"lat" => "-32.223467",
				"lon" => "151.935901"
			],
			[
				"postcode" => "2422",
				"suburb" => "WAUKIVORY",
				"state" => "NSW",
				"lat" => "-32.110593",
				"lon" => "152.052681"
			],
			[
				"postcode" => "2422",
				"suburb" => "WOKO",
				"state" => "NSW",
				"lat" => "-31.831182",
				"lon" => "151.86568"
			],
			[
				"postcode" => "2423",
				"suburb" => "BOMBAH POINT",
				"state" => "NSW",
				"lat" => "-32.494001",
				"lon" => "152.276285"
			],
			[
				"postcode" => "2423",
				"suburb" => "BOOLAMBAYTE",
				"state" => "NSW",
				"lat" => "-32.406627",
				"lon" => "152.271206"
			],
			[
				"postcode" => "2423",
				"suburb" => "BULAHDELAH",
				"state" => "NSW",
				"lat" => "-32.413376",
				"lon" => "152.207981"
			],
			[
				"postcode" => "2423",
				"suburb" => "BUNGWAHL",
				"state" => "NSW",
				"lat" => "-32.387265",
				"lon" => "152.444151"
			],
			[
				"postcode" => "2423",
				"suburb" => "COOLONGOLOOK",
				"state" => "NSW",
				"lat" => "-32.21868",
				"lon" => "152.321932"
			],
			[
				"postcode" => "2423",
				"suburb" => "CRAWFORD RIVER",
				"state" => "NSW",
				"lat" => "-32.442632",
				"lon" => "152.156528"
			],
			[
				"postcode" => "2423",
				"suburb" => "MARKWELL",
				"state" => "NSW",
				"lat" => "-32.320298",
				"lon" => "152.181811"
			],
			[
				"postcode" => "2423",
				"suburb" => "MAYERS FLAT",
				"state" => "NSW",
				"lat" => "-32.395128",
				"lon" => "152.30757"
			],
			[
				"postcode" => "2423",
				"suburb" => "MUNGO BRUSH",
				"state" => "NSW",
				"lat" => "-32.516202",
				"lon" => "152.323521"
			],
			[
				"postcode" => "2423",
				"suburb" => "MYALL LAKE",
				"state" => "NSW",
				"lat" => "-32.433695",
				"lon" => "152.392939"
			],
			[
				"postcode" => "2423",
				"suburb" => "NERONG",
				"state" => "NSW",
				"lat" => "-32.523533",
				"lon" => "152.198243"
			],
			[
				"postcode" => "2423",
				"suburb" => "SEAL ROCKS",
				"state" => "NSW",
				"lat" => "-32.435312",
				"lon" => "152.528898"
			],
			[
				"postcode" => "2423",
				"suburb" => "TOPI TOPI",
				"state" => "NSW",
				"lat" => "-32.355273",
				"lon" => "152.347679"
			],
			[
				"postcode" => "2423",
				"suburb" => "UPPER MYALL",
				"state" => "NSW",
				"lat" => "-32.251962",
				"lon" => "152.172288"
			],
			[
				"postcode" => "2423",
				"suburb" => "VIOLET HILL",
				"state" => "NSW",
				"lat" => "-32.436596",
				"lon" => "152.314741"
			],
			[
				"postcode" => "2423",
				"suburb" => "WALLINGAT",
				"state" => "NSW",
				"lat" => "-32.324678",
				"lon" => "152.440405"
			],
			[
				"postcode" => "2423",
				"suburb" => "WANG WAUK",
				"state" => "NSW",
				"lat" => "-32.159965",
				"lon" => "152.291938"
			],
			[
				"postcode" => "2423",
				"suburb" => "WARRANULLA",
				"state" => "NSW",
				"lat" => "-32.214499",
				"lon" => "152.150595"
			],
			[
				"postcode" => "2423",
				"suburb" => "WILLINA",
				"state" => "NSW",
				"lat" => "-32.170872",
				"lon" => "152.283469"
			],
			[
				"postcode" => "2423",
				"suburb" => "WOOTTON",
				"state" => "NSW",
				"lat" => "-32.325336",
				"lon" => "152.279476"
			],
			[
				"postcode" => "2423",
				"suburb" => "YAGON",
				"state" => "NSW",
				"lat" => "-32.448948",
				"lon" => "152.444072"
			],
			[
				"postcode" => "2424",
				"suburb" => "CAFFREYS FLAT",
				"state" => "NSW",
				"lat" => "-31.802185",
				"lon" => "152.068568"
			],
			[
				"postcode" => "2424",
				"suburb" => "CELLS RIVER",
				"state" => "NSW",
				"lat" => "-31.553043",
				"lon" => "152.062941"
			],
			[
				"postcode" => "2424",
				"suburb" => "COOPLACURRIPA",
				"state" => "NSW",
				"lat" => "-31.602174",
				"lon" => "151.885851"
			],
			[
				"postcode" => "2424",
				"suburb" => "CUNDLE FLAT",
				"state" => "NSW",
				"lat" => "-31.827106",
				"lon" => "152.023798"
			],
			[
				"postcode" => "2424",
				"suburb" => "KNORRIT FLAT",
				"state" => "NSW",
				"lat" => "-31.842995",
				"lon" => "152.124677"
			],
			[
				"postcode" => "2424",
				"suburb" => "MOUNT GEORGE",
				"state" => "NSW",
				"lat" => "-31.884445",
				"lon" => "152.181488"
			],
			[
				"postcode" => "2424",
				"suburb" => "NUMBER ONE",
				"state" => "NSW",
				"lat" => "-31.721121",
				"lon" => "152.064757"
			],
			[
				"postcode" => "2424",
				"suburb" => "TIRI",
				"state" => "NSW",
				"lat" => "-31.843861",
				"lon" => "152.077642"
			],
			[
				"postcode" => "2425",
				"suburb" => "ALLWORTH",
				"state" => "NSW",
				"lat" => "-32.541688",
				"lon" => "151.960927"
			],
			[
				"postcode" => "2425",
				"suburb" => "BOORAL",
				"state" => "NSW",
				"lat" => "-32.479751",
				"lon" => "152.001752"
			],
			[
				"postcode" => "2425",
				"suburb" => "GIRVAN",
				"state" => "NSW",
				"lat" => "-32.467867",
				"lon" => "152.068465"
			],
			[
				"postcode" => "2425",
				"suburb" => "STROUD",
				"state" => "NSW",
				"lat" => "-32.402364",
				"lon" => "151.966607"
			],
			[
				"postcode" => "2425",
				"suburb" => "THE BRANCH",
				"state" => "NSW",
				"lat" => "-32.605394",
				"lon" => "152.01729"
			],
			[
				"postcode" => "2425",
				"suburb" => "WASHPOOL",
				"state" => "NSW",
				"lat" => "-32.359194",
				"lon" => "151.913137"
			],
			[
				"postcode" => "2426",
				"suburb" => "COOPERNOOK",
				"state" => "NSW",
				"lat" => "-31.826246",
				"lon" => "152.609896"
			],
			[
				"postcode" => "2426",
				"suburb" => "LANGLEY VALE",
				"state" => "NSW",
				"lat" => "-31.790417",
				"lon" => "152.565408"
			],
			[
				"postcode" => "2426",
				"suburb" => "MOTO",
				"state" => "NSW",
				"lat" => "-31.854383",
				"lon" => "152.589555"
			],
			[
				"postcode" => "2427",
				"suburb" => "CROWDY HEAD",
				"state" => "NSW",
				"lat" => "-31.844821",
				"lon" => "152.738877"
			],
			[
				"postcode" => "2427",
				"suburb" => "HARRINGTON",
				"state" => "NSW",
				"lat" => "-31.872153",
				"lon" => "152.689811"
			],
			[
				"postcode" => "2428",
				"suburb" => "BLUEYS BEACH",
				"state" => "NSW",
				"lat" => "-32.347684",
				"lon" => "152.53525"
			],
			[
				"postcode" => "2428",
				"suburb" => "BOOMERANG BEACH",
				"state" => "NSW",
				"lat" => "-32.339201",
				"lon" => "152.541677"
			],
			[
				"postcode" => "2428",
				"suburb" => "BOOTI BOOTI",
				"state" => "NSW",
				"lat" => "-32.3106",
				"lon" => "152.516456"
			],
			[
				"postcode" => "2428",
				"suburb" => "CHARLOTTE BAY",
				"state" => "NSW",
				"lat" => "-32.355227",
				"lon" => "152.505783"
			],
			[
				"postcode" => "2428",
				"suburb" => "COOMBA BAY",
				"state" => "NSW",
				"lat" => "-32.263911",
				"lon" => "152.443552"
			],
			[
				"postcode" => "2428",
				"suburb" => "COOMBA PARK",
				"state" => "NSW",
				"lat" => "-32.241295",
				"lon" => "152.472124"
			],
			[
				"postcode" => "2428",
				"suburb" => "DARAWANK",
				"state" => "NSW",
				"lat" => "-32.121019",
				"lon" => "152.483196"
			],
			[
				"postcode" => "2428",
				"suburb" => "ELIZABETH BEACH",
				"state" => "NSW",
				"lat" => "-32.333509",
				"lon" => "152.530117"
			],
			[
				"postcode" => "2428",
				"suburb" => "FORSTER",
				"state" => "NSW",
				"lat" => "-32.179598",
				"lon" => "152.511775"
			],
			[
				"postcode" => "2428",
				"suburb" => "FORSTER SHOPPING VILLAGE",
				"state" => "NSW",
				"lat" => "-32.200461",
				"lon" => "152.518509"
			],
			[
				"postcode" => "2428",
				"suburb" => "GREEN POINT",
				"state" => "NSW",
				"lat" => "-32.251759",
				"lon" => "152.516738"
			],
			[
				"postcode" => "2428",
				"suburb" => "PACIFIC PALMS",
				"state" => "NSW",
				"lat" => "-32.340416",
				"lon" => "152.520588"
			],
			[
				"postcode" => "2428",
				"suburb" => "SANDBAR",
				"state" => "NSW",
				"lat" => "-32.387516",
				"lon" => "152.521536"
			],
			[
				"postcode" => "2428",
				"suburb" => "SHALLOW BAY",
				"state" => "NSW",
				"lat" => "-32.238241",
				"lon" => "152.426396"
			],
			[
				"postcode" => "2428",
				"suburb" => "SMITHS LAKE",
				"state" => "NSW",
				"lat" => "-32.382379",
				"lon" => "152.501878"
			],
			[
				"postcode" => "2428",
				"suburb" => "TARBUCK BAY",
				"state" => "NSW",
				"lat" => "-32.368488",
				"lon" => "152.478147"
			],
			[
				"postcode" => "2428",
				"suburb" => "TIONA",
				"state" => "NSW",
				"lat" => "-32.302533",
				"lon" => "152.520629"
			],
			[
				"postcode" => "2428",
				"suburb" => "TUNCURRY",
				"state" => "NSW",
				"lat" => "-32.174624",
				"lon" => "152.499268"
			],
			[
				"postcode" => "2428",
				"suburb" => "WALLIS LAKE",
				"state" => "NSW",
				"lat" => "-32.257801",
				"lon" => "152.471943"
			],
			[
				"postcode" => "2428",
				"suburb" => "WHOOTA",
				"state" => "NSW",
				"lat" => "-32.29533",
				"lon" => "152.479248"
			],
			[
				"postcode" => "2429",
				"suburb" => "BOBIN",
				"state" => "NSW",
				"lat" => "-31.726021",
				"lon" => "152.283882"
			],
			[
				"postcode" => "2429",
				"suburb" => "BOORGANNA",
				"state" => "NSW",
				"lat" => "-31.633531",
				"lon" => "152.395651"
			],
			[
				"postcode" => "2429",
				"suburb" => "BUCCA WAUKA",
				"state" => "NSW",
				"lat" => "-32.100516",
				"lon" => "152.160872"
			],
			[
				"postcode" => "2429",
				"suburb" => "BULGA FOREST",
				"state" => "NSW",
				"lat" => "-31.625457",
				"lon" => "152.19685"
			],
			[
				"postcode" => "2429",
				"suburb" => "BUNYAH",
				"state" => "NSW",
				"lat" => "-32.164248",
				"lon" => "152.219204"
			],
			[
				"postcode" => "2429",
				"suburb" => "BURRELL CREEK",
				"state" => "NSW",
				"lat" => "-31.951999",
				"lon" => "152.295687"
			],
			[
				"postcode" => "2429",
				"suburb" => "CAPARRA",
				"state" => "NSW",
				"lat" => "-31.730732",
				"lon" => "152.248477"
			],
			[
				"postcode" => "2429",
				"suburb" => "CEDAR PARTY",
				"state" => "NSW",
				"lat" => "-31.796941",
				"lon" => "152.3901"
			],
			[
				"postcode" => "2429",
				"suburb" => "COMBOYNE",
				"state" => "NSW",
				"lat" => "-31.605469",
				"lon" => "152.467889"
			],
			[
				"postcode" => "2429",
				"suburb" => "DINGO FOREST",
				"state" => "NSW",
				"lat" => "-31.688157",
				"lon" => "152.158631"
			],
			[
				"postcode" => "2429",
				"suburb" => "DOLLYS FLAT",
				"state" => "NSW",
				"lat" => "-31.876135",
				"lon" => "152.314685"
			],
			[
				"postcode" => "2429",
				"suburb" => "DYERS CROSSING",
				"state" => "NSW",
				"lat" => "-32.091732",
				"lon" => "152.300833"
			],
			[
				"postcode" => "2429",
				"suburb" => "ELANDS",
				"state" => "NSW",
				"lat" => "-31.634609",
				"lon" => "152.297219"
			],
			[
				"postcode" => "2429",
				"suburb" => "FIREFLY",
				"state" => "NSW",
				"lat" => "-32.082569",
				"lon" => "152.244923"
			],
			[
				"postcode" => "2429",
				"suburb" => "INNES VIEW",
				"state" => "NSW",
				"lat" => "-31.595222",
				"lon" => "152.406295"
			],
			[
				"postcode" => "2429",
				"suburb" => "KARAAK FLAT",
				"state" => "NSW",
				"lat" => "-31.926433",
				"lon" => "152.286253"
			],
			[
				"postcode" => "2429",
				"suburb" => "KILLABAKH",
				"state" => "NSW",
				"lat" => "-31.735516",
				"lon" => "152.399887"
			],
			[
				"postcode" => "2429",
				"suburb" => "KILLAWARRA",
				"state" => "NSW",
				"lat" => "-31.902588",
				"lon" => "152.297173"
			],
			[
				"postcode" => "2429",
				"suburb" => "KIMBRIKI",
				"state" => "NSW",
				"lat" => "-31.922826",
				"lon" => "152.267063"
			],
			[
				"postcode" => "2429",
				"suburb" => "KIPPAXS",
				"state" => "NSW",
				"lat" => "-31.653205",
				"lon" => "152.340389"
			],
			[
				"postcode" => "2429",
				"suburb" => "KRAMBACH",
				"state" => "NSW",
				"lat" => "-32.048174",
				"lon" => "152.250244"
			],
			[
				"postcode" => "2429",
				"suburb" => "KUNDIBAKH",
				"state" => "NSW",
				"lat" => "-31.974133",
				"lon" => "152.25364"
			],
			[
				"postcode" => "2429",
				"suburb" => "MARLEE",
				"state" => "NSW",
				"lat" => "-31.798881",
				"lon" => "152.319147"
			],
			[
				"postcode" => "2429",
				"suburb" => "MOORAL CREEK",
				"state" => "NSW",
				"lat" => "-31.720375",
				"lon" => "152.355653"
			],
			[
				"postcode" => "2429",
				"suburb" => "STRATHCEDAR",
				"state" => "NSW",
				"lat" => "-31.772987",
				"lon" => "152.363074"
			],
			[
				"postcode" => "2429",
				"suburb" => "THE BIGHT",
				"state" => "NSW",
				"lat" => "-31.887018",
				"lon" => "152.382296"
			],
			[
				"postcode" => "2429",
				"suburb" => "TIPPERARY",
				"state" => "NSW",
				"lat" => "-32.065835",
				"lon" => "152.154231"
			],
			[
				"postcode" => "2429",
				"suburb" => "WHERROL FLAT",
				"state" => "NSW",
				"lat" => "-31.783211",
				"lon" => "152.227659"
			],
			[
				"postcode" => "2429",
				"suburb" => "WINGHAM",
				"state" => "NSW",
				"lat" => "-31.869046",
				"lon" => "152.374242"
			],
			[
				"postcode" => "2429",
				"suburb" => "YARRATT FOREST",
				"state" => "NSW",
				"lat" => "-31.821894",
				"lon" => "152.424747"
			],
			[
				"postcode" => "2430",
				"suburb" => "BLACK HEAD",
				"state" => "NSW",
				"lat" => "-32.070894",
				"lon" => "152.543811"
			],
			[
				"postcode" => "2430",
				"suburb" => "BOHNOCK",
				"state" => "NSW",
				"lat" => "-31.945995",
				"lon" => "152.567809"
			],
			[
				"postcode" => "2430",
				"suburb" => "BOOTAWA",
				"state" => "NSW",
				"lat" => "-31.914391",
				"lon" => "152.373581"
			],
			[
				"postcode" => "2430",
				"suburb" => "BRIMBIN",
				"state" => "NSW",
				"lat" => "-31.850684",
				"lon" => "152.4768"
			],
			[
				"postcode" => "2430",
				"suburb" => "CHATHAM",
				"state" => "NSW",
				"lat" => "-31.899947",
				"lon" => "152.489572"
			],
			[
				"postcode" => "2430",
				"suburb" => "CROKI",
				"state" => "NSW",
				"lat" => "-31.870326",
				"lon" => "152.595041"
			],
			[
				"postcode" => "2430",
				"suburb" => "CUNDLETOWN",
				"state" => "NSW",
				"lat" => "-31.897697",
				"lon" => "152.516666"
			],
			[
				"postcode" => "2430",
				"suburb" => "DIAMOND BEACH",
				"state" => "NSW",
				"lat" => "-32.043994",
				"lon" => "152.534432"
			],
			[
				"postcode" => "2430",
				"suburb" => "DUMARESQ ISLAND",
				"state" => "NSW",
				"lat" => "-31.902559",
				"lon" => "152.513835"
			],
			[
				"postcode" => "2430",
				"suburb" => "FAILFORD",
				"state" => "NSW",
				"lat" => "-32.091921",
				"lon" => "152.454662"
			],
			[
				"postcode" => "2430",
				"suburb" => "GHINNI GHINNI",
				"state" => "NSW",
				"lat" => "-31.880545",
				"lon" => "152.551827"
			],
			[
				"postcode" => "2430",
				"suburb" => "GLENTHORNE",
				"state" => "NSW",
				"lat" => "-31.914405",
				"lon" => "152.480283"
			],
			[
				"postcode" => "2430",
				"suburb" => "HALLIDAYS POINT",
				"state" => "NSW",
				"lat" => "-32.069775",
				"lon" => "152.488055"
			],
			[
				"postcode" => "2430",
				"suburb" => "HILLVILLE",
				"state" => "NSW",
				"lat" => "-31.949663",
				"lon" => "152.350683"
			],
			[
				"postcode" => "2430",
				"suburb" => "JONES ISLAND",
				"state" => "NSW",
				"lat" => "-31.859588",
				"lon" => "152.58858"
			],
			[
				"postcode" => "2430",
				"suburb" => "KIWARRAK",
				"state" => "NSW",
				"lat" => "-31.994085",
				"lon" => "152.493667"
			],
			[
				"postcode" => "2430",
				"suburb" => "KOORAINGHAT",
				"state" => "NSW",
				"lat" => "-31.985801",
				"lon" => "152.470097"
			],
			[
				"postcode" => "2430",
				"suburb" => "KUNDLE KUNDLE",
				"state" => "NSW",
				"lat" => "-31.84893",
				"lon" => "152.507064"
			],
			[
				"postcode" => "2430",
				"suburb" => "LANSDOWNE",
				"state" => "NSW",
				"lat" => "-31.782989",
				"lon" => "152.534579"
			],
			[
				"postcode" => "2430",
				"suburb" => "LANSDOWNE FOREST",
				"state" => "NSW",
				"lat" => "-31.753555",
				"lon" => "152.587879"
			],
			[
				"postcode" => "2430",
				"suburb" => "MANNING POINT",
				"state" => "NSW",
				"lat" => "-31.895141",
				"lon" => "152.661512"
			],
			[
				"postcode" => "2430",
				"suburb" => "MELINGA",
				"state" => "NSW",
				"lat" => "-31.804053",
				"lon" => "152.517699"
			],
			[
				"postcode" => "2430",
				"suburb" => "MITCHELLS ISLAND",
				"state" => "NSW",
				"lat" => "-31.891725",
				"lon" => "152.613924"
			],
			[
				"postcode" => "2430",
				"suburb" => "MONDROOK",
				"state" => "NSW",
				"lat" => "-31.906971",
				"lon" => "152.414571"
			],
			[
				"postcode" => "2430",
				"suburb" => "OLD BAR",
				"state" => "NSW",
				"lat" => "-31.969037",
				"lon" => "152.585163"
			],
			[
				"postcode" => "2430",
				"suburb" => "OXLEY ISLAND",
				"state" => "NSW",
				"lat" => "-31.925715",
				"lon" => "152.564796"
			],
			[
				"postcode" => "2430",
				"suburb" => "PAMPOOLAH",
				"state" => "NSW",
				"lat" => "-31.931374",
				"lon" => "152.512723"
			],
			[
				"postcode" => "2430",
				"suburb" => "POSSUM BRUSH",
				"state" => "NSW",
				"lat" => "-32.042942",
				"lon" => "152.454174"
			],
			[
				"postcode" => "2430",
				"suburb" => "PURFLEET",
				"state" => "NSW",
				"lat" => "-31.94418",
				"lon" => "152.468837"
			],
			[
				"postcode" => "2430",
				"suburb" => "RAINBOW FLAT",
				"state" => "NSW",
				"lat" => "-32.009783",
				"lon" => "152.468205"
			],
			[
				"postcode" => "2430",
				"suburb" => "RED HEAD",
				"state" => "NSW",
				"lat" => "-32.058603",
				"lon" => "152.531451"
			],
			[
				"postcode" => "2430",
				"suburb" => "SALTWATER",
				"state" => "NSW",
				"lat" => "-32.009189",
				"lon" => "152.562036"
			],
			[
				"postcode" => "2430",
				"suburb" => "TALLWOODS VILLAGE",
				"state" => "NSW",
				"lat" => "-32.056396",
				"lon" => "152.507801"
			],
			[
				"postcode" => "2430",
				"suburb" => "TAREE",
				"state" => "NSW",
				"lat" => "-31.911714",
				"lon" => "152.463871"
			],
			[
				"postcode" => "2430",
				"suburb" => "TAREE SOUTH",
				"state" => "NSW",
				"lat" => "-31.922894",
				"lon" => "152.463802"
			],
			[
				"postcode" => "2430",
				"suburb" => "TINONEE",
				"state" => "NSW",
				"lat" => "-31.93777",
				"lon" => "152.413824"
			],
			[
				"postcode" => "2430",
				"suburb" => "UPPER LANSDOWNE",
				"state" => "NSW",
				"lat" => "-31.702433",
				"lon" => "152.47486"
			],
			[
				"postcode" => "2430",
				"suburb" => "WALLABI POINT",
				"state" => "NSW",
				"lat" => "-31.9962",
				"lon" => "152.569413"
			],
			[
				"postcode" => "2431",
				"suburb" => "ARAKOON",
				"state" => "NSW",
				"lat" => "-30.888231",
				"lon" => "153.066955"
			],
			[
				"postcode" => "2431",
				"suburb" => "JERSEYVILLE",
				"state" => "NSW",
				"lat" => "-30.9351",
				"lon" => "153.035331"
			],
			[
				"postcode" => "2431",
				"suburb" => "SOUTH WEST ROCKS",
				"state" => "NSW",
				"lat" => "-30.884423",
				"lon" => "153.040452"
			],
			[
				"postcode" => "2439",
				"suburb" => "BATAR CREEK",
				"state" => "NSW",
				"lat" => "-31.658604",
				"lon" => "152.679031"
			],
			[
				"postcode" => "2439",
				"suburb" => "BLACK CREEK",
				"state" => "NSW",
				"lat" => "-31.612831",
				"lon" => "152.66297"
			],
			[
				"postcode" => "2439",
				"suburb" => "BOBS CREEK",
				"state" => "NSW",
				"lat" => "-31.584673",
				"lon" => "152.744357"
			],
			[
				"postcode" => "2439",
				"suburb" => "KENDALL",
				"state" => "NSW",
				"lat" => "-31.632032",
				"lon" => "152.705558"
			],
			[
				"postcode" => "2439",
				"suburb" => "KEREWONG",
				"state" => "NSW",
				"lat" => "-31.619699",
				"lon" => "152.543352"
			],
			[
				"postcode" => "2439",
				"suburb" => "KEW",
				"state" => "NSW",
				"lat" => "-31.634853",
				"lon" => "152.722927"
			],
			[
				"postcode" => "2439",
				"suburb" => "LOGANS CROSSING",
				"state" => "NSW",
				"lat" => "-31.609423",
				"lon" => "152.709355"
			],
			[
				"postcode" => "2439",
				"suburb" => "LORNE",
				"state" => "NSW",
				"lat" => "-31.657555",
				"lon" => "152.591668"
			],
			[
				"postcode" => "2439",
				"suburb" => "ROSSGLEN",
				"state" => "NSW",
				"lat" => "-31.663933",
				"lon" => "152.72662"
			],
			[
				"postcode" => "2439",
				"suburb" => "SWANS CROSSING",
				"state" => "NSW",
				"lat" => "-31.599314",
				"lon" => "152.584176"
			],
			[
				"postcode" => "2439",
				"suburb" => "UPSALLS CREEK",
				"state" => "NSW",
				"lat" => "-31.633347",
				"lon" => "152.659543"
			],
			[
				"postcode" => "2440",
				"suburb" => "ALDAVILLA",
				"state" => "NSW",
				"lat" => "-31.058949",
				"lon" => "152.768142"
			],
			[
				"postcode" => "2440",
				"suburb" => "AUSTRAL EDEN",
				"state" => "NSW",
				"lat" => "-31.021949",
				"lon" => "152.937797"
			],
			[
				"postcode" => "2440",
				"suburb" => "BELLBROOK",
				"state" => "NSW",
				"lat" => "-30.81818",
				"lon" => "152.508349"
			],
			[
				"postcode" => "2440",
				"suburb" => "BELLIMBOPINNI",
				"state" => "NSW",
				"lat" => "-31.015929",
				"lon" => "152.903409"
			],
			[
				"postcode" => "2440",
				"suburb" => "BELMORE RIVER",
				"state" => "NSW",
				"lat" => "-31.072166",
				"lon" => "152.967558"
			],
			[
				"postcode" => "2440",
				"suburb" => "BURNT BRIDGE",
				"state" => "NSW",
				"lat" => "-31.102905",
				"lon" => "152.807672"
			],
			[
				"postcode" => "2440",
				"suburb" => "CARRAI",
				"state" => "NSW",
				"lat" => "-30.899756",
				"lon" => "152.248557"
			],
			[
				"postcode" => "2440",
				"suburb" => "CLYBUCCA",
				"state" => "NSW",
				"lat" => "-30.954389",
				"lon" => "152.965545"
			],
			[
				"postcode" => "2440",
				"suburb" => "COLLOMBATTI",
				"state" => "NSW",
				"lat" => "-30.992826",
				"lon" => "152.841538"
			],
			[
				"postcode" => "2440",
				"suburb" => "COMARA",
				"state" => "NSW",
				"lat" => "-30.753004",
				"lon" => "152.399864"
			],
			[
				"postcode" => "2440",
				"suburb" => "CORANGULA",
				"state" => "NSW",
				"lat" => "-30.992833",
				"lon" => "152.680102"
			],
			[
				"postcode" => "2440",
				"suburb" => "CRESCENT HEAD",
				"state" => "NSW",
				"lat" => "-31.189517",
				"lon" => "152.9768"
			],
			[
				"postcode" => "2440",
				"suburb" => "DEEP CREEK",
				"state" => "NSW",
				"lat" => "-30.989117",
				"lon" => "152.704273"
			],
			[
				"postcode" => "2440",
				"suburb" => "DONDINGALONG",
				"state" => "NSW",
				"lat" => "-31.09994",
				"lon" => "152.737797"
			],
			[
				"postcode" => "2440",
				"suburb" => "EAST KEMPSEY",
				"state" => "NSW",
				"lat" => "-31.082158",
				"lon" => "152.845507"
			],
			[
				"postcode" => "2440",
				"suburb" => "EUROKA",
				"state" => "NSW",
				"lat" => "-31.079521",
				"lon" => "152.796699"
			],
			[
				"postcode" => "2440",
				"suburb" => "FREDERICKTON",
				"state" => "NSW",
				"lat" => "-31.037762",
				"lon" => "152.878933"
			],
			[
				"postcode" => "2440",
				"suburb" => "GLADSTONE",
				"state" => "NSW",
				"lat" => "-31.022073",
				"lon" => "152.94899"
			],
			[
				"postcode" => "2440",
				"suburb" => "GREENHILL",
				"state" => "NSW",
				"lat" => "-31.060154",
				"lon" => "152.800013"
			],
			[
				"postcode" => "2440",
				"suburb" => "HAMPDEN HALL",
				"state" => "NSW",
				"lat" => "-31.069599",
				"lon" => "152.859806"
			],
			[
				"postcode" => "2440",
				"suburb" => "HAT HEAD",
				"state" => "NSW",
				"lat" => "-31.054491",
				"lon" => "153.049963"
			],
			[
				"postcode" => "2440",
				"suburb" => "HICKEYS CREEK",
				"state" => "NSW",
				"lat" => "-30.874838",
				"lon" => "152.598291"
			],
			[
				"postcode" => "2440",
				"suburb" => "KEMPSEY",
				"state" => "NSW",
				"lat" => "-31.080621",
				"lon" => "152.84199"
			],
			[
				"postcode" => "2440",
				"suburb" => "KINCHELA",
				"state" => "NSW",
				"lat" => "-30.990568",
				"lon" => "152.989527"
			],
			[
				"postcode" => "2440",
				"suburb" => "LOWER CREEK",
				"state" => "NSW",
				"lat" => "-30.743585",
				"lon" => "152.27899"
			],
			[
				"postcode" => "2440",
				"suburb" => "MILLBANK",
				"state" => "NSW",
				"lat" => "-30.846109",
				"lon" => "152.649971"
			],
			[
				"postcode" => "2440",
				"suburb" => "MOONEBA",
				"state" => "NSW",
				"lat" => "-31.043338",
				"lon" => "152.69207"
			],
			[
				"postcode" => "2440",
				"suburb" => "MOPARRABAH",
				"state" => "NSW",
				"lat" => "-30.975175",
				"lon" => "152.530334"
			],
			[
				"postcode" => "2440",
				"suburb" => "MUNGAY CREEK",
				"state" => "NSW",
				"lat" => "-30.925992",
				"lon" => "152.656779"
			],
			[
				"postcode" => "2440",
				"suburb" => "OLD STATION",
				"state" => "NSW",
				"lat" => "-31.05572",
				"lon" => "152.923727"
			],
			[
				"postcode" => "2440",
				"suburb" => "POLA CREEK",
				"state" => "NSW",
				"lat" => "-31.061701",
				"lon" => "152.863448"
			],
			[
				"postcode" => "2440",
				"suburb" => "RAINBOW REACH",
				"state" => "NSW",
				"lat" => "-30.938698",
				"lon" => "153.018497"
			],
			[
				"postcode" => "2440",
				"suburb" => "SEVEN OAKS",
				"state" => "NSW",
				"lat" => "-31.000357",
				"lon" => "152.92788"
			],
			[
				"postcode" => "2440",
				"suburb" => "SHERWOOD",
				"state" => "NSW",
				"lat" => "-31.075554",
				"lon" => "152.719671"
			],
			[
				"postcode" => "2440",
				"suburb" => "SKILLION FLAT",
				"state" => "NSW",
				"lat" => "-31.014217",
				"lon" => "152.724662"
			],
			[
				"postcode" => "2440",
				"suburb" => "SMITHTOWN",
				"state" => "NSW",
				"lat" => "-31.015176",
				"lon" => "152.943995"
			],
			[
				"postcode" => "2440",
				"suburb" => "SOUTH KEMPSEY",
				"state" => "NSW",
				"lat" => "-31.094228",
				"lon" => "152.83255"
			],
			[
				"postcode" => "2440",
				"suburb" => "SUMMER ISLAND",
				"state" => "NSW",
				"lat" => "-30.988916",
				"lon" => "152.985562"
			],
			[
				"postcode" => "2440",
				"suburb" => "TEMAGOG",
				"state" => "NSW",
				"lat" => "-30.977064",
				"lon" => "152.648406"
			],
			[
				"postcode" => "2440",
				"suburb" => "TOOROOKA",
				"state" => "NSW",
				"lat" => "-30.91295",
				"lon" => "152.587524"
			],
			[
				"postcode" => "2440",
				"suburb" => "TURNERS FLAT",
				"state" => "NSW",
				"lat" => "-31.017039",
				"lon" => "152.7"
			],
			[
				"postcode" => "2440",
				"suburb" => "VERGES CREEK",
				"state" => "NSW",
				"lat" => "-31.087755",
				"lon" => "152.89971"
			],
			[
				"postcode" => "2440",
				"suburb" => "WEST KEMPSEY",
				"state" => "NSW",
				"lat" => "-31.08034",
				"lon" => "152.829082"
			],
			[
				"postcode" => "2440",
				"suburb" => "WILLAWARRIN",
				"state" => "NSW",
				"lat" => "-30.929995",
				"lon" => "152.627874"
			],
			[
				"postcode" => "2440",
				"suburb" => "WILLI WILLI",
				"state" => "NSW",
				"lat" => "-30.943154",
				"lon" => "152.414791"
			],
			[
				"postcode" => "2440",
				"suburb" => "WITTITRIN",
				"state" => "NSW",
				"lat" => "-31.098576",
				"lon" => "152.655736"
			],
			[
				"postcode" => "2440",
				"suburb" => "YARRAVEL",
				"state" => "NSW",
				"lat" => "-31.047338",
				"lon" => "152.76235"
			],
			[
				"postcode" => "2440",
				"suburb" => "YESSABAH",
				"state" => "NSW",
				"lat" => "-31.08525",
				"lon" => "152.686344"
			],
			[
				"postcode" => "2441",
				"suburb" => "ALLGOMERA",
				"state" => "NSW",
				"lat" => "-30.816097",
				"lon" => "152.831369"
			],
			[
				"postcode" => "2441",
				"suburb" => "BALLENGARRA",
				"state" => "NSW",
				"lat" => "-31.318479",
				"lon" => "152.709685"
			],
			[
				"postcode" => "2441",
				"suburb" => "BARRAGANYATTI",
				"state" => "NSW",
				"lat" => "-30.875913",
				"lon" => "152.916973"
			],
			[
				"postcode" => "2441",
				"suburb" => "BONVILLE",
				"state" => "NSW",
				"lat" => "-30.376052",
				"lon" => "153.034867"
			],
			[
				"postcode" => "2441",
				"suburb" => "BRIL BRIL",
				"state" => "NSW",
				"lat" => "-31.267256",
				"lon" => "152.500044"
			],
			[
				"postcode" => "2441",
				"suburb" => "BRINERVILLE",
				"state" => "NSW",
				"lat" => "-30.467681",
				"lon" => "152.569187"
			],
			[
				"postcode" => "2441",
				"suburb" => "COOPERABUNG",
				"state" => "NSW",
				"lat" => "-31.284405",
				"lon" => "152.808768"
			],
			[
				"postcode" => "2441",
				"suburb" => "EUNGAI CREEK",
				"state" => "NSW",
				"lat" => "-30.831585",
				"lon" => "152.881694"
			],
			[
				"postcode" => "2441",
				"suburb" => "EUNGAI RAIL",
				"state" => "NSW",
				"lat" => "-30.846274",
				"lon" => "152.900574"
			],
			[
				"postcode" => "2441",
				"suburb" => "FISHERMANS REACH",
				"state" => "NSW",
				"lat" => "-30.851981",
				"lon" => "152.996244"
			],
			[
				"postcode" => "2441",
				"suburb" => "GRASSY HEAD",
				"state" => "NSW",
				"lat" => "-30.793913",
				"lon" => "152.992331"
			],
			[
				"postcode" => "2441",
				"suburb" => "GUM SCRUB",
				"state" => "NSW",
				"lat" => "-31.271046",
				"lon" => "152.726685"
			],
			[
				"postcode" => "2441",
				"suburb" => "HACKS FERRY",
				"state" => "NSW",
				"lat" => "-31.343693",
				"lon" => "152.84433"
			],
			[
				"postcode" => "2441",
				"suburb" => "KIPPARA",
				"state" => "NSW",
				"lat" => "-31.24468",
				"lon" => "152.523101"
			],
			[
				"postcode" => "2441",
				"suburb" => "KUNDABUNG",
				"state" => "NSW",
				"lat" => "-31.208615",
				"lon" => "152.823012"
			],
			[
				"postcode" => "2441",
				"suburb" => "ROLLANDS PLAINS",
				"state" => "NSW",
				"lat" => "-31.278699",
				"lon" => "152.678061"
			],
			[
				"postcode" => "2441",
				"suburb" => "STUARTS POINT",
				"state" => "NSW",
				"lat" => "-30.821108",
				"lon" => "152.993983"
			],
			[
				"postcode" => "2441",
				"suburb" => "TAMBAN",
				"state" => "NSW",
				"lat" => "-30.841872",
				"lon" => "152.846606"
			],
			[
				"postcode" => "2441",
				"suburb" => "TELEGRAPH POINT",
				"state" => "NSW",
				"lat" => "-31.321632",
				"lon" => "152.79968"
			],
			[
				"postcode" => "2441",
				"suburb" => "UPPER ROLLANDS PLAINS",
				"state" => "NSW",
				"lat" => "-31.23771",
				"lon" => "152.624248"
			],
			[
				"postcode" => "2441",
				"suburb" => "YARRAHAPINNI",
				"state" => "NSW",
				"lat" => "-30.837327",
				"lon" => "152.942535"
			],
			[
				"postcode" => "2443",
				"suburb" => "BOBS CREEK",
				"state" => "NSW",
				"lat" => "-31.584673",
				"lon" => "152.744357"
			],
			[
				"postcode" => "2443",
				"suburb" => "CAMDEN HEAD",
				"state" => "NSW",
				"lat" => "-31.646864",
				"lon" => "152.83456"
			],
			[
				"postcode" => "2443",
				"suburb" => "CORALVILLE",
				"state" => "NSW",
				"lat" => "-31.78274",
				"lon" => "152.718136"
			],
			[
				"postcode" => "2443",
				"suburb" => "DEAUVILLE",
				"state" => "NSW",
				"lat" => "-31.663601",
				"lon" => "152.794247"
			],
			[
				"postcode" => "2443",
				"suburb" => "DIAMOND HEAD",
				"state" => "NSW",
				"lat" => "-31.719292",
				"lon" => "152.79228"
			],
			[
				"postcode" => "2443",
				"suburb" => "DUNBOGAN",
				"state" => "NSW",
				"lat" => "-31.649381",
				"lon" => "152.80722"
			],
			[
				"postcode" => "2443",
				"suburb" => "HANNAM VALE",
				"state" => "NSW",
				"lat" => "-31.712975",
				"lon" => "152.591298"
			],
			[
				"postcode" => "2443",
				"suburb" => "HERONS CREEK",
				"state" => "NSW",
				"lat" => "-31.587978",
				"lon" => "152.72671"
			],
			[
				"postcode" => "2443",
				"suburb" => "JOHNS RIVER",
				"state" => "NSW",
				"lat" => "-31.733492",
				"lon" => "152.695147"
			],
			[
				"postcode" => "2443",
				"suburb" => "LAKEWOOD",
				"state" => "NSW",
				"lat" => "-31.635267",
				"lon" => "152.756608"
			],
			[
				"postcode" => "2443",
				"suburb" => "LAURIETON",
				"state" => "NSW",
				"lat" => "-31.650229",
				"lon" => "152.798179"
			],
			[
				"postcode" => "2443",
				"suburb" => "MIDDLE BROTHER",
				"state" => "NSW",
				"lat" => "-31.690204",
				"lon" => "152.715816"
			],
			[
				"postcode" => "2443",
				"suburb" => "MOORLAND",
				"state" => "NSW",
				"lat" => "-31.772228",
				"lon" => "152.652348"
			],
			[
				"postcode" => "2443",
				"suburb" => "NORTH BROTHER",
				"state" => "NSW",
				"lat" => "-31.65673",
				"lon" => "152.7769"
			],
			[
				"postcode" => "2443",
				"suburb" => "NORTH HAVEN",
				"state" => "NSW",
				"lat" => "-31.640002",
				"lon" => "152.81733"
			],
			[
				"postcode" => "2443",
				"suburb" => "STEWARTS RIVER",
				"state" => "NSW",
				"lat" => "-31.723643",
				"lon" => "152.636154"
			],
			[
				"postcode" => "2443",
				"suburb" => "WAITUI",
				"state" => "NSW",
				"lat" => "-31.699069",
				"lon" => "152.572148"
			],
			[
				"postcode" => "2443",
				"suburb" => "WEST HAVEN",
				"state" => "NSW",
				"lat" => "-31.634396",
				"lon" => "152.782454"
			],
			[
				"postcode" => "2444",
				"suburb" => "BLACKMANS POINT",
				"state" => "NSW",
				"lat" => "-31.400666",
				"lon" => "152.851836"
			],
			[
				"postcode" => "2444",
				"suburb" => "FERNBANK CREEK",
				"state" => "NSW",
				"lat" => "-31.423221",
				"lon" => "152.840297"
			],
			[
				"postcode" => "2444",
				"suburb" => "FLYNNS BEACH",
				"state" => "NSW",
				"lat" => "-31.443137",
				"lon" => "152.925466"
			],
			[
				"postcode" => "2444",
				"suburb" => "LIGHTHOUSE BEACH",
				"state" => "NSW",
				"lat" => "-31.518639",
				"lon" => "152.882389"
			],
			[
				"postcode" => "2444",
				"suburb" => "LIMEBURNERS CREEK",
				"state" => "NSW",
				"lat" => "-31.345129",
				"lon" => "152.86581"
			],
			[
				"postcode" => "2444",
				"suburb" => "NORTH SHORE",
				"state" => "NSW",
				"lat" => "-31.402369",
				"lon" => "152.901853"
			],
			[
				"postcode" => "2444",
				"suburb" => "PORT MACQUARIE",
				"state" => "NSW",
				"lat" => "-31.434259",
				"lon" => "152.908481"
			],
			[
				"postcode" => "2444",
				"suburb" => "RIVERSIDE",
				"state" => "NSW",
				"lat" => "-31.413952",
				"lon" => "152.868521"
			],
			[
				"postcode" => "2444",
				"suburb" => "SETTLEMENT CITY",
				"state" => "NSW",
				"lat" => "-31.427201",
				"lon" => "152.895349"
			],
			[
				"postcode" => "2444",
				"suburb" => "THE HATCH",
				"state" => "NSW",
				"lat" => "-31.365965",
				"lon" => "152.850162"
			],
			[
				"postcode" => "2444",
				"suburb" => "THRUMSTER",
				"state" => "NSW",
				"lat" => "-31.461332",
				"lon" => "152.857058"
			],
			[
				"postcode" => "2445",
				"suburb" => "BONNY HILLS",
				"state" => "NSW",
				"lat" => "-31.594981",
				"lon" => "152.840605"
			],
			[
				"postcode" => "2445",
				"suburb" => "GRANTS BEACH",
				"state" => "NSW",
				"lat" => "-31.61964",
				"lon" => "152.831249"
			],
			[
				"postcode" => "2445",
				"suburb" => "JOLLY NOSE",
				"state" => "NSW",
				"lat" => "-31.588023",
				"lon" => "152.769455"
			],
			[
				"postcode" => "2445",
				"suburb" => "LAKE CATHIE",
				"state" => "NSW",
				"lat" => "-31.552287",
				"lon" => "152.854925"
			],
			[
				"postcode" => "2446",
				"suburb" => "BAGNOO",
				"state" => "NSW",
				"lat" => "-31.463639",
				"lon" => "152.533221"
			],
			[
				"postcode" => "2446",
				"suburb" => "BAGO",
				"state" => "NSW",
				"lat" => "-31.488259",
				"lon" => "152.660113"
			],
			[
				"postcode" => "2446",
				"suburb" => "BANDA BANDA",
				"state" => "NSW",
				"lat" => "-31.200387",
				"lon" => "152.482368"
			],
			[
				"postcode" => "2446",
				"suburb" => "BEECHWOOD",
				"state" => "NSW",
				"lat" => "-31.436805",
				"lon" => "152.678408"
			],
			[
				"postcode" => "2446",
				"suburb" => "BELLANGRY",
				"state" => "NSW",
				"lat" => "-31.327475",
				"lon" => "152.607852"
			],
			[
				"postcode" => "2446",
				"suburb" => "BIRDWOOD",
				"state" => "NSW",
				"lat" => "-31.356917",
				"lon" => "152.329928"
			],
			[
				"postcode" => "2446",
				"suburb" => "BROMBIN",
				"state" => "NSW",
				"lat" => "-31.453817",
				"lon" => "152.626737"
			],
			[
				"postcode" => "2446",
				"suburb" => "BYABARRA",
				"state" => "NSW",
				"lat" => "-31.53435",
				"lon" => "152.528239"
			],
			[
				"postcode" => "2446",
				"suburb" => "CAIRNCROSS",
				"state" => "NSW",
				"lat" => "-31.343251",
				"lon" => "152.672398"
			],
			[
				"postcode" => "2446",
				"suburb" => "CROSSLANDS",
				"state" => "NSW",
				"lat" => "-31.438993",
				"lon" => "152.706362"
			],
			[
				"postcode" => "2446",
				"suburb" => "DEBENHAM",
				"state" => "NSW",
				"lat" => "-31.441055",
				"lon" => "152.248757"
			],
			[
				"postcode" => "2446",
				"suburb" => "DOYLES RIVER",
				"state" => "NSW",
				"lat" => "-31.429734",
				"lon" => "152.119583"
			],
			[
				"postcode" => "2446",
				"suburb" => "ELLENBOROUGH",
				"state" => "NSW",
				"lat" => "-31.444561",
				"lon" => "152.456673"
			],
			[
				"postcode" => "2446",
				"suburb" => "FORBES RIVER",
				"state" => "NSW",
				"lat" => "-31.29358",
				"lon" => "152.321905"
			],
			[
				"postcode" => "2446",
				"suburb" => "FRAZERS CREEK",
				"state" => "NSW",
				"lat" => "-31.413193",
				"lon" => "152.647378"
			],
			[
				"postcode" => "2446",
				"suburb" => "GEARYS FLAT",
				"state" => "NSW",
				"lat" => "-31.179292",
				"lon" => "152.572762"
			],
			[
				"postcode" => "2446",
				"suburb" => "HARTYS PLAINS",
				"state" => "NSW",
				"lat" => "-31.486685",
				"lon" => "152.630013"
			],
			[
				"postcode" => "2446",
				"suburb" => "HOLLISDALE",
				"state" => "NSW",
				"lat" => "-31.39501",
				"lon" => "152.548686"
			],
			[
				"postcode" => "2446",
				"suburb" => "HUNTINGDON",
				"state" => "NSW",
				"lat" => "-31.47435",
				"lon" => "152.660392"
			],
			[
				"postcode" => "2446",
				"suburb" => "HYNDMANS CREEK",
				"state" => "NSW",
				"lat" => "-31.468455",
				"lon" => "152.596732"
			],
			[
				"postcode" => "2446",
				"suburb" => "KINDEE",
				"state" => "NSW",
				"lat" => "-31.394755",
				"lon" => "152.450947"
			],
			[
				"postcode" => "2446",
				"suburb" => "KING CREEK",
				"state" => "NSW",
				"lat" => "-31.482454",
				"lon" => "152.75192"
			],
			[
				"postcode" => "2446",
				"suburb" => "LAKE INNES",
				"state" => "NSW",
				"lat" => "-31.481465",
				"lon" => "152.823635"
			],
			[
				"postcode" => "2446",
				"suburb" => "LONG FLAT",
				"state" => "NSW",
				"lat" => "-31.437084",
				"lon" => "152.488757"
			],
			[
				"postcode" => "2446",
				"suburb" => "LOWER PAPPINBARRA",
				"state" => "NSW",
				"lat" => "-31.418179",
				"lon" => "152.587619"
			],
			[
				"postcode" => "2446",
				"suburb" => "MARLO MERRICAN",
				"state" => "NSW",
				"lat" => "-31.215793",
				"lon" => "152.66955"
			],
			[
				"postcode" => "2446",
				"suburb" => "MORTONS CREEK",
				"state" => "NSW",
				"lat" => "-31.390973",
				"lon" => "152.649419"
			],
			[
				"postcode" => "2446",
				"suburb" => "MOUNT SEAVIEW",
				"state" => "NSW",
				"lat" => "-31.347742",
				"lon" => "152.166446"
			],
			[
				"postcode" => "2446",
				"suburb" => "PAPPINBARRA",
				"state" => "NSW",
				"lat" => "-31.380364",
				"lon" => "152.501526"
			],
			[
				"postcode" => "2446",
				"suburb" => "PEMBROOKE",
				"state" => "NSW",
				"lat" => "-31.38811",
				"lon" => "152.753487"
			],
			[
				"postcode" => "2446",
				"suburb" => "PIPECLAY",
				"state" => "NSW",
				"lat" => "-31.439227",
				"lon" => "152.552692"
			],
			[
				"postcode" => "2446",
				"suburb" => "RAWDON ISLAND",
				"state" => "NSW",
				"lat" => "-31.419641",
				"lon" => "152.779062"
			],
			[
				"postcode" => "2446",
				"suburb" => "REDBANK",
				"state" => "NSW",
				"lat" => "-31.434381",
				"lon" => "152.737218"
			],
			[
				"postcode" => "2446",
				"suburb" => "ROSEWOOD",
				"state" => "NSW",
				"lat" => "-31.447623",
				"lon" => "152.682062"
			],
			[
				"postcode" => "2446",
				"suburb" => "SANCROX",
				"state" => "NSW",
				"lat" => "-31.46234",
				"lon" => "152.789888"
			],
			[
				"postcode" => "2446",
				"suburb" => "TOMS CREEK",
				"state" => "NSW",
				"lat" => "-31.562738",
				"lon" => "152.399874"
			],
			[
				"postcode" => "2446",
				"suburb" => "UPPER PAPPINBARRA",
				"state" => "NSW",
				"lat" => "-31.321201",
				"lon" => "152.460848"
			],
			[
				"postcode" => "2446",
				"suburb" => "WAUCHOPE",
				"state" => "NSW",
				"lat" => "-31.457354",
				"lon" => "152.732269"
			],
			[
				"postcode" => "2446",
				"suburb" => "WERRIKIMBE",
				"state" => "NSW",
				"lat" => "-31.298258",
				"lon" => "152.206961"
			],
			[
				"postcode" => "2446",
				"suburb" => "YARRAS",
				"state" => "NSW",
				"lat" => "-31.415319",
				"lon" => "152.342971"
			],
			[
				"postcode" => "2446",
				"suburb" => "YIPPIN CREEK",
				"state" => "NSW",
				"lat" => "-31.446918",
				"lon" => "152.712615"
			],
			[
				"postcode" => "2447",
				"suburb" => "BAKERS CREEK",
				"state" => "NSW",
				"lat" => "-30.803716",
				"lon" => "152.726106"
			],
			[
				"postcode" => "2447",
				"suburb" => "BURRAPINE",
				"state" => "NSW",
				"lat" => "-30.74006",
				"lon" => "152.655154"
			],
			[
				"postcode" => "2447",
				"suburb" => "CONGARINNI",
				"state" => "NSW",
				"lat" => "-30.725551",
				"lon" => "152.878288"
			],
			[
				"postcode" => "2447",
				"suburb" => "CONGARINNI NORTH",
				"state" => "NSW",
				"lat" => "-30.684156",
				"lon" => "152.879726"
			],
			[
				"postcode" => "2447",
				"suburb" => "DONNELLYVILLE",
				"state" => "NSW",
				"lat" => "-30.75322",
				"lon" => "152.910963"
			],
			[
				"postcode" => "2447",
				"suburb" => "GUMMA",
				"state" => "NSW",
				"lat" => "-30.72992",
				"lon" => "152.963122"
			],
			[
				"postcode" => "2447",
				"suburb" => "MACKSVILLE",
				"state" => "NSW",
				"lat" => "-30.706483",
				"lon" => "152.920974"
			],
			[
				"postcode" => "2447",
				"suburb" => "NEWEE CREEK",
				"state" => "NSW",
				"lat" => "-30.666833",
				"lon" => "152.923635"
			],
			[
				"postcode" => "2447",
				"suburb" => "NORTH MACKSVILLE",
				"state" => "NSW",
				"lat" => "-30.70403",
				"lon" => "152.921564"
			],
			[
				"postcode" => "2447",
				"suburb" => "SCOTTS HEAD",
				"state" => "NSW",
				"lat" => "-30.746665",
				"lon" => "152.992724"
			],
			[
				"postcode" => "2447",
				"suburb" => "TALARM",
				"state" => "NSW",
				"lat" => "-30.701157",
				"lon" => "152.819713"
			],
			[
				"postcode" => "2447",
				"suburb" => "TAYLORS ARM",
				"state" => "NSW",
				"lat" => "-30.724826",
				"lon" => "152.834981"
			],
			[
				"postcode" => "2447",
				"suburb" => "THUMB CREEK",
				"state" => "NSW",
				"lat" => "-30.687091",
				"lon" => "152.619137"
			],
			[
				"postcode" => "2447",
				"suburb" => "UPPER TAYLORS ARM",
				"state" => "NSW",
				"lat" => "-30.781179",
				"lon" => "152.689457"
			],
			[
				"postcode" => "2447",
				"suburb" => "UTUNGUN",
				"state" => "NSW",
				"lat" => "-30.730063",
				"lon" => "152.833063"
			],
			[
				"postcode" => "2447",
				"suburb" => "WARRELL CREEK",
				"state" => "NSW",
				"lat" => "-30.770271",
				"lon" => "152.892327"
			],
			[
				"postcode" => "2447",
				"suburb" => "WAY WAY",
				"state" => "NSW",
				"lat" => "-30.772886",
				"lon" => "152.946259"
			],
			[
				"postcode" => "2447",
				"suburb" => "WIRRIMBI",
				"state" => "NSW",
				"lat" => "-30.665767",
				"lon" => "152.912519"
			],
			[
				"postcode" => "2447",
				"suburb" => "YARRANBELLA",
				"state" => "NSW",
				"lat" => "-30.727507",
				"lon" => "152.778618"
			],
			[
				"postcode" => "2448",
				"suburb" => "HYLAND PARK",
				"state" => "NSW",
				"lat" => "-30.615511",
				"lon" => "152.999909"
			],
			[
				"postcode" => "2448",
				"suburb" => "NAMBUCCA HEADS",
				"state" => "NSW",
				"lat" => "-30.642442",
				"lon" => "153.002886"
			],
			[
				"postcode" => "2448",
				"suburb" => "VALLA",
				"state" => "NSW",
				"lat" => "-30.601173",
				"lon" => "152.975493"
			],
			[
				"postcode" => "2448",
				"suburb" => "VALLA BEACH",
				"state" => "NSW",
				"lat" => "-30.591805",
				"lon" => "153.008479"
			],
			[
				"postcode" => "2449",
				"suburb" => "ARGENTS HILL",
				"state" => "NSW",
				"lat" => "-30.621952",
				"lon" => "152.746326"
			],
			[
				"postcode" => "2449",
				"suburb" => "BOWRAVILLE",
				"state" => "NSW",
				"lat" => "-30.6419",
				"lon" => "152.854557"
			],
			[
				"postcode" => "2449",
				"suburb" => "BUCKRA BENDINNI",
				"state" => "NSW",
				"lat" => "-30.635703",
				"lon" => "152.774542"
			],
			[
				"postcode" => "2449",
				"suburb" => "GIRRALONG",
				"state" => "NSW",
				"lat" => "-30.574868",
				"lon" => "152.661812"
			],
			[
				"postcode" => "2449",
				"suburb" => "KENNAICLE CREEK",
				"state" => "NSW",
				"lat" => "-30.533884",
				"lon" => "152.81651"
			],
			[
				"postcode" => "2449",
				"suburb" => "MISSABOTTI",
				"state" => "NSW",
				"lat" => "-30.567278",
				"lon" => "152.805912"
			],
			[
				"postcode" => "2449",
				"suburb" => "SOUTH ARM",
				"state" => "NSW",
				"lat" => "-30.676031",
				"lon" => "152.750149"
			],
			[
				"postcode" => "2449",
				"suburb" => "TEWINGA",
				"state" => "NSW",
				"lat" => "-30.658703",
				"lon" => "152.90297"
			],
			[
				"postcode" => "2450",
				"suburb" => "BOAMBEE",
				"state" => "NSW",
				"lat" => "-30.337186",
				"lon" => "153.069748"
			],
			[
				"postcode" => "2450",
				"suburb" => "BROOKLANA",
				"state" => "NSW",
				"lat" => "-30.269862",
				"lon" => "152.855136"
			],
			[
				"postcode" => "2450",
				"suburb" => "BUCCA",
				"state" => "NSW",
				"lat" => "-30.165527",
				"lon" => "153.10264"
			],
			[
				"postcode" => "2450",
				"suburb" => "COFFS HARBOUR",
				"state" => "NSW",
				"lat" => "-30.282279",
				"lon" => "153.128593"
			],
			[
				"postcode" => "2450",
				"suburb" => "COFFS HARBOUR JETTY",
				"state" => "NSW",
				"lat" => "-30.304106",
				"lon" => "153.139145"
			],
			[
				"postcode" => "2450",
				"suburb" => "COFFS HARBOUR PLAZA",
				"state" => "NSW",
				"lat" => "-30.282731",
				"lon" => "153.131469"
			],
			[
				"postcode" => "2450",
				"suburb" => "CORAMBA",
				"state" => "NSW",
				"lat" => "-30.222515",
				"lon" => "153.016086"
			],
			[
				"postcode" => "2450",
				"suburb" => "GLENREAGH",
				"state" => "NSW",
				"lat" => "-30.05106",
				"lon" => "152.978971"
			],
			[
				"postcode" => "2450",
				"suburb" => "KARANGI",
				"state" => "NSW",
				"lat" => "-30.254449",
				"lon" => "153.048256"
			],
			[
				"postcode" => "2450",
				"suburb" => "KORORA",
				"state" => "NSW",
				"lat" => "-30.257145",
				"lon" => "153.129008"
			],
			[
				"postcode" => "2450",
				"suburb" => "LOWANNA",
				"state" => "NSW",
				"lat" => "-30.21239",
				"lon" => "152.900526"
			],
			[
				"postcode" => "2450",
				"suburb" => "MOONEE BEACH",
				"state" => "NSW",
				"lat" => "-30.20812",
				"lon" => "153.155413"
			],
			[
				"postcode" => "2450",
				"suburb" => "NANA GLEN",
				"state" => "NSW",
				"lat" => "-30.136199",
				"lon" => "153.004853"
			],
			[
				"postcode" => "2450",
				"suburb" => "NORTH BOAMBEE VALLEY",
				"state" => "NSW",
				"lat" => "-30.306482",
				"lon" => "153.071517"
			],
			[
				"postcode" => "2450",
				"suburb" => "SAPPHIRE BEACH",
				"state" => "NSW",
				"lat" => "-30.233163",
				"lon" => "153.147953"
			],
			[
				"postcode" => "2450",
				"suburb" => "SHERWOOD",
				"state" => "NSW",
				"lat" => "-30.056473",
				"lon" => "153.013178"
			],
			[
				"postcode" => "2450",
				"suburb" => "ULONG",
				"state" => "NSW",
				"lat" => "-30.246135",
				"lon" => "152.888781"
			],
			[
				"postcode" => "2450",
				"suburb" => "UPPER ORARA",
				"state" => "NSW",
				"lat" => "-30.284822",
				"lon" => "153.00951"
			],
			[
				"postcode" => "2452",
				"suburb" => "BOAMBEE EAST",
				"state" => "NSW",
				"lat" => "-30.34062",
				"lon" => "153.084224"
			],
			[
				"postcode" => "2452",
				"suburb" => "SAWTELL",
				"state" => "NSW",
				"lat" => "-30.369899",
				"lon" => "153.099627"
			],
			[
				"postcode" => "2452",
				"suburb" => "TOORMINA",
				"state" => "NSW",
				"lat" => "-30.35262",
				"lon" => "153.090285"
			],
			[
				"postcode" => "2453",
				"suburb" => "BILLYS CREEK",
				"state" => "NSW",
				"lat" => "-30.137937",
				"lon" => "152.599482"
			],
			[
				"postcode" => "2453",
				"suburb" => "BOSTOBRICK",
				"state" => "NSW",
				"lat" => "-30.277198",
				"lon" => "152.627919"
			],
			[
				"postcode" => "2453",
				"suburb" => "CASCADE",
				"state" => "NSW",
				"lat" => "-30.232607",
				"lon" => "152.791072"
			],
			[
				"postcode" => "2453",
				"suburb" => "CLOUDS CREEK",
				"state" => "NSW",
				"lat" => "-30.032074",
				"lon" => "152.652979"
			],
			[
				"postcode" => "2453",
				"suburb" => "DEER VALE",
				"state" => "NSW",
				"lat" => "-30.361575",
				"lon" => "152.532191"
			],
			[
				"postcode" => "2453",
				"suburb" => "DORRIGO",
				"state" => "NSW",
				"lat" => "-30.340131",
				"lon" => "152.711827"
			],
			[
				"postcode" => "2453",
				"suburb" => "DORRIGO MOUNTAIN",
				"state" => "NSW",
				"lat" => "-30.374816",
				"lon" => "152.725458"
			],
			[
				"postcode" => "2453",
				"suburb" => "DUNDURRABIN",
				"state" => "NSW",
				"lat" => "-30.188781",
				"lon" => "152.547364"
			],
			[
				"postcode" => "2453",
				"suburb" => "EBOR",
				"state" => "NSW",
				"lat" => "-30.398818",
				"lon" => "152.352083"
			],
			[
				"postcode" => "2453",
				"suburb" => "FERNBROOK",
				"state" => "NSW",
				"lat" => "-30.365422",
				"lon" => "152.590166"
			],
			[
				"postcode" => "2453",
				"suburb" => "HARNESS CASK",
				"state" => "NSW",
				"lat" => "-30.242939",
				"lon" => "152.568835"
			],
			[
				"postcode" => "2453",
				"suburb" => "HERNANI",
				"state" => "NSW",
				"lat" => "-30.342209",
				"lon" => "152.420978"
			],
			[
				"postcode" => "2453",
				"suburb" => "MARENGO",
				"state" => "NSW",
				"lat" => "-30.167452",
				"lon" => "152.371267"
			],
			[
				"postcode" => "2453",
				"suburb" => "MEGAN",
				"state" => "NSW",
				"lat" => "-30.286954",
				"lon" => "152.787387"
			],
			[
				"postcode" => "2453",
				"suburb" => "MELDRUM DOWNS",
				"state" => "NSW",
				"lat" => "-30.333738",
				"lon" => "152.568687"
			],
			[
				"postcode" => "2453",
				"suburb" => "MOONPAR",
				"state" => "NSW",
				"lat" => "-30.228597",
				"lon" => "152.650581"
			],
			[
				"postcode" => "2453",
				"suburb" => "NEVER NEVER",
				"state" => "NSW",
				"lat" => "-30.383703",
				"lon" => "152.809764"
			],
			[
				"postcode" => "2453",
				"suburb" => "NORTH DORRIGO",
				"state" => "NSW",
				"lat" => "-30.281126",
				"lon" => "152.671483"
			],
			[
				"postcode" => "2453",
				"suburb" => "PADDYS PLAIN",
				"state" => "NSW",
				"lat" => "-30.240488",
				"lon" => "152.691774"
			],
			[
				"postcode" => "2453",
				"suburb" => "TALLOWWOOD RIDGE",
				"state" => "NSW",
				"lat" => "-30.265673",
				"lon" => "152.719119"
			],
			[
				"postcode" => "2453",
				"suburb" => "TYRINGHAM",
				"state" => "NSW",
				"lat" => "-30.223381",
				"lon" => "152.554394"
			],
			[
				"postcode" => "2453",
				"suburb" => "WILD CATTLE CREEK",
				"state" => "NSW",
				"lat" => "-30.158577",
				"lon" => "152.788781"
			],
			[
				"postcode" => "2454",
				"suburb" => "BELLINGEN",
				"state" => "NSW",
				"lat" => "-30.452388",
				"lon" => "152.898147"
			],
			[
				"postcode" => "2454",
				"suburb" => "BIELSDOWN HILLS",
				"state" => "NSW",
				"lat" => "-30.373412",
				"lon" => "152.676687"
			],
			[
				"postcode" => "2454",
				"suburb" => "BRIERFIELD",
				"state" => "NSW",
				"lat" => "-30.503895",
				"lon" => "152.893178"
			],
			[
				"postcode" => "2454",
				"suburb" => "BUFFER CREEK",
				"state" => "NSW",
				"lat" => "-30.383795",
				"lon" => "152.850614"
			],
			[
				"postcode" => "2454",
				"suburb" => "BUNDAGEN",
				"state" => "NSW",
				"lat" => "-30.422303",
				"lon" => "153.033099"
			],
			[
				"postcode" => "2454",
				"suburb" => "DARKWOOD",
				"state" => "NSW",
				"lat" => "-30.437487",
				"lon" => "152.658005"
			],
			[
				"postcode" => "2454",
				"suburb" => "FERNMOUNT",
				"state" => "NSW",
				"lat" => "-30.468067",
				"lon" => "152.959265"
			],
			[
				"postcode" => "2454",
				"suburb" => "GLENIFFER",
				"state" => "NSW",
				"lat" => "-30.386799",
				"lon" => "152.901504"
			],
			[
				"postcode" => "2454",
				"suburb" => "KALANG",
				"state" => "NSW",
				"lat" => "-30.508285",
				"lon" => "152.774243"
			],
			[
				"postcode" => "2454",
				"suburb" => "KOOROOWI",
				"state" => "NSW",
				"lat" => "-30.478221",
				"lon" => "152.805603"
			],
			[
				"postcode" => "2454",
				"suburb" => "MARX HILL",
				"state" => "NSW",
				"lat" => "-30.467619",
				"lon" => "152.926826"
			],
			[
				"postcode" => "2454",
				"suburb" => "MYLESTOM",
				"state" => "NSW",
				"lat" => "-30.464762",
				"lon" => "153.042817"
			],
			[
				"postcode" => "2454",
				"suburb" => "NORTH BELLINGEN",
				"state" => "NSW",
				"lat" => "-30.446069",
				"lon" => "152.897966"
			],
			[
				"postcode" => "2454",
				"suburb" => "PROMISED LAND",
				"state" => "NSW",
				"lat" => "-30.381932",
				"lon" => "152.884972"
			],
			[
				"postcode" => "2454",
				"suburb" => "RALEIGH",
				"state" => "NSW",
				"lat" => "-30.480738",
				"lon" => "152.994874"
			],
			[
				"postcode" => "2454",
				"suburb" => "REPTON",
				"state" => "NSW",
				"lat" => "-30.438888",
				"lon" => "153.022416"
			],
			[
				"postcode" => "2454",
				"suburb" => "SCOTCHMAN",
				"state" => "NSW",
				"lat" => "-30.464338",
				"lon" => "152.845868"
			],
			[
				"postcode" => "2454",
				"suburb" => "THORA",
				"state" => "NSW",
				"lat" => "-30.414372",
				"lon" => "152.772526"
			],
			[
				"postcode" => "2454",
				"suburb" => "VALERY",
				"state" => "NSW",
				"lat" => "-30.386986",
				"lon" => "152.944546"
			],
			[
				"postcode" => "2455",
				"suburb" => "NEWRY",
				"state" => "NSW",
				"lat" => "-30.522855",
				"lon" => "152.975538"
			],
			[
				"postcode" => "2455",
				"suburb" => "NEWRY ISLAND",
				"state" => "NSW",
				"lat" => "-30.498953",
				"lon" => "152.998487"
			],
			[
				"postcode" => "2455",
				"suburb" => "SPICKETTS CREEK",
				"state" => "NSW",
				"lat" => "-30.53073",
				"lon" => "152.865285"
			],
			[
				"postcode" => "2455",
				"suburb" => "URUNGA",
				"state" => "NSW",
				"lat" => "-30.497075",
				"lon" => "153.014883"
			],
			[
				"postcode" => "2455",
				"suburb" => "WENONAH HEAD",
				"state" => "NSW",
				"lat" => "-30.546415",
				"lon" => "153.028009"
			],
			[
				"postcode" => "2456",
				"suburb" => "ARRAWARRA",
				"state" => "NSW",
				"lat" => "-30.059596",
				"lon" => "153.18789"
			],
			[
				"postcode" => "2456",
				"suburb" => "ARRAWARRA HEADLAND",
				"state" => "NSW",
				"lat" => "-30.059771",
				"lon" => "153.202738"
			],
			[
				"postcode" => "2456",
				"suburb" => "CORINDI BEACH",
				"state" => "NSW",
				"lat" => "-30.028812",
				"lon" => "153.20043"
			],
			[
				"postcode" => "2456",
				"suburb" => "EMERALD BEACH",
				"state" => "NSW",
				"lat" => "-30.166597",
				"lon" => "153.182459"
			],
			[
				"postcode" => "2456",
				"suburb" => "MULLAWAY",
				"state" => "NSW",
				"lat" => "-30.077053",
				"lon" => "153.200245"
			],
			[
				"postcode" => "2456",
				"suburb" => "RED ROCK",
				"state" => "NSW",
				"lat" => "-29.98339",
				"lon" => "153.229216"
			],
			[
				"postcode" => "2456",
				"suburb" => "SAFETY BEACH",
				"state" => "NSW",
				"lat" => "-30.096684",
				"lon" => "153.192452"
			],
			[
				"postcode" => "2456",
				"suburb" => "SANDY BEACH",
				"state" => "NSW",
				"lat" => "-30.147985",
				"lon" => "153.192117"
			],
			[
				"postcode" => "2456",
				"suburb" => "UPPER CORINDI",
				"state" => "NSW",
				"lat" => "-30.035889",
				"lon" => "153.158509"
			],
			[
				"postcode" => "2456",
				"suburb" => "WOOLGOOLGA",
				"state" => "NSW",
				"lat" => "-30.113119",
				"lon" => "153.193475"
			],
			[
				"postcode" => "2460",
				"suburb" => "ALICE",
				"state" => "NSW",
				"lat" => "-29.050238",
				"lon" => "152.587447"
			],
			[
				"postcode" => "2460",
				"suburb" => "ALUMY CREEK",
				"state" => "NSW",
				"lat" => "-29.64092",
				"lon" => "152.951448"
			],
			[
				"postcode" => "2460",
				"suburb" => "BARCOONGERE",
				"state" => "NSW",
				"lat" => "-29.936812",
				"lon" => "153.178158"
			],
			[
				"postcode" => "2460",
				"suburb" => "BARRETTS CREEK",
				"state" => "NSW",
				"lat" => "-29.349686",
				"lon" => "152.749863"
			],
			[
				"postcode" => "2460",
				"suburb" => "BARYULGIL",
				"state" => "NSW",
				"lat" => "-29.219261",
				"lon" => "152.604392"
			],
			[
				"postcode" => "2460",
				"suburb" => "BLAXLANDS CREEK",
				"state" => "NSW",
				"lat" => "-29.859271",
				"lon" => "152.847314"
			],
			[
				"postcode" => "2460",
				"suburb" => "BOM BOM",
				"state" => "NSW",
				"lat" => "-29.739638",
				"lon" => "152.962193"
			],
			[
				"postcode" => "2460",
				"suburb" => "BOOKRAM",
				"state" => "NSW",
				"lat" => "-29.71226",
				"lon" => "153.229513"
			],
			[
				"postcode" => "2460",
				"suburb" => "BRAUNSTONE",
				"state" => "NSW",
				"lat" => "-29.802551",
				"lon" => "152.959309"
			],
			[
				"postcode" => "2460",
				"suburb" => "BRUSHGROVE",
				"state" => "NSW",
				"lat" => "-29.566127",
				"lon" => "153.080634"
			],
			[
				"postcode" => "2460",
				"suburb" => "BUCCARUMBI",
				"state" => "NSW",
				"lat" => "-29.836597",
				"lon" => "152.584632"
			],
			[
				"postcode" => "2460",
				"suburb" => "CALAMIA",
				"state" => "NSW",
				"lat" => "-29.853152",
				"lon" => "153.108592"
			],
			[
				"postcode" => "2460",
				"suburb" => "CANGAI",
				"state" => "NSW",
				"lat" => "-29.508401",
				"lon" => "152.479215"
			],
			[
				"postcode" => "2460",
				"suburb" => "CARNHAM",
				"state" => "NSW",
				"lat" => "-29.332638",
				"lon" => "152.537421"
			],
			[
				"postcode" => "2460",
				"suburb" => "CARRS CREEK",
				"state" => "NSW",
				"lat" => "-29.653051",
				"lon" => "152.917205"
			],
			[
				"postcode" => "2460",
				"suburb" => "CARRS ISLAND",
				"state" => "NSW",
				"lat" => "-29.6701",
				"lon" => "152.912582"
			],
			[
				"postcode" => "2460",
				"suburb" => "CARRS PENINSULAR",
				"state" => "NSW",
				"lat" => "-29.643605",
				"lon" => "152.905916"
			],
			[
				"postcode" => "2460",
				"suburb" => "CHAELUNDI",
				"state" => "NSW",
				"lat" => "-29.97389",
				"lon" => "152.37708"
			],
			[
				"postcode" => "2460",
				"suburb" => "CHAMBIGNE",
				"state" => "NSW",
				"lat" => "-29.763733",
				"lon" => "152.752728"
			],
			[
				"postcode" => "2460",
				"suburb" => "CLARENZA",
				"state" => "NSW",
				"lat" => "-29.697238",
				"lon" => "152.988368"
			],
			[
				"postcode" => "2460",
				"suburb" => "CLIFDEN",
				"state" => "NSW",
				"lat" => "-29.538744",
				"lon" => "152.986766"
			],
			[
				"postcode" => "2460",
				"suburb" => "COALDALE",
				"state" => "NSW",
				"lat" => "-29.387962",
				"lon" => "152.790365"
			],
			[
				"postcode" => "2460",
				"suburb" => "COLLUM COLLUM",
				"state" => "NSW",
				"lat" => "-29.222537",
				"lon" => "152.489625"
			],
			[
				"postcode" => "2460",
				"suburb" => "COOMBADJHA",
				"state" => "NSW",
				"lat" => "-29.382386",
				"lon" => "152.482487"
			],
			[
				"postcode" => "2460",
				"suburb" => "COPMANHURST",
				"state" => "NSW",
				"lat" => "-29.586237",
				"lon" => "152.776394"
			],
			[
				"postcode" => "2460",
				"suburb" => "COUTTS CROSSING",
				"state" => "NSW",
				"lat" => "-29.831052",
				"lon" => "152.891036"
			],
			[
				"postcode" => "2460",
				"suburb" => "COWPER",
				"state" => "NSW",
				"lat" => "-29.578505",
				"lon" => "153.062697"
			],
			[
				"postcode" => "2460",
				"suburb" => "CROWTHER ISLAND",
				"state" => "NSW",
				"lat" => "-29.625955",
				"lon" => "152.920458"
			],
			[
				"postcode" => "2460",
				"suburb" => "DALMORTON",
				"state" => "NSW",
				"lat" => "-29.864512",
				"lon" => "152.455428"
			],
			[
				"postcode" => "2460",
				"suburb" => "DILKOON",
				"state" => "NSW",
				"lat" => "-29.498411",
				"lon" => "152.980171"
			],
			[
				"postcode" => "2460",
				"suburb" => "DIRTY CREEK",
				"state" => "NSW",
				"lat" => "-29.984931",
				"lon" => "153.148016"
			],
			[
				"postcode" => "2460",
				"suburb" => "DUMBUDGERY",
				"state" => "NSW",
				"lat" => "-29.31806",
				"lon" => "152.550811"
			],
			[
				"postcode" => "2460",
				"suburb" => "EATONSVILLE",
				"state" => "NSW",
				"lat" => "-29.640182",
				"lon" => "152.831293"
			],
			[
				"postcode" => "2460",
				"suburb" => "EIGHTEEN MILE",
				"state" => "NSW",
				"lat" => "-29.272287",
				"lon" => "152.593243"
			],
			[
				"postcode" => "2460",
				"suburb" => "ELLAND",
				"state" => "NSW",
				"lat" => "-29.756181",
				"lon" => "152.928726"
			],
			[
				"postcode" => "2460",
				"suburb" => "FINE FLOWER",
				"state" => "NSW",
				"lat" => "-29.350834",
				"lon" => "152.63823"
			],
			[
				"postcode" => "2460",
				"suburb" => "FORTIS CREEK",
				"state" => "NSW",
				"lat" => "-29.538295",
				"lon" => "152.891614"
			],
			[
				"postcode" => "2460",
				"suburb" => "GLENUGIE",
				"state" => "NSW",
				"lat" => "-29.791634",
				"lon" => "153.019785"
			],
			[
				"postcode" => "2460",
				"suburb" => "GRAFTON",
				"state" => "NSW",
				"lat" => "-29.691225",
				"lon" => "152.933312"
			],
			[
				"postcode" => "2460",
				"suburb" => "GRAFTON WEST",
				"state" => "NSW",
				"lat" => "-29.703905",
				"lon" => "152.941692"
			],
			[
				"postcode" => "2460",
				"suburb" => "GREAT MARLOW",
				"state" => "NSW",
				"lat" => "-29.656228",
				"lon" => "152.973203"
			],
			[
				"postcode" => "2460",
				"suburb" => "GURRANANG",
				"state" => "NSW",
				"lat" => "-29.435159",
				"lon" => "152.98993"
			],
			[
				"postcode" => "2460",
				"suburb" => "HALFWAY CREEK",
				"state" => "NSW",
				"lat" => "-29.948486",
				"lon" => "153.114128"
			],
			[
				"postcode" => "2460",
				"suburb" => "HEIFER STATION",
				"state" => "NSW",
				"lat" => "-29.488146",
				"lon" => "152.641895"
			],
			[
				"postcode" => "2460",
				"suburb" => "JACKADGERY",
				"state" => "NSW",
				"lat" => "-29.58218",
				"lon" => "152.560932"
			],
			[
				"postcode" => "2460",
				"suburb" => "JUNCTION HILL",
				"state" => "NSW",
				"lat" => "-29.64137",
				"lon" => "152.925803"
			],
			[
				"postcode" => "2460",
				"suburb" => "KANGAROO CREEK",
				"state" => "NSW",
				"lat" => "-29.946034",
				"lon" => "152.840855"
			],
			[
				"postcode" => "2460",
				"suburb" => "KEYBARBIN",
				"state" => "NSW",
				"lat" => "-29.097685",
				"lon" => "152.604617"
			],
			[
				"postcode" => "2460",
				"suburb" => "KOOLKHAN",
				"state" => "NSW",
				"lat" => "-29.624868",
				"lon" => "152.928901"
			],
			[
				"postcode" => "2460",
				"suburb" => "KREMNOS",
				"state" => "NSW",
				"lat" => "-29.945018",
				"lon" => "152.982773"
			],
			[
				"postcode" => "2460",
				"suburb" => "KUNGALA",
				"state" => "NSW",
				"lat" => "-29.944587",
				"lon" => "152.999301"
			],
			[
				"postcode" => "2460",
				"suburb" => "KYARRAN",
				"state" => "NSW",
				"lat" => "-29.57874",
				"lon" => "152.976513"
			],
			[
				"postcode" => "2460",
				"suburb" => "LANITZA",
				"state" => "NSW",
				"lat" => "-29.883644",
				"lon" => "152.996931"
			],
			[
				"postcode" => "2460",
				"suburb" => "LAWRENCE",
				"state" => "NSW",
				"lat" => "-29.496729",
				"lon" => "153.105535"
			],
			[
				"postcode" => "2460",
				"suburb" => "LEVENSTRATH",
				"state" => "NSW",
				"lat" => "-29.82287",
				"lon" => "152.937321"
			],
			[
				"postcode" => "2460",
				"suburb" => "LILYDALE",
				"state" => "NSW",
				"lat" => "-29.54694",
				"lon" => "152.671909"
			],
			[
				"postcode" => "2460",
				"suburb" => "LIONSVILLE",
				"state" => "NSW",
				"lat" => "-29.200949",
				"lon" => "152.508068"
			],
			[
				"postcode" => "2460",
				"suburb" => "LOWER SOUTHGATE",
				"state" => "NSW",
				"lat" => "-29.556531",
				"lon" => "153.076817"
			],
			[
				"postcode" => "2460",
				"suburb" => "MALABUGILMAH",
				"state" => "NSW",
				"lat" => "-29.182706",
				"lon" => "152.628949"
			],
			[
				"postcode" => "2460",
				"suburb" => "MOLEVILLE CREEK",
				"state" => "NSW",
				"lat" => "-29.573481",
				"lon" => "152.890239"
			],
			[
				"postcode" => "2460",
				"suburb" => "MOUNTAIN VIEW",
				"state" => "NSW",
				"lat" => "-29.608511",
				"lon" => "152.935547"
			],
			[
				"postcode" => "2460",
				"suburb" => "MYLNEFORD",
				"state" => "NSW",
				"lat" => "-29.628657",
				"lon" => "152.843726"
			],
			[
				"postcode" => "2460",
				"suburb" => "NEWBOLD",
				"state" => "NSW",
				"lat" => "-29.518107",
				"lon" => "152.695993"
			],
			[
				"postcode" => "2460",
				"suburb" => "NYMBOIDA",
				"state" => "NSW",
				"lat" => "-29.926011",
				"lon" => "152.747884"
			],
			[
				"postcode" => "2460",
				"suburb" => "PULGANBAR",
				"state" => "NSW",
				"lat" => "-29.472322",
				"lon" => "152.684972"
			],
			[
				"postcode" => "2460",
				"suburb" => "PUNCHBOWL",
				"state" => "NSW",
				"lat" => "-29.494599",
				"lon" => "152.795221"
			],
			[
				"postcode" => "2460",
				"suburb" => "RAMORNIE",
				"state" => "NSW",
				"lat" => "-29.640683",
				"lon" => "152.782792"
			],
			[
				"postcode" => "2460",
				"suburb" => "RUSHFORTH",
				"state" => "NSW",
				"lat" => "-29.743076",
				"lon" => "152.900474"
			],
			[
				"postcode" => "2460",
				"suburb" => "SANDY CROSSING",
				"state" => "NSW",
				"lat" => "-29.764413",
				"lon" => "153.095828"
			],
			[
				"postcode" => "2460",
				"suburb" => "SEELANDS",
				"state" => "NSW",
				"lat" => "-29.615101",
				"lon" => "152.913819"
			],
			[
				"postcode" => "2460",
				"suburb" => "SHANNONDALE",
				"state" => "NSW",
				"lat" => "-29.809488",
				"lon" => "152.846014"
			],
			[
				"postcode" => "2460",
				"suburb" => "SMITHS CREEK",
				"state" => "NSW",
				"lat" => "-29.535713",
				"lon" => "152.742506"
			],
			[
				"postcode" => "2460",
				"suburb" => "SOUTH ARM",
				"state" => "NSW",
				"lat" => "-29.537005",
				"lon" => "153.148196"
			],
			[
				"postcode" => "2460",
				"suburb" => "SOUTH GRAFTON",
				"state" => "NSW",
				"lat" => "-29.703242",
				"lon" => "152.934605"
			],
			[
				"postcode" => "2460",
				"suburb" => "SOUTHAMPTON",
				"state" => "NSW",
				"lat" => "-29.713283",
				"lon" => "152.906042"
			],
			[
				"postcode" => "2460",
				"suburb" => "SOUTHGATE",
				"state" => "NSW",
				"lat" => "-29.608116",
				"lon" => "153.024309"
			],
			[
				"postcode" => "2460",
				"suburb" => "STOCKYARD CREEK",
				"state" => "NSW",
				"lat" => "-29.492985",
				"lon" => "152.826462"
			],
			[
				"postcode" => "2460",
				"suburb" => "THE PINNACLES",
				"state" => "NSW",
				"lat" => "-29.553403",
				"lon" => "152.932812"
			],
			[
				"postcode" => "2460",
				"suburb" => "THE WHITEMAN",
				"state" => "NSW",
				"lat" => "-29.610382",
				"lon" => "152.877264"
			],
			[
				"postcode" => "2460",
				"suburb" => "TOWALLUM",
				"state" => "NSW",
				"lat" => "-30.086644",
				"lon" => "152.872204"
			],
			[
				"postcode" => "2460",
				"suburb" => "TRENAYR",
				"state" => "NSW",
				"lat" => "-29.620743",
				"lon" => "152.945825"
			],
			[
				"postcode" => "2460",
				"suburb" => "TYNDALE",
				"state" => "NSW",
				"lat" => "-29.56176",
				"lon" => "153.148717"
			],
			[
				"postcode" => "2460",
				"suburb" => "UPPER COPMANHURST",
				"state" => "NSW",
				"lat" => "-29.556803",
				"lon" => "152.73514"
			],
			[
				"postcode" => "2460",
				"suburb" => "UPPER FINE FLOWER",
				"state" => "NSW",
				"lat" => "-29.271767",
				"lon" => "152.733431"
			],
			[
				"postcode" => "2460",
				"suburb" => "WARRAGAI CREEK",
				"state" => "NSW",
				"lat" => "-29.558553",
				"lon" => "152.975078"
			],
			[
				"postcode" => "2460",
				"suburb" => "WASHPOOL",
				"state" => "NSW",
				"lat" => "-29.296914",
				"lon" => "152.448464"
			],
			[
				"postcode" => "2460",
				"suburb" => "WATERVIEW",
				"state" => "NSW",
				"lat" => "-29.690819",
				"lon" => "152.904426"
			],
			[
				"postcode" => "2460",
				"suburb" => "WATERVIEW HEIGHTS",
				"state" => "NSW",
				"lat" => "-29.702381",
				"lon" => "152.838233"
			],
			[
				"postcode" => "2460",
				"suburb" => "WELLS CROSSING",
				"state" => "NSW",
				"lat" => "-29.892279",
				"lon" => "153.059881"
			],
			[
				"postcode" => "2460",
				"suburb" => "WHITEMAN CREEK",
				"state" => "NSW",
				"lat" => "-29.584552",
				"lon" => "152.86387"
			],
			[
				"postcode" => "2460",
				"suburb" => "WINEGROVE",
				"state" => "NSW",
				"lat" => "-29.548417",
				"lon" => "152.689208"
			],
			[
				"postcode" => "2460",
				"suburb" => "WOMBAT CREEK",
				"state" => "NSW",
				"lat" => "-29.514454",
				"lon" => "152.767099"
			],
			[
				"postcode" => "2462",
				"suburb" => "CALLIOPE",
				"state" => "NSW",
				"lat" => "-29.618586",
				"lon" => "153.07136"
			],
			[
				"postcode" => "2462",
				"suburb" => "COLDSTREAM",
				"state" => "NSW",
				"lat" => "-29.617706",
				"lon" => "153.105737"
			],
			[
				"postcode" => "2462",
				"suburb" => "DIGGERS CAMP",
				"state" => "NSW",
				"lat" => "-29.817345",
				"lon" => "153.288085"
			],
			[
				"postcode" => "2462",
				"suburb" => "GILLETTS RIDGE",
				"state" => "NSW",
				"lat" => "-29.638483",
				"lon" => "153.109567"
			],
			[
				"postcode" => "2462",
				"suburb" => "LAKE HIAWATHA",
				"state" => "NSW",
				"lat" => "-29.816549",
				"lon" => "153.257047"
			],
			[
				"postcode" => "2462",
				"suburb" => "LAVADIA",
				"state" => "NSW",
				"lat" => "-29.718956",
				"lon" => "153.070298"
			],
			[
				"postcode" => "2462",
				"suburb" => "MINNIE WATER",
				"state" => "NSW",
				"lat" => "-29.778146",
				"lon" => "153.296976"
			],
			[
				"postcode" => "2462",
				"suburb" => "PILLAR VALLEY",
				"state" => "NSW",
				"lat" => "-29.76405",
				"lon" => "153.12999"
			],
			[
				"postcode" => "2462",
				"suburb" => "SWAN CREEK",
				"state" => "NSW",
				"lat" => "-29.668607",
				"lon" => "152.981609"
			],
			[
				"postcode" => "2462",
				"suburb" => "TUCABIA",
				"state" => "NSW",
				"lat" => "-29.669036",
				"lon" => "153.107275"
			],
			[
				"postcode" => "2462",
				"suburb" => "ULMARRA",
				"state" => "NSW",
				"lat" => "-29.630579",
				"lon" => "153.028112"
			],
			[
				"postcode" => "2462",
				"suburb" => "WOOLI",
				"state" => "NSW",
				"lat" => "-29.865472",
				"lon" => "153.266263"
			],
			[
				"postcode" => "2463",
				"suburb" => "ASHBY",
				"state" => "NSW",
				"lat" => "-29.423925",
				"lon" => "153.187448"
			],
			[
				"postcode" => "2463",
				"suburb" => "ASHBY HEIGHTS",
				"state" => "NSW",
				"lat" => "-29.413743",
				"lon" => "153.179387"
			],
			[
				"postcode" => "2463",
				"suburb" => "ASHBY ISLAND",
				"state" => "NSW",
				"lat" => "-29.430968",
				"lon" => "153.202632"
			],
			[
				"postcode" => "2463",
				"suburb" => "BROOMS HEAD",
				"state" => "NSW",
				"lat" => "-29.604668",
				"lon" => "153.33314"
			],
			[
				"postcode" => "2463",
				"suburb" => "GULMARRAD",
				"state" => "NSW",
				"lat" => "-29.48726",
				"lon" => "153.233256"
			],
			[
				"postcode" => "2463",
				"suburb" => "ILARWILL",
				"state" => "NSW",
				"lat" => "-29.46593",
				"lon" => "153.172822"
			],
			[
				"postcode" => "2463",
				"suburb" => "JACKY BULBIN FLAT",
				"state" => "NSW",
				"lat" => "-29.267326",
				"lon" => "153.223918"
			],
			[
				"postcode" => "2463",
				"suburb" => "JAMES CREEK",
				"state" => "NSW",
				"lat" => "-29.446952",
				"lon" => "153.253112"
			],
			[
				"postcode" => "2463",
				"suburb" => "MACLEAN",
				"state" => "NSW",
				"lat" => "-29.457963",
				"lon" => "153.196869"
			],
			[
				"postcode" => "2463",
				"suburb" => "PALMERS CHANNEL",
				"state" => "NSW",
				"lat" => "-29.459505",
				"lon" => "153.279261"
			],
			[
				"postcode" => "2463",
				"suburb" => "PALMERS ISLAND",
				"state" => "NSW",
				"lat" => "-29.420289",
				"lon" => "153.288677"
			],
			[
				"postcode" => "2463",
				"suburb" => "SANDON",
				"state" => "NSW",
				"lat" => "-29.674854",
				"lon" => "153.326507"
			],
			[
				"postcode" => "2463",
				"suburb" => "SHARK CREEK",
				"state" => "NSW",
				"lat" => "-29.523191",
				"lon" => "153.206683"
			],
			[
				"postcode" => "2463",
				"suburb" => "TALOUMBI",
				"state" => "NSW",
				"lat" => "-29.548453",
				"lon" => "153.267141"
			],
			[
				"postcode" => "2463",
				"suburb" => "THE SANDON",
				"state" => "NSW",
				"lat" => "-29.6665",
				"lon" => "153.296709"
			],
			[
				"postcode" => "2463",
				"suburb" => "TOWNSEND",
				"state" => "NSW",
				"lat" => "-29.465648",
				"lon" => "153.220203"
			],
			[
				"postcode" => "2463",
				"suburb" => "TULLYMORGAN",
				"state" => "NSW",
				"lat" => "-29.38348",
				"lon" => "153.09836"
			],
			[
				"postcode" => "2463",
				"suburb" => "WOODFORD",
				"state" => "NSW",
				"lat" => "-29.487538",
				"lon" => "153.132525"
			],
			[
				"postcode" => "2464",
				"suburb" => "ANGOURIE",
				"state" => "NSW",
				"lat" => "-29.481012",
				"lon" => "153.359964"
			],
			[
				"postcode" => "2464",
				"suburb" => "FREEBURN ISLAND",
				"state" => "NSW",
				"lat" => "-29.401544",
				"lon" => "153.332154"
			],
			[
				"postcode" => "2464",
				"suburb" => "MICALO ISLAND",
				"state" => "NSW",
				"lat" => "-29.431524",
				"lon" => "153.312481"
			],
			[
				"postcode" => "2464",
				"suburb" => "WOOLOWEYAH",
				"state" => "NSW",
				"lat" => "-29.483013",
				"lon" => "153.342381"
			],
			[
				"postcode" => "2464",
				"suburb" => "YAMBA",
				"state" => "NSW",
				"lat" => "-29.437064",
				"lon" => "153.361445"
			],
			[
				"postcode" => "2464",
				"suburb" => "YURAYGIR",
				"state" => "NSW",
				"lat" => "-29.621867",
				"lon" => "153.315914"
			],
			[
				"postcode" => "2465",
				"suburb" => "HARWOOD",
				"state" => "NSW",
				"lat" => "-29.418833",
				"lon" => "153.240867"
			],
			[
				"postcode" => "2466",
				"suburb" => "ILUKA",
				"state" => "NSW",
				"lat" => "-29.407475",
				"lon" => "153.350886"
			],
			[
				"postcode" => "2466",
				"suburb" => "THE FRESHWATER",
				"state" => "NSW",
				"lat" => "-29.35729",
				"lon" => "153.349022"
			],
			[
				"postcode" => "2466",
				"suburb" => "WOODY HEAD",
				"state" => "NSW",
				"lat" => "-29.369351",
				"lon" => "153.366522"
			],
			[
				"postcode" => "2469",
				"suburb" => "BANYABBA",
				"state" => "NSW",
				"lat" => "-29.338403",
				"lon" => "153.002402"
			],
			[
				"postcode" => "2469",
				"suburb" => "BEAN CREEK",
				"state" => "NSW",
				"lat" => "-28.618977",
				"lon" => "152.590462"
			],
			[
				"postcode" => "2469",
				"suburb" => "BINGEEBEEBRA CREEK",
				"state" => "NSW",
				"lat" => "-28.815242",
				"lon" => "152.786879"
			],
			[
				"postcode" => "2469",
				"suburb" => "BONALBO",
				"state" => "NSW",
				"lat" => "-28.73647",
				"lon" => "152.622832"
			],
			[
				"postcode" => "2469",
				"suburb" => "BOOMOODEERIE",
				"state" => "NSW",
				"lat" => "-28.897941",
				"lon" => "153.037431"
			],
			[
				"postcode" => "2469",
				"suburb" => "BOTTLE CREEK",
				"state" => "NSW",
				"lat" => "-28.788792",
				"lon" => "152.648086"
			],
			[
				"postcode" => "2469",
				"suburb" => "BULLDOG",
				"state" => "NSW",
				"lat" => "-29.040513",
				"lon" => "152.529206"
			],
			[
				"postcode" => "2469",
				"suburb" => "BUNGAWALBIN",
				"state" => "NSW",
				"lat" => "-29.032394",
				"lon" => "153.266213"
			],
			[
				"postcode" => "2469",
				"suburb" => "BUSBYS FLAT",
				"state" => "NSW",
				"lat" => "-29.038162",
				"lon" => "152.810381"
			],
			[
				"postcode" => "2469",
				"suburb" => "CAMBRIDGE PLATEAU",
				"state" => "NSW",
				"lat" => "-28.762136",
				"lon" => "152.722809"
			],
			[
				"postcode" => "2469",
				"suburb" => "CAMIRA",
				"state" => "NSW",
				"lat" => "-29.223953",
				"lon" => "152.932687"
			],
			[
				"postcode" => "2469",
				"suburb" => "CAPEEN CREEK",
				"state" => "NSW",
				"lat" => "-28.544132",
				"lon" => "152.649342"
			],
			[
				"postcode" => "2469",
				"suburb" => "CHATSWORTH",
				"state" => "NSW",
				"lat" => "-29.379238",
				"lon" => "153.24861"
			],
			[
				"postcode" => "2469",
				"suburb" => "CLEARFIELD",
				"state" => "NSW",
				"lat" => "-29.142373",
				"lon" => "152.935726"
			],
			[
				"postcode" => "2469",
				"suburb" => "COONGBAR",
				"state" => "NSW",
				"lat" => "-29.093823",
				"lon" => "152.690845"
			],
			[
				"postcode" => "2469",
				"suburb" => "CULMARAN CREEK",
				"state" => "NSW",
				"lat" => "-28.867696",
				"lon" => "152.676266"
			],
			[
				"postcode" => "2469",
				"suburb" => "DEEP CREEK",
				"state" => "NSW",
				"lat" => "-29.148836",
				"lon" => "152.613837"
			],
			[
				"postcode" => "2469",
				"suburb" => "DRAKE",
				"state" => "NSW",
				"lat" => "-28.926318",
				"lon" => "152.360072"
			],
			[
				"postcode" => "2469",
				"suburb" => "DRAKE VILLAGE",
				"state" => "NSW",
				"lat" => "-28.928936",
				"lon" => "152.373562"
			],
			[
				"postcode" => "2469",
				"suburb" => "DUCK CREEK",
				"state" => "NSW",
				"lat" => "-28.715281",
				"lon" => "152.561459"
			],
			[
				"postcode" => "2469",
				"suburb" => "EWINGAR",
				"state" => "NSW",
				"lat" => "-29.070595",
				"lon" => "152.537304"
			],
			[
				"postcode" => "2469",
				"suburb" => "GIBBERAGEE",
				"state" => "NSW",
				"lat" => "-29.233935",
				"lon" => "153.096114"
			],
			[
				"postcode" => "2469",
				"suburb" => "GOODWOOD ISLAND",
				"state" => "NSW",
				"lat" => "-29.381741",
				"lon" => "153.312058"
			],
			[
				"postcode" => "2469",
				"suburb" => "GORGE CREEK",
				"state" => "NSW",
				"lat" => "-28.746359",
				"lon" => "152.695237"
			],
			[
				"postcode" => "2469",
				"suburb" => "HAYSTACK",
				"state" => "NSW",
				"lat" => "-28.665337",
				"lon" => "152.570978"
			],
			[
				"postcode" => "2469",
				"suburb" => "HOGARTH RANGE",
				"state" => "NSW",
				"lat" => "-28.914907",
				"lon" => "152.794102"
			],
			[
				"postcode" => "2469",
				"suburb" => "JACKSONS FLAT",
				"state" => "NSW",
				"lat" => "-28.841661",
				"lon" => "152.55056"
			],
			[
				"postcode" => "2469",
				"suburb" => "JOES BOX",
				"state" => "NSW",
				"lat" => "-28.61189",
				"lon" => "152.516817"
			],
			[
				"postcode" => "2469",
				"suburb" => "KIPPENDUFF",
				"state" => "NSW",
				"lat" => "-29.127921",
				"lon" => "152.873091"
			],
			[
				"postcode" => "2469",
				"suburb" => "LOUISA CREEK",
				"state" => "NSW",
				"lat" => "-29.011404",
				"lon" => "152.605127"
			],
			[
				"postcode" => "2469",
				"suburb" => "LOWER BOTTLE CREEK",
				"state" => "NSW",
				"lat" => "-28.825717",
				"lon" => "152.608197"
			],
			[
				"postcode" => "2469",
				"suburb" => "LOWER DUCK CREEK",
				"state" => "NSW",
				"lat" => "-28.698433",
				"lon" => "152.554219"
			],
			[
				"postcode" => "2469",
				"suburb" => "LOWER PEACOCK",
				"state" => "NSW",
				"lat" => "-28.77131",
				"lon" => "152.597908"
			],
			[
				"postcode" => "2469",
				"suburb" => "MALLANGANEE",
				"state" => "NSW",
				"lat" => "-28.906449",
				"lon" => "152.720585"
			],
			[
				"postcode" => "2469",
				"suburb" => "MOOKIMA WYBRA",
				"state" => "NSW",
				"lat" => "-29.033871",
				"lon" => "152.563922"
			],
			[
				"postcode" => "2469",
				"suburb" => "MORORO",
				"state" => "NSW",
				"lat" => "-29.338489",
				"lon" => "153.196138"
			],
			[
				"postcode" => "2469",
				"suburb" => "MOUNT MARSH",
				"state" => "NSW",
				"lat" => "-29.30034",
				"lon" => "152.866399"
			],
			[
				"postcode" => "2469",
				"suburb" => "MUMMULGUM",
				"state" => "NSW",
				"lat" => "-28.849415",
				"lon" => "152.798156"
			],
			[
				"postcode" => "2469",
				"suburb" => "MYRTLE CREEK",
				"state" => "NSW",
				"lat" => "-29.113036",
				"lon" => "152.947558"
			],
			[
				"postcode" => "2469",
				"suburb" => "OLD BONALBO",
				"state" => "NSW",
				"lat" => "-28.653951",
				"lon" => "152.596341"
			],
			[
				"postcode" => "2469",
				"suburb" => "PADDYS FLAT",
				"state" => "NSW",
				"lat" => "-28.734514",
				"lon" => "152.420435"
			],
			[
				"postcode" => "2469",
				"suburb" => "PAGANS FLAT",
				"state" => "NSW",
				"lat" => "-28.948746",
				"lon" => "152.573328"
			],
			[
				"postcode" => "2469",
				"suburb" => "PEACOCK CREEK",
				"state" => "NSW",
				"lat" => "-28.685285",
				"lon" => "152.697195"
			],
			[
				"postcode" => "2469",
				"suburb" => "PIKAPENE",
				"state" => "NSW",
				"lat" => "-29.054754",
				"lon" => "152.660859"
			],
			[
				"postcode" => "2469",
				"suburb" => "PRETTY GULLY",
				"state" => "NSW",
				"lat" => "-28.78528",
				"lon" => "152.445226"
			],
			[
				"postcode" => "2469",
				"suburb" => "RAPPVILLE",
				"state" => "NSW",
				"lat" => "-29.084845",
				"lon" => "152.953134"
			],
			[
				"postcode" => "2469",
				"suburb" => "SANDILANDS",
				"state" => "NSW",
				"lat" => "-28.8999",
				"lon" => "152.654679"
			],
			[
				"postcode" => "2469",
				"suburb" => "SIMPKINS CREEK",
				"state" => "NSW",
				"lat" => "-28.836392",
				"lon" => "152.78199"
			],
			[
				"postcode" => "2469",
				"suburb" => "SIX MILE SWAMP",
				"state" => "NSW",
				"lat" => "-29.170527",
				"lon" => "152.876018"
			],
			[
				"postcode" => "2469",
				"suburb" => "TABULAM",
				"state" => "NSW",
				"lat" => "-28.887198",
				"lon" => "152.568553"
			],
			[
				"postcode" => "2469",
				"suburb" => "THERESA CREEK",
				"state" => "NSW",
				"lat" => "-28.790254",
				"lon" => "152.800508"
			],
			[
				"postcode" => "2469",
				"suburb" => "TUNGLEBUNG",
				"state" => "NSW",
				"lat" => "-28.827677",
				"lon" => "152.669314"
			],
			[
				"postcode" => "2469",
				"suburb" => "UPPER DUCK CREEK",
				"state" => "NSW",
				"lat" => "-28.55675",
				"lon" => "152.693813"
			],
			[
				"postcode" => "2469",
				"suburb" => "WARREGAH ISLAND",
				"state" => "NSW",
				"lat" => "-29.398761",
				"lon" => "153.221616"
			],
			[
				"postcode" => "2469",
				"suburb" => "WHIPORIE",
				"state" => "NSW",
				"lat" => "-29.233222",
				"lon" => "152.989147"
			],
			[
				"postcode" => "2469",
				"suburb" => "WOOMBAH",
				"state" => "NSW",
				"lat" => "-29.360487",
				"lon" => "153.282736"
			],
			[
				"postcode" => "2469",
				"suburb" => "WYAN",
				"state" => "NSW",
				"lat" => "-29.073981",
				"lon" => "152.883475"
			],
			[
				"postcode" => "2469",
				"suburb" => "YABBRA",
				"state" => "NSW",
				"lat" => "-28.610761",
				"lon" => "152.494662"
			],
			[
				"postcode" => "2470",
				"suburb" => "BABYL CREEK",
				"state" => "NSW",
				"lat" => "-28.730383",
				"lon" => "152.795939"
			],
			[
				"postcode" => "2470",
				"suburb" => "BACKMEDE",
				"state" => "NSW",
				"lat" => "-28.77259",
				"lon" => "153.018771"
			],
			[
				"postcode" => "2470",
				"suburb" => "BARAIMAL",
				"state" => "NSW",
				"lat" => "-28.72262",
				"lon" => "152.996558"
			],
			[
				"postcode" => "2470",
				"suburb" => "CASINO",
				"state" => "NSW",
				"lat" => "-28.863887",
				"lon" => "153.046151"
			],
			[
				"postcode" => "2470",
				"suburb" => "COOMBELL",
				"state" => "NSW",
				"lat" => "-29.015289",
				"lon" => "152.973562"
			],
			[
				"postcode" => "2470",
				"suburb" => "DOBIES BIGHT",
				"state" => "NSW",
				"lat" => "-28.809447",
				"lon" => "152.943494"
			],
			[
				"postcode" => "2470",
				"suburb" => "DOUBTFUL CREEK",
				"state" => "NSW",
				"lat" => "-28.748597",
				"lon" => "152.915051"
			],
			[
				"postcode" => "2470",
				"suburb" => "DYRAABA",
				"state" => "NSW",
				"lat" => "-28.800861",
				"lon" => "152.862776"
			],
			[
				"postcode" => "2470",
				"suburb" => "ELLANGOWAN",
				"state" => "NSW",
				"lat" => "-29.049762",
				"lon" => "153.039519"
			],
			[
				"postcode" => "2470",
				"suburb" => "FAIRY HILL",
				"state" => "NSW",
				"lat" => "-28.762953",
				"lon" => "152.986613"
			],
			[
				"postcode" => "2470",
				"suburb" => "IRVINGTON",
				"state" => "NSW",
				"lat" => "-28.868689",
				"lon" => "153.106399"
			],
			[
				"postcode" => "2470",
				"suburb" => "LEEVILLE",
				"state" => "NSW",
				"lat" => "-28.947743",
				"lon" => "152.97788"
			],
			[
				"postcode" => "2470",
				"suburb" => "LOWER DYRAABA",
				"state" => "NSW",
				"lat" => "-28.813602",
				"lon" => "152.904205"
			],
			[
				"postcode" => "2470",
				"suburb" => "MONGOGARIE",
				"state" => "NSW",
				"lat" => "-28.947827",
				"lon" => "152.901912"
			],
			[
				"postcode" => "2470",
				"suburb" => "NAUGHTONS GAP",
				"state" => "NSW",
				"lat" => "-28.8019",
				"lon" => "153.107591"
			],
			[
				"postcode" => "2470",
				"suburb" => "NORTH CASINO",
				"state" => "NSW",
				"lat" => "-28.7912",
				"lon" => "153.062954"
			],
			[
				"postcode" => "2470",
				"suburb" => "PIORA",
				"state" => "NSW",
				"lat" => "-28.850355",
				"lon" => "152.914415"
			],
			[
				"postcode" => "2470",
				"suburb" => "SEXTONVILLE",
				"state" => "NSW",
				"lat" => "-28.671958",
				"lon" => "152.80548"
			],
			[
				"postcode" => "2470",
				"suburb" => "SHANNON BROOK",
				"state" => "NSW",
				"lat" => "-28.896275",
				"lon" => "152.957507"
			],
			[
				"postcode" => "2470",
				"suburb" => "SPRING GROVE",
				"state" => "NSW",
				"lat" => "-28.833066",
				"lon" => "153.155733"
			],
			[
				"postcode" => "2470",
				"suburb" => "STRATHEDEN",
				"state" => "NSW",
				"lat" => "-28.80272",
				"lon" => "152.954303"
			],
			[
				"postcode" => "2470",
				"suburb" => "UPPER MONGOGARIE",
				"state" => "NSW",
				"lat" => "-28.979548",
				"lon" => "152.850247"
			],
			[
				"postcode" => "2470",
				"suburb" => "WOODVIEW",
				"state" => "NSW",
				"lat" => "-28.86062",
				"lon" => "152.950742"
			],
			[
				"postcode" => "2470",
				"suburb" => "WOOLNERS ARM",
				"state" => "NSW",
				"lat" => "-28.694457",
				"lon" => "152.83862"
			],
			[
				"postcode" => "2470",
				"suburb" => "WOOROOWOOLGAN",
				"state" => "NSW",
				"lat" => "-28.859366",
				"lon" => "153.006138"
			],
			[
				"postcode" => "2470",
				"suburb" => "YORKLEA",
				"state" => "NSW",
				"lat" => "-28.946286",
				"lon" => "153.060771"
			],
			[
				"postcode" => "2471",
				"suburb" => "BORA RIDGE",
				"state" => "NSW",
				"lat" => "-29.045091",
				"lon" => "153.226754"
			],
			[
				"postcode" => "2471",
				"suburb" => "CODRINGTON",
				"state" => "NSW",
				"lat" => "-28.946375",
				"lon" => "153.234872"
			],
			[
				"postcode" => "2471",
				"suburb" => "CORAKI",
				"state" => "NSW",
				"lat" => "-28.98998",
				"lon" => "153.289301"
			],
			[
				"postcode" => "2471",
				"suburb" => "EAST CORAKI",
				"state" => "NSW",
				"lat" => "-28.998703",
				"lon" => "153.310661"
			],
			[
				"postcode" => "2471",
				"suburb" => "GREEN FOREST",
				"state" => "NSW",
				"lat" => "-28.970969",
				"lon" => "153.363245"
			],
			[
				"postcode" => "2471",
				"suburb" => "GREENRIDGE",
				"state" => "NSW",
				"lat" => "-28.896232",
				"lon" => "153.120103"
			],
			[
				"postcode" => "2471",
				"suburb" => "NORTH WOODBURN",
				"state" => "NSW",
				"lat" => "-29.069472",
				"lon" => "153.341512"
			],
			[
				"postcode" => "2471",
				"suburb" => "SWAN BAY",
				"state" => "NSW",
				"lat" => "-29.059865",
				"lon" => "153.313617"
			],
			[
				"postcode" => "2471",
				"suburb" => "TATHAM",
				"state" => "NSW",
				"lat" => "-28.928919",
				"lon" => "153.158653"
			],
			[
				"postcode" => "2472",
				"suburb" => "BROADWATER",
				"state" => "NSW",
				"lat" => "-29.010351",
				"lon" => "153.435446"
			],
			[
				"postcode" => "2472",
				"suburb" => "BUCKENDOON",
				"state" => "NSW",
				"lat" => "-29.037411",
				"lon" => "153.335118"
			],
			[
				"postcode" => "2472",
				"suburb" => "ESK",
				"state" => "NSW",
				"lat" => "-29.2468",
				"lon" => "153.359875"
			],
			[
				"postcode" => "2472",
				"suburb" => "KILGIN",
				"state" => "NSW",
				"lat" => "-29.029574",
				"lon" => "153.374108"
			],
			[
				"postcode" => "2472",
				"suburb" => "NEW ITALY",
				"state" => "NSW",
				"lat" => "-29.150297",
				"lon" => "153.287828"
			],
			[
				"postcode" => "2472",
				"suburb" => "RILEYS HILL",
				"state" => "NSW",
				"lat" => "-29.013855",
				"lon" => "153.406656"
			],
			[
				"postcode" => "2472",
				"suburb" => "TABBIMOBLE",
				"state" => "NSW",
				"lat" => "-29.204526",
				"lon" => "153.267562"
			],
			[
				"postcode" => "2472",
				"suburb" => "WOODBURN",
				"state" => "NSW",
				"lat" => "-29.07101",
				"lon" => "153.345695"
			],
			[
				"postcode" => "2473",
				"suburb" => "DOONBAH",
				"state" => "NSW",
				"lat" => "-29.086621",
				"lon" => "153.375933"
			],
			[
				"postcode" => "2473",
				"suburb" => "EVANS HEAD",
				"state" => "NSW",
				"lat" => "-29.11568",
				"lon" => "153.429065"
			],
			[
				"postcode" => "2473",
				"suburb" => "IRON GATES",
				"state" => "NSW",
				"lat" => "-29.112327",
				"lon" => "153.410139"
			],
			[
				"postcode" => "2473",
				"suburb" => "SOUTH EVANS HEAD",
				"state" => "NSW",
				"lat" => "-29.120479",
				"lon" => "153.436052"
			],
			[
				"postcode" => "2474",
				"suburb" => "AFTERLEE",
				"state" => "NSW",
				"lat" => "-28.593876",
				"lon" => "152.825754"
			],
			[
				"postcode" => "2474",
				"suburb" => "BARKERS VALE",
				"state" => "NSW",
				"lat" => "-28.538014",
				"lon" => "153.123465"
			],
			[
				"postcode" => "2474",
				"suburb" => "BORDER RANGES",
				"state" => "NSW",
				"lat" => "-28.386261",
				"lon" => "153.082555"
			],
			[
				"postcode" => "2474",
				"suburb" => "CAWONGLA",
				"state" => "NSW",
				"lat" => "-28.591753",
				"lon" => "153.103105"
			],
			[
				"postcode" => "2474",
				"suburb" => "CEDAR POINT",
				"state" => "NSW",
				"lat" => "-28.681713",
				"lon" => "152.992978"
			],
			[
				"postcode" => "2474",
				"suburb" => "COLLINS CREEK",
				"state" => "NSW",
				"lat" => "-28.495304",
				"lon" => "153.020382"
			],
			[
				"postcode" => "2474",
				"suburb" => "COUGAL",
				"state" => "NSW",
				"lat" => "-28.368442",
				"lon" => "152.971636"
			],
			[
				"postcode" => "2474",
				"suburb" => "DAIRY FLAT",
				"state" => "NSW",
				"lat" => "-28.353453",
				"lon" => "152.668056"
			],
			[
				"postcode" => "2474",
				"suburb" => "EDEN CREEK",
				"state" => "NSW",
				"lat" => "-28.604129",
				"lon" => "152.912545"
			],
			[
				"postcode" => "2474",
				"suburb" => "EDENVILLE",
				"state" => "NSW",
				"lat" => "-28.687353",
				"lon" => "152.967129"
			],
			[
				"postcode" => "2474",
				"suburb" => "ETTRICK",
				"state" => "NSW",
				"lat" => "-28.665037",
				"lon" => "152.921436"
			],
			[
				"postcode" => "2474",
				"suburb" => "FAWCETTS PLAIN",
				"state" => "NSW",
				"lat" => "-28.575884",
				"lon" => "153.016604"
			],
			[
				"postcode" => "2474",
				"suburb" => "FINDON CREEK",
				"state" => "NSW",
				"lat" => "-28.371921",
				"lon" => "152.882714"
			],
			[
				"postcode" => "2474",
				"suburb" => "GENEVA",
				"state" => "NSW",
				"lat" => "-28.620581",
				"lon" => "152.982293"
			],
			[
				"postcode" => "2474",
				"suburb" => "GHINNI GHI",
				"state" => "NSW",
				"lat" => "-28.620322",
				"lon" => "152.835211"
			],
			[
				"postcode" => "2474",
				"suburb" => "GRADYS CREEK",
				"state" => "NSW",
				"lat" => "-28.416476",
				"lon" => "152.97769"
			],
			[
				"postcode" => "2474",
				"suburb" => "GREEN PIGEON",
				"state" => "NSW",
				"lat" => "-28.480721",
				"lon" => "153.085726"
			],
			[
				"postcode" => "2474",
				"suburb" => "GREVILLIA",
				"state" => "NSW",
				"lat" => "-28.441732",
				"lon" => "152.830732"
			],
			[
				"postcode" => "2474",
				"suburb" => "HOMELEIGH",
				"state" => "NSW",
				"lat" => "-28.553193",
				"lon" => "153.070883"
			],
			[
				"postcode" => "2474",
				"suburb" => "HORSE STATION CREEK",
				"state" => "NSW",
				"lat" => "-28.62603",
				"lon" => "152.964842"
			],
			[
				"postcode" => "2474",
				"suburb" => "HORSESHOE CREEK",
				"state" => "NSW",
				"lat" => "-28.530415",
				"lon" => "153.028421"
			],
			[
				"postcode" => "2474",
				"suburb" => "IRON POT CREEK",
				"state" => "NSW",
				"lat" => "-28.630205",
				"lon" => "152.866327"
			],
			[
				"postcode" => "2474",
				"suburb" => "KILGRA",
				"state" => "NSW",
				"lat" => "-28.554937",
				"lon" => "152.975132"
			],
			[
				"postcode" => "2474",
				"suburb" => "KYOGLE",
				"state" => "NSW",
				"lat" => "-28.622384",
				"lon" => "153.004112"
			],
			[
				"postcode" => "2474",
				"suburb" => "LITTLE BACK CREEK",
				"state" => "NSW",
				"lat" => "-28.582892",
				"lon" => "153.062373"
			],
			[
				"postcode" => "2474",
				"suburb" => "LOADSTONE",
				"state" => "NSW",
				"lat" => "-28.403261",
				"lon" => "152.978485"
			],
			[
				"postcode" => "2474",
				"suburb" => "LYNCHS CREEK",
				"state" => "NSW",
				"lat" => "-28.450335",
				"lon" => "152.997434"
			],
			[
				"postcode" => "2474",
				"suburb" => "NEW PARK",
				"state" => "NSW",
				"lat" => "-28.607163",
				"lon" => "152.991128"
			],
			[
				"postcode" => "2474",
				"suburb" => "OLD GREVILLIA",
				"state" => "NSW",
				"lat" => "-28.444941",
				"lon" => "152.882079"
			],
			[
				"postcode" => "2474",
				"suburb" => "ROSEBERRY",
				"state" => "NSW",
				"lat" => "-28.482396",
				"lon" => "152.92364"
			],
			[
				"postcode" => "2474",
				"suburb" => "ROSEBERRY CREEK",
				"state" => "NSW",
				"lat" => "-28.472063",
				"lon" => "152.814149"
			],
			[
				"postcode" => "2474",
				"suburb" => "RUKENVALE",
				"state" => "NSW",
				"lat" => "-28.469528",
				"lon" => "152.895761"
			],
			[
				"postcode" => "2474",
				"suburb" => "SAWPIT CREEK",
				"state" => "NSW",
				"lat" => "-28.374714",
				"lon" => "152.841112"
			],
			[
				"postcode" => "2474",
				"suburb" => "SHERWOOD",
				"state" => "NSW",
				"lat" => "-28.424362",
				"lon" => "152.761824"
			],
			[
				"postcode" => "2474",
				"suburb" => "SMITHS CREEK",
				"state" => "NSW",
				"lat" => "-28.56876",
				"lon" => "152.860687"
			],
			[
				"postcode" => "2474",
				"suburb" => "TERRACE CREEK",
				"state" => "NSW",
				"lat" => "-28.417669",
				"lon" => "152.824939"
			],
			[
				"postcode" => "2474",
				"suburb" => "THE RISK",
				"state" => "NSW",
				"lat" => "-28.459766",
				"lon" => "152.945109"
			],
			[
				"postcode" => "2474",
				"suburb" => "TOONUMBAR",
				"state" => "NSW",
				"lat" => "-28.567235",
				"lon" => "152.753096"
			],
			[
				"postcode" => "2474",
				"suburb" => "UNUMGAR",
				"state" => "NSW",
				"lat" => "-28.422983",
				"lon" => "152.749819"
			],
			[
				"postcode" => "2474",
				"suburb" => "UPPER EDEN CREEK",
				"state" => "NSW",
				"lat" => "-28.544552",
				"lon" => "152.90534"
			],
			[
				"postcode" => "2474",
				"suburb" => "UPPER HORSESHOE CREEK",
				"state" => "NSW",
				"lat" => "-28.524575",
				"lon" => "153.088352"
			],
			[
				"postcode" => "2474",
				"suburb" => "WADEVILLE",
				"state" => "NSW",
				"lat" => "-28.559602",
				"lon" => "153.141396"
			],
			[
				"postcode" => "2474",
				"suburb" => "WARRAZAMBIL CREEK",
				"state" => "NSW",
				"lat" => "-28.445435",
				"lon" => "153.02578"
			],
			[
				"postcode" => "2474",
				"suburb" => "WEST WIANGAREE",
				"state" => "NSW",
				"lat" => "-28.542136",
				"lon" => "152.952066"
			],
			[
				"postcode" => "2474",
				"suburb" => "WIANGAREE",
				"state" => "NSW",
				"lat" => "-28.505758",
				"lon" => "152.967547"
			],
			[
				"postcode" => "2474",
				"suburb" => "WYNEDEN",
				"state" => "NSW",
				"lat" => "-28.545149",
				"lon" => "152.92943"
			],
			[
				"postcode" => "2475",
				"suburb" => "TOOLOOM",
				"state" => "NSW",
				"lat" => "-28.622045",
				"lon" => "152.420365"
			],
			[
				"postcode" => "2475",
				"suburb" => "UPPER TOOLOOM",
				"state" => "NSW",
				"lat" => "-28.5161",
				"lon" => "152.394979"
			],
			[
				"postcode" => "2475",
				"suburb" => "URBENVILLE",
				"state" => "NSW",
				"lat" => "-28.472759",
				"lon" => "152.548088"
			],
			[
				"postcode" => "2475",
				"suburb" => "WALLABY CREEK",
				"state" => "NSW",
				"lat" => "-28.548935",
				"lon" => "152.411623"
			],
			[
				"postcode" => "2476",
				"suburb" => "ACACIA CREEK",
				"state" => "NSW",
				"lat" => "-28.373331",
				"lon" => "152.320879"
			],
			[
				"postcode" => "2476",
				"suburb" => "ACACIA PLATEAU",
				"state" => "NSW",
				"lat" => "-28.381072",
				"lon" => "152.368571"
			],
			[
				"postcode" => "2476",
				"suburb" => "BOOMI CREEK",
				"state" => "NSW",
				"lat" => "-28.470421",
				"lon" => "152.603955"
			],
			[
				"postcode" => "2476",
				"suburb" => "BRUMBY PLAINS",
				"state" => "NSW",
				"lat" => "-28.434202",
				"lon" => "152.661236"
			],
			[
				"postcode" => "2476",
				"suburb" => "KOREELAH",
				"state" => "NSW",
				"lat" => "-28.475226",
				"lon" => "152.327891"
			],
			[
				"postcode" => "2476",
				"suburb" => "LEGUME",
				"state" => "NSW",
				"lat" => "-28.404725",
				"lon" => "152.30758"
			],
			[
				"postcode" => "2476",
				"suburb" => "LINDESAY CREEK",
				"state" => "NSW",
				"lat" => "-28.356197",
				"lon" => "152.616692"
			],
			[
				"postcode" => "2476",
				"suburb" => "LOWER ACACIA CREEK",
				"state" => "NSW",
				"lat" => "-28.467444",
				"lon" => "152.196026"
			],
			[
				"postcode" => "2476",
				"suburb" => "MULI MULI",
				"state" => "NSW",
				"lat" => "-28.418146",
				"lon" => "152.583757"
			],
			[
				"postcode" => "2476",
				"suburb" => "OLD KOREELAH",
				"state" => "NSW",
				"lat" => "-28.405385",
				"lon" => "152.423334"
			],
			[
				"postcode" => "2476",
				"suburb" => "THE GLEN",
				"state" => "NSW",
				"lat" => "-28.40257",
				"lon" => "152.655631"
			],
			[
				"postcode" => "2476",
				"suburb" => "WOODENBONG",
				"state" => "NSW",
				"lat" => "-28.391044",
				"lon" => "152.612035"
			],
			[
				"postcode" => "2477",
				"suburb" => "ALSTONVALE",
				"state" => "NSW",
				"lat" => "-28.805607",
				"lon" => "153.445477"
			],
			[
				"postcode" => "2477",
				"suburb" => "ALSTONVILLE",
				"state" => "NSW",
				"lat" => "-28.842125",
				"lon" => "153.44036"
			],
			[
				"postcode" => "2477",
				"suburb" => "BAGOTVILLE",
				"state" => "NSW",
				"lat" => "-28.974576",
				"lon" => "153.406938"
			],
			[
				"postcode" => "2477",
				"suburb" => "CABBAGE TREE ISLAND",
				"state" => "NSW",
				"lat" => "-28.983995",
				"lon" => "153.456889"
			],
			[
				"postcode" => "2477",
				"suburb" => "DALWOOD",
				"state" => "NSW",
				"lat" => "-28.888546",
				"lon" => "153.409839"
			],
			[
				"postcode" => "2477",
				"suburb" => "EAST WARDELL",
				"state" => "NSW",
				"lat" => "-28.956977",
				"lon" => "153.466641"
			],
			[
				"postcode" => "2477",
				"suburb" => "GOAT ISLAND",
				"state" => "NSW",
				"lat" => "-28.988627",
				"lon" => "153.457258"
			],
			[
				"postcode" => "2477",
				"suburb" => "LYNWOOD",
				"state" => "NSW",
				"lat" => "-28.865041",
				"lon" => "153.433616"
			],
			[
				"postcode" => "2477",
				"suburb" => "MEERSCHAUM VALE",
				"state" => "NSW",
				"lat" => "-28.914194",
				"lon" => "153.436069"
			],
			[
				"postcode" => "2477",
				"suburb" => "PEARCES CREEK",
				"state" => "NSW",
				"lat" => "-28.776059",
				"lon" => "153.443868"
			],
			[
				"postcode" => "2477",
				"suburb" => "ROUS",
				"state" => "NSW",
				"lat" => "-28.871123",
				"lon" => "153.405709"
			],
			[
				"postcode" => "2477",
				"suburb" => "ROUS MILL",
				"state" => "NSW",
				"lat" => "-28.876258",
				"lon" => "153.389634"
			],
			[
				"postcode" => "2477",
				"suburb" => "TUCKOMBIL",
				"state" => "NSW",
				"lat" => "-28.820674",
				"lon" => "153.463089"
			],
			[
				"postcode" => "2477",
				"suburb" => "URALBA",
				"state" => "NSW",
				"lat" => "-28.873618",
				"lon" => "153.47132"
			],
			[
				"postcode" => "2477",
				"suburb" => "WARDELL",
				"state" => "NSW",
				"lat" => "-28.952703",
				"lon" => "153.464326"
			],
			[
				"postcode" => "2477",
				"suburb" => "WOLLONGBAR",
				"state" => "NSW",
				"lat" => "-28.827962",
				"lon" => "153.421078"
			],
			[
				"postcode" => "2478",
				"suburb" => "BALLINA",
				"state" => "NSW",
				"lat" => "-28.869984",
				"lon" => "153.559167"
			],
			[
				"postcode" => "2478",
				"suburb" => "COOLGARDIE",
				"state" => "NSW",
				"lat" => "-28.91858",
				"lon" => "153.456093"
			],
			[
				"postcode" => "2478",
				"suburb" => "CUMBALUM",
				"state" => "NSW",
				"lat" => "-28.825835",
				"lon" => "153.525966"
			],
			[
				"postcode" => "2478",
				"suburb" => "EAST BALLINA",
				"state" => "NSW",
				"lat" => "-28.864324",
				"lon" => "153.582396"
			],
			[
				"postcode" => "2478",
				"suburb" => "EMPIRE VALE",
				"state" => "NSW",
				"lat" => "-28.915582",
				"lon" => "153.503369"
			],
			[
				"postcode" => "2478",
				"suburb" => "KEITH HALL",
				"state" => "NSW",
				"lat" => "-28.889839",
				"lon" => "153.531951"
			],
			[
				"postcode" => "2478",
				"suburb" => "LENNOX HEAD",
				"state" => "NSW",
				"lat" => "-28.795715",
				"lon" => "153.593901"
			],
			[
				"postcode" => "2478",
				"suburb" => "PATCHS BEACH",
				"state" => "NSW",
				"lat" => "-28.949048",
				"lon" => "153.514072"
			],
			[
				"postcode" => "2478",
				"suburb" => "PIMLICO",
				"state" => "NSW",
				"lat" => "-28.889412",
				"lon" => "153.494219"
			],
			[
				"postcode" => "2478",
				"suburb" => "PIMLICO ISLAND",
				"state" => "NSW",
				"lat" => "-28.917919",
				"lon" => "153.494677"
			],
			[
				"postcode" => "2478",
				"suburb" => "SKENNARS HEAD",
				"state" => "NSW",
				"lat" => "-28.826941",
				"lon" => "153.606411"
			],
			[
				"postcode" => "2478",
				"suburb" => "SOUTH BALLINA",
				"state" => "NSW",
				"lat" => "-28.882913",
				"lon" => "153.563052"
			],
			[
				"postcode" => "2478",
				"suburb" => "TEVEN",
				"state" => "NSW",
				"lat" => "-28.810482",
				"lon" => "153.488943"
			],
			[
				"postcode" => "2478",
				"suburb" => "TINTENBAR",
				"state" => "NSW",
				"lat" => "-28.79659",
				"lon" => "153.513163"
			],
			[
				"postcode" => "2478",
				"suburb" => "WEST BALLINA",
				"state" => "NSW",
				"lat" => "-28.86333",
				"lon" => "153.54417"
			],
			[
				"postcode" => "2479",
				"suburb" => "BANGALOW",
				"state" => "NSW",
				"lat" => "-28.686356",
				"lon" => "153.524792"
			],
			[
				"postcode" => "2479",
				"suburb" => "BINNA BURRA",
				"state" => "NSW",
				"lat" => "-28.709653",
				"lon" => "153.490299"
			],
			[
				"postcode" => "2479",
				"suburb" => "BROOKLET",
				"state" => "NSW",
				"lat" => "-28.730711",
				"lon" => "153.51553"
			],
			[
				"postcode" => "2479",
				"suburb" => "COOPERS SHOOT",
				"state" => "NSW",
				"lat" => "-28.701278",
				"lon" => "153.565131"
			],
			[
				"postcode" => "2479",
				"suburb" => "COORABELL",
				"state" => "NSW",
				"lat" => "-28.634356",
				"lon" => "153.481025"
			],
			[
				"postcode" => "2479",
				"suburb" => "FERNLEIGH",
				"state" => "NSW",
				"lat" => "-28.760333",
				"lon" => "153.497652"
			],
			[
				"postcode" => "2479",
				"suburb" => "KNOCKROW",
				"state" => "NSW",
				"lat" => "-28.768821",
				"lon" => "153.534972"
			],
			[
				"postcode" => "2479",
				"suburb" => "MCLEODS SHOOT",
				"state" => "NSW",
				"lat" => "-28.652876",
				"lon" => "153.544454"
			],
			[
				"postcode" => "2479",
				"suburb" => "NASHUA",
				"state" => "NSW",
				"lat" => "-28.729875",
				"lon" => "153.467865"
			],
			[
				"postcode" => "2479",
				"suburb" => "NEWRYBAR",
				"state" => "NSW",
				"lat" => "-28.720595",
				"lon" => "153.528799"
			],
			[
				"postcode" => "2479",
				"suburb" => "OPOSSUM CREEK",
				"state" => "NSW",
				"lat" => "-28.66044",
				"lon" => "153.506729"
			],
			[
				"postcode" => "2479",
				"suburb" => "POSSUM CREEK",
				"state" => "NSW",
				"lat" => "-28.668944",
				"lon" => "153.491771"
			],
			[
				"postcode" => "2480",
				"suburb" => "BACK CREEK",
				"state" => "NSW",
				"lat" => "-28.61462",
				"lon" => "153.037662"
			],
			[
				"postcode" => "2480",
				"suburb" => "BENTLEY",
				"state" => "NSW",
				"lat" => "-28.756611",
				"lon" => "153.090423"
			],
			[
				"postcode" => "2480",
				"suburb" => "BEXHILL",
				"state" => "NSW",
				"lat" => "-28.762689",
				"lon" => "153.346496"
			],
			[
				"postcode" => "2480",
				"suburb" => "BLAKEBROOK",
				"state" => "NSW",
				"lat" => "-28.765492",
				"lon" => "153.243037"
			],
			[
				"postcode" => "2480",
				"suburb" => "BLUE KNOB",
				"state" => "NSW",
				"lat" => "-28.560977",
				"lon" => "153.198679"
			],
			[
				"postcode" => "2480",
				"suburb" => "BOAT HARBOUR",
				"state" => "NSW",
				"lat" => "-28.780311",
				"lon" => "153.364249"
			],
			[
				"postcode" => "2480",
				"suburb" => "BOOERIE CREEK",
				"state" => "NSW",
				"lat" => "-28.776035",
				"lon" => "153.259952"
			],
			[
				"postcode" => "2480",
				"suburb" => "BOORABEE PARK",
				"state" => "NSW",
				"lat" => "-28.708355",
				"lon" => "153.061375"
			],
			[
				"postcode" => "2480",
				"suburb" => "BOOYONG",
				"state" => "NSW",
				"lat" => "-28.747106",
				"lon" => "153.45142"
			],
			[
				"postcode" => "2480",
				"suburb" => "BUNGABBEE",
				"state" => "NSW",
				"lat" => "-28.766049",
				"lon" => "153.135533"
			],
			[
				"postcode" => "2480",
				"suburb" => "CANIABA",
				"state" => "NSW",
				"lat" => "-28.835685",
				"lon" => "153.206732"
			],
			[
				"postcode" => "2480",
				"suburb" => "CHILCOTTS GRASS",
				"state" => "NSW",
				"lat" => "-28.836153",
				"lon" => "153.335738"
			],
			[
				"postcode" => "2480",
				"suburb" => "CLOVASS",
				"state" => "NSW",
				"lat" => "-28.875619",
				"lon" => "153.136492"
			],
			[
				"postcode" => "2480",
				"suburb" => "CLUNES",
				"state" => "NSW",
				"lat" => "-28.729988",
				"lon" => "153.405593"
			],
			[
				"postcode" => "2480",
				"suburb" => "COFFEE CAMP",
				"state" => "NSW",
				"lat" => "-28.659389",
				"lon" => "153.22894"
			],
			[
				"postcode" => "2480",
				"suburb" => "CORNDALE",
				"state" => "NSW",
				"lat" => "-28.698711",
				"lon" => "153.37782"
			],
			[
				"postcode" => "2480",
				"suburb" => "DORROUGHBY",
				"state" => "NSW",
				"lat" => "-28.661713",
				"lon" => "153.354936"
			],
			[
				"postcode" => "2480",
				"suburb" => "DUNGARUBBA",
				"state" => "NSW",
				"lat" => "-28.989823",
				"lon" => "153.376015"
			],
			[
				"postcode" => "2480",
				"suburb" => "DUNOON",
				"state" => "NSW",
				"lat" => "-28.681929",
				"lon" => "153.318543"
			],
			[
				"postcode" => "2480",
				"suburb" => "EAST LISMORE",
				"state" => "NSW",
				"lat" => "-28.820433",
				"lon" => "153.285411"
			],
			[
				"postcode" => "2480",
				"suburb" => "ELTHAM",
				"state" => "NSW",
				"lat" => "-28.754287",
				"lon" => "153.409529"
			],
			[
				"postcode" => "2480",
				"suburb" => "EUREKA",
				"state" => "NSW",
				"lat" => "-28.683763",
				"lon" => "153.438375"
			],
			[
				"postcode" => "2480",
				"suburb" => "FERNSIDE",
				"state" => "NSW",
				"lat" => "-28.796267",
				"lon" => "153.166868"
			],
			[
				"postcode" => "2480",
				"suburb" => "GEORGICA",
				"state" => "NSW",
				"lat" => "-28.621858",
				"lon" => "153.168113"
			],
			[
				"postcode" => "2480",
				"suburb" => "GIRARDS HILL",
				"state" => "NSW",
				"lat" => "-28.813942",
				"lon" => "153.275124"
			],
			[
				"postcode" => "2480",
				"suburb" => "GOOLMANGAR",
				"state" => "NSW",
				"lat" => "-28.747167",
				"lon" => "153.225916"
			],
			[
				"postcode" => "2480",
				"suburb" => "GOONELLABAH",
				"state" => "NSW",
				"lat" => "-28.819841",
				"lon" => "153.317704"
			],
			[
				"postcode" => "2480",
				"suburb" => "HOWARDS GRASS",
				"state" => "NSW",
				"lat" => "-28.791492",
				"lon" => "153.303018"
			],
			[
				"postcode" => "2480",
				"suburb" => "JIGGI",
				"state" => "NSW",
				"lat" => "-28.680571",
				"lon" => "153.182012"
			],
			[
				"postcode" => "2480",
				"suburb" => "KEERRONG",
				"state" => "NSW",
				"lat" => "-28.712268",
				"lon" => "153.26514"
			],
			[
				"postcode" => "2480",
				"suburb" => "KOONORIGAN",
				"state" => "NSW",
				"lat" => "-28.67516",
				"lon" => "153.237965"
			],
			[
				"postcode" => "2480",
				"suburb" => "LAGOON GRASS",
				"state" => "NSW",
				"lat" => "-28.795759",
				"lon" => "153.323453"
			],
			[
				"postcode" => "2480",
				"suburb" => "LARNOOK",
				"state" => "NSW",
				"lat" => "-28.645794",
				"lon" => "153.11767"
			],
			[
				"postcode" => "2480",
				"suburb" => "LEYCESTER",
				"state" => "NSW",
				"lat" => "-28.782333",
				"lon" => "153.19986"
			],
			[
				"postcode" => "2480",
				"suburb" => "LILLIAN ROCK",
				"state" => "NSW",
				"lat" => "-28.536399",
				"lon" => "153.165382"
			],
			[
				"postcode" => "2480",
				"suburb" => "LINDENDALE",
				"state" => "NSW",
				"lat" => "-28.83593",
				"lon" => "153.388534"
			],
			[
				"postcode" => "2480",
				"suburb" => "LISMORE",
				"state" => "NSW",
				"lat" => "-28.812725",
				"lon" => "153.278721"
			],
			[
				"postcode" => "2480",
				"suburb" => "LISMORE HEIGHTS",
				"state" => "NSW",
				"lat" => "-28.80624",
				"lon" => "153.301267"
			],
			[
				"postcode" => "2480",
				"suburb" => "LOFTVILLE",
				"state" => "NSW",
				"lat" => "-28.839721",
				"lon" => "153.26343"
			],
			[
				"postcode" => "2480",
				"suburb" => "MAROM CREEK",
				"state" => "NSW",
				"lat" => "-28.902898",
				"lon" => "153.372558"
			],
			[
				"postcode" => "2480",
				"suburb" => "MCKEES HILL",
				"state" => "NSW",
				"lat" => "-28.880798",
				"lon" => "153.19628"
			],
			[
				"postcode" => "2480",
				"suburb" => "MCLEANS RIDGES",
				"state" => "NSW",
				"lat" => "-28.79311",
				"lon" => "153.407172"
			],
			[
				"postcode" => "2480",
				"suburb" => "MODANVILLE",
				"state" => "NSW",
				"lat" => "-28.720422",
				"lon" => "153.294687"
			],
			[
				"postcode" => "2480",
				"suburb" => "MONALTRIE",
				"state" => "NSW",
				"lat" => "-28.851075",
				"lon" => "153.278455"
			],
			[
				"postcode" => "2480",
				"suburb" => "MOUNTAIN TOP",
				"state" => "NSW",
				"lat" => "-28.607446",
				"lon" => "153.165656"
			],
			[
				"postcode" => "2480",
				"suburb" => "NIGHTCAP",
				"state" => "NSW",
				"lat" => "-28.582737",
				"lon" => "153.326652"
			],
			[
				"postcode" => "2480",
				"suburb" => "NIMBIN",
				"state" => "NSW",
				"lat" => "-28.59677",
				"lon" => "153.222904"
			],
			[
				"postcode" => "2480",
				"suburb" => "NORTH LISMORE",
				"state" => "NSW",
				"lat" => "-28.78814",
				"lon" => "153.277442"
			],
			[
				"postcode" => "2480",
				"suburb" => "NUMULGI",
				"state" => "NSW",
				"lat" => "-28.744012",
				"lon" => "153.324937"
			],
			[
				"postcode" => "2480",
				"suburb" => "REPENTANCE CREEK",
				"state" => "NSW",
				"lat" => "-28.626886",
				"lon" => "153.406569"
			],
			[
				"postcode" => "2480",
				"suburb" => "RICHMOND HILL",
				"state" => "NSW",
				"lat" => "-28.789045",
				"lon" => "153.350827"
			],
			[
				"postcode" => "2480",
				"suburb" => "ROCK VALLEY",
				"state" => "NSW",
				"lat" => "-28.747359",
				"lon" => "153.174403"
			],
			[
				"postcode" => "2480",
				"suburb" => "ROSEBANK",
				"state" => "NSW",
				"lat" => "-28.663494",
				"lon" => "153.392176"
			],
			[
				"postcode" => "2480",
				"suburb" => "RUTHVEN",
				"state" => "NSW",
				"lat" => "-28.932388",
				"lon" => "153.278838"
			],
			[
				"postcode" => "2480",
				"suburb" => "SOUTH GUNDURIMBA",
				"state" => "NSW",
				"lat" => "-28.887662",
				"lon" => "153.258782"
			],
			[
				"postcode" => "2480",
				"suburb" => "SOUTH LISMORE",
				"state" => "NSW",
				"lat" => "-28.809302",
				"lon" => "153.269477"
			],
			[
				"postcode" => "2480",
				"suburb" => "STONY CHUTE",
				"state" => "NSW",
				"lat" => "-28.576926",
				"lon" => "153.155256"
			],
			[
				"postcode" => "2480",
				"suburb" => "TERANIA CREEK",
				"state" => "NSW",
				"lat" => "-28.609209",
				"lon" => "153.29947"
			],
			[
				"postcode" => "2480",
				"suburb" => "THE CHANNON",
				"state" => "NSW",
				"lat" => "-28.673238",
				"lon" => "153.278894"
			],
			[
				"postcode" => "2480",
				"suburb" => "TREGEAGLE",
				"state" => "NSW",
				"lat" => "-28.846985",
				"lon" => "153.353062"
			],
			[
				"postcode" => "2480",
				"suburb" => "TUCKI TUCKI",
				"state" => "NSW",
				"lat" => "-28.908813",
				"lon" => "153.327739"
			],
			[
				"postcode" => "2480",
				"suburb" => "TUCKURIMBA",
				"state" => "NSW",
				"lat" => "-28.956712",
				"lon" => "153.314014"
			],
			[
				"postcode" => "2480",
				"suburb" => "TULLERA",
				"state" => "NSW",
				"lat" => "-28.744755",
				"lon" => "153.301109"
			],
			[
				"postcode" => "2480",
				"suburb" => "TUNCESTER",
				"state" => "NSW",
				"lat" => "-28.798013",
				"lon" => "153.225379"
			],
			[
				"postcode" => "2480",
				"suburb" => "TUNTABLE CREEK",
				"state" => "NSW",
				"lat" => "-28.629651",
				"lon" => "153.266854"
			],
			[
				"postcode" => "2480",
				"suburb" => "WHIAN WHIAN",
				"state" => "NSW",
				"lat" => "-28.635197",
				"lon" => "153.316231"
			],
			[
				"postcode" => "2480",
				"suburb" => "WOODLAWN",
				"state" => "NSW",
				"lat" => "-28.76431",
				"lon" => "153.317962"
			],
			[
				"postcode" => "2480",
				"suburb" => "WYRALLAH",
				"state" => "NSW",
				"lat" => "-28.888172",
				"lon" => "153.299755"
			],
			[
				"postcode" => "2481",
				"suburb" => "BROKEN HEAD",
				"state" => "NSW",
				"lat" => "-28.717235",
				"lon" => "153.592296"
			],
			[
				"postcode" => "2481",
				"suburb" => "BYRON BAY",
				"state" => "NSW",
				"lat" => "-28.643387",
				"lon" => "153.612224"
			],
			[
				"postcode" => "2481",
				"suburb" => "EWINGSDALE",
				"state" => "NSW",
				"lat" => "-28.637032",
				"lon" => "153.557753"
			],
			[
				"postcode" => "2481",
				"suburb" => "MYOCUM",
				"state" => "NSW",
				"lat" => "-28.576877",
				"lon" => "153.503992"
			],
			[
				"postcode" => "2481",
				"suburb" => "SKINNERS SHOOT",
				"state" => "NSW",
				"lat" => "-28.669029",
				"lon" => "153.581417"
			],
			[
				"postcode" => "2481",
				"suburb" => "SUFFOLK PARK",
				"state" => "NSW",
				"lat" => "-28.689842",
				"lon" => "153.610159"
			],
			[
				"postcode" => "2481",
				"suburb" => "TALOFA",
				"state" => "NSW",
				"lat" => "-28.674223",
				"lon" => "153.55987"
			],
			[
				"postcode" => "2481",
				"suburb" => "TYAGARAH",
				"state" => "NSW",
				"lat" => "-28.604443",
				"lon" => "153.556171"
			],
			[
				"postcode" => "2482",
				"suburb" => "GOONENGERRY",
				"state" => "NSW",
				"lat" => "-28.61079",
				"lon" => "153.439674"
			],
			[
				"postcode" => "2482",
				"suburb" => "HUONBROOK",
				"state" => "NSW",
				"lat" => "-28.550966",
				"lon" => "153.371552"
			],
			[
				"postcode" => "2482",
				"suburb" => "KOONYUM RANGE",
				"state" => "NSW",
				"lat" => "-28.545706",
				"lon" => "153.412086"
			],
			[
				"postcode" => "2482",
				"suburb" => "MAIN ARM",
				"state" => "NSW",
				"lat" => "-28.504921",
				"lon" => "153.433711"
			],
			[
				"postcode" => "2482",
				"suburb" => "MONTECOLLUM",
				"state" => "NSW",
				"lat" => "-28.589092",
				"lon" => "153.464352"
			],
			[
				"postcode" => "2482",
				"suburb" => "MULLUMBIMBY",
				"state" => "NSW",
				"lat" => "-28.553161",
				"lon" => "153.499637"
			],
			[
				"postcode" => "2482",
				"suburb" => "MULLUMBIMBY CREEK",
				"state" => "NSW",
				"lat" => "-28.558202",
				"lon" => "153.46472"
			],
			[
				"postcode" => "2482",
				"suburb" => "PALMWOODS",
				"state" => "NSW",
				"lat" => "-28.503448",
				"lon" => "153.419964"
			],
			[
				"postcode" => "2482",
				"suburb" => "UPPER COOPERS CREEK",
				"state" => "NSW",
				"lat" => "-28.604272",
				"lon" => "153.400529"
			],
			[
				"postcode" => "2482",
				"suburb" => "UPPER MAIN ARM",
				"state" => "NSW",
				"lat" => "-28.493455",
				"lon" => "153.398364"
			],
			[
				"postcode" => "2482",
				"suburb" => "UPPER WILSONS CREEK",
				"state" => "NSW",
				"lat" => "-28.548018",
				"lon" => "153.389519"
			],
			[
				"postcode" => "2482",
				"suburb" => "WANGANUI",
				"state" => "NSW",
				"lat" => "-28.558773",
				"lon" => "153.379494"
			],
			[
				"postcode" => "2482",
				"suburb" => "WILSONS CREEK",
				"state" => "NSW",
				"lat" => "-28.571576",
				"lon" => "153.426779"
			],
			[
				"postcode" => "2483",
				"suburb" => "BILLINUDGEL",
				"state" => "NSW",
				"lat" => "-28.504114",
				"lon" => "153.528274"
			],
			[
				"postcode" => "2483",
				"suburb" => "BRUNSWICK HEADS",
				"state" => "NSW",
				"lat" => "-28.53899",
				"lon" => "153.548253"
			],
			[
				"postcode" => "2483",
				"suburb" => "BURRINGBAR",
				"state" => "NSW",
				"lat" => "-28.434333",
				"lon" => "153.471284"
			],
			[
				"postcode" => "2483",
				"suburb" => "CRABBES CREEK",
				"state" => "NSW",
				"lat" => "-28.45672",
				"lon" => "153.496802"
			],
			[
				"postcode" => "2483",
				"suburb" => "MIDDLE POCKET",
				"state" => "NSW",
				"lat" => "-28.493352",
				"lon" => "153.48262"
			],
			[
				"postcode" => "2483",
				"suburb" => "MOOBALL",
				"state" => "NSW",
				"lat" => "-28.441829",
				"lon" => "153.484436"
			],
			[
				"postcode" => "2483",
				"suburb" => "NEW BRIGHTON",
				"state" => "NSW",
				"lat" => "-28.509358",
				"lon" => "153.549644"
			],
			[
				"postcode" => "2483",
				"suburb" => "OCEAN SHORES",
				"state" => "NSW",
				"lat" => "-28.527523",
				"lon" => "153.543921"
			],
			[
				"postcode" => "2483",
				"suburb" => "SLEEPY HOLLOW",
				"state" => "NSW",
				"lat" => "-28.418023",
				"lon" => "153.52039"
			],
			[
				"postcode" => "2483",
				"suburb" => "SOUTH GOLDEN BEACH",
				"state" => "NSW",
				"lat" => "-28.501252",
				"lon" => "153.543567"
			],
			[
				"postcode" => "2483",
				"suburb" => "THE POCKET",
				"state" => "NSW",
				"lat" => "-28.505569",
				"lon" => "153.486046"
			],
			[
				"postcode" => "2483",
				"suburb" => "UPPER BURRINGBAR",
				"state" => "NSW",
				"lat" => "-28.44671",
				"lon" => "153.432836"
			],
			[
				"postcode" => "2483",
				"suburb" => "WOOYUNG",
				"state" => "NSW",
				"lat" => "-28.455809",
				"lon" => "153.542861"
			],
			[
				"postcode" => "2483",
				"suburb" => "YELGUN",
				"state" => "NSW",
				"lat" => "-28.476032",
				"lon" => "153.512834"
			],
			[
				"postcode" => "2484",
				"suburb" => "BACK CREEK",
				"state" => "NSW",
				"lat" => "-28.40351",
				"lon" => "153.171821"
			],
			[
				"postcode" => "2484",
				"suburb" => "BRAY PARK",
				"state" => "NSW",
				"lat" => "-28.343531",
				"lon" => "153.375835"
			],
			[
				"postcode" => "2484",
				"suburb" => "BRAYS CREEK",
				"state" => "NSW",
				"lat" => "-28.397509",
				"lon" => "153.195487"
			],
			[
				"postcode" => "2484",
				"suburb" => "BYANGUM",
				"state" => "NSW",
				"lat" => "-28.361173",
				"lon" => "153.38515"
			],
			[
				"postcode" => "2484",
				"suburb" => "BYRRILL CREEK",
				"state" => "NSW",
				"lat" => "-28.442628",
				"lon" => "153.226866"
			],
			[
				"postcode" => "2484",
				"suburb" => "CEDAR CREEK",
				"state" => "NSW",
				"lat" => "-28.421186",
				"lon" => "153.260434"
			],
			[
				"postcode" => "2484",
				"suburb" => "CHILLINGHAM",
				"state" => "NSW",
				"lat" => "-28.31412",
				"lon" => "153.277703"
			],
			[
				"postcode" => "2484",
				"suburb" => "CHOWAN CREEK",
				"state" => "NSW",
				"lat" => "-28.445067",
				"lon" => "153.361312"
			],
			[
				"postcode" => "2484",
				"suburb" => "CLOTHIERS CREEK",
				"state" => "NSW",
				"lat" => "-28.331143",
				"lon" => "153.491516"
			],
			[
				"postcode" => "2484",
				"suburb" => "COMMISSIONERS CREEK",
				"state" => "NSW",
				"lat" => "-28.488987",
				"lon" => "153.319128"
			],
			[
				"postcode" => "2484",
				"suburb" => "CONDONG",
				"state" => "NSW",
				"lat" => "-28.316754",
				"lon" => "153.433785"
			],
			[
				"postcode" => "2484",
				"suburb" => "CRYSTAL CREEK",
				"state" => "NSW",
				"lat" => "-28.317936",
				"lon" => "153.331296"
			],
			[
				"postcode" => "2484",
				"suburb" => "CUDGERA CREEK",
				"state" => "NSW",
				"lat" => "-28.389956",
				"lon" => "153.519525"
			],
			[
				"postcode" => "2484",
				"suburb" => "DOON DOON",
				"state" => "NSW",
				"lat" => "-28.503913",
				"lon" => "153.305693"
			],
			[
				"postcode" => "2484",
				"suburb" => "DULGUIGAN",
				"state" => "NSW",
				"lat" => "-28.27924",
				"lon" => "153.432854"
			],
			[
				"postcode" => "2484",
				"suburb" => "DUM DUM",
				"state" => "NSW",
				"lat" => "-28.387826",
				"lon" => "153.334075"
			],
			[
				"postcode" => "2484",
				"suburb" => "DUNBIBLE",
				"state" => "NSW",
				"lat" => "-28.382536",
				"lon" => "153.401834"
			],
			[
				"postcode" => "2484",
				"suburb" => "DUNGAY",
				"state" => "NSW",
				"lat" => "-28.276213",
				"lon" => "153.369429"
			],
			[
				"postcode" => "2484",
				"suburb" => "EUNGELLA",
				"state" => "NSW",
				"lat" => "-28.353761",
				"lon" => "153.311519"
			],
			[
				"postcode" => "2484",
				"suburb" => "EVIRON",
				"state" => "NSW",
				"lat" => "-28.31156",
				"lon" => "153.495268"
			],
			[
				"postcode" => "2484",
				"suburb" => "FARRANTS HILL",
				"state" => "NSW",
				"lat" => "-28.316723",
				"lon" => "153.485658"
			],
			[
				"postcode" => "2484",
				"suburb" => "FERNVALE",
				"state" => "NSW",
				"lat" => "-28.370325",
				"lon" => "153.436264"
			],
			[
				"postcode" => "2484",
				"suburb" => "HOPKINS CREEK",
				"state" => "NSW",
				"lat" => "-28.292754",
				"lon" => "153.248931"
			],
			[
				"postcode" => "2484",
				"suburb" => "KIELVALE",
				"state" => "NSW",
				"lat" => "-28.338259",
				"lon" => "153.449252"
			],
			[
				"postcode" => "2484",
				"suburb" => "KUNGHUR",
				"state" => "NSW",
				"lat" => "-28.470233",
				"lon" => "153.253382"
			],
			[
				"postcode" => "2484",
				"suburb" => "KUNGHUR CREEK",
				"state" => "NSW",
				"lat" => "-28.497765",
				"lon" => "153.23992"
			],
			[
				"postcode" => "2484",
				"suburb" => "KYNNUMBOON",
				"state" => "NSW",
				"lat" => "-28.308141",
				"lon" => "153.379519"
			],
			[
				"postcode" => "2484",
				"suburb" => "LIMPINWOOD",
				"state" => "NSW",
				"lat" => "-28.311619",
				"lon" => "153.222706"
			],
			[
				"postcode" => "2484",
				"suburb" => "MEBBIN",
				"state" => "NSW",
				"lat" => "-28.445977",
				"lon" => "153.184545"
			],
			[
				"postcode" => "2484",
				"suburb" => "MIDGINBIL",
				"state" => "NSW",
				"lat" => "-28.481272",
				"lon" => "153.271526"
			],
			[
				"postcode" => "2484",
				"suburb" => "MOUNT BURRELL",
				"state" => "NSW",
				"lat" => "-28.498824",
				"lon" => "153.192669"
			],
			[
				"postcode" => "2484",
				"suburb" => "MOUNT WARNING",
				"state" => "NSW",
				"lat" => "-28.393503",
				"lon" => "153.282608"
			],
			[
				"postcode" => "2484",
				"suburb" => "MURWILLUMBAH",
				"state" => "NSW",
				"lat" => "-28.32641",
				"lon" => "153.395975"
			],
			[
				"postcode" => "2484",
				"suburb" => "MURWILLUMBAH SOUTH",
				"state" => "NSW",
				"lat" => "-28.32897",
				"lon" => "153.400759"
			],
			[
				"postcode" => "2484",
				"suburb" => "NOBBYS CREEK",
				"state" => "NSW",
				"lat" => "-28.312013",
				"lon" => "153.34435"
			],
			[
				"postcode" => "2484",
				"suburb" => "NORTH ARM",
				"state" => "NSW",
				"lat" => "-28.332985",
				"lon" => "153.35095"
			],
			[
				"postcode" => "2484",
				"suburb" => "NUMINBAH",
				"state" => "NSW",
				"lat" => "-28.276838",
				"lon" => "153.253377"
			],
			[
				"postcode" => "2484",
				"suburb" => "NUNDERI",
				"state" => "NSW",
				"lat" => "-28.322491",
				"lon" => "153.455223"
			],
			[
				"postcode" => "2484",
				"suburb" => "PALMVALE",
				"state" => "NSW",
				"lat" => "-28.375057",
				"lon" => "153.481007"
			],
			[
				"postcode" => "2484",
				"suburb" => "PUMPENBIL",
				"state" => "NSW",
				"lat" => "-28.366548",
				"lon" => "153.173219"
			],
			[
				"postcode" => "2484",
				"suburb" => "RESERVE CREEK",
				"state" => "NSW",
				"lat" => "-28.354608",
				"lon" => "153.484093"
			],
			[
				"postcode" => "2484",
				"suburb" => "ROUND MOUNTAIN",
				"state" => "NSW",
				"lat" => "-28.36206",
				"lon" => "153.549795"
			],
			[
				"postcode" => "2484",
				"suburb" => "ROWLANDS CREEK",
				"state" => "NSW",
				"lat" => "-28.435493",
				"lon" => "153.342145"
			],
			[
				"postcode" => "2484",
				"suburb" => "SMITHS CREEK",
				"state" => "NSW",
				"lat" => "-28.421193",
				"lon" => "153.376275"
			],
			[
				"postcode" => "2484",
				"suburb" => "SOUTH MURWILLUMBAH",
				"state" => "NSW",
				"lat" => "-28.32897",
				"lon" => "153.400759"
			],
			[
				"postcode" => "2484",
				"suburb" => "STOKERS SIDING",
				"state" => "NSW",
				"lat" => "-28.393503",
				"lon" => "153.403631"
			],
			[
				"postcode" => "2484",
				"suburb" => "TERRAGON",
				"state" => "NSW",
				"lat" => "-28.433879",
				"lon" => "153.292969"
			],
			[
				"postcode" => "2484",
				"suburb" => "TOMEWIN",
				"state" => "NSW",
				"lat" => "-28.243793",
				"lon" => "153.376209"
			],
			[
				"postcode" => "2484",
				"suburb" => "TYALGUM",
				"state" => "NSW",
				"lat" => "-28.356753",
				"lon" => "153.207283"
			],
			[
				"postcode" => "2484",
				"suburb" => "TYALGUM CREEK",
				"state" => "NSW",
				"lat" => "-28.346657",
				"lon" => "153.160681"
			],
			[
				"postcode" => "2484",
				"suburb" => "TYGALGAH",
				"state" => "NSW",
				"lat" => "-28.311571",
				"lon" => "153.410299"
			],
			[
				"postcode" => "2484",
				"suburb" => "UKI",
				"state" => "NSW",
				"lat" => "-28.413908",
				"lon" => "153.336649"
			],
			[
				"postcode" => "2484",
				"suburb" => "UPPER CRYSTAL CREEK",
				"state" => "NSW",
				"lat" => "-28.282291",
				"lon" => "153.303819"
			],
			[
				"postcode" => "2484",
				"suburb" => "URLIUP",
				"state" => "NSW",
				"lat" => "-28.257434",
				"lon" => "153.398923"
			],
			[
				"postcode" => "2484",
				"suburb" => "WARDROP VALLEY",
				"state" => "NSW",
				"lat" => "-28.359815",
				"lon" => "153.443679"
			],
			[
				"postcode" => "2485",
				"suburb" => "TWEED HEADS",
				"state" => "NSW",
				"lat" => "-28.177537",
				"lon" => "153.538538"
			],
			[
				"postcode" => "2485",
				"suburb" => "TWEED HEADS WEST",
				"state" => "NSW",
				"lat" => "-28.195403",
				"lon" => "153.505049"
			],
			[
				"postcode" => "2486",
				"suburb" => "BANORA POINT",
				"state" => "NSW",
				"lat" => "-28.213363",
				"lon" => "153.535999"
			],
			[
				"postcode" => "2486",
				"suburb" => "BILAMBIL",
				"state" => "NSW",
				"lat" => "-28.227162",
				"lon" => "153.467794"
			],
			[
				"postcode" => "2486",
				"suburb" => "BILAMBIL HEIGHTS",
				"state" => "NSW",
				"lat" => "-28.212553",
				"lon" => "153.490119"
			],
			[
				"postcode" => "2486",
				"suburb" => "BUNGALORA",
				"state" => "NSW",
				"lat" => "-28.249472",
				"lon" => "153.479427"
			],
			[
				"postcode" => "2486",
				"suburb" => "CAROOL",
				"state" => "NSW",
				"lat" => "-28.230291",
				"lon" => "153.419146"
			],
			[
				"postcode" => "2486",
				"suburb" => "COBAKI",
				"state" => "NSW",
				"lat" => "-28.200389",
				"lon" => "153.459785"
			],
			[
				"postcode" => "2486",
				"suburb" => "COBAKI LAKES",
				"state" => "NSW",
				"lat" => "-28.175328",
				"lon" => "153.471389"
			],
			[
				"postcode" => "2486",
				"suburb" => "DUROBY",
				"state" => "NSW",
				"lat" => "-28.240207",
				"lon" => "153.474038"
			],
			[
				"postcode" => "2486",
				"suburb" => "GLENGARRIE",
				"state" => "NSW",
				"lat" => "-28.229223",
				"lon" => "153.402315"
			],
			[
				"postcode" => "2486",
				"suburb" => "PIGGABEEN",
				"state" => "NSW",
				"lat" => "-28.192191",
				"lon" => "153.465229"
			],
			[
				"postcode" => "2486",
				"suburb" => "TERRANORA",
				"state" => "NSW",
				"lat" => "-28.240724",
				"lon" => "153.502795"
			],
			[
				"postcode" => "2486",
				"suburb" => "TWEED HEADS SOUTH",
				"state" => "NSW",
				"lat" => "-28.198486",
				"lon" => "153.543747"
			],
			[
				"postcode" => "2486",
				"suburb" => "UPPER DUROBY",
				"state" => "NSW",
				"lat" => "-28.244816",
				"lon" => "153.44385"
			],
			[
				"postcode" => "2487",
				"suburb" => "CASUARINA",
				"state" => "NSW",
				"lat" => "-28.296652",
				"lon" => "153.571274"
			],
			[
				"postcode" => "2487",
				"suburb" => "CHINDERAH",
				"state" => "NSW",
				"lat" => "-28.237776",
				"lon" => "153.561345"
			],
			[
				"postcode" => "2487",
				"suburb" => "CUDGEN",
				"state" => "NSW",
				"lat" => "-28.2628",
				"lon" => "153.55721"
			],
			[
				"postcode" => "2487",
				"suburb" => "DURANBAH",
				"state" => "NSW",
				"lat" => "-28.307575",
				"lon" => "153.518474"
			],
			[
				"postcode" => "2487",
				"suburb" => "FINGAL HEAD",
				"state" => "NSW",
				"lat" => "-28.204156",
				"lon" => "153.565709"
			],
			[
				"postcode" => "2487",
				"suburb" => "KINGS FOREST",
				"state" => "NSW",
				"lat" => "-28.28825",
				"lon" => "153.563359"
			],
			[
				"postcode" => "2487",
				"suburb" => "KINGSCLIFF",
				"state" => "NSW",
				"lat" => "-28.254719",
				"lon" => "153.575638"
			],
			[
				"postcode" => "2487",
				"suburb" => "STOTTS CREEK",
				"state" => "NSW",
				"lat" => "-28.278516",
				"lon" => "153.516166"
			],
			[
				"postcode" => "2488",
				"suburb" => "BOGANGAR",
				"state" => "NSW",
				"lat" => "-28.332381",
				"lon" => "153.542241"
			],
			[
				"postcode" => "2488",
				"suburb" => "CABARITA BEACH",
				"state" => "NSW",
				"lat" => "-28.332149",
				"lon" => "153.569695"
			],
			[
				"postcode" => "2488",
				"suburb" => "TANGLEWOOD",
				"state" => "NSW",
				"lat" => "-28.329062",
				"lon" => "153.548995"
			],
			[
				"postcode" => "2489",
				"suburb" => "HASTINGS POINT",
				"state" => "NSW",
				"lat" => "-28.361966",
				"lon" => "153.576246"
			],
			[
				"postcode" => "2489",
				"suburb" => "POTTSVILLE",
				"state" => "NSW",
				"lat" => "-28.379066",
				"lon" => "153.56855"
			],
			[
				"postcode" => "2490",
				"suburb" => "NORTH TUMBULGUM",
				"state" => "NSW",
				"lat" => "-28.26807",
				"lon" => "153.470406"
			],
			[
				"postcode" => "2490",
				"suburb" => "TUMBULGUM",
				"state" => "NSW",
				"lat" => "-28.274366",
				"lon" => "153.461116"
			],
			[
				"postcode" => "2500",
				"suburb" => "CONISTON",
				"state" => "NSW",
				"lat" => "-34.436545",
				"lon" => "150.885559"
			],
			[
				"postcode" => "2500",
				"suburb" => "GWYNNEVILLE",
				"state" => "NSW",
				"lat" => "-34.416506",
				"lon" => "150.885131"
			],
			[
				"postcode" => "2500",
				"suburb" => "KEIRAVILLE",
				"state" => "NSW",
				"lat" => "-34.414626",
				"lon" => "150.872238"
			],
			[
				"postcode" => "2500",
				"suburb" => "MANGERTON",
				"state" => "NSW",
				"lat" => "-34.431722",
				"lon" => "150.871873"
			],
			[
				"postcode" => "2500",
				"suburb" => "MOUNT KEIRA",
				"state" => "NSW",
				"lat" => "-34.395938",
				"lon" => "150.845276"
			],
			[
				"postcode" => "2500",
				"suburb" => "MOUNT SAINT THOMAS",
				"state" => "NSW",
				"lat" => "-34.442905",
				"lon" => "150.87392"
			],
			[
				"postcode" => "2500",
				"suburb" => "NORTH WOLLONGONG",
				"state" => "NSW",
				"lat" => "-34.41436",
				"lon" => "150.895575"
			],
			[
				"postcode" => "2500",
				"suburb" => "SPRING HILL",
				"state" => "NSW",
				"lat" => "-34.454771",
				"lon" => "150.873656"
			],
			[
				"postcode" => "2500",
				"suburb" => "WEST WOLLONGONG",
				"state" => "NSW",
				"lat" => "-34.424649",
				"lon" => "150.867207"
			],
			[
				"postcode" => "2500",
				"suburb" => "WOLLONGONG",
				"state" => "NSW",
				"lat" => "-34.425878",
				"lon" => "150.899818"
			],
			[
				"postcode" => "2500",
				"suburb" => "WOLLONGONG WEST",
				"state" => "NSW",
				"lat" => "-34.424649",
				"lon" => "150.867207"
			],
			[
				"postcode" => "2502",
				"suburb" => "CRINGILA",
				"state" => "NSW",
				"lat" => "-34.471575",
				"lon" => "150.871375"
			],
			[
				"postcode" => "2502",
				"suburb" => "LAKE HEIGHTS",
				"state" => "NSW",
				"lat" => "-34.481581",
				"lon" => "150.872531"
			],
			[
				"postcode" => "2502",
				"suburb" => "PRIMBEE",
				"state" => "NSW",
				"lat" => "-34.500655",
				"lon" => "150.881602"
			],
			[
				"postcode" => "2502",
				"suburb" => "WARRAWONG",
				"state" => "NSW",
				"lat" => "-34.484382",
				"lon" => "150.887467"
			],
			[
				"postcode" => "2505",
				"suburb" => "KEMBLAWARRA",
				"state" => "NSW",
				"lat" => "-34.493252",
				"lon" => "150.892832"
			],
			[
				"postcode" => "2505",
				"suburb" => "PORT KEMBLA",
				"state" => "NSW",
				"lat" => "-34.479473",
				"lon" => "150.901651"
			],
			[
				"postcode" => "2506",
				"suburb" => "BERKELEY",
				"state" => "NSW",
				"lat" => "-34.481408",
				"lon" => "150.844147"
			],
			[
				"postcode" => "2508",
				"suburb" => "COALCLIFF",
				"state" => "NSW",
				"lat" => "-34.243453",
				"lon" => "150.976081"
			],
			[
				"postcode" => "2508",
				"suburb" => "DARKES FOREST",
				"state" => "NSW",
				"lat" => "-34.214374",
				"lon" => "150.950643"
			],
			[
				"postcode" => "2508",
				"suburb" => "HELENSBURGH",
				"state" => "NSW",
				"lat" => "-34.190675",
				"lon" => "150.981985"
			],
			[
				"postcode" => "2508",
				"suburb" => "LILYVALE",
				"state" => "NSW",
				"lat" => "-34.196076",
				"lon" => "151.011359"
			],
			[
				"postcode" => "2508",
				"suburb" => "MADDENS PLAINS",
				"state" => "NSW",
				"lat" => "-34.274844",
				"lon" => "150.940312"
			],
			[
				"postcode" => "2508",
				"suburb" => "OTFORD",
				"state" => "NSW",
				"lat" => "-34.213259",
				"lon" => "151.003235"
			],
			[
				"postcode" => "2508",
				"suburb" => "STANWELL PARK",
				"state" => "NSW",
				"lat" => "-34.226019",
				"lon" => "150.986148"
			],
			[
				"postcode" => "2508",
				"suburb" => "STANWELL TOPS",
				"state" => "NSW",
				"lat" => "-34.22077",
				"lon" => "150.976159"
			],
			[
				"postcode" => "2508",
				"suburb" => "WORONORA DAM",
				"state" => "NSW",
				"lat" => "-34.111532",
				"lon" => "150.934492"
			],
			[
				"postcode" => "2515",
				"suburb" => "AUSTINMER",
				"state" => "NSW",
				"lat" => "-34.306283",
				"lon" => "150.934563"
			],
			[
				"postcode" => "2515",
				"suburb" => "CLIFTON",
				"state" => "NSW",
				"lat" => "-34.259407",
				"lon" => "150.968883"
			],
			[
				"postcode" => "2515",
				"suburb" => "COLEDALE",
				"state" => "NSW",
				"lat" => "-34.288282",
				"lon" => "150.947401"
			],
			[
				"postcode" => "2515",
				"suburb" => "SCARBOROUGH",
				"state" => "NSW",
				"lat" => "-34.268351",
				"lon" => "150.962389"
			],
			[
				"postcode" => "2515",
				"suburb" => "THIRROUL",
				"state" => "NSW",
				"lat" => "-34.314739",
				"lon" => "150.923793"
			],
			[
				"postcode" => "2515",
				"suburb" => "WOMBARRA",
				"state" => "NSW",
				"lat" => "-34.277848",
				"lon" => "150.954245"
			],
			[
				"postcode" => "2516",
				"suburb" => "BULLI",
				"state" => "NSW",
				"lat" => "-34.333861",
				"lon" => "150.913281"
			],
			[
				"postcode" => "2517",
				"suburb" => "RUSSELL VALE",
				"state" => "NSW",
				"lat" => "-34.358093",
				"lon" => "150.900783"
			],
			[
				"postcode" => "2517",
				"suburb" => "WOONONA",
				"state" => "NSW",
				"lat" => "-34.340967",
				"lon" => "150.906779"
			],
			[
				"postcode" => "2517",
				"suburb" => "WOONONA EAST",
				"state" => "NSW",
				"lat" => "-34.34915",
				"lon" => "150.914167"
			],
			[
				"postcode" => "2518",
				"suburb" => "BELLAMBI",
				"state" => "NSW",
				"lat" => "-34.365911",
				"lon" => "150.910756"
			],
			[
				"postcode" => "2518",
				"suburb" => "CORRIMAL",
				"state" => "NSW",
				"lat" => "-34.371151",
				"lon" => "150.897239"
			],
			[
				"postcode" => "2518",
				"suburb" => "CORRIMAL EAST",
				"state" => "NSW",
				"lat" => "-34.376363",
				"lon" => "150.91118"
			],
			[
				"postcode" => "2518",
				"suburb" => "EAST CORRIMAL",
				"state" => "NSW",
				"lat" => "-34.376363",
				"lon" => "150.91118"
			],
			[
				"postcode" => "2518",
				"suburb" => "TARRAWANNA",
				"state" => "NSW",
				"lat" => "-34.381864",
				"lon" => "150.887815"
			],
			[
				"postcode" => "2518",
				"suburb" => "TOWRADGI",
				"state" => "NSW",
				"lat" => "-34.384433",
				"lon" => "150.90676"
			],
			[
				"postcode" => "2519",
				"suburb" => "BALGOWNIE",
				"state" => "NSW",
				"lat" => "-34.38859",
				"lon" => "150.877689"
			],
			[
				"postcode" => "2519",
				"suburb" => "FAIRY MEADOW",
				"state" => "NSW",
				"lat" => "-34.399879",
				"lon" => "150.891874"
			],
			[
				"postcode" => "2519",
				"suburb" => "FERNHILL",
				"state" => "NSW",
				"lat" => "-34.383602",
				"lon" => "150.88676"
			],
			[
				"postcode" => "2519",
				"suburb" => "MOUNT OUSLEY",
				"state" => "NSW",
				"lat" => "-34.402376",
				"lon" => "150.886719"
			],
			[
				"postcode" => "2519",
				"suburb" => "MOUNT PLEASANT",
				"state" => "NSW",
				"lat" => "-34.39666",
				"lon" => "150.863798"
			],
			[
				"postcode" => "2519",
				"suburb" => "REIDTOWN",
				"state" => "NSW",
				"lat" => "-34.388885",
				"lon" => "150.893891"
			],
			[
				"postcode" => "2520",
				"suburb" => "WOLLONGONG",
				"state" => "NSW",
				"lat" => "-33.937789",
				"lon" => "151.139594"
			],
			[
				"postcode" => "2522",
				"suburb" => "UNIVERSITY OF WOLLONGONG",
				"state" => "NSW",
				"lat" => "-34.405103",
				"lon" => "150.877805"
			],
			[
				"postcode" => "2525",
				"suburb" => "FIGTREE",
				"state" => "NSW",
				"lat" => "-34.435686",
				"lon" => "150.861241"
			],
			[
				"postcode" => "2526",
				"suburb" => "CORDEAUX",
				"state" => "NSW",
				"lat" => "-34.380765",
				"lon" => "150.77681"
			],
			[
				"postcode" => "2526",
				"suburb" => "CORDEAUX HEIGHTS",
				"state" => "NSW",
				"lat" => "-34.439801",
				"lon" => "150.838399"
			],
			[
				"postcode" => "2526",
				"suburb" => "DOMBARTON",
				"state" => "NSW",
				"lat" => "-34.456405",
				"lon" => "150.770419"
			],
			[
				"postcode" => "2526",
				"suburb" => "FARMBOROUGH HEIGHTS",
				"state" => "NSW",
				"lat" => "-34.454004",
				"lon" => "150.819944"
			],
			[
				"postcode" => "2526",
				"suburb" => "KEMBLA GRANGE",
				"state" => "NSW",
				"lat" => "-34.47078",
				"lon" => "150.808912"
			],
			[
				"postcode" => "2526",
				"suburb" => "KEMBLA HEIGHTS",
				"state" => "NSW",
				"lat" => "-34.433149",
				"lon" => "150.805941"
			],
			[
				"postcode" => "2526",
				"suburb" => "MOUNT KEMBLA",
				"state" => "NSW",
				"lat" => "-34.432799",
				"lon" => "150.820503"
			],
			[
				"postcode" => "2526",
				"suburb" => "UNANDERRA",
				"state" => "NSW",
				"lat" => "-34.454624",
				"lon" => "150.845093"
			],
			[
				"postcode" => "2527",
				"suburb" => "ALBION PARK",
				"state" => "NSW",
				"lat" => "-34.570722",
				"lon" => "150.775031"
			],
			[
				"postcode" => "2527",
				"suburb" => "ALBION PARK RAIL",
				"state" => "NSW",
				"lat" => "-34.560838",
				"lon" => "150.79575"
			],
			[
				"postcode" => "2527",
				"suburb" => "CALDERWOOD",
				"state" => "NSW",
				"lat" => "-34.552252",
				"lon" => "150.707252"
			],
			[
				"postcode" => "2527",
				"suburb" => "CROOM",
				"state" => "NSW",
				"lat" => "-34.586574",
				"lon" => "150.837991"
			],
			[
				"postcode" => "2527",
				"suburb" => "NORTH MACQUARIE",
				"state" => "NSW",
				"lat" => "-34.572232",
				"lon" => "150.741423"
			],
			[
				"postcode" => "2527",
				"suburb" => "TONGARRA",
				"state" => "NSW",
				"lat" => "-34.579673",
				"lon" => "150.705668"
			],
			[
				"postcode" => "2527",
				"suburb" => "TULLIMBAR",
				"state" => "NSW",
				"lat" => "-34.577122",
				"lon" => "150.739102"
			],
			[
				"postcode" => "2527",
				"suburb" => "YELLOW ROCK",
				"state" => "NSW",
				"lat" => "-34.597473",
				"lon" => "150.731413"
			],
			[
				"postcode" => "2528",
				"suburb" => "BARRACK HEIGHTS",
				"state" => "NSW",
				"lat" => "-34.565203",
				"lon" => "150.857066"
			],
			[
				"postcode" => "2528",
				"suburb" => "BARRACK POINT",
				"state" => "NSW",
				"lat" => "-34.563249",
				"lon" => "150.867375"
			],
			[
				"postcode" => "2528",
				"suburb" => "LAKE ILLAWARRA",
				"state" => "NSW",
				"lat" => "-34.546473",
				"lon" => "150.85695"
			],
			[
				"postcode" => "2528",
				"suburb" => "MOUNT WARRIGAL",
				"state" => "NSW",
				"lat" => "-34.551856",
				"lon" => "150.843468"
			],
			[
				"postcode" => "2528",
				"suburb" => "WARILLA",
				"state" => "NSW",
				"lat" => "-34.552573",
				"lon" => "150.85995"
			],
			[
				"postcode" => "2528",
				"suburb" => "WINDANG",
				"state" => "NSW",
				"lat" => "-34.52994",
				"lon" => "150.869145"
			],
			[
				"postcode" => "2529",
				"suburb" => "BLACKBUTT",
				"state" => "NSW",
				"lat" => "-34.56896",
				"lon" => "150.834695"
			],
			[
				"postcode" => "2529",
				"suburb" => "DUNMORE",
				"state" => "NSW",
				"lat" => "-34.606223",
				"lon" => "150.840676"
			],
			[
				"postcode" => "2529",
				"suburb" => "FLINDERS",
				"state" => "NSW",
				"lat" => "-34.579836",
				"lon" => "150.844828"
			],
			[
				"postcode" => "2529",
				"suburb" => "OAK FLATS",
				"state" => "NSW",
				"lat" => "-34.564933",
				"lon" => "150.819334"
			],
			[
				"postcode" => "2529",
				"suburb" => "SHELL COVE",
				"state" => "NSW",
				"lat" => "-34.588201",
				"lon" => "150.872594"
			],
			[
				"postcode" => "2529",
				"suburb" => "SHELLHARBOUR",
				"state" => "NSW",
				"lat" => "-34.579035",
				"lon" => "150.867929"
			],
			[
				"postcode" => "2529",
				"suburb" => "SHELLHARBOUR CITY CENTRE",
				"state" => "NSW",
				"lat" => "-34.564922",
				"lon" => "150.836628"
			],
			[
				"postcode" => "2530",
				"suburb" => "AVONDALE",
				"state" => "NSW",
				"lat" => "-34.514177",
				"lon" => "150.733774"
			],
			[
				"postcode" => "2530",
				"suburb" => "BROWNSVILLE",
				"state" => "NSW",
				"lat" => "-34.485644",
				"lon" => "150.806211"
			],
			[
				"postcode" => "2530",
				"suburb" => "CLEVELAND",
				"state" => "NSW",
				"lat" => "-34.501885",
				"lon" => "150.772708"
			],
			[
				"postcode" => "2530",
				"suburb" => "DAPTO",
				"state" => "NSW",
				"lat" => "-34.494001",
				"lon" => "150.793006"
			],
			[
				"postcode" => "2530",
				"suburb" => "HAYWARDS BAY",
				"state" => "NSW",
				"lat" => "-34.540289",
				"lon" => "150.787364"
			],
			[
				"postcode" => "2530",
				"suburb" => "HORSLEY",
				"state" => "NSW",
				"lat" => "-34.489605",
				"lon" => "150.766762"
			],
			[
				"postcode" => "2530",
				"suburb" => "HUNTLEY",
				"state" => "NSW",
				"lat" => "-34.507423",
				"lon" => "150.714224"
			],
			[
				"postcode" => "2530",
				"suburb" => "KANAHOOKA",
				"state" => "NSW",
				"lat" => "-34.49448",
				"lon" => "150.808964"
			],
			[
				"postcode" => "2530",
				"suburb" => "KOONAWARRA",
				"state" => "NSW",
				"lat" => "-34.502196",
				"lon" => "150.807052"
			],
			[
				"postcode" => "2530",
				"suburb" => "MARSHALL MOUNT",
				"state" => "NSW",
				"lat" => "-34.545128",
				"lon" => "150.745585"
			],
			[
				"postcode" => "2530",
				"suburb" => "PENROSE",
				"state" => "NSW",
				"lat" => "-34.512613",
				"lon" => "150.778141"
			],
			[
				"postcode" => "2530",
				"suburb" => "WONGAWILLI",
				"state" => "NSW",
				"lat" => "-34.480002",
				"lon" => "150.758765"
			],
			[
				"postcode" => "2530",
				"suburb" => "YALLAH",
				"state" => "NSW",
				"lat" => "-34.537777",
				"lon" => "150.780648"
			],
			[
				"postcode" => "2533",
				"suburb" => "BOMBO",
				"state" => "NSW",
				"lat" => "-34.656396",
				"lon" => "150.854028"
			],
			[
				"postcode" => "2533",
				"suburb" => "CURRAMORE",
				"state" => "NSW",
				"lat" => "-34.621117",
				"lon" => "150.782884"
			],
			[
				"postcode" => "2533",
				"suburb" => "JAMBEROO",
				"state" => "NSW",
				"lat" => "-34.648419",
				"lon" => "150.776595"
			],
			[
				"postcode" => "2533",
				"suburb" => "JERRARA",
				"state" => "NSW",
				"lat" => "-34.669926",
				"lon" => "150.818519"
			],
			[
				"postcode" => "2533",
				"suburb" => "KIAMA",
				"state" => "NSW",
				"lat" => "-34.671676",
				"lon" => "150.856703"
			],
			[
				"postcode" => "2533",
				"suburb" => "KIAMA DOWNS",
				"state" => "NSW",
				"lat" => "-34.645131",
				"lon" => "150.851208"
			],
			[
				"postcode" => "2533",
				"suburb" => "KIAMA HEIGHTS",
				"state" => "NSW",
				"lat" => "-34.697929",
				"lon" => "150.843492"
			],
			[
				"postcode" => "2533",
				"suburb" => "MINNAMURRA",
				"state" => "NSW",
				"lat" => "-34.627871",
				"lon" => "150.855113"
			],
			[
				"postcode" => "2533",
				"suburb" => "SADDLEBACK MOUNTAIN",
				"state" => "NSW",
				"lat" => "-34.699264",
				"lon" => "150.803589"
			],
			[
				"postcode" => "2534",
				"suburb" => "FOXGROUND",
				"state" => "NSW",
				"lat" => "-34.727084",
				"lon" => "150.768404"
			],
			[
				"postcode" => "2534",
				"suburb" => "GERRINGONG",
				"state" => "NSW",
				"lat" => "-34.745549",
				"lon" => "150.827497"
			],
			[
				"postcode" => "2534",
				"suburb" => "GERROA",
				"state" => "NSW",
				"lat" => "-34.770171",
				"lon" => "150.815611"
			],
			[
				"postcode" => "2534",
				"suburb" => "ROSE VALLEY",
				"state" => "NSW",
				"lat" => "-34.723847",
				"lon" => "150.814893"
			],
			[
				"postcode" => "2534",
				"suburb" => "TOOLIJOOA",
				"state" => "NSW",
				"lat" => "-34.755583",
				"lon" => "150.780909"
			],
			[
				"postcode" => "2534",
				"suburb" => "WERRI BEACH",
				"state" => "NSW",
				"lat" => "-34.734083",
				"lon" => "150.832547"
			],
			[
				"postcode" => "2534",
				"suburb" => "WILLOW VALE",
				"state" => "NSW",
				"lat" => "-34.737647",
				"lon" => "150.794731"
			],
			[
				"postcode" => "2535",
				"suburb" => "BACK FOREST",
				"state" => "NSW",
				"lat" => "-34.853655",
				"lon" => "150.678507"
			],
			[
				"postcode" => "2535",
				"suburb" => "BELLAWONGARAH",
				"state" => "NSW",
				"lat" => "-34.763894",
				"lon" => "150.626431"
			],
			[
				"postcode" => "2535",
				"suburb" => "BERRY",
				"state" => "NSW",
				"lat" => "-34.775494",
				"lon" => "150.696595"
			],
			[
				"postcode" => "2535",
				"suburb" => "BERRY MOUNTAIN",
				"state" => "NSW",
				"lat" => "-34.76421",
				"lon" => "150.653537"
			],
			[
				"postcode" => "2535",
				"suburb" => "BROGERS CREEK",
				"state" => "NSW",
				"lat" => "-34.707978",
				"lon" => "150.686381"
			],
			[
				"postcode" => "2535",
				"suburb" => "BROUGHTON",
				"state" => "NSW",
				"lat" => "-34.761853",
				"lon" => "150.735343"
			],
			[
				"postcode" => "2535",
				"suburb" => "BROUGHTON VALE",
				"state" => "NSW",
				"lat" => "-34.757278",
				"lon" => "150.708686"
			],
			[
				"postcode" => "2535",
				"suburb" => "BROUGHTON VILLAGE",
				"state" => "NSW",
				"lat" => "-34.741987",
				"lon" => "150.761619"
			],
			[
				"postcode" => "2535",
				"suburb" => "BUDDEROO",
				"state" => "NSW",
				"lat" => "-34.662214",
				"lon" => "150.662882"
			],
			[
				"postcode" => "2535",
				"suburb" => "BUNDEWALLAH",
				"state" => "NSW",
				"lat" => "-34.754964",
				"lon" => "150.664195"
			],
			[
				"postcode" => "2535",
				"suburb" => "COOLANGATTA",
				"state" => "NSW",
				"lat" => "-34.854208",
				"lon" => "150.726361"
			],
			[
				"postcode" => "2535",
				"suburb" => "FAR MEADOW",
				"state" => "NSW",
				"lat" => "-34.822063",
				"lon" => "150.720449"
			],
			[
				"postcode" => "2535",
				"suburb" => "JASPERS BRUSH",
				"state" => "NSW",
				"lat" => "-34.803323",
				"lon" => "150.657592"
			],
			[
				"postcode" => "2535",
				"suburb" => "SHOALHAVEN HEADS",
				"state" => "NSW",
				"lat" => "-34.85145",
				"lon" => "150.745254"
			],
			[
				"postcode" => "2535",
				"suburb" => "WATTAMOLLA",
				"state" => "NSW",
				"lat" => "-34.735931",
				"lon" => "150.622766"
			],
			[
				"postcode" => "2535",
				"suburb" => "WOODHILL",
				"state" => "NSW",
				"lat" => "-34.726147",
				"lon" => "150.67505"
			],
			[
				"postcode" => "2536",
				"suburb" => "BATEHAVEN",
				"state" => "NSW",
				"lat" => "-35.73211",
				"lon" => "150.199539"
			],
			[
				"postcode" => "2536",
				"suburb" => "BATEMANS BAY",
				"state" => "NSW",
				"lat" => "-35.708152",
				"lon" => "150.174704"
			],
			[
				"postcode" => "2536",
				"suburb" => "BENANDARAH",
				"state" => "NSW",
				"lat" => "-35.660936",
				"lon" => "150.228251"
			],
			[
				"postcode" => "2536",
				"suburb" => "BIMBIMBIE",
				"state" => "NSW",
				"lat" => "-35.815395",
				"lon" => "150.128745"
			],
			[
				"postcode" => "2536",
				"suburb" => "BUCKENBOWRA",
				"state" => "NSW",
				"lat" => "-35.769462",
				"lon" => "150.065754"
			],
			[
				"postcode" => "2536",
				"suburb" => "CATALINA",
				"state" => "NSW",
				"lat" => "-35.723476",
				"lon" => "150.192552"
			],
			[
				"postcode" => "2536",
				"suburb" => "CURROWAN",
				"state" => "NSW",
				"lat" => "-35.559823",
				"lon" => "150.167187"
			],
			[
				"postcode" => "2536",
				"suburb" => "DENHAMS BEACH",
				"state" => "NSW",
				"lat" => "-35.747722",
				"lon" => "150.213231"
			],
			[
				"postcode" => "2536",
				"suburb" => "DEPOT BEACH",
				"state" => "NSW",
				"lat" => "-35.628728",
				"lon" => "150.322963"
			],
			[
				"postcode" => "2536",
				"suburb" => "DURRAS NORTH",
				"state" => "NSW",
				"lat" => "-35.627699",
				"lon" => "150.310957"
			],
			[
				"postcode" => "2536",
				"suburb" => "EAST LYNNE",
				"state" => "NSW",
				"lat" => "-35.578817",
				"lon" => "150.258877"
			],
			[
				"postcode" => "2536",
				"suburb" => "GUERILLA BAY",
				"state" => "NSW",
				"lat" => "-35.826392",
				"lon" => "150.218066"
			],
			[
				"postcode" => "2536",
				"suburb" => "JEREMADRA",
				"state" => "NSW",
				"lat" => "-35.809125",
				"lon" => "150.136599"
			],
			[
				"postcode" => "2536",
				"suburb" => "LILLI PILLI",
				"state" => "NSW",
				"lat" => "-35.773317",
				"lon" => "150.225056"
			],
			[
				"postcode" => "2536",
				"suburb" => "LONG BEACH",
				"state" => "NSW",
				"lat" => "-35.698892",
				"lon" => "150.234429"
			],
			[
				"postcode" => "2536",
				"suburb" => "MALONEYS BEACH",
				"state" => "NSW",
				"lat" => "-35.705933",
				"lon" => "150.247977"
			],
			[
				"postcode" => "2536",
				"suburb" => "MALUA BAY",
				"state" => "NSW",
				"lat" => "-35.783334",
				"lon" => "150.232071"
			],
			[
				"postcode" => "2536",
				"suburb" => "MOGO",
				"state" => "NSW",
				"lat" => "-35.784009",
				"lon" => "150.142104"
			],
			[
				"postcode" => "2536",
				"suburb" => "NELLIGEN",
				"state" => "NSW",
				"lat" => "-35.647438",
				"lon" => "150.141482"
			],
			[
				"postcode" => "2536",
				"suburb" => "NORTH BATEMANS BAY",
				"state" => "NSW",
				"lat" => "-35.700315",
				"lon" => "150.183191"
			],
			[
				"postcode" => "2536",
				"suburb" => "PEBBLY BEACH",
				"state" => "NSW",
				"lat" => "-35.600337",
				"lon" => "150.332855"
			],
			[
				"postcode" => "2536",
				"suburb" => "ROSEDALE",
				"state" => "NSW",
				"lat" => "-35.818606",
				"lon" => "150.219889"
			],
			[
				"postcode" => "2536",
				"suburb" => "RUNNYFORD",
				"state" => "NSW",
				"lat" => "-35.716924",
				"lon" => "150.113917"
			],
			[
				"postcode" => "2536",
				"suburb" => "SOUTH DURRAS",
				"state" => "NSW",
				"lat" => "-35.650988",
				"lon" => "150.295026"
			],
			[
				"postcode" => "2536",
				"suburb" => "SUNSHINE BAY",
				"state" => "NSW",
				"lat" => "-35.741606",
				"lon" => "150.20909"
			],
			[
				"postcode" => "2536",
				"suburb" => "SURF BEACH",
				"state" => "NSW",
				"lat" => "-35.761341",
				"lon" => "150.21013"
			],
			[
				"postcode" => "2536",
				"suburb" => "SURFSIDE",
				"state" => "NSW",
				"lat" => "-35.700788",
				"lon" => "150.198313"
			],
			[
				"postcode" => "2536",
				"suburb" => "WOODLANDS",
				"state" => "NSW",
				"lat" => "-35.796628",
				"lon" => "150.173321"
			],
			[
				"postcode" => "2537",
				"suburb" => "BERGALIA",
				"state" => "NSW",
				"lat" => "-35.981261",
				"lon" => "150.105175"
			],
			[
				"postcode" => "2537",
				"suburb" => "BINGIE",
				"state" => "NSW",
				"lat" => "-36.01113",
				"lon" => "150.153153"
			],
			[
				"postcode" => "2537",
				"suburb" => "BROULEE",
				"state" => "NSW",
				"lat" => "-35.854996",
				"lon" => "150.174616"
			],
			[
				"postcode" => "2537",
				"suburb" => "COILA",
				"state" => "NSW",
				"lat" => "-36.022284",
				"lon" => "150.102934"
			],
			[
				"postcode" => "2537",
				"suburb" => "CONGO",
				"state" => "NSW",
				"lat" => "-35.956185",
				"lon" => "150.153669"
			],
			[
				"postcode" => "2537",
				"suburb" => "DEUA",
				"state" => "NSW",
				"lat" => "-35.817685",
				"lon" => "149.794894"
			],
			[
				"postcode" => "2537",
				"suburb" => "DEUA RIVER VALLEY",
				"state" => "NSW",
				"lat" => "-35.825901",
				"lon" => "149.975941"
			],
			[
				"postcode" => "2537",
				"suburb" => "KIORA",
				"state" => "NSW",
				"lat" => "-35.922829",
				"lon" => "150.038921"
			],
			[
				"postcode" => "2537",
				"suburb" => "MERINGO",
				"state" => "NSW",
				"lat" => "-35.983842",
				"lon" => "150.147692"
			],
			[
				"postcode" => "2537",
				"suburb" => "MOGENDOURA",
				"state" => "NSW",
				"lat" => "-35.872225",
				"lon" => "150.058818"
			],
			[
				"postcode" => "2537",
				"suburb" => "MORUYA",
				"state" => "NSW",
				"lat" => "-35.911739",
				"lon" => "150.078004"
			],
			[
				"postcode" => "2537",
				"suburb" => "MORUYA HEADS",
				"state" => "NSW",
				"lat" => "-35.913602",
				"lon" => "150.132617"
			],
			[
				"postcode" => "2537",
				"suburb" => "MOSSY POINT",
				"state" => "NSW",
				"lat" => "-35.837391",
				"lon" => "150.175923"
			],
			[
				"postcode" => "2537",
				"suburb" => "TOMAKIN",
				"state" => "NSW",
				"lat" => "-35.821767",
				"lon" => "150.193026"
			],
			[
				"postcode" => "2537",
				"suburb" => "TURLINJAH",
				"state" => "NSW",
				"lat" => "-36.033268",
				"lon" => "150.090191"
			],
			[
				"postcode" => "2537",
				"suburb" => "TUROSS HEAD",
				"state" => "NSW",
				"lat" => "-36.060748",
				"lon" => "150.137152"
			],
			[
				"postcode" => "2537",
				"suburb" => "WAMBAN",
				"state" => "NSW",
				"lat" => "-36.003667",
				"lon" => "149.976869"
			],
			[
				"postcode" => "2538",
				"suburb" => "BROOMAN",
				"state" => "NSW",
				"lat" => "-35.48985",
				"lon" => "150.233827"
			],
			[
				"postcode" => "2538",
				"suburb" => "LITTLE FOREST",
				"state" => "NSW",
				"lat" => "-35.295789",
				"lon" => "150.394697"
			],
			[
				"postcode" => "2538",
				"suburb" => "MILTON",
				"state" => "NSW",
				"lat" => "-35.315085",
				"lon" => "150.434525"
			],
			[
				"postcode" => "2538",
				"suburb" => "MOGOOD",
				"state" => "NSW",
				"lat" => "-35.532057",
				"lon" => "150.197708"
			],
			[
				"postcode" => "2538",
				"suburb" => "MORTON",
				"state" => "NSW",
				"lat" => "-35.419406",
				"lon" => "150.304367"
			],
			[
				"postcode" => "2538",
				"suburb" => "PORTERS CREEK",
				"state" => "NSW",
				"lat" => "-35.264793",
				"lon" => "150.332988"
			],
			[
				"postcode" => "2538",
				"suburb" => "WOODBURN",
				"state" => "NSW",
				"lat" => "-35.375596",
				"lon" => "150.378783"
			],
			[
				"postcode" => "2538",
				"suburb" => "WOODSTOCK",
				"state" => "NSW",
				"lat" => "-35.352384",
				"lon" => "150.408978"
			],
			[
				"postcode" => "2539",
				"suburb" => "BAWLEY POINT",
				"state" => "NSW",
				"lat" => "-35.522387",
				"lon" => "150.393202"
			],
			[
				"postcode" => "2539",
				"suburb" => "BENDALONG",
				"state" => "NSW",
				"lat" => "-35.246777",
				"lon" => "150.529888"
			],
			[
				"postcode" => "2539",
				"suburb" => "BURRILL LAKE",
				"state" => "NSW",
				"lat" => "-35.387189",
				"lon" => "150.449603"
			],
			[
				"postcode" => "2539",
				"suburb" => "COCKWHY",
				"state" => "NSW",
				"lat" => "-35.541395",
				"lon" => "150.289208"
			],
			[
				"postcode" => "2539",
				"suburb" => "CONJOLA",
				"state" => "NSW",
				"lat" => "-35.219631",
				"lon" => "150.43487"
			],
			[
				"postcode" => "2539",
				"suburb" => "CONJOLA PARK",
				"state" => "NSW",
				"lat" => "-35.371593",
				"lon" => "150.452135"
			],
			[
				"postcode" => "2539",
				"suburb" => "CROOBYAR",
				"state" => "NSW",
				"lat" => "-35.321265",
				"lon" => "150.400375"
			],
			[
				"postcode" => "2539",
				"suburb" => "CUNJURONG POINT",
				"state" => "NSW",
				"lat" => "-35.259759",
				"lon" => "150.504909"
			],
			[
				"postcode" => "2539",
				"suburb" => "DOLPHIN POINT",
				"state" => "NSW",
				"lat" => "-35.400376",
				"lon" => "150.44539"
			],
			[
				"postcode" => "2539",
				"suburb" => "FISHERMANS PARADISE",
				"state" => "NSW",
				"lat" => "-35.229709",
				"lon" => "150.448704"
			],
			[
				"postcode" => "2539",
				"suburb" => "KINGS POINT",
				"state" => "NSW",
				"lat" => "-35.372521",
				"lon" => "150.437164"
			],
			[
				"postcode" => "2539",
				"suburb" => "KIOLOA",
				"state" => "NSW",
				"lat" => "-35.544426",
				"lon" => "150.383971"
			],
			[
				"postcode" => "2539",
				"suburb" => "LAKE CONJOLA",
				"state" => "NSW",
				"lat" => "-35.269291",
				"lon" => "150.492742"
			],
			[
				"postcode" => "2539",
				"suburb" => "LAKE TABOURIE",
				"state" => "NSW",
				"lat" => "-35.44375",
				"lon" => "150.398471"
			],
			[
				"postcode" => "2539",
				"suburb" => "MANYANA",
				"state" => "NSW",
				"lat" => "-35.258413",
				"lon" => "150.513956"
			],
			[
				"postcode" => "2539",
				"suburb" => "MOLLYMOOK",
				"state" => "NSW",
				"lat" => "-35.339324",
				"lon" => "150.474228"
			],
			[
				"postcode" => "2539",
				"suburb" => "MOLLYMOOK BEACH",
				"state" => "NSW",
				"lat" => "-35.329662",
				"lon" => "150.471836"
			],
			[
				"postcode" => "2539",
				"suburb" => "NARRAWALLEE",
				"state" => "NSW",
				"lat" => "-35.308851",
				"lon" => "150.471766"
			],
			[
				"postcode" => "2539",
				"suburb" => "POINTER MOUNTAIN",
				"state" => "NSW",
				"lat" => "-35.262656",
				"lon" => "150.371989"
			],
			[
				"postcode" => "2539",
				"suburb" => "PRETTY BEACH",
				"state" => "NSW",
				"lat" => "-35.564463",
				"lon" => "150.379514"
			],
			[
				"postcode" => "2539",
				"suburb" => "TERMEIL",
				"state" => "NSW",
				"lat" => "-35.487171",
				"lon" => "150.339308"
			],
			[
				"postcode" => "2539",
				"suburb" => "ULLADULLA",
				"state" => "NSW",
				"lat" => "-35.357094",
				"lon" => "150.474301"
			],
			[
				"postcode" => "2539",
				"suburb" => "YADBORO",
				"state" => "NSW",
				"lat" => "-35.375922",
				"lon" => "150.239976"
			],
			[
				"postcode" => "2540",
				"suburb" => "BAMARANG",
				"state" => "NSW",
				"lat" => "-34.894362",
				"lon" => "150.534464"
			],
			[
				"postcode" => "2540",
				"suburb" => "BARRINGELLA",
				"state" => "NSW",
				"lat" => "-34.935112",
				"lon" => "150.457584"
			],
			[
				"postcode" => "2540",
				"suburb" => "BASIN VIEW",
				"state" => "NSW",
				"lat" => "-35.091103",
				"lon" => "150.562281"
			],
			[
				"postcode" => "2540",
				"suburb" => "BEECROFT PENINSULA",
				"state" => "NSW",
				"lat" => "-35.007431",
				"lon" => "150.79864"
			],
			[
				"postcode" => "2540",
				"suburb" => "BERRARA",
				"state" => "NSW",
				"lat" => "-35.205582",
				"lon" => "150.550411"
			],
			[
				"postcode" => "2540",
				"suburb" => "BEWONG",
				"state" => "NSW",
				"lat" => "-35.085105",
				"lon" => "150.531612"
			],
			[
				"postcode" => "2540",
				"suburb" => "BOLONG",
				"state" => "NSW",
				"lat" => "-34.847006",
				"lon" => "150.649574"
			],
			[
				"postcode" => "2540",
				"suburb" => "BOOLIJAH",
				"state" => "NSW",
				"lat" => "-35.107236",
				"lon" => "150.3538"
			],
			[
				"postcode" => "2540",
				"suburb" => "BREAM BEACH",
				"state" => "NSW",
				"lat" => "-35.111056",
				"lon" => "150.661796"
			],
			[
				"postcode" => "2540",
				"suburb" => "BROWNS MOUNTAIN",
				"state" => "NSW",
				"lat" => "-34.795905",
				"lon" => "150.515137"
			],
			[
				"postcode" => "2540",
				"suburb" => "BRUNDEE",
				"state" => "NSW",
				"lat" => "-34.892094",
				"lon" => "150.651304"
			],
			[
				"postcode" => "2540",
				"suburb" => "BUANGLA",
				"state" => "NSW",
				"lat" => "-34.85565",
				"lon" => "150.408913"
			],
			[
				"postcode" => "2540",
				"suburb" => "BURRIER",
				"state" => "NSW",
				"lat" => "-34.870381",
				"lon" => "150.451137"
			],
			[
				"postcode" => "2540",
				"suburb" => "CALLALA BAY",
				"state" => "NSW",
				"lat" => "-34.98761",
				"lon" => "150.718141"
			],
			[
				"postcode" => "2540",
				"suburb" => "CALLALA BEACH",
				"state" => "NSW",
				"lat" => "-35.009084",
				"lon" => "150.696524"
			],
			[
				"postcode" => "2540",
				"suburb" => "CAMBEWARRA",
				"state" => "NSW",
				"lat" => "-34.820751",
				"lon" => "150.542226"
			],
			[
				"postcode" => "2540",
				"suburb" => "CAMBEWARRA VILLAGE",
				"state" => "NSW",
				"lat" => "-34.82309",
				"lon" => "150.559835"
			],
			[
				"postcode" => "2540",
				"suburb" => "COMBERTON",
				"state" => "NSW",
				"lat" => "-34.963482",
				"lon" => "150.65138"
			],
			[
				"postcode" => "2540",
				"suburb" => "COMERONG ISLAND",
				"state" => "NSW",
				"lat" => "-34.877525",
				"lon" => "150.725328"
			],
			[
				"postcode" => "2540",
				"suburb" => "CUDMIRRAH",
				"state" => "NSW",
				"lat" => "-35.19804",
				"lon" => "150.557818"
			],
			[
				"postcode" => "2540",
				"suburb" => "CULBURRA BEACH",
				"state" => "NSW",
				"lat" => "-34.930305",
				"lon" => "150.758745"
			],
			[
				"postcode" => "2540",
				"suburb" => "CURRARONG",
				"state" => "NSW",
				"lat" => "-35.018739",
				"lon" => "150.824214"
			],
			[
				"postcode" => "2540",
				"suburb" => "EROWAL BAY",
				"state" => "NSW",
				"lat" => "-35.102436",
				"lon" => "150.653639"
			],
			[
				"postcode" => "2540",
				"suburb" => "ETTREMA",
				"state" => "NSW",
				"lat" => "-34.831645",
				"lon" => "150.309906"
			]
		]);
		DB::table('suburbs')->insert([
			[
				"postcode" => "2540",
				"suburb" => "FALLS CREEK",
				"state" => "NSW",
				"lat" => "-34.968232",
				"lon" => "150.596929"
			],
			[
				"postcode" => "2540",
				"suburb" => "GREENWELL POINT",
				"state" => "NSW",
				"lat" => "-34.907929",
				"lon" => "150.729736"
			],
			[
				"postcode" => "2540",
				"suburb" => "HMAS ALBATROSS",
				"state" => "NSW",
				"lat" => "-34.943598",
				"lon" => "150.548423"
			],
			[
				"postcode" => "2540",
				"suburb" => "HMAS CRESWELL",
				"state" => "ACT",
				"lat" => "-35.129878",
				"lon" => "150.707521"
			],
			[
				"postcode" => "2540",
				"suburb" => "HUSKISSON",
				"state" => "NSW",
				"lat" => "-35.03885",
				"lon" => "150.670943"
			],
			[
				"postcode" => "2540",
				"suburb" => "HYAMS BEACH",
				"state" => "NSW",
				"lat" => "-35.101726",
				"lon" => "150.681004"
			],
			[
				"postcode" => "2540",
				"suburb" => "ILLAROO",
				"state" => "NSW",
				"lat" => "-34.851209",
				"lon" => "150.479283"
			],
			[
				"postcode" => "2540",
				"suburb" => "JERRAWANGALA",
				"state" => "NSW",
				"lat" => "-35.095016",
				"lon" => "150.443219"
			],
			[
				"postcode" => "2540",
				"suburb" => "JERVIS BAY",
				"state" => "ACT",
				"lat" => "-35.127437",
				"lon" => "150.707149"
			],
			[
				"postcode" => "2540",
				"suburb" => "KINGHORNE",
				"state" => "NSW",
				"lat" => "-34.965514",
				"lon" => "150.778168"
			],
			[
				"postcode" => "2540",
				"suburb" => "LONGREACH",
				"state" => "NSW",
				"lat" => "-34.868158",
				"lon" => "150.525235"
			],
			[
				"postcode" => "2540",
				"suburb" => "MAYFIELD",
				"state" => "NSW",
				"lat" => "-34.915478",
				"lon" => "150.673667"
			],
			[
				"postcode" => "2540",
				"suburb" => "MEROO MEADOW",
				"state" => "NSW",
				"lat" => "-34.809874",
				"lon" => "150.618378"
			],
			[
				"postcode" => "2540",
				"suburb" => "MONDAYONG",
				"state" => "NSW",
				"lat" => "-35.181766",
				"lon" => "150.43954"
			],
			[
				"postcode" => "2540",
				"suburb" => "MOOLLATTOO",
				"state" => "NSW",
				"lat" => "-34.772666",
				"lon" => "150.384284"
			],
			[
				"postcode" => "2540",
				"suburb" => "MUNDAMIA",
				"state" => "NSW",
				"lat" => "-34.893303",
				"lon" => "150.558306"
			],
			[
				"postcode" => "2540",
				"suburb" => "MYOLA",
				"state" => "NSW",
				"lat" => "-35.027104",
				"lon" => "150.673253"
			],
			[
				"postcode" => "2540",
				"suburb" => "NOWRA HILL",
				"state" => "NSW",
				"lat" => "-34.933614",
				"lon" => "150.575151"
			],
			[
				"postcode" => "2540",
				"suburb" => "NUMBAA",
				"state" => "NSW",
				"lat" => "-34.873429",
				"lon" => "150.678484"
			],
			[
				"postcode" => "2540",
				"suburb" => "OLD EROWAL BAY",
				"state" => "NSW",
				"lat" => "-35.084367",
				"lon" => "150.646501"
			],
			[
				"postcode" => "2540",
				"suburb" => "ORIENT POINT",
				"state" => "NSW",
				"lat" => "-34.9108",
				"lon" => "150.749658"
			],
			[
				"postcode" => "2540",
				"suburb" => "PARMA",
				"state" => "NSW",
				"lat" => "-34.963298",
				"lon" => "150.552694"
			],
			[
				"postcode" => "2540",
				"suburb" => "PYREE",
				"state" => "NSW",
				"lat" => "-34.911669",
				"lon" => "150.684688"
			],
			[
				"postcode" => "2540",
				"suburb" => "SANCTUARY POINT",
				"state" => "NSW",
				"lat" => "-35.104131",
				"lon" => "150.626941"
			],
			[
				"postcode" => "2540",
				"suburb" => "ST GEORGES BASIN",
				"state" => "NSW",
				"lat" => "-35.090788",
				"lon" => "150.597815"
			],
			[
				"postcode" => "2540",
				"suburb" => "SUSSEX INLET",
				"state" => "NSW",
				"lat" => "-35.157009",
				"lon" => "150.596247"
			],
			[
				"postcode" => "2540",
				"suburb" => "SWANHAVEN",
				"state" => "NSW",
				"lat" => "-35.180764",
				"lon" => "150.574812"
			],
			[
				"postcode" => "2540",
				"suburb" => "TAPITALLEE",
				"state" => "NSW",
				"lat" => "-34.829514",
				"lon" => "150.540433"
			],
			[
				"postcode" => "2540",
				"suburb" => "TERARA",
				"state" => "NSW",
				"lat" => "-34.865447",
				"lon" => "150.627436"
			],
			[
				"postcode" => "2540",
				"suburb" => "TOMERONG",
				"state" => "NSW",
				"lat" => "-35.052034",
				"lon" => "150.587068"
			],
			[
				"postcode" => "2540",
				"suburb" => "TULLARWALLA",
				"state" => "NSW",
				"lat" => "-35.104092",
				"lon" => "150.512288"
			],
			[
				"postcode" => "2540",
				"suburb" => "TWELVE MILE PEG",
				"state" => "NSW",
				"lat" => "-35.126879",
				"lon" => "150.402145"
			],
			[
				"postcode" => "2540",
				"suburb" => "VINCENTIA",
				"state" => "NSW",
				"lat" => "-35.069537",
				"lon" => "150.675178"
			],
			[
				"postcode" => "2540",
				"suburb" => "WANDANDIAN",
				"state" => "NSW",
				"lat" => "-35.089066",
				"lon" => "150.509967"
			],
			[
				"postcode" => "2540",
				"suburb" => "WATERSLEIGH",
				"state" => "NSW",
				"lat" => "-34.856246",
				"lon" => "150.517965"
			],
			[
				"postcode" => "2540",
				"suburb" => "WOLLUMBOOLA",
				"state" => "NSW",
				"lat" => "-34.93968",
				"lon" => "150.705187"
			],
			[
				"postcode" => "2540",
				"suburb" => "WOOLLAMIA",
				"state" => "NSW",
				"lat" => "-35.013673",
				"lon" => "150.637612"
			],
			[
				"postcode" => "2540",
				"suburb" => "WORRIGEE",
				"state" => "NSW",
				"lat" => "-34.89037",
				"lon" => "150.626074"
			],
			[
				"postcode" => "2540",
				"suburb" => "WORROWING HEIGHTS",
				"state" => "NSW",
				"lat" => "-35.065515",
				"lon" => "150.639373"
			],
			[
				"postcode" => "2540",
				"suburb" => "WRIGHTS BEACH",
				"state" => "NSW",
				"lat" => "-35.112035",
				"lon" => "150.665252"
			],
			[
				"postcode" => "2540",
				"suburb" => "YALWAL",
				"state" => "NSW",
				"lat" => "-34.916934",
				"lon" => "150.424339"
			],
			[
				"postcode" => "2540",
				"suburb" => "YERRIYONG",
				"state" => "NSW",
				"lat" => "-34.961597",
				"lon" => "150.511939"
			],
			[
				"postcode" => "2541",
				"suburb" => "BANGALEE",
				"state" => "NSW",
				"lat" => "-34.843976",
				"lon" => "150.570381"
			],
			[
				"postcode" => "2541",
				"suburb" => "BOMADERRY",
				"state" => "NSW",
				"lat" => "-34.855412",
				"lon" => "150.608383"
			],
			[
				"postcode" => "2541",
				"suburb" => "NORTH NOWRA",
				"state" => "NSW",
				"lat" => "-34.860731",
				"lon" => "150.591467"
			],
			[
				"postcode" => "2541",
				"suburb" => "NOWRA",
				"state" => "NSW",
				"lat" => "-34.872698",
				"lon" => "150.60342"
			],
			[
				"postcode" => "2541",
				"suburb" => "NOWRA EAST",
				"state" => "NSW",
				"lat" => "-34.888371",
				"lon" => "150.610072"
			],
			[
				"postcode" => "2541",
				"suburb" => "NOWRA NORTH",
				"state" => "NSW",
				"lat" => "-34.860731",
				"lon" => "150.591467"
			],
			[
				"postcode" => "2541",
				"suburb" => "SOUTH NOWRA",
				"state" => "NSW",
				"lat" => "-34.898363",
				"lon" => "150.60221"
			],
			[
				"postcode" => "2541",
				"suburb" => "WEST NOWRA",
				"state" => "NSW",
				"lat" => "-34.892253",
				"lon" => "150.58593"
			],
			[
				"postcode" => "2545",
				"suburb" => "BELOWRA",
				"state" => "NSW",
				"lat" => "-36.148482",
				"lon" => "149.705058"
			],
			[
				"postcode" => "2545",
				"suburb" => "BODALLA",
				"state" => "NSW",
				"lat" => "-36.090909",
				"lon" => "150.051741"
			],
			[
				"postcode" => "2545",
				"suburb" => "CADGEE",
				"state" => "NSW",
				"lat" => "-36.146273",
				"lon" => "149.92127"
			],
			[
				"postcode" => "2545",
				"suburb" => "EUROBODALLA",
				"state" => "NSW",
				"lat" => "-36.141108",
				"lon" => "149.979087"
			],
			[
				"postcode" => "2545",
				"suburb" => "NERRIGUNDAH",
				"state" => "NSW",
				"lat" => "-36.118478",
				"lon" => "149.90113"
			],
			[
				"postcode" => "2545",
				"suburb" => "POTATO POINT",
				"state" => "NSW",
				"lat" => "-36.096051",
				"lon" => "150.136611"
			],
			[
				"postcode" => "2546",
				"suburb" => "AKOLELE",
				"state" => "NSW",
				"lat" => "-36.355798",
				"lon" => "150.07685"
			],
			[
				"postcode" => "2546",
				"suburb" => "BARRAGGA BAY",
				"state" => "NSW",
				"lat" => "-36.502628",
				"lon" => "150.053011"
			],
			[
				"postcode" => "2546",
				"suburb" => "BERMAGUI",
				"state" => "NSW",
				"lat" => "-36.422732",
				"lon" => "150.06439"
			],
			[
				"postcode" => "2546",
				"suburb" => "CENTRAL TILBA",
				"state" => "NSW",
				"lat" => "-36.311773",
				"lon" => "150.084817"
			],
			[
				"postcode" => "2546",
				"suburb" => "CORUNNA",
				"state" => "NSW",
				"lat" => "-36.290385",
				"lon" => "150.108612"
			],
			[
				"postcode" => "2546",
				"suburb" => "CUTTAGEE",
				"state" => "NSW",
				"lat" => "-36.492757",
				"lon" => "150.053495"
			],
			[
				"postcode" => "2546",
				"suburb" => "DALMENY",
				"state" => "NSW",
				"lat" => "-36.171034",
				"lon" => "150.131434"
			],
			[
				"postcode" => "2546",
				"suburb" => "DIGNAMS CREEK",
				"state" => "NSW",
				"lat" => "-36.347484",
				"lon" => "150.010185"
			],
			[
				"postcode" => "2546",
				"suburb" => "KIANGA",
				"state" => "NSW",
				"lat" => "-36.196069",
				"lon" => "150.131026"
			],
			[
				"postcode" => "2546",
				"suburb" => "MYSTERY BAY",
				"state" => "NSW",
				"lat" => "-36.299297",
				"lon" => "150.128542"
			],
			[
				"postcode" => "2546",
				"suburb" => "NAROOMA",
				"state" => "NSW",
				"lat" => "-36.218319",
				"lon" => "150.132246"
			],
			[
				"postcode" => "2546",
				"suburb" => "NORTH NAROOMA",
				"state" => "NSW",
				"lat" => "-36.202678",
				"lon" => "150.119086"
			],
			[
				"postcode" => "2546",
				"suburb" => "TILBA TILBA",
				"state" => "NSW",
				"lat" => "-36.324422",
				"lon" => "150.062667"
			],
			[
				"postcode" => "2546",
				"suburb" => "TINPOT",
				"state" => "NSW",
				"lat" => "-36.23167",
				"lon" => "149.882895"
			],
			[
				"postcode" => "2546",
				"suburb" => "WADBILLIGA",
				"state" => "NSW",
				"lat" => "-36.261874",
				"lon" => "149.647021"
			],
			[
				"postcode" => "2546",
				"suburb" => "WALLAGA LAKE",
				"state" => "NSW",
				"lat" => "-36.356673",
				"lon" => "150.066053"
			],
			[
				"postcode" => "2548",
				"suburb" => "BERRAMBOOL",
				"state" => "NSW",
				"lat" => "-36.8788",
				"lon" => "149.917402"
			],
			[
				"postcode" => "2548",
				"suburb" => "MERIMBULA",
				"state" => "NSW",
				"lat" => "-36.887762",
				"lon" => "149.910553"
			],
			[
				"postcode" => "2548",
				"suburb" => "TURA BEACH",
				"state" => "NSW",
				"lat" => "-36.86533",
				"lon" => "149.917714"
			],
			[
				"postcode" => "2548",
				"suburb" => "YELLOW PINCH",
				"state" => "NSW",
				"lat" => "-36.861012",
				"lon" => "149.839542"
			],
			[
				"postcode" => "2549",
				"suburb" => "BALD HILLS",
				"state" => "NSW",
				"lat" => "-36.912886",
				"lon" => "149.847662"
			],
			[
				"postcode" => "2549",
				"suburb" => "BROADWATER",
				"state" => "NSW",
				"lat" => "-36.982578",
				"lon" => "149.887264"
			],
			[
				"postcode" => "2549",
				"suburb" => "GREIGS FLAT",
				"state" => "NSW",
				"lat" => "-36.968353",
				"lon" => "149.866268"
			],
			[
				"postcode" => "2549",
				"suburb" => "LOCHIEL",
				"state" => "NSW",
				"lat" => "-36.921998",
				"lon" => "149.747092"
			],
			[
				"postcode" => "2549",
				"suburb" => "MILLINGANDI",
				"state" => "NSW",
				"lat" => "-36.872365",
				"lon" => "149.867994"
			],
			[
				"postcode" => "2549",
				"suburb" => "NETHERCOTE",
				"state" => "NSW",
				"lat" => "-37.01779",
				"lon" => "149.828723"
			],
			[
				"postcode" => "2549",
				"suburb" => "PAMBULA",
				"state" => "NSW",
				"lat" => "-36.929247",
				"lon" => "149.874618"
			],
			[
				"postcode" => "2549",
				"suburb" => "PAMBULA BEACH",
				"state" => "NSW",
				"lat" => "-36.939862",
				"lon" => "149.901907"
			],
			[
				"postcode" => "2549",
				"suburb" => "SOUTH PAMBULA",
				"state" => "NSW",
				"lat" => "-36.943447",
				"lon" => "149.862176"
			],
			[
				"postcode" => "2550",
				"suburb" => "ANGLEDALE",
				"state" => "NSW",
				"lat" => "-36.63575",
				"lon" => "149.857154"
			],
			[
				"postcode" => "2550",
				"suburb" => "BEGA",
				"state" => "NSW",
				"lat" => "-36.674262",
				"lon" => "149.84324"
			],
			[
				"postcode" => "2550",
				"suburb" => "BEMBOKA",
				"state" => "NSW",
				"lat" => "-36.629917",
				"lon" => "149.572964"
			],
			[
				"postcode" => "2550",
				"suburb" => "BLACK RANGE",
				"state" => "NSW",
				"lat" => "-36.724891",
				"lon" => "149.834693"
			],
			[
				"postcode" => "2550",
				"suburb" => "BOURNDA",
				"state" => "NSW",
				"lat" => "-36.836801",
				"lon" => "149.912998"
			],
			[
				"postcode" => "2550",
				"suburb" => "BROGO",
				"state" => "NSW",
				"lat" => "-36.570993",
				"lon" => "149.823508"
			],
			[
				"postcode" => "2550",
				"suburb" => "BUCKAJO",
				"state" => "NSW",
				"lat" => "-36.703339",
				"lon" => "149.758432"
			],
			[
				"postcode" => "2550",
				"suburb" => "BUNGA",
				"state" => "NSW",
				"lat" => "-36.537397",
				"lon" => "150.041639"
			],
			[
				"postcode" => "2550",
				"suburb" => "BURRAGATE",
				"state" => "NSW",
				"lat" => "-37.001083",
				"lon" => "149.628928"
			],
			[
				"postcode" => "2550",
				"suburb" => "CANDELO",
				"state" => "NSW",
				"lat" => "-36.767311",
				"lon" => "149.695188"
			],
			[
				"postcode" => "2550",
				"suburb" => "CHINNOCK",
				"state" => "NSW",
				"lat" => "-36.68983",
				"lon" => "149.939048"
			],
			[
				"postcode" => "2550",
				"suburb" => "COBARGO",
				"state" => "NSW",
				"lat" => "-36.38761",
				"lon" => "149.887772"
			],
			[
				"postcode" => "2550",
				"suburb" => "COOLAGOLITE",
				"state" => "NSW",
				"lat" => "-36.429324",
				"lon" => "149.926402"
			],
			[
				"postcode" => "2550",
				"suburb" => "COOLANGUBRA",
				"state" => "NSW",
				"lat" => "-37.024422",
				"lon" => "149.501594"
			],
			[
				"postcode" => "2550",
				"suburb" => "COOPERS GULLY",
				"state" => "NSW",
				"lat" => "-36.649434",
				"lon" => "149.795722"
			],
			[
				"postcode" => "2550",
				"suburb" => "DEVILS HOLE",
				"state" => "NSW",
				"lat" => "-36.873821",
				"lon" => "149.652802"
			],
			[
				"postcode" => "2550",
				"suburb" => "DOCTOR GEORGE MOUNTAIN",
				"state" => "NSW",
				"lat" => "-36.665809",
				"lon" => "149.892211"
			],
			[
				"postcode" => "2550",
				"suburb" => "FROGS HOLLOW",
				"state" => "NSW",
				"lat" => "-36.767935",
				"lon" => "149.814668"
			],
			[
				"postcode" => "2550",
				"suburb" => "GREENDALE",
				"state" => "NSW",
				"lat" => "-36.600111",
				"lon" => "149.852112"
			],
			[
				"postcode" => "2550",
				"suburb" => "JELLAT JELLAT",
				"state" => "NSW",
				"lat" => "-36.717577",
				"lon" => "149.893595"
			],
			[
				"postcode" => "2550",
				"suburb" => "KALARU",
				"state" => "NSW",
				"lat" => "-36.736047",
				"lon" => "149.939572"
			],
			[
				"postcode" => "2550",
				"suburb" => "KAMERUKA",
				"state" => "NSW",
				"lat" => "-36.74108",
				"lon" => "149.708726"
			],
			[
				"postcode" => "2550",
				"suburb" => "KANOONA",
				"state" => "NSW",
				"lat" => "-36.745803",
				"lon" => "149.779989"
			],
			[
				"postcode" => "2550",
				"suburb" => "KINGSWOOD",
				"state" => "NSW",
				"lat" => "-36.738556",
				"lon" => "149.81742"
			],
			[
				"postcode" => "2550",
				"suburb" => "MOGAREEKA",
				"state" => "NSW",
				"lat" => "-36.698431",
				"lon" => "149.975982"
			],
			[
				"postcode" => "2550",
				"suburb" => "MOGILLA",
				"state" => "NSW",
				"lat" => "-36.706181",
				"lon" => "149.562706"
			],
			[
				"postcode" => "2550",
				"suburb" => "MORANS CROSSING",
				"state" => "NSW",
				"lat" => "-36.663757",
				"lon" => "149.647067"
			],
			[
				"postcode" => "2550",
				"suburb" => "MUMBULLA MOUNTAIN",
				"state" => "NSW",
				"lat" => "-36.545445",
				"lon" => "149.864645"
			],
			[
				"postcode" => "2550",
				"suburb" => "MURRAH",
				"state" => "NSW",
				"lat" => "-36.512638",
				"lon" => "149.978253"
			],
			[
				"postcode" => "2550",
				"suburb" => "MYRTLE MOUNTAIN",
				"state" => "NSW",
				"lat" => "-36.860626",
				"lon" => "149.690231"
			],
			[
				"postcode" => "2550",
				"suburb" => "NELSON",
				"state" => "NSW",
				"lat" => "-36.675498",
				"lon" => "149.971179"
			],
			[
				"postcode" => "2550",
				"suburb" => "NEW BUILDINGS",
				"state" => "NSW",
				"lat" => "-36.947707",
				"lon" => "149.574758"
			],
			[
				"postcode" => "2550",
				"suburb" => "NUMBUGGA",
				"state" => "NSW",
				"lat" => "-36.652366",
				"lon" => "149.711811"
			],
			[
				"postcode" => "2550",
				"suburb" => "PERICOE",
				"state" => "NSW",
				"lat" => "-37.103305",
				"lon" => "149.59656"
			],
			[
				"postcode" => "2550",
				"suburb" => "QUAAMA",
				"state" => "NSW",
				"lat" => "-36.464379",
				"lon" => "149.87009"
			],
			[
				"postcode" => "2550",
				"suburb" => "REEDY SWAMP",
				"state" => "NSW",
				"lat" => "-36.698569",
				"lon" => "149.892016"
			],
			[
				"postcode" => "2550",
				"suburb" => "ROCKY HALL",
				"state" => "NSW",
				"lat" => "-36.913723",
				"lon" => "149.488005"
			],
			[
				"postcode" => "2550",
				"suburb" => "SOUTH WOLUMLA",
				"state" => "NSW",
				"lat" => "-36.821939",
				"lon" => "149.750881"
			],
			[
				"postcode" => "2550",
				"suburb" => "STONY CREEK",
				"state" => "NSW",
				"lat" => "-36.617312",
				"lon" => "149.801981"
			],
			[
				"postcode" => "2550",
				"suburb" => "TANJA",
				"state" => "NSW",
				"lat" => "-36.627881",
				"lon" => "149.933291"
			],
			[
				"postcode" => "2550",
				"suburb" => "TANTAWANGALO",
				"state" => "NSW",
				"lat" => "-36.79455",
				"lon" => "149.594037"
			],
			[
				"postcode" => "2550",
				"suburb" => "TARRAGANDA",
				"state" => "NSW",
				"lat" => "-36.667587",
				"lon" => "149.866664"
			],
			[
				"postcode" => "2550",
				"suburb" => "TATHRA",
				"state" => "NSW",
				"lat" => "-36.729728",
				"lon" => "149.985917"
			],
			[
				"postcode" => "2550",
				"suburb" => "TOOTHDALE",
				"state" => "NSW",
				"lat" => "-36.7906",
				"lon" => "149.764434"
			],
			[
				"postcode" => "2550",
				"suburb" => "TOWAMBA",
				"state" => "NSW",
				"lat" => "-37.087978",
				"lon" => "149.652672"
			],
			[
				"postcode" => "2550",
				"suburb" => "VERONA",
				"state" => "NSW",
				"lat" => "-36.465045",
				"lon" => "149.8207"
			],
			[
				"postcode" => "2550",
				"suburb" => "WALLAGOOT",
				"state" => "NSW",
				"lat" => "-36.788248",
				"lon" => "149.917603"
			],
			[
				"postcode" => "2550",
				"suburb" => "WANDELLA",
				"state" => "NSW",
				"lat" => "-36.299399",
				"lon" => "149.848665"
			],
			[
				"postcode" => "2550",
				"suburb" => "WAPENGO",
				"state" => "NSW",
				"lat" => "-36.594545",
				"lon" => "150.018276"
			],
			[
				"postcode" => "2550",
				"suburb" => "WOLUMLA",
				"state" => "NSW",
				"lat" => "-36.831995",
				"lon" => "149.811442"
			],
			[
				"postcode" => "2550",
				"suburb" => "YAMBULLA",
				"state" => "NSW",
				"lat" => "-37.202549",
				"lon" => "149.603593"
			],
			[
				"postcode" => "2550",
				"suburb" => "YANKEES CREEK",
				"state" => "NSW",
				"lat" => "-36.488027",
				"lon" => "149.544864"
			],
			[
				"postcode" => "2550",
				"suburb" => "YOWRIE",
				"state" => "NSW",
				"lat" => "-36.297586",
				"lon" => "149.717828"
			],
			[
				"postcode" => "2551",
				"suburb" => "BOYDTOWN",
				"state" => "NSW",
				"lat" => "-37.10475",
				"lon" => "149.879014"
			],
			[
				"postcode" => "2551",
				"suburb" => "EDEN",
				"state" => "NSW",
				"lat" => "-37.06319",
				"lon" => "149.903702"
			],
			[
				"postcode" => "2551",
				"suburb" => "EDROM",
				"state" => "NSW",
				"lat" => "-37.102459",
				"lon" => "149.928892"
			],
			[
				"postcode" => "2551",
				"suburb" => "GREEN CAPE",
				"state" => "NSW",
				"lat" => "-37.260999",
				"lon" => "150.049332"
			],
			[
				"postcode" => "2551",
				"suburb" => "KIAH",
				"state" => "NSW",
				"lat" => "-37.149723",
				"lon" => "149.856899"
			],
			[
				"postcode" => "2551",
				"suburb" => "NADGEE",
				"state" => "NSW",
				"lat" => "-37.333007",
				"lon" => "149.805836"
			],
			[
				"postcode" => "2551",
				"suburb" => "NARRABARBA",
				"state" => "NSW",
				"lat" => "-37.246066",
				"lon" => "149.819973"
			],
			[
				"postcode" => "2551",
				"suburb" => "NULLICA",
				"state" => "NSW",
				"lat" => "-37.092825",
				"lon" => "149.839036"
			],
			[
				"postcode" => "2551",
				"suburb" => "NUNGATTA",
				"state" => "NSW",
				"lat" => "-37.153431",
				"lon" => "149.386096"
			],
			[
				"postcode" => "2551",
				"suburb" => "TIMBILLICA",
				"state" => "NSW",
				"lat" => "-37.358462",
				"lon" => "149.722269"
			],
			[
				"postcode" => "2551",
				"suburb" => "WONBOYN",
				"state" => "NSW",
				"lat" => "-37.251046",
				"lon" => "149.914953"
			],
			[
				"postcode" => "2551",
				"suburb" => "WONBOYN LAKE",
				"state" => "NSW",
				"lat" => "-37.251046",
				"lon" => "149.914953"
			],
			[
				"postcode" => "2551",
				"suburb" => "WONBOYN NORTH",
				"state" => "NSW",
				"lat" => "-37.23331",
				"lon" => "149.911196"
			],
			[
				"postcode" => "2555",
				"suburb" => "BADGERYS CREEK",
				"state" => "NSW",
				"lat" => "-33.883376",
				"lon" => "150.741351"
			],
			[
				"postcode" => "2556",
				"suburb" => "BRINGELLY",
				"state" => "NSW",
				"lat" => "-33.945707",
				"lon" => "150.725207"
			],
			[
				"postcode" => "2557",
				"suburb" => "CATHERINE FIELD",
				"state" => "NSW",
				"lat" => "-33.993545",
				"lon" => "150.774858"
			],
			[
				"postcode" => "2557",
				"suburb" => "ROSSMORE",
				"state" => "NSW",
				"lat" => "-33.945965",
				"lon" => "150.772763"
			],
			[
				"postcode" => "2558",
				"suburb" => "EAGLE VALE",
				"state" => "NSW",
				"lat" => "-34.037882",
				"lon" => "150.814153"
			],
			[
				"postcode" => "2558",
				"suburb" => "ESCHOL PARK",
				"state" => "NSW",
				"lat" => "-34.031357",
				"lon" => "150.80968"
			],
			[
				"postcode" => "2558",
				"suburb" => "KEARNS",
				"state" => "NSW",
				"lat" => "-34.021321",
				"lon" => "150.803211"
			],
			[
				"postcode" => "2559",
				"suburb" => "BLAIRMOUNT",
				"state" => "NSW",
				"lat" => "-34.049485",
				"lon" => "150.799611"
			],
			[
				"postcode" => "2559",
				"suburb" => "CLAYMORE",
				"state" => "NSW",
				"lat" => "-34.045524",
				"lon" => "150.810024"
			],
			[
				"postcode" => "2560",
				"suburb" => "AIRDS",
				"state" => "NSW",
				"lat" => "-34.084468",
				"lon" => "150.829041"
			],
			[
				"postcode" => "2560",
				"suburb" => "AMBARVALE",
				"state" => "NSW",
				"lat" => "-34.080467",
				"lon" => "150.803644"
			],
			[
				"postcode" => "2560",
				"suburb" => "APPIN",
				"state" => "NSW",
				"lat" => "-34.200891",
				"lon" => "150.787479"
			],
			[
				"postcode" => "2560",
				"suburb" => "BLAIR ATHOL",
				"state" => "NSW",
				"lat" => "-34.063835",
				"lon" => "150.806007"
			],
			[
				"postcode" => "2560",
				"suburb" => "BRADBURY",
				"state" => "NSW",
				"lat" => "-34.086006",
				"lon" => "150.814016"
			],
			[
				"postcode" => "2560",
				"suburb" => "CAMPBELLTOWN",
				"state" => "NSW",
				"lat" => "-34.067441",
				"lon" => "150.812522"
			],
			[
				"postcode" => "2560",
				"suburb" => "CAMPBELLTOWN NORTH",
				"state" => "NSW",
				"lat" => "-34.06584",
				"lon" => "150.82489"
			],
			[
				"postcode" => "2560",
				"suburb" => "CATARACT",
				"state" => "NSW",
				"lat" => "-34.261883",
				"lon" => "150.804049"
			],
			[
				"postcode" => "2560",
				"suburb" => "ENGLORIE PARK",
				"state" => "NSW",
				"lat" => "-34.082052",
				"lon" => "150.795131"
			],
			[
				"postcode" => "2560",
				"suburb" => "GILEAD",
				"state" => "NSW",
				"lat" => "-34.107035",
				"lon" => "150.761815"
			],
			[
				"postcode" => "2560",
				"suburb" => "GLEN ALPINE",
				"state" => "NSW",
				"lat" => "-34.084184",
				"lon" => "150.775275"
			],
			[
				"postcode" => "2560",
				"suburb" => "KENTLYN",
				"state" => "NSW",
				"lat" => "-34.073171",
				"lon" => "150.85743"
			],
			[
				"postcode" => "2560",
				"suburb" => "LEUMEAH",
				"state" => "NSW",
				"lat" => "-34.052285",
				"lon" => "150.833396"
			],
			[
				"postcode" => "2560",
				"suburb" => "MACARTHUR SQUARE",
				"state" => "NSW",
				"lat" => "-34.076256",
				"lon" => "150.798055"
			],
			[
				"postcode" => "2560",
				"suburb" => "ROSEMEADOW",
				"state" => "NSW",
				"lat" => "-34.101795",
				"lon" => "150.800106"
			],
			[
				"postcode" => "2560",
				"suburb" => "RUSE",
				"state" => "NSW",
				"lat" => "-34.069283",
				"lon" => "150.844069"
			],
			[
				"postcode" => "2560",
				"suburb" => "ST HELENS PARK",
				"state" => "NSW",
				"lat" => "-34.112264",
				"lon" => "150.798121"
			],
			[
				"postcode" => "2560",
				"suburb" => "WEDDERBURN",
				"state" => "NSW",
				"lat" => "-34.127555",
				"lon" => "150.812698"
			],
			[
				"postcode" => "2560",
				"suburb" => "WOODBINE",
				"state" => "NSW",
				"lat" => "-34.049892",
				"lon" => "150.818872"
			],
			[
				"postcode" => "2563",
				"suburb" => "MENANGLE PARK",
				"state" => "NSW",
				"lat" => "-34.100121",
				"lon" => "150.757016"
			],
			[
				"postcode" => "2564",
				"suburb" => "GLENQUARIE",
				"state" => "NSW",
				"lat" => "-33.986032",
				"lon" => "150.89171"
			],
			[
				"postcode" => "2564",
				"suburb" => "LONG POINT",
				"state" => "NSW",
				"lat" => "-34.016437",
				"lon" => "150.898579"
			],
			[
				"postcode" => "2564",
				"suburb" => "MACQUARIE FIELDS",
				"state" => "NSW",
				"lat" => "-33.989471",
				"lon" => "150.882626"
			],
			[
				"postcode" => "2565",
				"suburb" => "DENHAM COURT",
				"state" => "NSW",
				"lat" => "-33.990081",
				"lon" => "150.844653"
			],
			[
				"postcode" => "2565",
				"suburb" => "INGLEBURN",
				"state" => "NSW",
				"lat" => "-33.998718",
				"lon" => "150.866344"
			],
			[
				"postcode" => "2565",
				"suburb" => "MACQUARIE LINKS",
				"state" => "NSW",
				"lat" => "-33.982185",
				"lon" => "150.867561"
			],
			[
				"postcode" => "2566",
				"suburb" => "BOW BOWING",
				"state" => "NSW",
				"lat" => "-34.015342",
				"lon" => "150.83682"
			],
			[
				"postcode" => "2566",
				"suburb" => "MINTO",
				"state" => "NSW",
				"lat" => "-34.032022",
				"lon" => "150.848208"
			],
			[
				"postcode" => "2566",
				"suburb" => "MINTO HEIGHTS",
				"state" => "NSW",
				"lat" => "-34.037543",
				"lon" => "150.871353"
			],
			[
				"postcode" => "2566",
				"suburb" => "RABY",
				"state" => "NSW",
				"lat" => "-34.021071",
				"lon" => "150.811347"
			],
			[
				"postcode" => "2566",
				"suburb" => "VARROVILLE",
				"state" => "NSW",
				"lat" => "-34.010255",
				"lon" => "150.822979"
			],
			[
				"postcode" => "2567",
				"suburb" => "CURRANS HILL",
				"state" => "NSW",
				"lat" => "-34.045179",
				"lon" => "150.764007"
			],
			[
				"postcode" => "2567",
				"suburb" => "HARRINGTON PARK",
				"state" => "NSW",
				"lat" => "-34.023239",
				"lon" => "150.742232"
			],
			[
				"postcode" => "2567",
				"suburb" => "MOUNT ANNAN",
				"state" => "NSW",
				"lat" => "-34.054864",
				"lon" => "150.764158"
			],
			[
				"postcode" => "2567",
				"suburb" => "NARELLAN",
				"state" => "NSW",
				"lat" => "-34.040524",
				"lon" => "150.735615"
			],
			[
				"postcode" => "2567",
				"suburb" => "NARELLAN VALE",
				"state" => "NSW",
				"lat" => "-34.055271",
				"lon" => "150.74408"
			],
			[
				"postcode" => "2567",
				"suburb" => "SMEATON GRANGE",
				"state" => "NSW",
				"lat" => "-34.039104",
				"lon" => "150.756685"
			],
			[
				"postcode" => "2568",
				"suburb" => "MENANGLE",
				"state" => "NSW",
				"lat" => "-34.108654",
				"lon" => "150.749149"
			],
			[
				"postcode" => "2569",
				"suburb" => "DOUGLAS PARK",
				"state" => "NSW",
				"lat" => "-34.193696",
				"lon" => "150.712878"
			],
			[
				"postcode" => "2570",
				"suburb" => "BELIMBLA PARK",
				"state" => "NSW",
				"lat" => "-34.075888",
				"lon" => "150.543085"
			],
			[
				"postcode" => "2570",
				"suburb" => "BICKLEY VALE",
				"state" => "NSW",
				"lat" => "-34.070905",
				"lon" => "150.666238"
			],
			[
				"postcode" => "2570",
				"suburb" => "BROWNLOW HILL",
				"state" => "NSW",
				"lat" => "-34.034824",
				"lon" => "150.657016"
			],
			[
				"postcode" => "2570",
				"suburb" => "CAMDEN",
				"state" => "NSW",
				"lat" => "-34.054599",
				"lon" => "150.695678"
			],
			[
				"postcode" => "2570",
				"suburb" => "CAMDEN PARK",
				"state" => "NSW",
				"lat" => "-34.088673",
				"lon" => "150.721836"
			],
			[
				"postcode" => "2570",
				"suburb" => "CAMDEN SOUTH",
				"state" => "NSW",
				"lat" => "-34.08748",
				"lon" => "150.695074"
			],
			[
				"postcode" => "2570",
				"suburb" => "CAWDOR",
				"state" => "NSW",
				"lat" => "-34.108691",
				"lon" => "150.671985"
			],
			[
				"postcode" => "2570",
				"suburb" => "COBBITTY",
				"state" => "NSW",
				"lat" => "-34.015874",
				"lon" => "150.691029"
			],
			[
				"postcode" => "2570",
				"suburb" => "ELDERSLIE",
				"state" => "NSW",
				"lat" => "-34.059038",
				"lon" => "150.711427"
			],
			[
				"postcode" => "2570",
				"suburb" => "ELLIS LANE",
				"state" => "NSW",
				"lat" => "-34.040061",
				"lon" => "150.672006"
			],
			[
				"postcode" => "2570",
				"suburb" => "GLENMORE",
				"state" => "NSW",
				"lat" => "-34.063271",
				"lon" => "150.597678"
			],
			[
				"postcode" => "2570",
				"suburb" => "GRASMERE",
				"state" => "NSW",
				"lat" => "-34.056293",
				"lon" => "150.67317"
			],
			[
				"postcode" => "2570",
				"suburb" => "KIRKHAM",
				"state" => "NSW",
				"lat" => "-34.038536",
				"lon" => "150.71674"
			],
			[
				"postcode" => "2570",
				"suburb" => "MOUNT HUNTER",
				"state" => "NSW",
				"lat" => "-34.071248",
				"lon" => "150.641382"
			],
			[
				"postcode" => "2570",
				"suburb" => "NATTAI",
				"state" => "NSW",
				"lat" => "-34.068935",
				"lon" => "150.44568"
			],
			[
				"postcode" => "2570",
				"suburb" => "OAKDALE",
				"state" => "NSW",
				"lat" => "-34.078174",
				"lon" => "150.513639"
			],
			[
				"postcode" => "2570",
				"suburb" => "ORAN PARK",
				"state" => "NSW",
				"lat" => "-34.006941",
				"lon" => "150.723908"
			],
			[
				"postcode" => "2570",
				"suburb" => "ORANGEVILLE",
				"state" => "NSW",
				"lat" => "-34.04279",
				"lon" => "150.573125"
			],
			[
				"postcode" => "2570",
				"suburb" => "SPRING FARM",
				"state" => "NSW",
				"lat" => "-34.070247",
				"lon" => "150.727716"
			],
			[
				"postcode" => "2570",
				"suburb" => "THE OAKS",
				"state" => "NSW",
				"lat" => "-34.076873",
				"lon" => "150.571086"
			],
			[
				"postcode" => "2570",
				"suburb" => "THERESA PARK",
				"state" => "NSW",
				"lat" => "-34.007922",
				"lon" => "150.639915"
			],
			[
				"postcode" => "2570",
				"suburb" => "WEROMBI",
				"state" => "NSW",
				"lat" => "-33.988918",
				"lon" => "150.57174"
			],
			[
				"postcode" => "2571",
				"suburb" => "BALMORAL",
				"state" => "NSW",
				"lat" => "-34.294422",
				"lon" => "150.525259"
			],
			[
				"postcode" => "2571",
				"suburb" => "BUXTON",
				"state" => "NSW",
				"lat" => "-34.254368",
				"lon" => "150.533907"
			],
			[
				"postcode" => "2571",
				"suburb" => "COURIDJAH",
				"state" => "NSW",
				"lat" => "-34.234218",
				"lon" => "150.547569"
			],
			[
				"postcode" => "2571",
				"suburb" => "MALDON",
				"state" => "NSW",
				"lat" => "-34.194502",
				"lon" => "150.632327"
			],
			[
				"postcode" => "2571",
				"suburb" => "MOWBRAY PARK",
				"state" => "NSW",
				"lat" => "-34.157496",
				"lon" => "150.549363"
			],
			[
				"postcode" => "2571",
				"suburb" => "PICTON",
				"state" => "NSW",
				"lat" => "-34.185524",
				"lon" => "150.606454"
			],
			[
				"postcode" => "2571",
				"suburb" => "RAZORBACK",
				"state" => "NSW",
				"lat" => "-34.136585",
				"lon" => "150.665604"
			],
			[
				"postcode" => "2571",
				"suburb" => "WILTON",
				"state" => "NSW",
				"lat" => "-34.240434",
				"lon" => "150.696426"
			],
			[
				"postcode" => "2572",
				"suburb" => "LAKESLAND",
				"state" => "NSW",
				"lat" => "-34.18087",
				"lon" => "150.526834"
			],
			[
				"postcode" => "2572",
				"suburb" => "THIRLMERE",
				"state" => "NSW",
				"lat" => "-34.204088",
				"lon" => "150.571102"
			],
			[
				"postcode" => "2573",
				"suburb" => "TAHMOOR",
				"state" => "NSW",
				"lat" => "-34.22291",
				"lon" => "150.593447"
			],
			[
				"postcode" => "2574",
				"suburb" => "AVON",
				"state" => "NSW",
				"lat" => "-34.352071",
				"lon" => "150.634745"
			],
			[
				"postcode" => "2574",
				"suburb" => "BARGO",
				"state" => "NSW",
				"lat" => "-34.289443",
				"lon" => "150.580103"
			],
			[
				"postcode" => "2574",
				"suburb" => "PHEASANTS NEST",
				"state" => "NSW",
				"lat" => "-34.255973",
				"lon" => "150.635599"
			],
			[
				"postcode" => "2574",
				"suburb" => "YANDERRA",
				"state" => "NSW",
				"lat" => "-34.324175",
				"lon" => "150.569254"
			],
			[
				"postcode" => "2575",
				"suburb" => "ALPINE",
				"state" => "NSW",
				"lat" => "-34.409517",
				"lon" => "150.523957"
			],
			[
				"postcode" => "2575",
				"suburb" => "AYLMERTON",
				"state" => "NSW",
				"lat" => "-34.419069",
				"lon" => "150.492737"
			],
			[
				"postcode" => "2575",
				"suburb" => "BRAEMAR",
				"state" => "NSW",
				"lat" => "-34.430571",
				"lon" => "150.482931"
			],
			[
				"postcode" => "2575",
				"suburb" => "BULLIO",
				"state" => "NSW",
				"lat" => "-34.344617",
				"lon" => "150.168638"
			],
			[
				"postcode" => "2575",
				"suburb" => "COLO VALE",
				"state" => "NSW",
				"lat" => "-34.400134",
				"lon" => "150.487969"
			],
			[
				"postcode" => "2575",
				"suburb" => "HIGH RANGE",
				"state" => "NSW",
				"lat" => "-34.373716",
				"lon" => "150.297876"
			],
			[
				"postcode" => "2575",
				"suburb" => "HILL TOP",
				"state" => "NSW",
				"lat" => "-34.356278",
				"lon" => "150.494373"
			],
			[
				"postcode" => "2575",
				"suburb" => "JOADJA",
				"state" => "NSW",
				"lat" => "-34.421009",
				"lon" => "150.220396"
			],
			[
				"postcode" => "2575",
				"suburb" => "MANDEMAR",
				"state" => "NSW",
				"lat" => "-34.427052",
				"lon" => "150.281726"
			],
			[
				"postcode" => "2575",
				"suburb" => "MITTAGONG",
				"state" => "NSW",
				"lat" => "-34.450856",
				"lon" => "150.448788"
			],
			[
				"postcode" => "2575",
				"suburb" => "MOUNT LINDSEY",
				"state" => "NSW",
				"lat" => "-34.500293",
				"lon" => "150.564361"
			],
			[
				"postcode" => "2575",
				"suburb" => "WATTLE RIDGE",
				"state" => "NSW",
				"lat" => "-34.221773",
				"lon" => "150.352031"
			],
			[
				"postcode" => "2575",
				"suburb" => "WELBY",
				"state" => "NSW",
				"lat" => "-34.439533",
				"lon" => "150.428081"
			],
			[
				"postcode" => "2575",
				"suburb" => "WILLOW VALE",
				"state" => "NSW",
				"lat" => "-34.436392",
				"lon" => "150.468941"
			],
			[
				"postcode" => "2575",
				"suburb" => "WOODLANDS",
				"state" => "NSW",
				"lat" => "-34.422185",
				"lon" => "150.383214"
			],
			[
				"postcode" => "2575",
				"suburb" => "YERRINBOOL",
				"state" => "NSW",
				"lat" => "-34.375908",
				"lon" => "150.538132"
			],
			[
				"postcode" => "2576",
				"suburb" => "BONG BONG",
				"state" => "NSW",
				"lat" => "-34.537116",
				"lon" => "150.390855"
			],
			[
				"postcode" => "2576",
				"suburb" => "BOWRAL",
				"state" => "NSW",
				"lat" => "-34.4778",
				"lon" => "150.418086"
			],
			[
				"postcode" => "2576",
				"suburb" => "BURRADOO",
				"state" => "NSW",
				"lat" => "-34.506395",
				"lon" => "150.404854"
			],
			[
				"postcode" => "2576",
				"suburb" => "EAST BOWRAL",
				"state" => "NSW",
				"lat" => "-34.501493",
				"lon" => "150.449304"
			],
			[
				"postcode" => "2576",
				"suburb" => "EAST KANGALOON",
				"state" => "NSW",
				"lat" => "-34.526695",
				"lon" => "150.610248"
			],
			[
				"postcode" => "2576",
				"suburb" => "GLENQUARRY",
				"state" => "NSW",
				"lat" => "-34.522941",
				"lon" => "150.490532"
			],
			[
				"postcode" => "2576",
				"suburb" => "KANGALOON",
				"state" => "NSW",
				"lat" => "-34.553366",
				"lon" => "150.533848"
			],
			[
				"postcode" => "2577",
				"suburb" => "AVOCA",
				"state" => "NSW",
				"lat" => "-34.613522",
				"lon" => "150.479323"
			],
			[
				"postcode" => "2577",
				"suburb" => "BANGADILLY",
				"state" => "NSW",
				"lat" => "-34.436829",
				"lon" => "150.135301"
			],
			[
				"postcode" => "2577",
				"suburb" => "BARREN GROUNDS",
				"state" => "NSW",
				"lat" => "-34.671506",
				"lon" => "150.711828"
			],
			[
				"postcode" => "2577",
				"suburb" => "BARRENGARRY",
				"state" => "NSW",
				"lat" => "-34.720683",
				"lon" => "150.523543"
			],
			[
				"postcode" => "2577",
				"suburb" => "BEAUMONT",
				"state" => "NSW",
				"lat" => "-34.781805",
				"lon" => "150.561629"
			],
			[
				"postcode" => "2577",
				"suburb" => "BELANGLO",
				"state" => "NSW",
				"lat" => "-34.530981",
				"lon" => "150.260212"
			],
			[
				"postcode" => "2577",
				"suburb" => "BERRIMA",
				"state" => "NSW",
				"lat" => "-34.489644",
				"lon" => "150.335816"
			],
			[
				"postcode" => "2577",
				"suburb" => "BURRAWANG",
				"state" => "NSW",
				"lat" => "-34.593302",
				"lon" => "150.518264"
			],
			[
				"postcode" => "2577",
				"suburb" => "CALWALLA",
				"state" => "NSW",
				"lat" => "-34.567326",
				"lon" => "150.478036"
			],
			[
				"postcode" => "2577",
				"suburb" => "CANYONLEIGH",
				"state" => "NSW",
				"lat" => "-34.588633",
				"lon" => "150.118763"
			],
			[
				"postcode" => "2577",
				"suburb" => "CARRINGTON FALLS",
				"state" => "NSW",
				"lat" => "-34.632892",
				"lon" => "150.660769"
			],
			[
				"postcode" => "2577",
				"suburb" => "FITZROY FALLS",
				"state" => "NSW",
				"lat" => "-34.640976",
				"lon" => "150.478478"
			],
			[
				"postcode" => "2577",
				"suburb" => "KANGAROO VALLEY",
				"state" => "NSW",
				"lat" => "-34.737826",
				"lon" => "150.536215"
			],
			[
				"postcode" => "2577",
				"suburb" => "KNIGHTS HILL",
				"state" => "NSW",
				"lat" => "-34.62445",
				"lon" => "150.700784"
			],
			[
				"postcode" => "2577",
				"suburb" => "MACQUARIE PASS",
				"state" => "NSW",
				"lat" => "-34.5655",
				"lon" => "150.65745"
			],
			[
				"postcode" => "2577",
				"suburb" => "MANCHESTER SQUARE",
				"state" => "NSW",
				"lat" => "-34.601259",
				"lon" => "150.393211"
			],
			[
				"postcode" => "2577",
				"suburb" => "MEDWAY",
				"state" => "NSW",
				"lat" => "-34.495618",
				"lon" => "150.297246"
			],
			[
				"postcode" => "2577",
				"suburb" => "MERYLA",
				"state" => "NSW",
				"lat" => "-34.642031",
				"lon" => "150.402224"
			],
			[
				"postcode" => "2577",
				"suburb" => "MOSS VALE",
				"state" => "NSW",
				"lat" => "-34.547608",
				"lon" => "150.373096"
			],
			[
				"postcode" => "2577",
				"suburb" => "MOUNT MURRAY",
				"state" => "NSW",
				"lat" => "-34.546414",
				"lon" => "150.629446"
			],
			[
				"postcode" => "2577",
				"suburb" => "MYRA VALE",
				"state" => "NSW",
				"lat" => "-34.644999",
				"lon" => "150.511403"
			],
			[
				"postcode" => "2577",
				"suburb" => "NEW BERRIMA",
				"state" => "NSW",
				"lat" => "-34.504395",
				"lon" => "150.332394"
			],
			[
				"postcode" => "2577",
				"suburb" => "PADDYS RIVER",
				"state" => "NSW",
				"lat" => "-34.623658",
				"lon" => "150.100068"
			],
			[
				"postcode" => "2577",
				"suburb" => "PHEASANT GROUND",
				"state" => "NSW",
				"lat" => "-34.610663",
				"lon" => "150.666013"
			],
			[
				"postcode" => "2577",
				"suburb" => "ROBERTSON",
				"state" => "NSW",
				"lat" => "-34.589237",
				"lon" => "150.596418"
			],
			[
				"postcode" => "2577",
				"suburb" => "SUTTON FOREST",
				"state" => "NSW",
				"lat" => "-34.568289",
				"lon" => "150.321036"
			],
			[
				"postcode" => "2577",
				"suburb" => "UPPER KANGAROO RIVER",
				"state" => "NSW",
				"lat" => "-34.686553",
				"lon" => "150.60052"
			],
			[
				"postcode" => "2577",
				"suburb" => "UPPER KANGAROO VALLEY",
				"state" => "NSW",
				"lat" => "-34.651206",
				"lon" => "150.603413"
			],
			[
				"postcode" => "2577",
				"suburb" => "WERAI",
				"state" => "NSW",
				"lat" => "-34.594345",
				"lon" => "150.344221"
			],
			[
				"postcode" => "2577",
				"suburb" => "WILDES MEADOW",
				"state" => "NSW",
				"lat" => "-34.618189",
				"lon" => "150.530044"
			],
			[
				"postcode" => "2577",
				"suburb" => "YARRUNGA",
				"state" => "NSW",
				"lat" => "-34.590675",
				"lon" => "150.439521"
			],
			[
				"postcode" => "2578",
				"suburb" => "BUNDANOON",
				"state" => "NSW",
				"lat" => "-34.632598",
				"lon" => "150.321575"
			],
			[
				"postcode" => "2579",
				"suburb" => "BIG HILL",
				"state" => "NSW",
				"lat" => "-34.562935",
				"lon" => "149.987083"
			],
			[
				"postcode" => "2579",
				"suburb" => "BRAYTON",
				"state" => "NSW",
				"lat" => "-34.647901",
				"lon" => "149.964356"
			],
			[
				"postcode" => "2579",
				"suburb" => "EXETER",
				"state" => "NSW",
				"lat" => "-34.613161",
				"lon" => "150.317392"
			],
			[
				"postcode" => "2579",
				"suburb" => "MARULAN",
				"state" => "NSW",
				"lat" => "-34.711996",
				"lon" => "150.005978"
			],
			[
				"postcode" => "2579",
				"suburb" => "MARULAN SOUTH",
				"state" => "NSW",
				"lat" => "-34.76026",
				"lon" => "150.03039"
			],
			[
				"postcode" => "2579",
				"suburb" => "PENROSE",
				"state" => "NSW",
				"lat" => "-34.670072",
				"lon" => "150.228512"
			],
			[
				"postcode" => "2579",
				"suburb" => "TALLONG",
				"state" => "NSW",
				"lat" => "-34.718548",
				"lon" => "150.083071"
			],
			[
				"postcode" => "2579",
				"suburb" => "WINGELLO",
				"state" => "NSW",
				"lat" => "-34.691726",
				"lon" => "150.15675"
			],
			[
				"postcode" => "2580",
				"suburb" => "BANNABY",
				"state" => "NSW",
				"lat" => "-34.439785",
				"lon" => "149.961474"
			],
			[
				"postcode" => "2580",
				"suburb" => "BANNISTER",
				"state" => "NSW",
				"lat" => "-34.595404",
				"lon" => "149.490386"
			],
			[
				"postcode" => "2580",
				"suburb" => "BRISBANE GROVE",
				"state" => "NSW",
				"lat" => "-34.786689",
				"lon" => "149.702842"
			],
			[
				"postcode" => "2580",
				"suburb" => "BUNGONIA",
				"state" => "NSW",
				"lat" => "-34.829239",
				"lon" => "149.869192"
			],
			[
				"postcode" => "2580",
				"suburb" => "CURRAWANG",
				"state" => "NSW",
				"lat" => "-34.984542",
				"lon" => "149.476481"
			],
			[
				"postcode" => "2580",
				"suburb" => "GOLSPIE",
				"state" => "NSW",
				"lat" => "-34.290845",
				"lon" => "149.662984"
			],
			[
				"postcode" => "2580",
				"suburb" => "GOULBURN",
				"state" => "NSW",
				"lat" => "-34.75535",
				"lon" => "149.717816"
			],
			[
				"postcode" => "2580",
				"suburb" => "GOULBURN NORTH",
				"state" => "NSW",
				"lat" => "-34.747561",
				"lon" => "149.748917"
			],
			[
				"postcode" => "2580",
				"suburb" => "GREENWICH PARK",
				"state" => "NSW",
				"lat" => "-34.625181",
				"lon" => "149.906755"
			],
			[
				"postcode" => "2580",
				"suburb" => "GUNDARY",
				"state" => "NSW",
				"lat" => "-34.815321",
				"lon" => "149.787114"
			],
			[
				"postcode" => "2580",
				"suburb" => "JERRONG",
				"state" => "NSW",
				"lat" => "-34.156028",
				"lon" => "149.86564"
			],
			[
				"postcode" => "2580",
				"suburb" => "KINGSDALE",
				"state" => "NSW",
				"lat" => "-34.663354",
				"lon" => "149.661163"
			],
			[
				"postcode" => "2580",
				"suburb" => "LAKE BATHURST",
				"state" => "NSW",
				"lat" => "-35.012657",
				"lon" => "149.714504"
			],
			[
				"postcode" => "2580",
				"suburb" => "LEIGHWOOD",
				"state" => "NSW",
				"lat" => "-34.222442",
				"lon" => "149.643913"
			],
			[
				"postcode" => "2580",
				"suburb" => "MAYFIELD",
				"state" => "NSW",
				"lat" => "-35.204371",
				"lon" => "149.791055"
			],
			[
				"postcode" => "2580",
				"suburb" => "MCALISTER",
				"state" => "NSW",
				"lat" => "-34.446464",
				"lon" => "149.56561"
			],
			[
				"postcode" => "2580",
				"suburb" => "MIDDLE ARM",
				"state" => "NSW",
				"lat" => "-34.539675",
				"lon" => "149.741673"
			],
			[
				"postcode" => "2580",
				"suburb" => "MOUNT FAIRY",
				"state" => "NSW",
				"lat" => "-35.166753",
				"lon" => "149.59895"
			],
			[
				"postcode" => "2580",
				"suburb" => "MOUNT RAE",
				"state" => "NSW",
				"lat" => "-34.447921",
				"lon" => "149.718712"
			],
			[
				"postcode" => "2580",
				"suburb" => "MUMMEL",
				"state" => "NSW",
				"lat" => "-34.688445",
				"lon" => "149.593517"
			],
			[
				"postcode" => "2580",
				"suburb" => "PARKESBOURNE",
				"state" => "NSW",
				"lat" => "-34.761895",
				"lon" => "149.521444"
			],
			[
				"postcode" => "2580",
				"suburb" => "QUIALIGO",
				"state" => "NSW",
				"lat" => "-34.929309",
				"lon" => "149.743155"
			],
			[
				"postcode" => "2580",
				"suburb" => "ROSLYN",
				"state" => "NSW",
				"lat" => "-34.502905",
				"lon" => "149.6075"
			],
			[
				"postcode" => "2580",
				"suburb" => "RUN-O-WATERS",
				"state" => "NSW",
				"lat" => "-34.770431",
				"lon" => "149.671221"
			],
			[
				"postcode" => "2580",
				"suburb" => "TARAGO",
				"state" => "NSW",
				"lat" => "-35.084503",
				"lon" => "149.628735"
			],
			[
				"postcode" => "2580",
				"suburb" => "TARALGA",
				"state" => "NSW",
				"lat" => "-34.405567",
				"lon" => "149.818683"
			],
			[
				"postcode" => "2580",
				"suburb" => "TARLO",
				"state" => "NSW",
				"lat" => "-34.603183",
				"lon" => "149.806454"
			],
			[
				"postcode" => "2580",
				"suburb" => "TIRRANNAVILLE",
				"state" => "NSW",
				"lat" => "-34.822261",
				"lon" => "149.680847"
			],
			[
				"postcode" => "2580",
				"suburb" => "TOWRANG",
				"state" => "NSW",
				"lat" => "-34.685308",
				"lon" => "149.859942"
			],
			[
				"postcode" => "2580",
				"suburb" => "WAYO",
				"state" => "NSW",
				"lat" => "-34.60171",
				"lon" => "149.628076"
			],
			[
				"postcode" => "2580",
				"suburb" => "WIARBOROUGH",
				"state" => "NSW",
				"lat" => "-34.20003",
				"lon" => "149.904829"
			],
			[
				"postcode" => "2580",
				"suburb" => "WINDELLAMA",
				"state" => "NSW",
				"lat" => "-35.025089",
				"lon" => "149.872388"
			],
			[
				"postcode" => "2580",
				"suburb" => "WOMBEYAN CAVES",
				"state" => "NSW",
				"lat" => "-34.329634",
				"lon" => "150.022747"
			],
			[
				"postcode" => "2580",
				"suburb" => "WOODHOUSELEE",
				"state" => "NSW",
				"lat" => "-34.570439",
				"lon" => "149.63111"
			],
			[
				"postcode" => "2580",
				"suburb" => "WOWAGIN",
				"state" => "NSW",
				"lat" => "-34.409882",
				"lon" => "149.707523"
			],
			[
				"postcode" => "2580",
				"suburb" => "YALBRAITH",
				"state" => "NSW",
				"lat" => "-34.241606",
				"lon" => "149.773798"
			],
			[
				"postcode" => "2580",
				"suburb" => "YARRA",
				"state" => "NSW",
				"lat" => "-34.762728",
				"lon" => "149.623035"
			],
			[
				"postcode" => "2581",
				"suburb" => "BELLMOUNT FOREST",
				"state" => "NSW",
				"lat" => "-34.917864",
				"lon" => "149.24271"
			],
			[
				"postcode" => "2581",
				"suburb" => "BEVENDALE",
				"state" => "NSW",
				"lat" => "-34.522272",
				"lon" => "149.110484"
			],
			[
				"postcode" => "2581",
				"suburb" => "BIALA",
				"state" => "NSW",
				"lat" => "-34.620292",
				"lon" => "149.236458"
			],
			[
				"postcode" => "2581",
				"suburb" => "BLAKNEY CREEK",
				"state" => "NSW",
				"lat" => "-34.653222",
				"lon" => "149.034306"
			],
			[
				"postcode" => "2581",
				"suburb" => "BREADALBANE",
				"state" => "NSW",
				"lat" => "-34.800796",
				"lon" => "149.468173"
			],
			[
				"postcode" => "2581",
				"suburb" => "BROADWAY",
				"state" => "NSW",
				"lat" => "-34.700258",
				"lon" => "149.094844"
			],
			[
				"postcode" => "2581",
				"suburb" => "COLLECTOR",
				"state" => "NSW",
				"lat" => "-34.91729",
				"lon" => "149.424332"
			],
			[
				"postcode" => "2581",
				"suburb" => "CULLERIN",
				"state" => "NSW",
				"lat" => "-34.782812",
				"lon" => "149.405192"
			],
			[
				"postcode" => "2581",
				"suburb" => "DALTON",
				"state" => "NSW",
				"lat" => "-34.72191",
				"lon" => "149.181024"
			],
			[
				"postcode" => "2581",
				"suburb" => "GUNNING",
				"state" => "NSW",
				"lat" => "-34.782264",
				"lon" => "149.266364"
			],
			[
				"postcode" => "2581",
				"suburb" => "GURRUNDAH",
				"state" => "NSW",
				"lat" => "-34.666343",
				"lon" => "149.418755"
			],
			[
				"postcode" => "2581",
				"suburb" => "LADE VALE",
				"state" => "NSW",
				"lat" => "-34.84439",
				"lon" => "149.139454"
			],
			[
				"postcode" => "2581",
				"suburb" => "LAKE GEORGE",
				"state" => "NSW",
				"lat" => "-35.170348",
				"lon" => "149.453858"
			],
			[
				"postcode" => "2581",
				"suburb" => "LERIDA",
				"state" => "NSW",
				"lat" => "-34.872871",
				"lon" => "149.365686"
			],
			[
				"postcode" => "2581",
				"suburb" => "MERRILL",
				"state" => "NSW",
				"lat" => "-34.659271",
				"lon" => "149.295106"
			],
			[
				"postcode" => "2581",
				"suburb" => "OOLONG",
				"state" => "NSW",
				"lat" => "-34.775749",
				"lon" => "149.169139"
			],
			[
				"postcode" => "2581",
				"suburb" => "WOLLOGORANG",
				"state" => "NSW",
				"lat" => "-34.846128",
				"lon" => "149.521068"
			],
			[
				"postcode" => "2582",
				"suburb" => "BANGO",
				"state" => "NSW",
				"lat" => "-34.745475",
				"lon" => "148.956495"
			],
			[
				"postcode" => "2582",
				"suburb" => "BERREMANGRA",
				"state" => "NSW",
				"lat" => "-34.768594",
				"lon" => "148.452258"
			],
			[
				"postcode" => "2582",
				"suburb" => "BOAMBOLO",
				"state" => "NSW",
				"lat" => "-35.030468",
				"lon" => "148.888736"
			],
			[
				"postcode" => "2582",
				"suburb" => "BOOKHAM",
				"state" => "NSW",
				"lat" => "-34.789416",
				"lon" => "148.637784"
			],
			[
				"postcode" => "2582",
				"suburb" => "BOWNING",
				"state" => "NSW",
				"lat" => "-34.7679",
				"lon" => "148.814699"
			],
			[
				"postcode" => "2582",
				"suburb" => "BURRINJUCK",
				"state" => "NSW",
				"lat" => "-34.976658",
				"lon" => "148.62331"
			],
			[
				"postcode" => "2582",
				"suburb" => "CAVAN",
				"state" => "NSW",
				"lat" => "-35.022931",
				"lon" => "148.835379"
			],
			[
				"postcode" => "2582",
				"suburb" => "GOOD HOPE",
				"state" => "NSW",
				"lat" => "-34.896682",
				"lon" => "148.838622"
			],
			[
				"postcode" => "2582",
				"suburb" => "JEIR",
				"state" => "NSW",
				"lat" => "-35.033261",
				"lon" => "148.975562"
			],
			[
				"postcode" => "2582",
				"suburb" => "JERRAWA",
				"state" => "NSW",
				"lat" => "-34.789989",
				"lon" => "149.099032"
			],
			[
				"postcode" => "2582",
				"suburb" => "KANGIARA",
				"state" => "NSW",
				"lat" => "-34.602264",
				"lon" => "148.75403"
			],
			[
				"postcode" => "2582",
				"suburb" => "LAVERSTOCK",
				"state" => "NSW",
				"lat" => "-34.643421",
				"lon" => "148.851468"
			],
			[
				"postcode" => "2582",
				"suburb" => "MANTON",
				"state" => "NSW",
				"lat" => "-34.85035",
				"lon" => "148.998237"
			],
			[
				"postcode" => "2582",
				"suburb" => "MARCHMONT",
				"state" => "NSW",
				"lat" => "-34.876217",
				"lon" => "148.954609"
			],
			[
				"postcode" => "2582",
				"suburb" => "MULLION",
				"state" => "NSW",
				"lat" => "-35.128741",
				"lon" => "148.871684"
			],
			[
				"postcode" => "2582",
				"suburb" => "MURRUMBATEMAN",
				"state" => "NSW",
				"lat" => "-34.969552",
				"lon" => "149.03035"
			],
			[
				"postcode" => "2582",
				"suburb" => "NANANGROE",
				"state" => "NSW",
				"lat" => "-34.966986",
				"lon" => "148.474704"
			],
			[
				"postcode" => "2582",
				"suburb" => "NARRANGULLEN",
				"state" => "NSW",
				"lat" => "-35.026932",
				"lon" => "148.73001"
			],
			[
				"postcode" => "2582",
				"suburb" => "WEE JASPER",
				"state" => "NSW",
				"lat" => "-35.115771",
				"lon" => "148.673123"
			],
			[
				"postcode" => "2582",
				"suburb" => "WOOLGARLO",
				"state" => "NSW",
				"lat" => "-34.895285",
				"lon" => "148.734991"
			],
			[
				"postcode" => "2582",
				"suburb" => "YASS",
				"state" => "NSW",
				"lat" => "-34.84215",
				"lon" => "148.911228"
			],
			[
				"postcode" => "2582",
				"suburb" => "YASS RIVER",
				"state" => "NSW",
				"lat" => "-34.9072",
				"lon" => "149.096916"
			],
			[
				"postcode" => "2583",
				"suburb" => "BIGGA",
				"state" => "NSW",
				"lat" => "-34.084776",
				"lon" => "149.151361"
			],
			[
				"postcode" => "2583",
				"suburb" => "BINDA",
				"state" => "NSW",
				"lat" => "-34.328832",
				"lon" => "149.365499"
			],
			[
				"postcode" => "2583",
				"suburb" => "BLANKET FLAT",
				"state" => "NSW",
				"lat" => "-34.128707",
				"lon" => "149.196951"
			],
			[
				"postcode" => "2583",
				"suburb" => "BROOKLANDS",
				"state" => "NSW",
				"lat" => "-34.456267",
				"lon" => "149.459764"
			],
			[
				"postcode" => "2583",
				"suburb" => "COTTAWALLA",
				"state" => "NSW",
				"lat" => "-34.478288",
				"lon" => "149.517073"
			],
			[
				"postcode" => "2583",
				"suburb" => "CROOKED CORNER",
				"state" => "NSW",
				"lat" => "-34.22847",
				"lon" => "149.248832"
			],
			[
				"postcode" => "2583",
				"suburb" => "CROOKWELL",
				"state" => "NSW",
				"lat" => "-34.458076",
				"lon" => "149.470291"
			],
			[
				"postcode" => "2583",
				"suburb" => "FULLERTON",
				"state" => "NSW",
				"lat" => "-34.210656",
				"lon" => "149.514502"
			],
			[
				"postcode" => "2583",
				"suburb" => "GLENERIN",
				"state" => "NSW",
				"lat" => "-34.492933",
				"lon" => "149.365126"
			],
			[
				"postcode" => "2583",
				"suburb" => "GRABBEN GULLEN",
				"state" => "NSW",
				"lat" => "-34.545474",
				"lon" => "149.410916"
			],
			[
				"postcode" => "2583",
				"suburb" => "GRABINE",
				"state" => "NSW",
				"lat" => "-33.968531",
				"lon" => "149.041258"
			],
			[
				"postcode" => "2583",
				"suburb" => "GREENMANTLE",
				"state" => "NSW",
				"lat" => "-33.969537",
				"lon" => "149.102384"
			],
			[
				"postcode" => "2583",
				"suburb" => "HADLEY",
				"state" => "NSW",
				"lat" => "-34.134055",
				"lon" => "149.584597"
			],
			[
				"postcode" => "2583",
				"suburb" => "JUNCTION POINT",
				"state" => "NSW",
				"lat" => "-34.139923",
				"lon" => "149.334985"
			],
			[
				"postcode" => "2583",
				"suburb" => "KEMPTON",
				"state" => "NSW",
				"lat" => "-34.272519",
				"lon" => "149.557291"
			],
			[
				"postcode" => "2583",
				"suburb" => "KIALLA",
				"state" => "NSW",
				"lat" => "-34.544343",
				"lon" => "149.460784"
			],
			[
				"postcode" => "2583",
				"suburb" => "LAGGAN",
				"state" => "NSW",
				"lat" => "-34.384409",
				"lon" => "149.541447"
			],
			[
				"postcode" => "2583",
				"suburb" => "LIMERICK",
				"state" => "NSW",
				"lat" => "-34.204084",
				"lon" => "149.477511"
			],
			[
				"postcode" => "2583",
				"suburb" => "MULGOWRIE",
				"state" => "NSW",
				"lat" => "-34.238755",
				"lon" => "149.164632"
			],
			[
				"postcode" => "2583",
				"suburb" => "NARRAWA",
				"state" => "NSW",
				"lat" => "-34.435768",
				"lon" => "149.160245"
			],
			[
				"postcode" => "2583",
				"suburb" => "PEELWOOD",
				"state" => "NSW",
				"lat" => "-34.111361",
				"lon" => "149.427224"
			],
			[
				"postcode" => "2583",
				"suburb" => "RUGBY",
				"state" => "NSW",
				"lat" => "-34.367222",
				"lon" => "149.032412"
			],
			[
				"postcode" => "2583",
				"suburb" => "THALABA",
				"state" => "NSW",
				"lat" => "-34.274199",
				"lon" => "149.514461"
			],
			[
				"postcode" => "2583",
				"suburb" => "THIRD CREEK",
				"state" => "NSW",
				"lat" => "-34.527736",
				"lon" => "149.512359"
			],
			[
				"postcode" => "2583",
				"suburb" => "TUENA",
				"state" => "NSW",
				"lat" => "-34.016464",
				"lon" => "149.327712"
			],
			[
				"postcode" => "2583",
				"suburb" => "WHEEO",
				"state" => "NSW",
				"lat" => "-34.509822",
				"lon" => "149.292676"
			],
			[
				"postcode" => "2584",
				"suburb" => "BINALONG",
				"state" => "NSW",
				"lat" => "-34.670932",
				"lon" => "148.628209"
			],
			[
				"postcode" => "2585",
				"suburb" => "GALONG",
				"state" => "NSW",
				"lat" => "-34.601586",
				"lon" => "148.556895"
			],
			[
				"postcode" => "2586",
				"suburb" => "BOOROWA",
				"state" => "NSW",
				"lat" => "-34.438598",
				"lon" => "148.716326"
			],
			[
				"postcode" => "2586",
				"suburb" => "FROGMORE",
				"state" => "NSW",
				"lat" => "-34.233648",
				"lon" => "148.85376"
			],
			[
				"postcode" => "2586",
				"suburb" => "GOBA CREEK",
				"state" => "NSW",
				"lat" => "-34.283533",
				"lon" => "148.75145"
			],
			[
				"postcode" => "2586",
				"suburb" => "GODFREYS CREEK",
				"state" => "NSW",
				"lat" => "-34.113363",
				"lon" => "148.780269"
			],
			[
				"postcode" => "2586",
				"suburb" => "KENYU",
				"state" => "NSW",
				"lat" => "-34.222552",
				"lon" => "148.758579"
			],
			[
				"postcode" => "2586",
				"suburb" => "MURRINGO",
				"state" => "NSW",
				"lat" => "-34.272867",
				"lon" => "148.509953"
			],
			[
				"postcode" => "2586",
				"suburb" => "REIDS FLAT",
				"state" => "NSW",
				"lat" => "-34.146638",
				"lon" => "148.96138"
			],
			[
				"postcode" => "2586",
				"suburb" => "RYE PARK",
				"state" => "NSW",
				"lat" => "-34.519573",
				"lon" => "148.907695"
			],
			[
				"postcode" => "2586",
				"suburb" => "TAYLORS FLAT",
				"state" => "NSW",
				"lat" => "-34.293284",
				"lon" => "149.012779"
			],
			[
				"postcode" => "2587",
				"suburb" => "AURVILLE",
				"state" => "NSW",
				"lat" => "-34.547823",
				"lon" => "148.370154"
			],
			[
				"postcode" => "2587",
				"suburb" => "CUNNINGAR",
				"state" => "NSW",
				"lat" => "-34.562125",
				"lon" => "148.419171"
			],
			[
				"postcode" => "2587",
				"suburb" => "DEMONDRILLE",
				"state" => "NSW",
				"lat" => "-34.516257",
				"lon" => "148.314901"
			],
			[
				"postcode" => "2587",
				"suburb" => "GARANGULA",
				"state" => "NSW",
				"lat" => "-34.642328",
				"lon" => "148.222238"
			],
			[
				"postcode" => "2587",
				"suburb" => "HARDEN",
				"state" => "NSW",
				"lat" => "-34.555033",
				"lon" => "148.369635"
			],
			[
				"postcode" => "2587",
				"suburb" => "KINGSVALE",
				"state" => "NSW",
				"lat" => "-34.457564",
				"lon" => "148.363624"
			],
			[
				"postcode" => "2587",
				"suburb" => "MCMAHONS REEF",
				"state" => "NSW",
				"lat" => "-34.662005",
				"lon" => "148.449415"
			],
			[
				"postcode" => "2587",
				"suburb" => "MURRUMBURRAH",
				"state" => "NSW",
				"lat" => "-34.549329",
				"lon" => "148.350183"
			],
			[
				"postcode" => "2587",
				"suburb" => "NUBBA",
				"state" => "NSW",
				"lat" => "-34.535807",
				"lon" => "148.236167"
			],
			[
				"postcode" => "2587",
				"suburb" => "PRUNEVALE",
				"state" => "NSW",
				"lat" => "-34.402129",
				"lon" => "148.331878"
			],
			[
				"postcode" => "2587",
				"suburb" => "WOMBAT",
				"state" => "NSW",
				"lat" => "-34.423482",
				"lon" => "148.24444"
			],
			[
				"postcode" => "2588",
				"suburb" => "WALLENDBEEN",
				"state" => "NSW",
				"lat" => "-34.524319",
				"lon" => "148.16016"
			],
			[
				"postcode" => "2590",
				"suburb" => "BETHUNGRA",
				"state" => "NSW",
				"lat" => "-34.762894",
				"lon" => "147.852565"
			],
			[
				"postcode" => "2590",
				"suburb" => "COOTAMUNDRA",
				"state" => "NSW",
				"lat" => "-34.639089",
				"lon" => "148.024671"
			],
			[
				"postcode" => "2590",
				"suburb" => "ILLABO",
				"state" => "NSW",
				"lat" => "-34.814798",
				"lon" => "147.740662"
			],
			[
				"postcode" => "2594",
				"suburb" => "BERTHONG",
				"state" => "NSW",
				"lat" => "-34.425659",
				"lon" => "148.065745"
			],
			[
				"postcode" => "2594",
				"suburb" => "BRIBBAREE",
				"state" => "NSW",
				"lat" => "-34.121252",
				"lon" => "147.873721"
			],
			[
				"postcode" => "2594",
				"suburb" => "BULLA CREEK",
				"state" => "NSW",
				"lat" => "-34.121974",
				"lon" => "148.261083"
			],
			[
				"postcode" => "2594",
				"suburb" => "BURRANGONG",
				"state" => "NSW",
				"lat" => "-34.287811",
				"lon" => "148.268425"
			],
			[
				"postcode" => "2594",
				"suburb" => "KIKIAMAH",
				"state" => "NSW",
				"lat" => "-34.076913",
				"lon" => "148.144808"
			],
			[
				"postcode" => "2594",
				"suburb" => "MAIMURU",
				"state" => "NSW",
				"lat" => "-34.252818",
				"lon" => "148.235113"
			],
			[
				"postcode" => "2594",
				"suburb" => "MEMAGONG",
				"state" => "NSW",
				"lat" => "-34.316086",
				"lon" => "148.173499"
			],
			[
				"postcode" => "2594",
				"suburb" => "MILVALE",
				"state" => "NSW",
				"lat" => "-34.314943",
				"lon" => "147.875379"
			],
			[
				"postcode" => "2594",
				"suburb" => "MONTEAGLE",
				"state" => "NSW",
				"lat" => "-34.193245",
				"lon" => "148.342278"
			],
			[
				"postcode" => "2594",
				"suburb" => "THUDDUNGRA",
				"state" => "NSW",
				"lat" => "-34.137462",
				"lon" => "148.096299"
			],
			[
				"postcode" => "2594",
				"suburb" => "TUBBUL",
				"state" => "NSW",
				"lat" => "-34.254129",
				"lon" => "147.938225"
			],
			[
				"postcode" => "2594",
				"suburb" => "WEEDALLION",
				"state" => "NSW",
				"lat" => "-34.198455",
				"lon" => "147.937445"
			],
			[
				"postcode" => "2594",
				"suburb" => "YOUNG",
				"state" => "NSW",
				"lat" => "-34.31341",
				"lon" => "148.297921"
			],
			[
				"postcode" => "2600",
				"suburb" => "BARTON",
				"state" => "ACT",
				"lat" => "-35.314348",
				"lon" => "149.137033"
			],
			[
				"postcode" => "2600",
				"suburb" => "CANBERRA",
				"state" => "ACT",
				"lat" => "-35.306768",
				"lon" => "149.126355"
			],
			[
				"postcode" => "2600",
				"suburb" => "DEAKIN",
				"state" => "ACT",
				"lat" => "-35.315246",
				"lon" => "149.108714"
			],
			[
				"postcode" => "2600",
				"suburb" => "DEAKIN WEST",
				"state" => "ACT",
				"lat" => "-35.326172",
				"lon" => "149.09186"
			],
			[
				"postcode" => "2600",
				"suburb" => "DUNTROON",
				"state" => "ACT",
				"lat" => "-35.303194",
				"lon" => "149.161688"
			],
			[
				"postcode" => "2600",
				"suburb" => "HARMAN",
				"state" => "ACT",
				"lat" => "-35.344592",
				"lon" => "149.200009"
			],
			[
				"postcode" => "2600",
				"suburb" => "HMAS HARMAN",
				"state" => "ACT",
				"lat" => "-35.347094",
				"lon" => "149.1994"
			],
			[
				"postcode" => "2600",
				"suburb" => "PARKES",
				"state" => "ACT",
				"lat" => "-35.300114",
				"lon" => "149.132726"
			],
			[
				"postcode" => "2600",
				"suburb" => "PARLIAMENT HOUSE",
				"state" => "ACT",
				"lat" => "-35.308181",
				"lon" => "149.124434"
			],
			[
				"postcode" => "2600",
				"suburb" => "RUSSELL",
				"state" => "ACT",
				"lat" => "-35.299321",
				"lon" => "149.151238"
			],
			[
				"postcode" => "2600",
				"suburb" => "YARRALUMLA",
				"state" => "ACT",
				"lat" => "-35.30748",
				"lon" => "149.098252"
			],
			[
				"postcode" => "2601",
				"suburb" => "ACTON",
				"state" => "ACT",
				"lat" => "-35.282087",
				"lon" => "149.108716"
			],
			[
				"postcode" => "2601",
				"suburb" => "BLACK MOUNTAIN",
				"state" => "ACT",
				"lat" => "-35.274967",
				"lon" => "149.097654"
			],
			[
				"postcode" => "2601",
				"suburb" => "CANBERRA",
				"state" => "ACT",
				"lat" => "-35.302425",
				"lon" => "149.114587"
			],
			[
				"postcode" => "2602",
				"suburb" => "AINSLIE",
				"state" => "ACT",
				"lat" => "-35.262153",
				"lon" => "149.145893"
			],
			[
				"postcode" => "2602",
				"suburb" => "DICKSON",
				"state" => "ACT",
				"lat" => "-35.25113",
				"lon" => "149.140293"
			],
			[
				"postcode" => "2602",
				"suburb" => "DOWNER",
				"state" => "ACT",
				"lat" => "-35.243223",
				"lon" => "149.14309"
			],
			[
				"postcode" => "2602",
				"suburb" => "HACKETT",
				"state" => "ACT",
				"lat" => "-35.251175",
				"lon" => "149.163647"
			],
			[
				"postcode" => "2602",
				"suburb" => "LYNEHAM",
				"state" => "ACT",
				"lat" => "-35.251866",
				"lon" => "149.123906"
			],
			[
				"postcode" => "2602",
				"suburb" => "O'CONNOR",
				"state" => "ACT",
				"lat" => "-35.264415",
				"lon" => "149.121991"
			],
			[
				"postcode" => "2602",
				"suburb" => "WATSON",
				"state" => "ACT",
				"lat" => "-35.238624",
				"lon" => "149.154379"
			],
			[
				"postcode" => "2603",
				"suburb" => "FORREST",
				"state" => "ACT",
				"lat" => "-35.31848",
				"lon" => "149.124096"
			],
			[
				"postcode" => "2603",
				"suburb" => "GRIFFITH",
				"state" => "ACT",
				"lat" => "-35.328248",
				"lon" => "149.141658"
			],
			[
				"postcode" => "2603",
				"suburb" => "MANUKA",
				"state" => "ACT",
				"lat" => "-35.320203",
				"lon" => "149.133731"
			],
			[
				"postcode" => "2603",
				"suburb" => "RED HILL",
				"state" => "ACT",
				"lat" => "-35.340723",
				"lon" => "149.131106"
			],
			[
				"postcode" => "2604",
				"suburb" => "CAUSEWAY",
				"state" => "ACT",
				"lat" => "-35.317703",
				"lon" => "149.150133"
			],
			[
				"postcode" => "2604",
				"suburb" => "KINGSTON",
				"state" => "ACT",
				"lat" => "-35.314775",
				"lon" => "149.141537"
			],
			[
				"postcode" => "2604",
				"suburb" => "NARRABUNDAH",
				"state" => "ACT",
				"lat" => "-35.333135",
				"lon" => "149.153732"
			],
			[
				"postcode" => "2605",
				"suburb" => "CURTIN",
				"state" => "ACT",
				"lat" => "-35.32454",
				"lon" => "149.075667"
			],
			[
				"postcode" => "2605",
				"suburb" => "GARRAN",
				"state" => "ACT",
				"lat" => "-35.345268",
				"lon" => "149.103604"
			],
			[
				"postcode" => "2605",
				"suburb" => "HUGHES",
				"state" => "ACT",
				"lat" => "-35.333573",
				"lon" => "149.094259"
			],
			[
				"postcode" => "2606",
				"suburb" => "CHIFLEY",
				"state" => "ACT",
				"lat" => "-35.353521",
				"lon" => "149.079546"
			],
			[
				"postcode" => "2606",
				"suburb" => "LYONS",
				"state" => "ACT",
				"lat" => "-35.339514",
				"lon" => "149.076118"
			],
			[
				"postcode" => "2606",
				"suburb" => "O'MALLEY",
				"state" => "ACT",
				"lat" => "-35.354341",
				"lon" => "149.106771"
			],
			[
				"postcode" => "2606",
				"suburb" => "PHILLIP",
				"state" => "ACT",
				"lat" => "-35.351856",
				"lon" => "149.091212"
			],
			[
				"postcode" => "2606",
				"suburb" => "SWINGER HILL",
				"state" => "ACT",
				"lat" => "-35.353555",
				"lon" => "149.097227"
			],
			[
				"postcode" => "2606",
				"suburb" => "WODEN",
				"state" => "ACT",
				"lat" => "-35.344534",
				"lon" => "149.086391"
			],
			[
				"postcode" => "2607",
				"suburb" => "FARRER",
				"state" => "ACT",
				"lat" => "-35.375443",
				"lon" => "149.10095"
			],
			[
				"postcode" => "2607",
				"suburb" => "ISAACS",
				"state" => "ACT",
				"lat" => "-35.366298",
				"lon" => "149.112868"
			],
			[
				"postcode" => "2607",
				"suburb" => "MAWSON",
				"state" => "ACT",
				"lat" => "-35.36417",
				"lon" => "149.094507"
			],
			[
				"postcode" => "2607",
				"suburb" => "PEARCE",
				"state" => "ACT",
				"lat" => "-35.365002",
				"lon" => "149.081687"
			],
			[
				"postcode" => "2607",
				"suburb" => "TORRENS",
				"state" => "ACT",
				"lat" => "-35.372097",
				"lon" => "149.085985"
			],
			[
				"postcode" => "2608",
				"suburb" => "CIVIC SQUARE",
				"state" => "ACT",
				"lat" => "-35.282868",
				"lon" => "149.129372"
			],
			[
				"postcode" => "2609",
				"suburb" => "CANBERRA INTERNATIONAL AIRPORT",
				"state" => "ACT",
				"lat" => "-35.303411",
				"lon" => "149.194007"
			],
			[
				"postcode" => "2609",
				"suburb" => "FYSHWICK",
				"state" => "ACT",
				"lat" => "-35.328937",
				"lon" => "149.176391"
			],
			[
				"postcode" => "2609",
				"suburb" => "MAJURA",
				"state" => "ACT",
				"lat" => "-35.291673",
				"lon" => "149.190655"
			],
			[
				"postcode" => "2609",
				"suburb" => "PIALLIGO",
				"state" => "ACT",
				"lat" => "-35.304257",
				"lon" => "149.179244"
			],
			[
				"postcode" => "2609",
				"suburb" => "SYMONSTON",
				"state" => "ACT",
				"lat" => "-35.347404",
				"lon" => "149.158785"
			],
			[
				"postcode" => "2611",
				"suburb" => "BIMBERI",
				"state" => "NSW",
				"lat" => "-35.560416",
				"lon" => "148.624957"
			],
			[
				"postcode" => "2611",
				"suburb" => "BRINDABELLA",
				"state" => "NSW",
				"lat" => "-35.349503",
				"lon" => "148.724491"
			],
			[
				"postcode" => "2611",
				"suburb" => "CHAPMAN",
				"state" => "ACT",
				"lat" => "-35.356503",
				"lon" => "149.042021"
			],
			[
				"postcode" => "2611",
				"suburb" => "COOLEMAN",
				"state" => "NSW",
				"lat" => "-35.674712",
				"lon" => "148.729098"
			],
			[
				"postcode" => "2611",
				"suburb" => "DUFFY",
				"state" => "ACT",
				"lat" => "-35.337331",
				"lon" => "149.031759"
			],
			[
				"postcode" => "2611",
				"suburb" => "FISHER",
				"state" => "ACT",
				"lat" => "-35.361906",
				"lon" => "149.056369"
			],
			[
				"postcode" => "2611",
				"suburb" => "HOLDER",
				"state" => "ACT",
				"lat" => "-35.336947",
				"lon" => "149.044141"
			],
			[
				"postcode" => "2611",
				"suburb" => "MOUNT STROMLO",
				"state" => "ACT",
				"lat" => "-35.322524",
				"lon" => "149.006418"
			],
			[
				"postcode" => "2611",
				"suburb" => "PIERCES CREEK",
				"state" => "ACT",
				"lat" => "-35.335104",
				"lon" => "148.920364"
			],
			[
				"postcode" => "2611",
				"suburb" => "RIVETT",
				"state" => "ACT",
				"lat" => "-35.347161",
				"lon" => "149.03589"
			],
			[
				"postcode" => "2611",
				"suburb" => "STIRLING",
				"state" => "ACT",
				"lat" => "-35.3486",
				"lon" => "149.049348"
			],
			[
				"postcode" => "2611",
				"suburb" => "URIARRA",
				"state" => "ACT",
				"lat" => "-35.244478",
				"lon" => "148.950667"
			],
			[
				"postcode" => "2611",
				"suburb" => "URIARRA FOREST",
				"state" => "ACT",
				"lat" => "-35.289483",
				"lon" => "148.913247"
			],
			[
				"postcode" => "2611",
				"suburb" => "WARAMANGA",
				"state" => "ACT",
				"lat" => "-35.352761",
				"lon" => "149.060415"
			],
			[
				"postcode" => "2611",
				"suburb" => "WESTON",
				"state" => "ACT",
				"lat" => "-35.341365",
				"lon" => "149.052288"
			],
			[
				"postcode" => "2611",
				"suburb" => "WESTON CREEK",
				"state" => "ACT",
				"lat" => "-35.297434",
				"lon" => "149.033649"
			],
			[
				"postcode" => "2612",
				"suburb" => "BRADDON",
				"state" => "ACT",
				"lat" => "-35.270615",
				"lon" => "149.133208"
			],
			[
				"postcode" => "2612",
				"suburb" => "CAMPBELL",
				"state" => "ACT",
				"lat" => "-35.290006",
				"lon" => "149.153091"
			],
			[
				"postcode" => "2612",
				"suburb" => "REID",
				"state" => "ACT",
				"lat" => "-35.282992",
				"lon" => "149.141637"
			],
			[
				"postcode" => "2612",
				"suburb" => "TURNER",
				"state" => "ACT",
				"lat" => "-35.271229",
				"lon" => "149.118368"
			],
			[
				"postcode" => "2614",
				"suburb" => "ARANDA",
				"state" => "ACT",
				"lat" => "-35.257964",
				"lon" => "149.075648"
			],
			[
				"postcode" => "2614",
				"suburb" => "COOK",
				"state" => "ACT",
				"lat" => "-35.260549",
				"lon" => "149.064613"
			],
			[
				"postcode" => "2614",
				"suburb" => "HAWKER",
				"state" => "ACT",
				"lat" => "-35.247384",
				"lon" => "149.034535"
			],
			[
				"postcode" => "2614",
				"suburb" => "JAMISON CENTRE",
				"state" => "ACT",
				"lat" => "-35.253292",
				"lon" => "149.071291"
			],
			[
				"postcode" => "2614",
				"suburb" => "MACQUARIE",
				"state" => "ACT",
				"lat" => "-35.251259",
				"lon" => "149.063625"
			],
			[
				"postcode" => "2614",
				"suburb" => "PAGE",
				"state" => "ACT",
				"lat" => "-35.239696",
				"lon" => "149.049056"
			],
			[
				"postcode" => "2614",
				"suburb" => "SCULLIN",
				"state" => "ACT",
				"lat" => "-35.233152",
				"lon" => "149.040779"
			],
			[
				"postcode" => "2614",
				"suburb" => "WEETANGERA",
				"state" => "ACT",
				"lat" => "-35.246194",
				"lon" => "149.050592"
			],
			[
				"postcode" => "2615",
				"suburb" => "CHARNWOOD",
				"state" => "ACT",
				"lat" => "-35.199345",
				"lon" => "149.030062"
			],
			[
				"postcode" => "2615",
				"suburb" => "DUNLOP",
				"state" => "ACT",
				"lat" => "-35.198771",
				"lon" => "149.017199"
			],
			[
				"postcode" => "2615",
				"suburb" => "FLOREY",
				"state" => "ACT",
				"lat" => "-35.226376",
				"lon" => "149.051672"
			],
			[
				"postcode" => "2615",
				"suburb" => "FLYNN",
				"state" => "ACT",
				"lat" => "-35.200937",
				"lon" => "149.049519"
			],
			[
				"postcode" => "2615",
				"suburb" => "FRASER",
				"state" => "ACT",
				"lat" => "-35.192811",
				"lon" => "149.042736"
			],
			[
				"postcode" => "2615",
				"suburb" => "HIGGINS",
				"state" => "ACT",
				"lat" => "-35.231052",
				"lon" => "149.027686"
			],
			[
				"postcode" => "2615",
				"suburb" => "HOLT",
				"state" => "ACT",
				"lat" => "-35.225448",
				"lon" => "149.016787"
			],
			[
				"postcode" => "2615",
				"suburb" => "KIPPAX",
				"state" => "ACT",
				"lat" => "-35.221958",
				"lon" => "149.020133"
			],
			[
				"postcode" => "2615",
				"suburb" => "LATHAM",
				"state" => "ACT",
				"lat" => "-35.219561",
				"lon" => "149.032478"
			],
			[
				"postcode" => "2615",
				"suburb" => "MACGREGOR",
				"state" => "ACT",
				"lat" => "-35.215852",
				"lon" => "149.014395"
			],
			[
				"postcode" => "2615",
				"suburb" => "MELBA",
				"state" => "ACT",
				"lat" => "-35.211034",
				"lon" => "149.049966"
			],
			[
				"postcode" => "2615",
				"suburb" => "SPENCE",
				"state" => "ACT",
				"lat" => "-35.199588",
				"lon" => "149.062181"
			],
			[
				"postcode" => "2616",
				"suburb" => "BELCONNEN",
				"state" => "ACT",
				"lat" => "-35.248442",
				"lon" => "149.070336"
			],
			[
				"postcode" => "2617",
				"suburb" => "BELCONNEN",
				"state" => "ACT",
				"lat" => "-35.236234",
				"lon" => "149.067347"
			],
			[
				"postcode" => "2617",
				"suburb" => "BRUCE",
				"state" => "ACT",
				"lat" => "-35.242534",
				"lon" => "149.077275"
			],
			[
				"postcode" => "2617",
				"suburb" => "EVATT",
				"state" => "ACT",
				"lat" => "-35.214897",
				"lon" => "149.065527"
			],
			[
				"postcode" => "2617",
				"suburb" => "GIRALANG",
				"state" => "ACT",
				"lat" => "-35.209934",
				"lon" => "149.098783"
			],
			[
				"postcode" => "2617",
				"suburb" => "KALEEN",
				"state" => "ACT",
				"lat" => "-35.219211",
				"lon" => "149.103465"
			],
			[
				"postcode" => "2617",
				"suburb" => "LAWSON",
				"state" => "ACT",
				"lat" => "-35.225439",
				"lon" => "149.100291"
			],
			[
				"postcode" => "2617",
				"suburb" => "MCKELLAR",
				"state" => "ACT",
				"lat" => "-35.219085",
				"lon" => "149.072475"
			],
			[
				"postcode" => "2617",
				"suburb" => "UNIVERSITY OF CANBERRA",
				"state" => "ACT",
				"lat" => "-35.239771",
				"lon" => "149.085896"
			],
			[
				"postcode" => "2618",
				"suburb" => "HALL",
				"state" => "ACT",
				"lat" => "-35.522639",
				"lon" => "149.08098"
			],
			[
				"postcode" => "2618",
				"suburb" => "NANIMA",
				"state" => "NSW",
				"lat" => "-33.431998",
				"lon" => "148.369936"
			],
			[
				"postcode" => "2618",
				"suburb" => "SPRINGRANGE",
				"state" => "NSW",
				"lat" => "-35.107791",
				"lon" => "149.104756"
			],
			[
				"postcode" => "2618",
				"suburb" => "WALLAROO",
				"state" => "NSW",
				"lat" => "-35.149733",
				"lon" => "149.005727"
			],
			[
				"postcode" => "2619",
				"suburb" => "JERRABOMBERRA",
				"state" => "NSW",
				"lat" => "-35.384458",
				"lon" => "149.199053"
			],
			[
				"postcode" => "2620",
				"suburb" => "BURRA",
				"state" => "NSW",
				"lat" => "-35.576088",
				"lon" => "149.227469"
			],
			[
				"postcode" => "2620",
				"suburb" => "CARWOOLA",
				"state" => "NSW",
				"lat" => "-35.365294",
				"lon" => "149.336975"
			],
			[
				"postcode" => "2620",
				"suburb" => "CLEAR RANGE",
				"state" => "NSW",
				"lat" => "-35.743398",
				"lon" => "149.105147"
			],
			[
				"postcode" => "2620",
				"suburb" => "CRESTWOOD",
				"state" => "NSW",
				"lat" => "-31.472265",
				"lon" => "152.904109"
			],
			[
				"postcode" => "2620",
				"suburb" => "DODSWORTH",
				"state" => "NSW",
				"lat" => "-35.362216",
				"lon" => "149.24946"
			],
			[
				"postcode" => "2620",
				"suburb" => "ENVIRONA",
				"state" => "NSW",
				"lat" => "-35.399692",
				"lon" => "149.173518"
			],
			[
				"postcode" => "2620",
				"suburb" => "GOOGONG",
				"state" => "NSW",
				"lat" => "-35.391776",
				"lon" => "149.230757"
			],
			[
				"postcode" => "2620",
				"suburb" => "GREENLEIGH",
				"state" => "NSW",
				"lat" => "-35.349539",
				"lon" => "149.255909"
			],
			[
				"postcode" => "2620",
				"suburb" => "GUNDAROO",
				"state" => "NSW",
				"lat" => "-35.127745",
				"lon" => "149.20979"
			],
			[
				"postcode" => "2620",
				"suburb" => "HUME",
				"state" => "ACT",
				"lat" => "-35.381752",
				"lon" => "149.176445"
			],
			[
				"postcode" => "2620",
				"suburb" => "KARABAR",
				"state" => "NSW",
				"lat" => "-35.362899",
				"lon" => "149.216388"
			],
			[
				"postcode" => "2620",
				"suburb" => "KOWEN FOREST",
				"state" => "ACT",
				"lat" => "-35.319673",
				"lon" => "149.248421"
			],
			[
				"postcode" => "2620",
				"suburb" => "LETCHWORTH",
				"state" => "NSW",
				"lat" => "-35.356585",
				"lon" => "149.209058"
			],
			[
				"postcode" => "2620",
				"suburb" => "MICHELAGO",
				"state" => "NSW",
				"lat" => "-33.94239",
				"lon" => "150.865056"
			],
			[
				"postcode" => "2620",
				"suburb" => "OAKS ESTATE",
				"state" => "ACT",
				"lat" => "-35.341151",
				"lon" => "149.221576"
			],
			[
				"postcode" => "2620",
				"suburb" => "QUEANBEYAN",
				"state" => "ACT",
				"lat" => "-35.354443",
				"lon" => "149.232083"
			],
			[
				"postcode" => "2620",
				"suburb" => "QUEANBEYAN EAST",
				"state" => "ACT",
				"lat" => "-35.342808",
				"lon" => "149.244392"
			],
			[
				"postcode" => "2620",
				"suburb" => "QUEANBEYAN WEST",
				"state" => "ACT",
				"lat" => "-35.358298",
				"lon" => "149.228993"
			],
			[
				"postcode" => "2620",
				"suburb" => "ROYALLA",
				"state" => "NSW",
				"lat" => "-35.512227",
				"lon" => "149.16269"
			],
			[
				"postcode" => "2620",
				"suburb" => "SUTTON",
				"state" => "NSW",
				"lat" => "-35.161199",
				"lon" => "149.25297"
			],
			[
				"postcode" => "2620",
				"suburb" => "THARWA",
				"state" => "ACT",
				"lat" => "-35.434676",
				"lon" => "149.125536"
			],
			[
				"postcode" => "2620",
				"suburb" => "THE ANGLE",
				"state" => "NSW",
				"lat" => "-34.058994",
				"lon" => "150.835136"
			],
			[
				"postcode" => "2620",
				"suburb" => "THE RIDGEWAY",
				"state" => "NSW",
				"lat" => "-35.342878",
				"lon" => "149.264338"
			],
			[
				"postcode" => "2620",
				"suburb" => "TINDERRY",
				"state" => "NSW",
				"lat" => "-35.734435",
				"lon" => "149.285544"
			],
			[
				"postcode" => "2620",
				"suburb" => "TOP NAAS",
				"state" => "ACT",
				"lat" => "-35.522639",
				"lon" => "149.08098"
			],
			[
				"postcode" => "2620",
				"suburb" => "TRALEE",
				"state" => "NSW",
				"lat" => "-28.227215",
				"lon" => "153.535809"
			],
			[
				"postcode" => "2620",
				"suburb" => "URILA",
				"state" => "NSW",
				"lat" => "-35.588233",
				"lon" => "149.311818"
			],
			[
				"postcode" => "2620",
				"suburb" => "WAMBOIN",
				"state" => "NSW",
				"lat" => "-31.713914",
				"lon" => "148.660146"
			],
			[
				"postcode" => "2620",
				"suburb" => "WILLIAMSDALE",
				"state" => "NSW",
				"lat" => "-35.575036",
				"lon" => "149.187254"
			],
			[
				"postcode" => "2620",
				"suburb" => "YARROW",
				"state" => "NSW",
				"lat" => "-35.41717",
				"lon" => "149.265202"
			],
			[
				"postcode" => "2621",
				"suburb" => "ANEMBO",
				"state" => "NSW",
				"lat" => "-35.805448",
				"lon" => "149.42833"
			],
			[
				"postcode" => "2621",
				"suburb" => "BUNGENDORE",
				"state" => "NSW",
				"lat" => "-35.256083",
				"lon" => "149.440417"
			],
			[
				"postcode" => "2621",
				"suburb" => "BYWONG",
				"state" => "NSW",
				"lat" => "-35.179788",
				"lon" => "149.345703"
			],
			[
				"postcode" => "2621",
				"suburb" => "FORBES CREEK",
				"state" => "NSW",
				"lat" => "-35.427761",
				"lon" => "149.494574"
			],
			[
				"postcode" => "2621",
				"suburb" => "HOSKINSTOWN",
				"state" => "NSW",
				"lat" => "-35.413703",
				"lon" => "149.449817"
			],
			[
				"postcode" => "2621",
				"suburb" => "PRIMROSE VALLEY",
				"state" => "NSW",
				"lat" => "-35.470922",
				"lon" => "149.362232"
			],
			[
				"postcode" => "2621",
				"suburb" => "ROSSI",
				"state" => "NSW",
				"lat" => "-35.470142",
				"lon" => "149.509869"
			],
			[
				"postcode" => "2622",
				"suburb" => "ARALUEN",
				"state" => "NSW",
				"lat" => "-35.64693",
				"lon" => "149.812149"
			],
			[
				"postcode" => "2622",
				"suburb" => "ARALUEN NORTH",
				"state" => "NSW",
				"lat" => "-35.628549",
				"lon" => "149.804609"
			],
			[
				"postcode" => "2622",
				"suburb" => "BACK CREEK",
				"state" => "NSW",
				"lat" => "-35.344316",
				"lon" => "149.940738"
			],
			[
				"postcode" => "2622",
				"suburb" => "BALLALABA",
				"state" => "NSW",
				"lat" => "-35.572682",
				"lon" => "149.666842"
			],
			[
				"postcode" => "2622",
				"suburb" => "BENDOURA",
				"state" => "NSW",
				"lat" => "-35.509154",
				"lon" => "149.686519"
			],
			[
				"postcode" => "2622",
				"suburb" => "BERLANG",
				"state" => "NSW",
				"lat" => "-35.672833",
				"lon" => "149.682874"
			],
			[
				"postcode" => "2622",
				"suburb" => "BOMBAY",
				"state" => "NSW",
				"lat" => "-35.436417",
				"lon" => "149.666636"
			],
			[
				"postcode" => "2622",
				"suburb" => "BORO",
				"state" => "NSW",
				"lat" => "-35.142889",
				"lon" => "149.661589"
			],
			[
				"postcode" => "2622",
				"suburb" => "BRAIDWOOD",
				"state" => "NSW",
				"lat" => "-35.437701",
				"lon" => "149.800868"
			],
			[
				"postcode" => "2622",
				"suburb" => "BUDAWANG",
				"state" => "NSW",
				"lat" => "-35.444285",
				"lon" => "149.966099"
			],
			[
				"postcode" => "2622",
				"suburb" => "BULEE",
				"state" => "NSW",
				"lat" => "-35.007703",
				"lon" => "150.147642"
			],
			[
				"postcode" => "2622",
				"suburb" => "CHARLEYS FOREST",
				"state" => "NSW",
				"lat" => "-35.369064",
				"lon" => "149.996471"
			],
			[
				"postcode" => "2622",
				"suburb" => "COOLUMBURRA",
				"state" => "NSW",
				"lat" => "-35.039519",
				"lon" => "150.096388"
			],
			[
				"postcode" => "2622",
				"suburb" => "CORANG",
				"state" => "NSW",
				"lat" => "-35.180439",
				"lon" => "150.066218"
			],
			[
				"postcode" => "2622",
				"suburb" => "DURRAN DURRA",
				"state" => "NSW",
				"lat" => "-35.342313",
				"lon" => "149.868942"
			],
			[
				"postcode" => "2622",
				"suburb" => "ENDRICK",
				"state" => "NSW",
				"lat" => "-35.12857",
				"lon" => "150.11099"
			],
			[
				"postcode" => "2622",
				"suburb" => "FARRINGDON",
				"state" => "NSW",
				"lat" => "-35.50848",
				"lon" => "149.666101"
			],
			[
				"postcode" => "2622",
				"suburb" => "GUNDILLION",
				"state" => "NSW",
				"lat" => "-35.758795",
				"lon" => "149.63818"
			],
			[
				"postcode" => "2622",
				"suburb" => "HAROLDS CROSS",
				"state" => "NSW",
				"lat" => "-35.557947",
				"lon" => "149.58352"
			],
			[
				"postcode" => "2622",
				"suburb" => "HEREFORD HALL",
				"state" => "NSW",
				"lat" => "-35.814656",
				"lon" => "149.55865"
			],
			[
				"postcode" => "2622",
				"suburb" => "JEMBAICUMBENE",
				"state" => "NSW",
				"lat" => "-35.529644",
				"lon" => "149.79821"
			],
			[
				"postcode" => "2622",
				"suburb" => "JERRABATTGULLA",
				"state" => "NSW",
				"lat" => "-35.689205",
				"lon" => "149.588339"
			],
			[
				"postcode" => "2622",
				"suburb" => "JINDEN",
				"state" => "NSW",
				"lat" => "-35.894745",
				"lon" => "149.596485"
			],
			[
				"postcode" => "2622",
				"suburb" => "JINGERA",
				"state" => "NSW",
				"lat" => "-35.691743",
				"lon" => "149.423278"
			],
			[
				"postcode" => "2622",
				"suburb" => "KINDERVALE",
				"state" => "NSW",
				"lat" => "-35.66411",
				"lon" => "149.527298"
			],
			[
				"postcode" => "2622",
				"suburb" => "KRAWARREE",
				"state" => "NSW",
				"lat" => "-35.822331",
				"lon" => "149.630348"
			],
			[
				"postcode" => "2622",
				"suburb" => "LARBERT",
				"state" => "NSW",
				"lat" => "-35.305951",
				"lon" => "149.766151"
			],
			[
				"postcode" => "2622",
				"suburb" => "MAJORS CREEK",
				"state" => "NSW",
				"lat" => "-35.5706",
				"lon" => "149.738897"
			],
			[
				"postcode" => "2622",
				"suburb" => "MANAR",
				"state" => "NSW",
				"lat" => "-35.296007",
				"lon" => "149.676895"
			],
			[
				"postcode" => "2622",
				"suburb" => "MARLOWE",
				"state" => "NSW",
				"lat" => "-35.277266",
				"lon" => "149.896924"
			],
			[
				"postcode" => "2622",
				"suburb" => "MERRICUMBENE",
				"state" => "NSW",
				"lat" => "-35.729469",
				"lon" => "149.896222"
			],
			[
				"postcode" => "2622",
				"suburb" => "MONGA",
				"state" => "NSW",
				"lat" => "-35.55029",
				"lon" => "149.899619"
			],
			[
				"postcode" => "2622",
				"suburb" => "MONGARLOWE",
				"state" => "NSW",
				"lat" => "-35.422218",
				"lon" => "149.922833"
			],
			[
				"postcode" => "2622",
				"suburb" => "MULLOON",
				"state" => "NSW",
				"lat" => "-35.26821",
				"lon" => "149.612194"
			],
			[
				"postcode" => "2622",
				"suburb" => "MURRENGENBURG",
				"state" => "NSW",
				"lat" => "-35.557944",
				"lon" => "150.017866"
			],
			[
				"postcode" => "2622",
				"suburb" => "NERINGLA",
				"state" => "NSW",
				"lat" => "-35.730751",
				"lon" => "149.79214"
			],
			[
				"postcode" => "2622",
				"suburb" => "NERRIGA",
				"state" => "NSW",
				"lat" => "-35.113182",
				"lon" => "150.088704"
			],
			[
				"postcode" => "2622",
				"suburb" => "NORTHANGERA",
				"state" => "NSW",
				"lat" => "-35.480567",
				"lon" => "149.922942"
			],
			[
				"postcode" => "2622",
				"suburb" => "OALLEN",
				"state" => "NSW",
				"lat" => "-35.140146",
				"lon" => "149.959164"
			],
			[
				"postcode" => "2622",
				"suburb" => "PALERANG",
				"state" => "NSW",
				"lat" => "-35.42774",
				"lon" => "149.568117"
			],
			[
				"postcode" => "2622",
				"suburb" => "REIDSDALE",
				"state" => "NSW",
				"lat" => "-35.589709",
				"lon" => "149.845446"
			],
			[
				"postcode" => "2622",
				"suburb" => "SASSAFRAS",
				"state" => "NSW",
				"lat" => "-35.081919",
				"lon" => "150.22494"
			],
			[
				"postcode" => "2622",
				"suburb" => "SNOWBALL",
				"state" => "NSW",
				"lat" => "-35.936661",
				"lon" => "149.581007"
			],
			[
				"postcode" => "2622",
				"suburb" => "ST GEORGE",
				"state" => "NSW",
				"lat" => "-35.048824",
				"lon" => "150.235762"
			],
			[
				"postcode" => "2622",
				"suburb" => "TIANJARA",
				"state" => "NSW",
				"lat" => "-35.112531",
				"lon" => "150.323224"
			],
			[
				"postcode" => "2622",
				"suburb" => "TOMBOYE",
				"state" => "NSW",
				"lat" => "-35.250558",
				"lon" => "149.980278"
			],
			[
				"postcode" => "2622",
				"suburb" => "TOUGA",
				"state" => "NSW",
				"lat" => "-34.960012",
				"lon" => "150.085034"
			],
			[
				"postcode" => "2622",
				"suburb" => "WARRI",
				"state" => "NSW",
				"lat" => "-35.314647",
				"lon" => "149.72126"
			],
			[
				"postcode" => "2622",
				"suburb" => "WOG WOG",
				"state" => "NSW",
				"lat" => "-35.242018",
				"lon" => "150.02645"
			],
			[
				"postcode" => "2622",
				"suburb" => "WYANBENE",
				"state" => "NSW",
				"lat" => "-35.774689",
				"lon" => "149.675965"
			],
			[
				"postcode" => "2623",
				"suburb" => "CAPTAINS FLAT",
				"state" => "NSW",
				"lat" => "-35.552827",
				"lon" => "149.445083"
			],
			[
				"postcode" => "2624",
				"suburb" => "KOSCIUSZKO",
				"state" => "NSW",
				"lat" => "-36.180818",
				"lon" => "148.441281"
			],
			[
				"postcode" => "2624",
				"suburb" => "PERISHER VALLEY",
				"state" => "NSW",
				"lat" => "-36.409836",
				"lon" => "148.404294"
			],
			[
				"postcode" => "2625",
				"suburb" => "THREDBO",
				"state" => "NSW",
				"lat" => "-36.50661",
				"lon" => "148.301005"
			],
			[
				"postcode" => "2625",
				"suburb" => "THREDBO VILLAGE",
				"state" => "NSW",
				"lat" => "-36.50661",
				"lon" => "148.301005"
			],
			[
				"postcode" => "2626",
				"suburb" => "BREDBO",
				"state" => "NSW",
				"lat" => "-35.959129",
				"lon" => "149.150191"
			],
			[
				"postcode" => "2626",
				"suburb" => "BUMBALONG",
				"state" => "NSW",
				"lat" => "-35.861268",
				"lon" => "149.13088"
			],
			[
				"postcode" => "2626",
				"suburb" => "COLINTON",
				"state" => "NSW",
				"lat" => "-35.861015",
				"lon" => "149.158071"
			],
			[
				"postcode" => "2627",
				"suburb" => "CRACKENBACK",
				"state" => "NSW",
				"lat" => "-36.441153",
				"lon" => "148.511421"
			],
			[
				"postcode" => "2627",
				"suburb" => "EAST JINDABYNE",
				"state" => "NSW",
				"lat" => "-36.401823",
				"lon" => "148.652518"
			],
			[
				"postcode" => "2627",
				"suburb" => "GROSSES PLAIN",
				"state" => "NSW",
				"lat" => "-36.574794",
				"lon" => "148.485067"
			],
			[
				"postcode" => "2627",
				"suburb" => "GUNGARLIN",
				"state" => "NSW",
				"lat" => "-36.242012",
				"lon" => "148.545978"
			],
			[
				"postcode" => "2627",
				"suburb" => "HILL TOP",
				"state" => "NSW",
				"lat" => "-33.796292",
				"lon" => "151.272681"
			],
			[
				"postcode" => "2627",
				"suburb" => "INGEBIRAH",
				"state" => "NSW",
				"lat" => "-36.624836",
				"lon" => "148.507059"
			],
			[
				"postcode" => "2627",
				"suburb" => "JINDABYNE",
				"state" => "NSW",
				"lat" => "-36.415074",
				"lon" => "148.618871"
			],
			[
				"postcode" => "2627",
				"suburb" => "KALKITE",
				"state" => "NSW",
				"lat" => "-36.334764",
				"lon" => "148.636658"
			],
			[
				"postcode" => "2627",
				"suburb" => "MOONBAH",
				"state" => "NSW",
				"lat" => "-36.494333",
				"lon" => "148.551912"
			],
			[
				"postcode" => "2627",
				"suburb" => "PILOT WILDERNESS",
				"state" => "NSW",
				"lat" => "-36.702108",
				"lon" => "148.249475"
			],
			[
				"postcode" => "2628",
				"suburb" => "AVONSIDE",
				"state" => "NSW",
				"lat" => "-36.438997",
				"lon" => "148.701689"
			],
			[
				"postcode" => "2628",
				"suburb" => "BELOKA",
				"state" => "NSW",
				"lat" => "-36.539348",
				"lon" => "148.746418"
			],
			[
				"postcode" => "2628",
				"suburb" => "BERRIDALE",
				"state" => "NSW",
				"lat" => "-36.36953",
				"lon" => "148.830045"
			],
			[
				"postcode" => "2628",
				"suburb" => "BRAEMAR",
				"state" => "NSW",
				"lat" => "-36.103116",
				"lon" => "148.652752"
			],
			[
				"postcode" => "2628",
				"suburb" => "BYADBO WILDERNESS",
				"state" => "NSW",
				"lat" => "-36.846098",
				"lon" => "148.429585"
			],
			[
				"postcode" => "2628",
				"suburb" => "COOTRALANTRA",
				"state" => "NSW",
				"lat" => "-36.257027",
				"lon" => "148.879996"
			],
			[
				"postcode" => "2628",
				"suburb" => "DALGETY",
				"state" => "NSW",
				"lat" => "-36.502267",
				"lon" => "148.834562"
			],
			[
				"postcode" => "2628",
				"suburb" => "EUCUMBENE",
				"state" => "NSW",
				"lat" => "-36.140581",
				"lon" => "148.634191"
			],
			[
				"postcode" => "2628",
				"suburb" => "EUCUMBENE COVE",
				"state" => "NSW",
				"lat" => "-36.226853",
				"lon" => "148.672685"
			],
			[
				"postcode" => "2628",
				"suburb" => "NIMMO",
				"state" => "NSW",
				"lat" => "-36.185489",
				"lon" => "148.632997"
			],
			[
				"postcode" => "2628",
				"suburb" => "NUMBLA VALE",
				"state" => "NSW",
				"lat" => "-36.636685",
				"lon" => "148.817931"
			],
			[
				"postcode" => "2628",
				"suburb" => "PAUPONG",
				"state" => "NSW",
				"lat" => "-36.646591",
				"lon" => "148.646819"
			],
			[
				"postcode" => "2628",
				"suburb" => "ROCKY PLAIN",
				"state" => "NSW",
				"lat" => "-36.226837",
				"lon" => "148.673031"
			],
			[
				"postcode" => "2628",
				"suburb" => "SNOWY PLAINS",
				"state" => "NSW",
				"lat" => "-36.154191",
				"lon" => "148.565367"
			],
			[
				"postcode" => "2629",
				"suburb" => "ADAMINABY",
				"state" => "NSW",
				"lat" => "-35.997349",
				"lon" => "148.769744"
			],
			[
				"postcode" => "2629",
				"suburb" => "ANGLERS REACH",
				"state" => "NSW",
				"lat" => "-35.999196",
				"lon" => "148.664848"
			],
			[
				"postcode" => "2629",
				"suburb" => "BOLARO",
				"state" => "NSW",
				"lat" => "-35.978989",
				"lon" => "148.841015"
			],
			[
				"postcode" => "2629",
				"suburb" => "CABRAMURRA",
				"state" => "NSW",
				"lat" => "-35.939511",
				"lon" => "148.385746"
			],
			[
				"postcode" => "2629",
				"suburb" => "LONG PLAIN",
				"state" => "NSW",
				"lat" => "-35.688852",
				"lon" => "148.550615"
			],
			[
				"postcode" => "2629",
				"suburb" => "OLD ADAMINABY",
				"state" => "NSW",
				"lat" => "-36.029411",
				"lon" => "148.701954"
			],
			[
				"postcode" => "2629",
				"suburb" => "PROVIDENCE PORTAL",
				"state" => "NSW",
				"lat" => "-35.942898",
				"lon" => "148.62841"
			],
			[
				"postcode" => "2629",
				"suburb" => "TANTANGARA",
				"state" => "NSW",
				"lat" => "-35.790897",
				"lon" => "148.665701"
			],
			[
				"postcode" => "2629",
				"suburb" => "YAOUK",
				"state" => "NSW",
				"lat" => "-35.822302",
				"lon" => "148.809946"
			],
			[
				"postcode" => "2630",
				"suburb" => "ARABLE",
				"state" => "NSW",
				"lat" => "-36.367368",
				"lon" => "148.945534"
			],
			[
				"postcode" => "2630",
				"suburb" => "BADJA",
				"state" => "NSW",
				"lat" => "-36.076239",
				"lon" => "149.531732"
			],
			[
				"postcode" => "2630",
				"suburb" => "BILLILINGRA",
				"state" => "NSW",
				"lat" => "-36.009878",
				"lon" => "149.145822"
			],
			[
				"postcode" => "2630",
				"suburb" => "BINJURA",
				"state" => "NSW",
				"lat" => "-36.180676",
				"lon" => "149.10666"
			],
			[
				"postcode" => "2630",
				"suburb" => "BOBUNDARA",
				"state" => "NSW",
				"lat" => "-36.486151",
				"lon" => "148.992917"
			],
			[
				"postcode" => "2630",
				"suburb" => "BUCKENDERRA",
				"state" => "NSW",
				"lat" => "-36.181563",
				"lon" => "148.764404"
			],
			[
				"postcode" => "2630",
				"suburb" => "BUNGARBY",
				"state" => "NSW",
				"lat" => "-36.64944",
				"lon" => "149.002848"
			],
			[
				"postcode" => "2630",
				"suburb" => "BUNYAN",
				"state" => "NSW",
				"lat" => "-36.16963",
				"lon" => "149.153753"
			],
			[
				"postcode" => "2630",
				"suburb" => "CARLAMINDA",
				"state" => "NSW",
				"lat" => "-36.254154",
				"lon" => "149.309474"
			],
			[
				"postcode" => "2630",
				"suburb" => "CHAKOLA",
				"state" => "NSW",
				"lat" => "-36.072585",
				"lon" => "149.159951"
			],
			[
				"postcode" => "2630",
				"suburb" => "COOLRINGDON",
				"state" => "NSW",
				"lat" => "-36.248127",
				"lon" => "148.949925"
			],
			[
				"postcode" => "2630",
				"suburb" => "COOMA",
				"state" => "NSW",
				"lat" => "-36.236579",
				"lon" => "149.125456"
			],
			[
				"postcode" => "2630",
				"suburb" => "COOMA NORTH",
				"state" => "NSW",
				"lat" => "-36.219587",
				"lon" => "149.131404"
			],
			[
				"postcode" => "2630",
				"suburb" => "COUNTEGANY",
				"state" => "NSW",
				"lat" => "-36.190509",
				"lon" => "149.458677"
			],
			[
				"postcode" => "2630",
				"suburb" => "DAIRYMANS PLAINS",
				"state" => "NSW",
				"lat" => "-36.204435",
				"lon" => "149.034048"
			],
			[
				"postcode" => "2630",
				"suburb" => "DANGELONG",
				"state" => "NSW",
				"lat" => "-36.34927",
				"lon" => "149.28558"
			],
			[
				"postcode" => "2630",
				"suburb" => "DRY PLAIN",
				"state" => "NSW",
				"lat" => "-36.102972",
				"lon" => "148.899096"
			],
			[
				"postcode" => "2630",
				"suburb" => "FRYING PAN",
				"state" => "NSW",
				"lat" => "-36.157553",
				"lon" => "148.844593"
			],
			[
				"postcode" => "2630",
				"suburb" => "GLEN FERGUS",
				"state" => "NSW",
				"lat" => "-36.195004",
				"lon" => "149.256904"
			],
			[
				"postcode" => "2630",
				"suburb" => "IRONMUNGY",
				"state" => "NSW",
				"lat" => "-36.588422",
				"lon" => "148.941209"
			],
			[
				"postcode" => "2630",
				"suburb" => "JERANGLE",
				"state" => "NSW",
				"lat" => "-35.885731",
				"lon" => "149.358866"
			],
			[
				"postcode" => "2630",
				"suburb" => "JIMENBUEN",
				"state" => "NSW",
				"lat" => "-36.740918",
				"lon" => "148.904734"
			],
			[
				"postcode" => "2630",
				"suburb" => "MAFFRA",
				"state" => "NSW",
				"lat" => "-36.541824",
				"lon" => "148.968015"
			],
			[
				"postcode" => "2630",
				"suburb" => "MIDDLE FLAT",
				"state" => "NSW",
				"lat" => "-36.24231",
				"lon" => "149.180558"
			],
			[
				"postcode" => "2630",
				"suburb" => "MIDDLINGBANK",
				"state" => "NSW",
				"lat" => "-36.216412",
				"lon" => "148.809771"
			],
			[
				"postcode" => "2630",
				"suburb" => "MURRUMBUCCA",
				"state" => "NSW",
				"lat" => "-36.074246",
				"lon" => "149.068914"
			],
			[
				"postcode" => "2630",
				"suburb" => "MYALLA",
				"state" => "NSW",
				"lat" => "-36.427599",
				"lon" => "149.123033"
			],
			[
				"postcode" => "2630",
				"suburb" => "NUMERALLA",
				"state" => "NSW",
				"lat" => "-36.177223",
				"lon" => "149.340668"
			],
			[
				"postcode" => "2630",
				"suburb" => "PEAK VIEW",
				"state" => "NSW",
				"lat" => "-36.093615",
				"lon" => "149.372138"
			],
			[
				"postcode" => "2630",
				"suburb" => "PINE VALLEY",
				"state" => "NSW",
				"lat" => "-36.242939",
				"lon" => "149.062079"
			],
			[
				"postcode" => "2630",
				"suburb" => "POLO FLAT",
				"state" => "NSW",
				"lat" => "-36.239517",
				"lon" => "149.152117"
			],
			[
				"postcode" => "2630",
				"suburb" => "RHINE FALLS",
				"state" => "NSW",
				"lat" => "-36.189498",
				"lon" => "148.892937"
			],
			[
				"postcode" => "2630",
				"suburb" => "ROCK FLAT",
				"state" => "NSW",
				"lat" => "-36.348444",
				"lon" => "149.211761"
			],
			[
				"postcode" => "2630",
				"suburb" => "ROSE VALLEY",
				"state" => "NSW",
				"lat" => "-36.124127",
				"lon" => "149.257968"
			],
			[
				"postcode" => "2630",
				"suburb" => "SHANNONS FLAT",
				"state" => "NSW",
				"lat" => "-35.933274",
				"lon" => "148.957847"
			],
			[
				"postcode" => "2630",
				"suburb" => "SPRINGFIELD",
				"state" => "NSW",
				"lat" => "-36.542351",
				"lon" => "149.076874"
			],
			[
				"postcode" => "2630",
				"suburb" => "THE BROTHERS",
				"state" => "NSW",
				"lat" => "-36.34749",
				"lon" => "149.065485"
			],
			[
				"postcode" => "2630",
				"suburb" => "TUROSS",
				"state" => "NSW",
				"lat" => "-36.27041",
				"lon" => "149.486847"
			],
			[
				"postcode" => "2630",
				"suburb" => "WAMBROOK",
				"state" => "NSW",
				"lat" => "-36.207892",
				"lon" => "148.946956"
			],
			[
				"postcode" => "2631",
				"suburb" => "ANDO",
				"state" => "NSW",
				"lat" => "-36.739931",
				"lon" => "149.261211"
			],
			[
				"postcode" => "2631",
				"suburb" => "BOCO",
				"state" => "NSW",
				"lat" => "-36.607736",
				"lon" => "149.123391"
			],
			[
				"postcode" => "2631",
				"suburb" => "CREEWAH",
				"state" => "NSW",
				"lat" => "-36.762864",
				"lon" => "149.372004"
			],
			[
				"postcode" => "2631",
				"suburb" => "GLEN ALLEN",
				"state" => "NSW",
				"lat" => "-36.677158",
				"lon" => "149.381171"
			],
			[
				"postcode" => "2631",
				"suburb" => "GREENLANDS",
				"state" => "NSW",
				"lat" => "-36.500889",
				"lon" => "149.428699"
			],
			[
				"postcode" => "2631",
				"suburb" => "HOLTS FLAT",
				"state" => "NSW",
				"lat" => "-36.640048",
				"lon" => "149.288248"
			],
			[
				"postcode" => "2631",
				"suburb" => "KYBEYAN",
				"state" => "NSW",
				"lat" => "-36.32455",
				"lon" => "149.502285"
			],
			[
				"postcode" => "2631",
				"suburb" => "MOUNT COOPER",
				"state" => "NSW",
				"lat" => "-36.665121",
				"lon" => "149.184806"
			],
			[
				"postcode" => "2631",
				"suburb" => "NIMMITABEL",
				"state" => "NSW",
				"lat" => "-36.518225",
				"lon" => "149.280424"
			],
			[
				"postcode" => "2631",
				"suburb" => "STEEPLE FLAT",
				"state" => "NSW",
				"lat" => "-36.602349",
				"lon" => "149.352328"
			],
			[
				"postcode" => "2631",
				"suburb" => "WINIFRED",
				"state" => "NSW",
				"lat" => "-36.513601",
				"lon" => "149.339186"
			],
			[
				"postcode" => "2632",
				"suburb" => "BIBBENLUKE",
				"state" => "NSW",
				"lat" => "-36.815805",
				"lon" => "149.283408"
			],
			[
				"postcode" => "2632",
				"suburb" => "BOMBALA",
				"state" => "NSW",
				"lat" => "-36.909544",
				"lon" => "149.242198"
			],
			[
				"postcode" => "2632",
				"suburb" => "BONDI FOREST",
				"state" => "NSW",
				"lat" => "-37.119454",
				"lon" => "149.173088"
			],
			[
				"postcode" => "2632",
				"suburb" => "BUKALONG",
				"state" => "NSW",
				"lat" => "-36.797861",
				"lon" => "149.203029"
			],
			[
				"postcode" => "2632",
				"suburb" => "CAMBALONG",
				"state" => "NSW",
				"lat" => "-36.877712",
				"lon" => "149.114802"
			],
			[
				"postcode" => "2632",
				"suburb" => "CATHCART",
				"state" => "NSW",
				"lat" => "-36.843699",
				"lon" => "149.388335"
			],
			[
				"postcode" => "2632",
				"suburb" => "COOLUMBOOKA",
				"state" => "NSW",
				"lat" => "-36.864492",
				"lon" => "149.328529"
			],
			[
				"postcode" => "2632",
				"suburb" => "CRAIGIE",
				"state" => "NSW",
				"lat" => "-37.071027",
				"lon" => "149.049329"
			],
			[
				"postcode" => "2632",
				"suburb" => "GUNNINGRAH",
				"state" => "NSW",
				"lat" => "-36.747228",
				"lon" => "149.152418"
			],
			[
				"postcode" => "2632",
				"suburb" => "LORDS HILL",
				"state" => "NSW",
				"lat" => "-36.922767",
				"lon" => "149.162853"
			],
			[
				"postcode" => "2632",
				"suburb" => "MERRIANGAAH",
				"state" => "NSW",
				"lat" => "-36.81874",
				"lon" => "149.042621"
			],
			[
				"postcode" => "2632",
				"suburb" => "MILA",
				"state" => "NSW",
				"lat" => "-37.055378",
				"lon" => "149.170141"
			],
			[
				"postcode" => "2632",
				"suburb" => "MOUNT DARRAGH",
				"state" => "NSW",
				"lat" => "-36.848551",
				"lon" => "149.535499"
			],
			[
				"postcode" => "2632",
				"suburb" => "PADDYS FLAT",
				"state" => "NSW",
				"lat" => "-37.030697",
				"lon" => "149.307993"
			],
			[
				"postcode" => "2632",
				"suburb" => "PALARANG",
				"state" => "NSW",
				"lat" => "-36.834825",
				"lon" => "149.120031"
			],
			[
				"postcode" => "2632",
				"suburb" => "QUIDONG",
				"state" => "NSW",
				"lat" => "-36.905988",
				"lon" => "149.03387"
			],
			[
				"postcode" => "2632",
				"suburb" => "ROCKTON",
				"state" => "NSW",
				"lat" => "-37.139224",
				"lon" => "149.31633"
			],
			[
				"postcode" => "2632",
				"suburb" => "ROSEMEATH",
				"state" => "NSW",
				"lat" => "-36.936628",
				"lon" => "149.239513"
			],
			[
				"postcode" => "2633",
				"suburb" => "CORROWONG",
				"state" => "NSW",
				"lat" => "-36.933875",
				"lon" => "148.826148"
			],
			[
				"postcode" => "2633",
				"suburb" => "DELEGATE",
				"state" => "NSW",
				"lat" => "-37.044028",
				"lon" => "148.941735"
			],
			[
				"postcode" => "2633",
				"suburb" => "TOMBONG",
				"state" => "NSW",
				"lat" => "-36.903034",
				"lon" => "148.929961"
			],
			[
				"postcode" => "2640",
				"suburb" => "ALBURY",
				"state" => "NSW",
				"lat" => "-36.082137",
				"lon" => "146.910174"
			],
			[
				"postcode" => "2640",
				"suburb" => "BUNGOWANNAH",
				"state" => "NSW",
				"lat" => "-36.005507",
				"lon" => "146.727509"
			],
			[
				"postcode" => "2640",
				"suburb" => "EAST ALBURY",
				"state" => "NSW",
				"lat" => "-36.075617",
				"lon" => "146.929105"
			],
			[
				"postcode" => "2640",
				"suburb" => "ETTAMOGAH",
				"state" => "NSW",
				"lat" => "-36.023864",
				"lon" => "146.987373"
			],
			[
				"postcode" => "2640",
				"suburb" => "GLENROY",
				"state" => "NSW",
				"lat" => "-36.055261",
				"lon" => "146.912777"
			],
			[
				"postcode" => "2640",
				"suburb" => "LAKE HUME VILLAGE",
				"state" => "NSW",
				"lat" => "-36.101584",
				"lon" => "147.036487"
			],
			[
				"postcode" => "2640",
				"suburb" => "MOORWATHA",
				"state" => "NSW",
				"lat" => "-35.920784",
				"lon" => "146.670153"
			],
			[
				"postcode" => "2640",
				"suburb" => "NORTH ALBURY",
				"state" => "NSW",
				"lat" => "-36.062952",
				"lon" => "146.931552"
			],
			[
				"postcode" => "2640",
				"suburb" => "OURNIE",
				"state" => "NSW",
				"lat" => "-35.944829",
				"lon" => "147.849724"
			],
			[
				"postcode" => "2640",
				"suburb" => "SOUTH ALBURY",
				"state" => "NSW",
				"lat" => "-36.097002",
				"lon" => "146.915213"
			],
			[
				"postcode" => "2640",
				"suburb" => "SPLITTERS CREEK",
				"state" => "NSW",
				"lat" => "-36.063828",
				"lon" => "146.844998"
			],
			[
				"postcode" => "2640",
				"suburb" => "TABLE TOP",
				"state" => "NSW",
				"lat" => "-35.98027",
				"lon" => "147.000325"
			],
			[
				"postcode" => "2640",
				"suburb" => "TALMALMO",
				"state" => "NSW",
				"lat" => "-35.958207",
				"lon" => "147.558379"
			],
			[
				"postcode" => "2640",
				"suburb" => "THURGOONA",
				"state" => "NSW",
				"lat" => "-36.044475",
				"lon" => "146.989961"
			],
			[
				"postcode" => "2640",
				"suburb" => "WEST ALBURY",
				"state" => "NSW",
				"lat" => "-36.073344",
				"lon" => "146.890443"
			],
			[
				"postcode" => "2640",
				"suburb" => "WIRLINGA",
				"state" => "NSW",
				"lat" => "-36.069726",
				"lon" => "147.013164"
			],
			[
				"postcode" => "2640",
				"suburb" => "WYMAH",
				"state" => "NSW",
				"lat" => "-35.997177",
				"lon" => "147.265503"
			],
			[
				"postcode" => "2641",
				"suburb" => "HAMILTON VALLEY",
				"state" => "NSW",
				"lat" => "-36.037497",
				"lon" => "146.919729"
			],
			[
				"postcode" => "2641",
				"suburb" => "LAVINGTON",
				"state" => "NSW",
				"lat" => "-36.050577",
				"lon" => "146.933346"
			],
			[
				"postcode" => "2641",
				"suburb" => "SPRINGDALE HEIGHTS",
				"state" => "NSW",
				"lat" => "-36.033316",
				"lon" => "146.94484"
			],
			[
				"postcode" => "2642",
				"suburb" => "BIDGEEMIA",
				"state" => "NSW",
				"lat" => "-35.437209",
				"lon" => "146.439875"
			],
			[
				"postcode" => "2642",
				"suburb" => "BROCKLESBY",
				"state" => "NSW",
				"lat" => "-35.822589",
				"lon" => "146.680117"
			],
			[
				"postcode" => "2642",
				"suburb" => "BURRUMBUTTOCK",
				"state" => "NSW",
				"lat" => "-35.835429",
				"lon" => "146.802861"
			],
			[
				"postcode" => "2642",
				"suburb" => "GEEHI",
				"state" => "NSW",
				"lat" => "-36.389084",
				"lon" => "148.182153"
			],
			[
				"postcode" => "2642",
				"suburb" => "GEROGERY",
				"state" => "NSW",
				"lat" => "-35.834294",
				"lon" => "146.994255"
			],
			[
				"postcode" => "2642",
				"suburb" => "GLENELLEN",
				"state" => "NSW",
				"lat" => "-35.905226",
				"lon" => "146.910578"
			],
			[
				"postcode" => "2642",
				"suburb" => "GREG GREG",
				"state" => "NSW",
				"lat" => "-36.062257",
				"lon" => "148.036079"
			],
			[
				"postcode" => "2642",
				"suburb" => "INDI",
				"state" => "NSW",
				"lat" => "-36.266036",
				"lon" => "148.045157"
			],
			[
				"postcode" => "2642",
				"suburb" => "JAGUMBA",
				"state" => "NSW",
				"lat" => "-36.039093",
				"lon" => "148.309215"
			],
			[
				"postcode" => "2642",
				"suburb" => "JAGUNGAL WILDERNESS",
				"state" => "NSW",
				"lat" => "-36.161658",
				"lon" => "148.314032"
			],
			[
				"postcode" => "2642",
				"suburb" => "JINDERA",
				"state" => "NSW",
				"lat" => "-35.950071",
				"lon" => "146.885946"
			],
			[
				"postcode" => "2642",
				"suburb" => "JINGELLIC",
				"state" => "NSW",
				"lat" => "-35.92561",
				"lon" => "147.69994"
			],
			[
				"postcode" => "2642",
				"suburb" => "KHANCOBAN",
				"state" => "NSW",
				"lat" => "-36.218087",
				"lon" => "148.129398"
			],
			[
				"postcode" => "2642",
				"suburb" => "MURRAY GORGE",
				"state" => "NSW",
				"lat" => "-36.46569",
				"lon" => "148.148739"
			],
			[
				"postcode" => "2642",
				"suburb" => "RAND",
				"state" => "NSW",
				"lat" => "-35.593047",
				"lon" => "146.577718"
			],
			[
				"postcode" => "2642",
				"suburb" => "TOOMA",
				"state" => "NSW",
				"lat" => "-35.97108",
				"lon" => "148.052595"
			],
			[
				"postcode" => "2642",
				"suburb" => "WALBUNDRIE",
				"state" => "NSW",
				"lat" => "-35.690162",
				"lon" => "146.72127"
			],
			[
				"postcode" => "2642",
				"suburb" => "WELAREGANG",
				"state" => "NSW",
				"lat" => "-36.013749",
				"lon" => "147.961586"
			],
			[
				"postcode" => "2642",
				"suburb" => "YERONG CREEK",
				"state" => "NSW",
				"lat" => "-35.387447",
				"lon" => "147.061231"
			],
			[
				"postcode" => "2643",
				"suburb" => "HOWLONG",
				"state" => "NSW",
				"lat" => "-35.958568",
				"lon" => "146.60586"
			],
			[
				"postcode" => "2644",
				"suburb" => "BOWNA",
				"state" => "NSW",
				"lat" => "-35.964984",
				"lon" => "147.130856"
			],
			[
				"postcode" => "2644",
				"suburb" => "COPPABELLA",
				"state" => "NSW",
				"lat" => "-35.735984",
				"lon" => "147.699528"
			],
			[
				"postcode" => "2644",
				"suburb" => "HOLBROOK",
				"state" => "NSW",
				"lat" => "-35.729414",
				"lon" => "147.309788"
			],
			[
				"postcode" => "2644",
				"suburb" => "LANKEYS CREEK",
				"state" => "NSW",
				"lat" => "-35.798556",
				"lon" => "147.639449"
			],
			[
				"postcode" => "2644",
				"suburb" => "LITTLE BILLABONG",
				"state" => "NSW",
				"lat" => "-35.587981",
				"lon" => "147.529705"
			],
			[
				"postcode" => "2644",
				"suburb" => "MOUNTAIN CREEK",
				"state" => "NSW",
				"lat" => "-35.798189",
				"lon" => "147.164883"
			],
			[
				"postcode" => "2644",
				"suburb" => "MULLENGANDRA",
				"state" => "NSW",
				"lat" => "-35.87712",
				"lon" => "147.180565"
			],
			[
				"postcode" => "2644",
				"suburb" => "WANTAGONG",
				"state" => "NSW",
				"lat" => "-35.762211",
				"lon" => "147.415611"
			],
			[
				"postcode" => "2644",
				"suburb" => "WOOMARGAMA",
				"state" => "NSW",
				"lat" => "-35.832854",
				"lon" => "147.247561"
			],
			[
				"postcode" => "2645",
				"suburb" => "COONONG",
				"state" => "NSW",
				"lat" => "-35.129938",
				"lon" => "146.125254"
			],
			[
				"postcode" => "2645",
				"suburb" => "URANA",
				"state" => "NSW",
				"lat" => "-35.329447",
				"lon" => "146.265684"
			],
			[
				"postcode" => "2645",
				"suburb" => "YULUMA",
				"state" => "NSW",
				"lat" => "-35.15918",
				"lon" => "146.501247"
			],
			[
				"postcode" => "2646",
				"suburb" => "BALLDALE",
				"state" => "NSW",
				"lat" => "-35.845724",
				"lon" => "146.518358"
			],
			[
				"postcode" => "2646",
				"suburb" => "BULL PLAIN",
				"state" => "NSW",
				"lat" => "-35.75917",
				"lon" => "146.131217"
			],
			[
				"postcode" => "2646",
				"suburb" => "BURAJA",
				"state" => "NSW",
				"lat" => "-35.857846",
				"lon" => "146.371386"
			],
			[
				"postcode" => "2646",
				"suburb" => "COADS TANK",
				"state" => "NSW",
				"lat" => "-35.715813",
				"lon" => "146.223548"
			],
			[
				"postcode" => "2646",
				"suburb" => "COLLENDINA",
				"state" => "NSW",
				"lat" => "-36.020152",
				"lon" => "146.211992"
			],
			[
				"postcode" => "2646",
				"suburb" => "COREEN",
				"state" => "NSW",
				"lat" => "-35.729292",
				"lon" => "146.342168"
			],
			[
				"postcode" => "2646",
				"suburb" => "COROWA",
				"state" => "NSW",
				"lat" => "-35.997952",
				"lon" => "146.391214"
			],
			[
				"postcode" => "2646",
				"suburb" => "DAYSDALE",
				"state" => "NSW",
				"lat" => "-35.64762",
				"lon" => "146.306628"
			],
			[
				"postcode" => "2646",
				"suburb" => "GOOMBARGANA",
				"state" => "NSW",
				"lat" => "-35.799435",
				"lon" => "146.575225"
			],
			[
				"postcode" => "2646",
				"suburb" => "HOPEFIELD",
				"state" => "NSW",
				"lat" => "-35.89661",
				"lon" => "146.436504"
			],
			[
				"postcode" => "2646",
				"suburb" => "LOWESDALE",
				"state" => "NSW",
				"lat" => "-35.842556",
				"lon" => "146.365642"
			],
			[
				"postcode" => "2646",
				"suburb" => "NYORA",
				"state" => "NSW",
				"lat" => "-35.511323",
				"lon" => "145.989105"
			],
			[
				"postcode" => "2646",
				"suburb" => "OAKLANDS",
				"state" => "NSW",
				"lat" => "-35.557882",
				"lon" => "146.167771"
			],
			[
				"postcode" => "2646",
				"suburb" => "REDLANDS",
				"state" => "NSW",
				"lat" => "-35.929602",
				"lon" => "146.29433"
			],
			[
				"postcode" => "2646",
				"suburb" => "RENNIE",
				"state" => "NSW",
				"lat" => "-35.812497",
				"lon" => "146.132863"
			],
			[
				"postcode" => "2646",
				"suburb" => "RINGWOOD",
				"state" => "NSW",
				"lat" => "-35.843151",
				"lon" => "146.243504"
			],
			[
				"postcode" => "2646",
				"suburb" => "SANGER",
				"state" => "NSW",
				"lat" => "-35.703756",
				"lon" => "146.150243"
			],
			[
				"postcode" => "2646",
				"suburb" => "SAVERNAKE",
				"state" => "NSW",
				"lat" => "-35.734786",
				"lon" => "146.049317"
			],
			[
				"postcode" => "2647",
				"suburb" => "MULWALA",
				"state" => "NSW",
				"lat" => "-35.954159",
				"lon" => "145.963942"
			],
			[
				"postcode" => "2648",
				"suburb" => "BOEILL CREEK",
				"state" => "NSW",
				"lat" => "-34.152621",
				"lon" => "142.090252"
			],
			[
				"postcode" => "2648",
				"suburb" => "CAL LAL",
				"state" => "NSW",
				"lat" => "-34.006404",
				"lon" => "141.115301"
			],
			[
				"postcode" => "2648",
				"suburb" => "CURLWAA",
				"state" => "NSW",
				"lat" => "-34.09281",
				"lon" => "141.965558"
			],
			[
				"postcode" => "2648",
				"suburb" => "MOURQUONG",
				"state" => "NSW",
				"lat" => "-34.138711",
				"lon" => "142.162958"
			],
			[
				"postcode" => "2648",
				"suburb" => "PALINYEWAH",
				"state" => "NSW",
				"lat" => "-33.824751",
				"lon" => "142.155568"
			],
			[
				"postcode" => "2648",
				"suburb" => "PAN BAN",
				"state" => "NSW",
				"lat" => "-33.279915",
				"lon" => "143.182337"
			],
			[
				"postcode" => "2648",
				"suburb" => "POMONA",
				"state" => "NSW",
				"lat" => "-34.020625",
				"lon" => "141.894926"
			],
			[
				"postcode" => "2648",
				"suburb" => "POONCARIE",
				"state" => "NSW",
				"lat" => "-33.386995",
				"lon" => "142.570537"
			],
			[
				"postcode" => "2648",
				"suburb" => "RUFUS RIVER",
				"state" => "NSW",
				"lat" => "-34.010922",
				"lon" => "141.542087"
			],
			[
				"postcode" => "2648",
				"suburb" => "SCOTIA",
				"state" => "NSW",
				"lat" => "-33.405433",
				"lon" => "141.35451"
			],
			[
				"postcode" => "2648",
				"suburb" => "WENTWORTH",
				"state" => "NSW",
				"lat" => "-34.106868",
				"lon" => "141.919215"
			],
			[
				"postcode" => "2649",
				"suburb" => "LAUREL HILL",
				"state" => "NSW",
				"lat" => "-35.60039",
				"lon" => "148.0931"
			],
			[
				"postcode" => "2649",
				"suburb" => "NURENMERENMONG",
				"state" => "NSW",
				"lat" => "-35.805164",
				"lon" => "148.220404"
			],
			[
				"postcode" => "2650",
				"suburb" => "ALFREDTOWN",
				"state" => "NSW",
				"lat" => "-35.161474",
				"lon" => "147.512382"
			],
			[
				"postcode" => "2650",
				"suburb" => "ASHMONT",
				"state" => "NSW",
				"lat" => "-35.12318",
				"lon" => "147.329956"
			],
			[
				"postcode" => "2650",
				"suburb" => "BELFRAYDEN",
				"state" => "NSW",
				"lat" => "-35.116803",
				"lon" => "147.053164"
			],
			[
				"postcode" => "2650",
				"suburb" => "BERRY JERRY",
				"state" => "NSW",
				"lat" => "-34.715862",
				"lon" => "147.25704"
			],
			[
				"postcode" => "2650",
				"suburb" => "BIG SPRINGS",
				"state" => "NSW",
				"lat" => "-35.326669",
				"lon" => "147.43227"
			],
			[
				"postcode" => "2650",
				"suburb" => "BOMEN",
				"state" => "NSW",
				"lat" => "-35.072722",
				"lon" => "147.410611"
			],
			[
				"postcode" => "2650",
				"suburb" => "BOOK BOOK",
				"state" => "NSW",
				"lat" => "-35.356567",
				"lon" => "147.557002"
			],
			[
				"postcode" => "2650",
				"suburb" => "BOOROOMA",
				"state" => "NSW",
				"lat" => "-35.074014",
				"lon" => "147.365426"
			],
			[
				"postcode" => "2650",
				"suburb" => "BORAMBOLA",
				"state" => "NSW",
				"lat" => "-35.171605",
				"lon" => "147.692709"
			],
			[
				"postcode" => "2650",
				"suburb" => "BOURKELANDS",
				"state" => "NSW",
				"lat" => "-35.150342",
				"lon" => "147.355213"
			],
			[
				"postcode" => "2650",
				"suburb" => "BRUCEDALE",
				"state" => "NSW",
				"lat" => "-35.001237",
				"lon" => "147.413057"
			],
			[
				"postcode" => "2650",
				"suburb" => "BULGARY",
				"state" => "NSW",
				"lat" => "-35.070309",
				"lon" => "146.963014"
			],
			[
				"postcode" => "2650",
				"suburb" => "BURRANDANA",
				"state" => "NSW",
				"lat" => "-35.418993",
				"lon" => "147.351011"
			],
			[
				"postcode" => "2650",
				"suburb" => "CARABOST",
				"state" => "NSW",
				"lat" => "-35.578722",
				"lon" => "147.717144"
			],
			[
				"postcode" => "2650",
				"suburb" => "CARTWRIGHTS HILL",
				"state" => "NSW",
				"lat" => "-35.069754",
				"lon" => "147.389575"
			],
			[
				"postcode" => "2650",
				"suburb" => "COLLINGULLIE",
				"state" => "NSW",
				"lat" => "-35.071845",
				"lon" => "147.11146"
			],
			[
				"postcode" => "2650",
				"suburb" => "COOKARDINIA",
				"state" => "NSW",
				"lat" => "-35.558522",
				"lon" => "147.232617"
			],
			[
				"postcode" => "2650",
				"suburb" => "CURRAWANANNA",
				"state" => "NSW",
				"lat" => "-35.010665",
				"lon" => "147.057633"
			],
			[
				"postcode" => "2650",
				"suburb" => "CURRAWARNA",
				"state" => "NSW",
				"lat" => "-35.015097",
				"lon" => "147.073075"
			],
			[
				"postcode" => "2650",
				"suburb" => "DOWNSIDE",
				"state" => "NSW",
				"lat" => "-34.976629",
				"lon" => "147.344314"
			],
			[
				"postcode" => "2650",
				"suburb" => "EAST WAGGA WAGGA",
				"state" => "NSW",
				"lat" => "-35.120886",
				"lon" => "147.382993"
			],
			[
				"postcode" => "2650",
				"suburb" => "ESTELLA",
				"state" => "NSW",
				"lat" => "-35.068165",
				"lon" => "147.353408"
			],
			[
				"postcode" => "2650",
				"suburb" => "EUBERTA",
				"state" => "NSW",
				"lat" => "-35.059159",
				"lon" => "147.190921"
			],
			[
				"postcode" => "2650",
				"suburb" => "GELSTON PARK",
				"state" => "NSW",
				"lat" => "-35.233266",
				"lon" => "147.33784"
			],
			[
				"postcode" => "2650",
				"suburb" => "GLENFIELD PARK",
				"state" => "NSW",
				"lat" => "-35.13891",
				"lon" => "147.334699"
			],
			[
				"postcode" => "2650",
				"suburb" => "GOBBAGOMBALIN",
				"state" => "NSW",
				"lat" => "-35.066598",
				"lon" => "147.32005"
			],
			[
				"postcode" => "2650",
				"suburb" => "GREGADOO",
				"state" => "NSW",
				"lat" => "-35.229449",
				"lon" => "147.422814"
			],
			[
				"postcode" => "2650",
				"suburb" => "HAREFIELD",
				"state" => "NSW",
				"lat" => "-34.969758",
				"lon" => "147.566468"
			],
			[
				"postcode" => "2650",
				"suburb" => "HILLGROVE",
				"state" => "NSW",
				"lat" => "-35.043233",
				"lon" => "147.349886"
			],
			[
				"postcode" => "2650",
				"suburb" => "KOORINGAL",
				"state" => "NSW",
				"lat" => "-35.135247",
				"lon" => "147.376284"
			],
			[
				"postcode" => "2650",
				"suburb" => "KYEAMBA",
				"state" => "NSW",
				"lat" => "-35.458705",
				"lon" => "147.615542"
			],
			[
				"postcode" => "2650",
				"suburb" => "LAKE ALBERT",
				"state" => "NSW",
				"lat" => "-35.166085",
				"lon" => "147.381816"
			],
			[
				"postcode" => "2650",
				"suburb" => "LLOYD",
				"state" => "NSW",
				"lat" => "-35.14755",
				"lon" => "147.335216"
			],
			[
				"postcode" => "2650",
				"suburb" => "MAXWELL",
				"state" => "NSW",
				"lat" => "-35.297673",
				"lon" => "147.335189"
			],
			[
				"postcode" => "2650",
				"suburb" => "MOORONG",
				"state" => "NSW",
				"lat" => "-35.122246",
				"lon" => "147.318106"
			],
			[
				"postcode" => "2650",
				"suburb" => "MOUNT AUSTIN",
				"state" => "NSW",
				"lat" => "-35.133028",
				"lon" => "147.358403"
			],
			[
				"postcode" => "2650",
				"suburb" => "NORTH WAGGA WAGGA",
				"state" => "NSW",
				"lat" => "-35.097097",
				"lon" => "147.379424"
			],
			[
				"postcode" => "2650",
				"suburb" => "OBERNE CREEK",
				"state" => "NSW",
				"lat" => "-35.491891",
				"lon" => "147.859945"
			],
			[
				"postcode" => "2650",
				"suburb" => "OURA",
				"state" => "NSW",
				"lat" => "-35.099147",
				"lon" => "147.598058"
			],
			[
				"postcode" => "2650",
				"suburb" => "PULLETOP",
				"state" => "NSW",
				"lat" => "-35.441305",
				"lon" => "147.382253"
			],
			[
				"postcode" => "2650",
				"suburb" => "ROWAN",
				"state" => "NSW",
				"lat" => "-35.198139",
				"lon" => "147.326776"
			],
			[
				"postcode" => "2650",
				"suburb" => "SAN ISIDORE",
				"state" => "NSW",
				"lat" => "-35.111163",
				"lon" => "147.287126"
			],
			[
				"postcode" => "2650",
				"suburb" => "SOUTH WAGGA WAGGA",
				"state" => "NSW",
				"lat" => "-35.120883",
				"lon" => "147.355477"
			],
			[
				"postcode" => "2650",
				"suburb" => "SPRINGVALE",
				"state" => "NSW",
				"lat" => "-35.169517",
				"lon" => "147.334074"
			],
			[
				"postcode" => "2650",
				"suburb" => "TATTON",
				"state" => "NSW",
				"lat" => "-35.153335",
				"lon" => "147.365282"
			],
			[
				"postcode" => "2650",
				"suburb" => "THE GAP",
				"state" => "NSW",
				"lat" => "-33.486146",
				"lon" => "150.147653"
			],
			[
				"postcode" => "2650",
				"suburb" => "TOLLAND",
				"state" => "NSW",
				"lat" => "-35.147915",
				"lon" => "147.349979"
			],
			[
				"postcode" => "2650",
				"suburb" => "TURVEY PARK",
				"state" => "NSW",
				"lat" => "-35.131926",
				"lon" => "147.35864"
			],
			[
				"postcode" => "2650",
				"suburb" => "WAGGA WAGGA",
				"state" => "NSW",
				"lat" => "-35.109861",
				"lon" => "147.370515"
			],
			[
				"postcode" => "2650",
				"suburb" => "WAGGA WAGGA SOUTH",
				"state" => "NSW",
				"lat" => "-35.120883",
				"lon" => "147.355477"
			],
			[
				"postcode" => "2650",
				"suburb" => "WALLACETOWN",
				"state" => "NSW",
				"lat" => "-34.966946",
				"lon" => "147.443503"
			],
			[
				"postcode" => "2650",
				"suburb" => "WANTABADGERY",
				"state" => "NSW",
				"lat" => "-35.042064",
				"lon" => "147.752829"
			],
			[
				"postcode" => "2650",
				"suburb" => "WESTDALE",
				"state" => "NSW",
				"lat" => "-35.5605",
				"lon" => "147.908455"
			],
			[
				"postcode" => "2650",
				"suburb" => "YARRAGUNDRY",
				"state" => "NSW",
				"lat" => "-35.106865",
				"lon" => "147.214352"
			],
			[
				"postcode" => "2650",
				"suburb" => "YATHELLA",
				"state" => "NSW",
				"lat" => "-34.927515",
				"lon" => "147.465053"
			],
			[
				"postcode" => "2651",
				"suburb" => "FOREST HILL",
				"state" => "NSW",
				"lat" => "-32.707981",
				"lon" => "151.55001"
			],
			[
				"postcode" => "2652",
				"suburb" => "BOORGA",
				"state" => "NSW",
				"lat" => "-34.039439",
				"lon" => "146.030172"
			],
			[
				"postcode" => "2652",
				"suburb" => "BOREE CREEK",
				"state" => "NSW",
				"lat" => "-35.106183",
				"lon" => "146.61426"
			],
			[
				"postcode" => "2652",
				"suburb" => "GALORE",
				"state" => "NSW",
				"lat" => "-35.006426",
				"lon" => "146.893574"
			],
			[
				"postcode" => "2652",
				"suburb" => "GOOLGOWI",
				"state" => "NSW",
				"lat" => "-33.983547",
				"lon" => "145.708082"
			],
			[
				"postcode" => "2652",
				"suburb" => "GRONG GRONG",
				"state" => "NSW",
				"lat" => "-34.73818",
				"lon" => "146.781265"
			],
			[
				"postcode" => "2652",
				"suburb" => "GUMLY GUMLY",
				"state" => "NSW",
				"lat" => "-35.123768",
				"lon" => "147.421169"
			],
			[
				"postcode" => "2652",
				"suburb" => "HUMULA",
				"state" => "NSW",
				"lat" => "-35.483054",
				"lon" => "147.764179"
			],
			[
				"postcode" => "2652",
				"suburb" => "LADYSMITH",
				"state" => "NSW",
				"lat" => "-35.207801",
				"lon" => "147.513984"
			],
			[
				"postcode" => "2652",
				"suburb" => "MANGOPLAH",
				"state" => "NSW",
				"lat" => "-35.375169",
				"lon" => "147.253056"
			],
			[
				"postcode" => "2652",
				"suburb" => "MARRAR",
				"state" => "NSW",
				"lat" => "-34.823698",
				"lon" => "147.350199"
			],
			[
				"postcode" => "2652",
				"suburb" => "MATONG",
				"state" => "NSW",
				"lat" => "-34.767836",
				"lon" => "146.919333"
			],
			[
				"postcode" => "2652",
				"suburb" => "MERRIWAGGA",
				"state" => "NSW",
				"lat" => "-33.820291",
				"lon" => "145.622346"
			],
			[
				"postcode" => "2652",
				"suburb" => "MURRULEBALE",
				"state" => "NSW",
				"lat" => "-34.718734",
				"lon" => "147.395919"
			],
			[
				"postcode" => "2652",
				"suburb" => "OLD JUNEE",
				"state" => "NSW",
				"lat" => "-34.836391",
				"lon" => "147.514786"
			],
			[
				"postcode" => "2652",
				"suburb" => "ROSEWOOD",
				"state" => "NSW",
				"lat" => "-35.67475",
				"lon" => "147.864041"
			],
			[
				"postcode" => "2652",
				"suburb" => "TABBITA",
				"state" => "NSW",
				"lat" => "-34.105646",
				"lon" => "145.847824"
			],
			[
				"postcode" => "2652",
				"suburb" => "TARCUTTA",
				"state" => "NSW",
				"lat" => "-35.27561",
				"lon" => "147.738748"
			],
			[
				"postcode" => "2652",
				"suburb" => "URANQUINTY",
				"state" => "NSW",
				"lat" => "-35.194776",
				"lon" => "147.243051"
			],
			[
				"postcode" => "2653",
				"suburb" => "BURRA",
				"state" => "NSW",
				"lat" => "-35.829468",
				"lon" => "148.068724"
			],
			[
				"postcode" => "2653",
				"suburb" => "COURABYRA",
				"state" => "NSW",
				"lat" => "-35.687207",
				"lon" => "148.041856"
			],
			[
				"postcode" => "2653",
				"suburb" => "GLENROY",
				"state" => "NSW",
				"lat" => "-35.751601",
				"lon" => "147.942916"
			],
			[
				"postcode" => "2653",
				"suburb" => "MANNUS",
				"state" => "NSW",
				"lat" => "-35.799191",
				"lon" => "147.937205"
			],
			[
				"postcode" => "2653",
				"suburb" => "MARAGLE",
				"state" => "NSW",
				"lat" => "-35.911163",
				"lon" => "148.095771"
			],
			[
				"postcode" => "2653",
				"suburb" => "MUNDEROO",
				"state" => "NSW",
				"lat" => "-35.87911",
				"lon" => "147.848164"
			],
			[
				"postcode" => "2653",
				"suburb" => "PADDYS RIVER",
				"state" => "NSW",
				"lat" => "-35.810372",
				"lon" => "148.177373"
			],
			[
				"postcode" => "2653",
				"suburb" => "TARADALE",
				"state" => "NSW",
				"lat" => "-35.622554",
				"lon" => "147.939906"
			],
			[
				"postcode" => "2653",
				"suburb" => "TUMBARUMBA",
				"state" => "NSW",
				"lat" => "-35.777459",
				"lon" => "148.012861"
			],
			[
				"postcode" => "2653",
				"suburb" => "WILLIGOBUNG",
				"state" => "NSW",
				"lat" => "-35.660245",
				"lon" => "148.056296"
			],
			[
				"postcode" => "2655",
				"suburb" => "BIRDLIP",
				"state" => "NSW",
				"lat" => "-35.319006",
				"lon" => "147.189768"
			],
			[
				"postcode" => "2655",
				"suburb" => "FRENCH PARK",
				"state" => "NSW",
				"lat" => "-35.267046",
				"lon" => "146.926513"
			],
			[
				"postcode" => "2655",
				"suburb" => "KUBURA",
				"state" => "NSW",
				"lat" => "-35.33785",
				"lon" => "147.073563"
			],
			[
				"postcode" => "2655",
				"suburb" => "THE ROCK",
				"state" => "NSW",
				"lat" => "-35.268365",
				"lon" => "147.114843"
			],
			[
				"postcode" => "2655",
				"suburb" => "TOOTOOL",
				"state" => "NSW",
				"lat" => "-35.187423",
				"lon" => "146.97431"
			],
			[
				"postcode" => "2656",
				"suburb" => "BROOKDALE",
				"state" => "NSW",
				"lat" => "-35.124957",
				"lon" => "147.001238"
			],
			[
				"postcode" => "2656",
				"suburb" => "FARGUNYAH",
				"state" => "NSW",
				"lat" => "-35.139998",
				"lon" => "146.7186"
			],
			[
				"postcode" => "2656",
				"suburb" => "LOCKHART",
				"state" => "NSW",
				"lat" => "-35.221085",
				"lon" => "146.716343"
			],
			[
				"postcode" => "2656",
				"suburb" => "MILBRULONG",
				"state" => "NSW",
				"lat" => "-35.26049",
				"lon" => "146.841971"
			],
			[
				"postcode" => "2656",
				"suburb" => "OSBORNE",
				"state" => "NSW",
				"lat" => "-35.366132",
				"lon" => "146.780495"
			],
			[
				"postcode" => "2656",
				"suburb" => "URANGELINE",
				"state" => "NSW",
				"lat" => "-35.432979",
				"lon" => "146.618983"
			],
			[
				"postcode" => "2656",
				"suburb" => "URANGELINE EAST",
				"state" => "NSW",
				"lat" => "-35.482878",
				"lon" => "146.694289"
			],
			[
				"postcode" => "2658",
				"suburb" => "GRUBBEN",
				"state" => "NSW",
				"lat" => "-35.43665",
				"lon" => "146.989498"
			],
			[
				"postcode" => "2658",
				"suburb" => "HENTY",
				"state" => "NSW",
				"lat" => "-35.517186",
				"lon" => "147.035781"
			],
			[
				"postcode" => "2658",
				"suburb" => "MUNYABLA",
				"state" => "NSW",
				"lat" => "-35.493857",
				"lon" => "146.871898"
			],
			[
				"postcode" => "2658",
				"suburb" => "PLEASANT HILLS",
				"state" => "NSW",
				"lat" => "-35.467017",
				"lon" => "146.797165"
			],
			[
				"postcode" => "2658",
				"suburb" => "RYAN",
				"state" => "NSW",
				"lat" => "-35.563496",
				"lon" => "146.866121"
			],
			[
				"postcode" => "2659",
				"suburb" => "ALMA PARK",
				"state" => "NSW",
				"lat" => "-35.604129",
				"lon" => "146.791693"
			],
			[
				"postcode" => "2659",
				"suburb" => "WALLA WALLA",
				"state" => "NSW",
				"lat" => "-35.766734",
				"lon" => "146.901019"
			],
			[
				"postcode" => "2660",
				"suburb" => "CARNSDALE",
				"state" => "NSW",
				"lat" => "-35.670726",
				"lon" => "146.999996"
			],
			[
				"postcode" => "2660",
				"suburb" => "CULCAIRN",
				"state" => "NSW",
				"lat" => "-35.667766",
				"lon" => "147.03717"
			],
			[
				"postcode" => "2660",
				"suburb" => "MORVEN",
				"state" => "NSW",
				"lat" => "-35.659128",
				"lon" => "147.120414"
			],
			[
				"postcode" => "2661",
				"suburb" => "KAPOOKA",
				"state" => "NSW",
				"lat" => "-35.14779",
				"lon" => "147.295748"
			],
			[
				"postcode" => "2663",
				"suburb" => "BUNDURE",
				"state" => "NSW",
				"lat" => "-35.149379",
				"lon" => "145.978867"
			],
			[
				"postcode" => "2663",
				"suburb" => "COOBA",
				"state" => "NSW",
				"lat" => "-34.950316",
				"lon" => "147.855837"
			],
			[
				"postcode" => "2663",
				"suburb" => "COWABBIE",
				"state" => "NSW",
				"lat" => "-34.599476",
				"lon" => "147.011298"
			],
			[
				"postcode" => "2663",
				"suburb" => "ERIN VALE",
				"state" => "NSW",
				"lat" => "-34.650984",
				"lon" => "147.541882"
			],
			[
				"postcode" => "2663",
				"suburb" => "EURONGILLY",
				"state" => "NSW",
				"lat" => "-34.944956",
				"lon" => "147.767675"
			],
			[
				"postcode" => "2663",
				"suburb" => "JUNEE",
				"state" => "NSW",
				"lat" => "-34.870998",
				"lon" => "147.584679"
			],
			[
				"postcode" => "2663",
				"suburb" => "LANDERVALE",
				"state" => "NSW",
				"lat" => "-34.569142",
				"lon" => "146.680712"
			],
			[
				"postcode" => "2663",
				"suburb" => "MARINNA",
				"state" => "NSW",
				"lat" => "-34.841094",
				"lon" => "147.652553"
			],
			[
				"postcode" => "2663",
				"suburb" => "WANTIOOL",
				"state" => "NSW",
				"lat" => "-34.930582",
				"lon" => "147.697782"
			],
			[
				"postcode" => "2665",
				"suburb" => "ARDLETHAN",
				"state" => "NSW",
				"lat" => "-34.357355",
				"lon" => "146.903401"
			],
			[
				"postcode" => "2665",
				"suburb" => "ARIAH PARK",
				"state" => "NSW",
				"lat" => "-34.348105",
				"lon" => "147.221222"
			],
			[
				"postcode" => "2665",
				"suburb" => "BARELLAN",
				"state" => "NSW",
				"lat" => "-34.28434",
				"lon" => "146.571256"
			],
			[
				"postcode" => "2665",
				"suburb" => "BECKOM",
				"state" => "NSW",
				"lat" => "-34.32731",
				"lon" => "146.959974"
			],
			[
				"postcode" => "2665",
				"suburb" => "BECTRIC",
				"state" => "NSW",
				"lat" => "-34.477176",
				"lon" => "147.289448"
			],
			[
				"postcode" => "2665",
				"suburb" => "BINYA",
				"state" => "NSW",
				"lat" => "-34.228297",
				"lon" => "146.337827"
			],
			[
				"postcode" => "2665",
				"suburb" => "KAMARAH",
				"state" => "NSW",
				"lat" => "-34.368121",
				"lon" => "146.76096"
			],
			[
				"postcode" => "2665",
				"suburb" => "MIRROOL",
				"state" => "NSW",
				"lat" => "-34.287957",
				"lon" => "147.095065"
			],
			[
				"postcode" => "2665",
				"suburb" => "MOOMBOOLDOOL",
				"state" => "NSW",
				"lat" => "-34.301732",
				"lon" => "146.678025"
			],
			[
				"postcode" => "2665",
				"suburb" => "MOUNT CRYSTAL",
				"state" => "NSW",
				"lat" => "-34.518176",
				"lon" => "146.687175"
			],
			[
				"postcode" => "2665",
				"suburb" => "QUANDARY",
				"state" => "NSW",
				"lat" => "-34.343429",
				"lon" => "147.311681"
			],
			[
				"postcode" => "2665",
				"suburb" => "TARA",
				"state" => "NSW",
				"lat" => "-34.490989",
				"lon" => "147.182474"
			],
			[
				"postcode" => "2665",
				"suburb" => "WALLEROOBIE",
				"state" => "NSW",
				"lat" => "-34.486918",
				"lon" => "146.99859"
			],
			[
				"postcode" => "2666",
				"suburb" => "COMBANING",
				"state" => "NSW",
				"lat" => "-34.458856",
				"lon" => "147.68243"
			],
			[
				"postcode" => "2666",
				"suburb" => "DIRNASEER",
				"state" => "NSW",
				"lat" => "-34.635232",
				"lon" => "147.76128"
			],
			[
				"postcode" => "2666",
				"suburb" => "GIDGINBUNG",
				"state" => "NSW",
				"lat" => "-34.333696",
				"lon" => "147.526342"
			],
			[
				"postcode" => "2666",
				"suburb" => "GROGAN",
				"state" => "NSW",
				"lat" => "-34.248023",
				"lon" => "147.782067"
			],
			[
				"postcode" => "2666",
				"suburb" => "JUNEE REEFS",
				"state" => "NSW",
				"lat" => "-34.728115",
				"lon" => "147.63037"
			],
			[
				"postcode" => "2666",
				"suburb" => "MIMOSA",
				"state" => "NSW",
				"lat" => "-34.630675",
				"lon" => "147.360726"
			],
			[
				"postcode" => "2666",
				"suburb" => "MORANGARELL",
				"state" => "NSW",
				"lat" => "-34.14751",
				"lon" => "147.701431"
			],
			[
				"postcode" => "2666",
				"suburb" => "NARRABURRA",
				"state" => "NSW",
				"lat" => "-34.335826",
				"lon" => "147.64999"
			],
			[
				"postcode" => "2666",
				"suburb" => "PUCAWAN",
				"state" => "NSW",
				"lat" => "-34.396676",
				"lon" => "147.354875"
			],
			[
				"postcode" => "2666",
				"suburb" => "REEFTON",
				"state" => "NSW",
				"lat" => "-34.247121",
				"lon" => "147.436969"
			],
			[
				"postcode" => "2666",
				"suburb" => "SEBASTOPOL",
				"state" => "NSW",
				"lat" => "-34.580296",
				"lon" => "147.517663"
			],
			[
				"postcode" => "2666",
				"suburb" => "SPRINGDALE",
				"state" => "NSW",
				"lat" => "-34.465713",
				"lon" => "147.717295"
			],
			[
				"postcode" => "2666",
				"suburb" => "TEMORA",
				"state" => "NSW",
				"lat" => "-34.446858",
				"lon" => "147.533742"
			],
			[
				"postcode" => "2666",
				"suburb" => "TRUNGLEY HALL",
				"state" => "NSW",
				"lat" => "-34.288518",
				"lon" => "147.555937"
			],
			[
				"postcode" => "2668",
				"suburb" => "BARMEDMAN",
				"state" => "NSW",
				"lat" => "-34.184676",
				"lon" => "147.406754"
			],
			[
				"postcode" => "2669",
				"suburb" => "BYGALORIE",
				"state" => "NSW",
				"lat" => "-33.498371",
				"lon" => "146.803615"
			],
			[
				"postcode" => "2669",
				"suburb" => "ERIGOLIA",
				"state" => "NSW",
				"lat" => "-33.856208",
				"lon" => "146.353487"
			],
			[
				"postcode" => "2669",
				"suburb" => "GIRRAL",
				"state" => "NSW",
				"lat" => "-33.704027",
				"lon" => "147.071818"
			],
			[
				"postcode" => "2669",
				"suburb" => "KIKOIRA",
				"state" => "NSW",
				"lat" => "-33.654659",
				"lon" => "146.663346"
			],
			[
				"postcode" => "2669",
				"suburb" => "MELBERGEN",
				"state" => "NSW",
				"lat" => "-33.733449",
				"lon" => "145.995651"
			],
			[
				"postcode" => "2669",
				"suburb" => "NARADHAN",
				"state" => "NSW",
				"lat" => "-33.613483",
				"lon" => "146.325067"
			],
			[
				"postcode" => "2669",
				"suburb" => "RANKINS SPRINGS",
				"state" => "NSW",
				"lat" => "-33.840127",
				"lon" => "146.265437"
			],
			[
				"postcode" => "2669",
				"suburb" => "TALLIMBA",
				"state" => "NSW",
				"lat" => "-33.994402",
				"lon" => "146.879692"
			],
			[
				"postcode" => "2669",
				"suburb" => "TULLIBIGEAL",
				"state" => "NSW",
				"lat" => "-33.420093",
				"lon" => "146.728083"
			],
			[
				"postcode" => "2669",
				"suburb" => "UNGARIE",
				"state" => "NSW",
				"lat" => "-33.639341",
				"lon" => "146.974678"
			],
			[
				"postcode" => "2669",
				"suburb" => "WEETHALLE",
				"state" => "NSW",
				"lat" => "-33.875402",
				"lon" => "146.625969"
			],
			[
				"postcode" => "2669",
				"suburb" => "WEJA",
				"state" => "NSW",
				"lat" => "-33.535908",
				"lon" => "146.824349"
			],
			[
				"postcode" => "2671",
				"suburb" => "ALLEENA",
				"state" => "NSW",
				"lat" => "-34.109459",
				"lon" => "147.140966"
			],
			[
				"postcode" => "2671",
				"suburb" => "BACK CREEK",
				"state" => "NSW",
				"lat" => "-33.828897",
				"lon" => "147.446045"
			],
			[
				"postcode" => "2671",
				"suburb" => "BURCHER",
				"state" => "NSW",
				"lat" => "-33.515238",
				"lon" => "147.250059"
			],
			[
				"postcode" => "2671",
				"suburb" => "LAKE COWAL",
				"state" => "NSW",
				"lat" => "-33.693808",
				"lon" => "147.33317"
			],
			[
				"postcode" => "2671",
				"suburb" => "NORTH YALGOGRIN",
				"state" => "NSW",
				"lat" => "-33.822918",
				"lon" => "146.847552"
			],
			[
				"postcode" => "2671",
				"suburb" => "WEST WYALONG",
				"state" => "NSW",
				"lat" => "-33.923496",
				"lon" => "147.205201"
			],
			[
				"postcode" => "2671",
				"suburb" => "WYALONG",
				"state" => "NSW",
				"lat" => "-33.925882",
				"lon" => "147.243019"
			],
			[
				"postcode" => "2672",
				"suburb" => "BURGOONEY",
				"state" => "NSW",
				"lat" => "-33.387503",
				"lon" => "146.579788"
			],
			[
				"postcode" => "2672",
				"suburb" => "CURLEW WATERS",
				"state" => "NSW",
				"lat" => "-33.260877",
				"lon" => "146.431816"
			],
			[
				"postcode" => "2672",
				"suburb" => "LAKE CARGELLIGO",
				"state" => "NSW",
				"lat" => "-33.298908",
				"lon" => "146.370322"
			],
			[
				"postcode" => "2672",
				"suburb" => "MURRIN BRIDGE",
				"state" => "NSW",
				"lat" => "-33.200644",
				"lon" => "146.35969"
			],
			[
				"postcode" => "2672",
				"suburb" => "WARGAMBEGAL",
				"state" => "NSW",
				"lat" => "-33.36065",
				"lon" => "146.493355"
			],
			[
				"postcode" => "2675",
				"suburb" => "HILLSTON",
				"state" => "NSW",
				"lat" => "-33.481365",
				"lon" => "145.534656"
			],
			[
				"postcode" => "2675",
				"suburb" => "LAKE BREWSTER",
				"state" => "NSW",
				"lat" => "-33.517295",
				"lon" => "146.012729"
			],
			[
				"postcode" => "2675",
				"suburb" => "MONIA GAP",
				"state" => "NSW",
				"lat" => "-33.603017",
				"lon" => "145.972304"
			],
			[
				"postcode" => "2675",
				"suburb" => "ROTO",
				"state" => "NSW",
				"lat" => "-33.058497",
				"lon" => "145.343022"
			],
			[
				"postcode" => "2675",
				"suburb" => "WALLANTHERY",
				"state" => "NSW",
				"lat" => "-33.376979",
				"lon" => "145.896859"
			],
			[
				"postcode" => "2678",
				"suburb" => "CHARLES STURT UNIVERSITY",
				"state" => "NSW",
				"lat" => "-35.059334",
				"lon" => "147.351953"
			],
			[
				"postcode" => "2680",
				"suburb" => "BEELBANGERA",
				"state" => "NSW",
				"lat" => "-34.257097",
				"lon" => "146.100092"
			],
			[
				"postcode" => "2680",
				"suburb" => "BENEREMBAH",
				"state" => "NSW",
				"lat" => "-34.441694",
				"lon" => "145.815266"
			],
			[
				"postcode" => "2680",
				"suburb" => "BILBUL",
				"state" => "NSW",
				"lat" => "-34.273406",
				"lon" => "146.138176"
			],
			[
				"postcode" => "2680",
				"suburb" => "GRIFFITH",
				"state" => "NSW",
				"lat" => "-34.289045",
				"lon" => "146.043671"
			],
			[
				"postcode" => "2680",
				"suburb" => "GRIFFITH EAST",
				"state" => "NSW",
				"lat" => "-34.283593",
				"lon" => "146.058792"
			],
			[
				"postcode" => "2680",
				"suburb" => "HANWOOD",
				"state" => "NSW",
				"lat" => "-34.329292",
				"lon" => "146.041304"
			],
			[
				"postcode" => "2680",
				"suburb" => "KOOBA",
				"state" => "NSW",
				"lat" => "-34.419238",
				"lon" => "146.098827"
			],
			[
				"postcode" => "2680",
				"suburb" => "LAKE WYANGAN",
				"state" => "NSW",
				"lat" => "-34.247507",
				"lon" => "146.032567"
			],
			[
				"postcode" => "2680",
				"suburb" => "NERICON",
				"state" => "NSW",
				"lat" => "-34.168334",
				"lon" => "146.036209"
			],
			[
				"postcode" => "2680",
				"suburb" => "THARBOGANG",
				"state" => "NSW",
				"lat" => "-34.255222",
				"lon" => "145.988692"
			],
			[
				"postcode" => "2680",
				"suburb" => "WARBURN",
				"state" => "NSW",
				"lat" => "-34.174779",
				"lon" => "145.919586"
			],
			[
				"postcode" => "2680",
				"suburb" => "WARRAWIDGEE",
				"state" => "NSW",
				"lat" => "-34.281102",
				"lon" => "145.801961"
			],
			[
				"postcode" => "2680",
				"suburb" => "WIDGELLI",
				"state" => "NSW",
				"lat" => "-34.332465",
				"lon" => "146.143813"
			],
			[
				"postcode" => "2680",
				"suburb" => "WILLBRIGGIE",
				"state" => "NSW",
				"lat" => "-34.467973",
				"lon" => "146.016037"
			],
			[
				"postcode" => "2680",
				"suburb" => "YOOGALI",
				"state" => "NSW",
				"lat" => "-34.30118",
				"lon" => "146.084633"
			],
			[
				"postcode" => "2681",
				"suburb" => "MYALL PARK",
				"state" => "NSW",
				"lat" => "-34.177539",
				"lon" => "146.108252"
			],
			[
				"postcode" => "2681",
				"suburb" => "YENDA",
				"state" => "NSW",
				"lat" => "-34.24907",
				"lon" => "146.195555"
			],
			[
				"postcode" => "2700",
				"suburb" => "BIRREGO",
				"state" => "NSW",
				"lat" => "-35.031701",
				"lon" => "146.612603"
			],
			[
				"postcode" => "2700",
				"suburb" => "COLINROOBIE",
				"state" => "NSW",
				"lat" => "-34.538884",
				"lon" => "146.593441"
			],
			[
				"postcode" => "2700",
				"suburb" => "COROBIMILLA",
				"state" => "NSW",
				"lat" => "-34.868082",
				"lon" => "146.413618"
			],
			[
				"postcode" => "2700",
				"suburb" => "CUDGEL",
				"state" => "NSW",
				"lat" => "-34.665506",
				"lon" => "146.448905"
			],
			[
				"postcode" => "2700",
				"suburb" => "EUROLEY",
				"state" => "NSW",
				"lat" => "-34.639124",
				"lon" => "146.374247"
			],
			[
				"postcode" => "2700",
				"suburb" => "FAITHFULL",
				"state" => "NSW",
				"lat" => "-35.039829",
				"lon" => "146.675303"
			],
			[
				"postcode" => "2700",
				"suburb" => "GILLENBAH",
				"state" => "NSW",
				"lat" => "-34.768998",
				"lon" => "146.53099"
			],
			[
				"postcode" => "2700",
				"suburb" => "KYWONG",
				"state" => "NSW",
				"lat" => "-35.016524",
				"lon" => "146.735854"
			],
			[
				"postcode" => "2700",
				"suburb" => "MORUNDAH",
				"state" => "NSW",
				"lat" => "-34.946675",
				"lon" => "146.295124"
			],
			[
				"postcode" => "2700",
				"suburb" => "NARRANDERA",
				"state" => "NSW",
				"lat" => "-34.744609",
				"lon" => "146.55696"
			],
			[
				"postcode" => "2700",
				"suburb" => "PAYNTERS SIDING",
				"state" => "NSW",
				"lat" => "-34.698098",
				"lon" => "146.527013"
			],
			[
				"postcode" => "2700",
				"suburb" => "SANDIGO",
				"state" => "NSW",
				"lat" => "-34.914604",
				"lon" => "146.63488"
			],
			[
				"postcode" => "2700",
				"suburb" => "WIDGIEWA",
				"state" => "NSW",
				"lat" => "-35.044402",
				"lon" => "146.197258"
			],
			[
				"postcode" => "2701",
				"suburb" => "COOLAMON",
				"state" => "NSW",
				"lat" => "-34.815539",
				"lon" => "147.200085"
			],
			[
				"postcode" => "2701",
				"suburb" => "METHUL",
				"state" => "NSW",
				"lat" => "-34.590712",
				"lon" => "147.101167"
			],
			[
				"postcode" => "2701",
				"suburb" => "RANNOCK",
				"state" => "NSW",
				"lat" => "-34.609166",
				"lon" => "147.263967"
			],
			[
				"postcode" => "2701",
				"suburb" => "TOOYAL",
				"state" => "NSW",
				"lat" => "-34.856195",
				"lon" => "147.224422"
			],
			[
				"postcode" => "2702",
				"suburb" => "GANMAIN",
				"state" => "NSW",
				"lat" => "-34.794899",
				"lon" => "147.038823"
			],
			[
				"postcode" => "2703",
				"suburb" => "YANCO",
				"state" => "NSW",
				"lat" => "-34.630843",
				"lon" => "146.40345"
			],
			[
				"postcode" => "2705",
				"suburb" => "BROBENAH",
				"state" => "NSW",
				"lat" => "-34.48697",
				"lon" => "146.433213"
			],
			[
				"postcode" => "2705",
				"suburb" => "CALORAFIELD",
				"state" => "NSW",
				"lat" => "-34.439842",
				"lon" => "146.220656"
			],
			[
				"postcode" => "2705",
				"suburb" => "CORBIE HILL",
				"state" => "NSW",
				"lat" => "-34.571538",
				"lon" => "146.456385"
			],
			[
				"postcode" => "2705",
				"suburb" => "GOGELDRIE",
				"state" => "NSW",
				"lat" => "-34.555569",
				"lon" => "146.282891"
			],
			[
				"postcode" => "2705",
				"suburb" => "LEETON",
				"state" => "NSW",
				"lat" => "-34.5522",
				"lon" => "146.406444"
			],
			[
				"postcode" => "2705",
				"suburb" => "MERUNGLE HILL",
				"state" => "NSW",
				"lat" => "-34.585995",
				"lon" => "146.427404"
			],
			[
				"postcode" => "2705",
				"suburb" => "MURRAMI",
				"state" => "NSW",
				"lat" => "-34.426116",
				"lon" => "146.30075"
			],
			[
				"postcode" => "2705",
				"suburb" => "STANBRIDGE",
				"state" => "NSW",
				"lat" => "-34.517721",
				"lon" => "146.235644"
			],
			[
				"postcode" => "2705",
				"suburb" => "WAMOON",
				"state" => "NSW",
				"lat" => "-34.53493",
				"lon" => "146.331552"
			],
			[
				"postcode" => "2705",
				"suburb" => "WHITTON",
				"state" => "NSW",
				"lat" => "-34.517992",
				"lon" => "146.185556"
			],
			[
				"postcode" => "2706",
				"suburb" => "DARLINGTON POINT",
				"state" => "NSW",
				"lat" => "-34.557729",
				"lon" => "146.010496"
			],
			[
				"postcode" => "2707",
				"suburb" => "ARGOON",
				"state" => "NSW",
				"lat" => "-34.858279",
				"lon" => "145.674146"
			],
			[
				"postcode" => "2707",
				"suburb" => "COLEAMBALLY",
				"state" => "NSW",
				"lat" => "-34.805619",
				"lon" => "145.882691"
			],
			[
				"postcode" => "2710",
				"suburb" => "BARRATTA",
				"state" => "NSW",
				"lat" => "-35.228183",
				"lon" => "144.49432"
			],
			[
				"postcode" => "2710",
				"suburb" => "BENARCA",
				"state" => "NSW",
				"lat" => "-35.991634",
				"lon" => "144.741543"
			],
			[
				"postcode" => "2710",
				"suburb" => "BIRGANBIGIL",
				"state" => "NSW",
				"lat" => "-35.522377",
				"lon" => "145.200301"
			],
			[
				"postcode" => "2710",
				"suburb" => "BOOROORBAN",
				"state" => "NSW",
				"lat" => "-34.93111",
				"lon" => "144.763052"
			],
			[
				"postcode" => "2710",
				"suburb" => "BRASSI",
				"state" => "NSW",
				"lat" => "-35.527698",
				"lon" => "144.662659"
			],
			[
				"postcode" => "2710",
				"suburb" => "BULLATALE",
				"state" => "NSW",
				"lat" => "-35.790297",
				"lon" => "145.025709"
			],
			[
				"postcode" => "2710",
				"suburb" => "CALDWELL",
				"state" => "NSW",
				"lat" => "-35.630254",
				"lon" => "144.502142"
			],
			[
				"postcode" => "2710",
				"suburb" => "CALIMO",
				"state" => "NSW",
				"lat" => "-35.434654",
				"lon" => "144.552357"
			],
			[
				"postcode" => "2710",
				"suburb" => "CONARGO",
				"state" => "NSW",
				"lat" => "-35.302371",
				"lon" => "145.181217"
			],
			[
				"postcode" => "2710",
				"suburb" => "COREE",
				"state" => "NSW",
				"lat" => "-35.364031",
				"lon" => "145.448873"
			],
			[
				"postcode" => "2710",
				"suburb" => "CORNALLA",
				"state" => "NSW",
				"lat" => "-35.716954",
				"lon" => "145.113466"
			],
			[
				"postcode" => "2710",
				"suburb" => "DENILIQUIN",
				"state" => "NSW",
				"lat" => "-35.528544",
				"lon" => "144.958974"
			],
			[
				"postcode" => "2710",
				"suburb" => "GULPA",
				"state" => "NSW",
				"lat" => "-35.761612",
				"lon" => "144.900514"
			],
			[
				"postcode" => "2710",
				"suburb" => "HARTWOOD",
				"state" => "NSW",
				"lat" => "-35.35187",
				"lon" => "145.314449"
			],
			[
				"postcode" => "2710",
				"suburb" => "HILL PLAIN",
				"state" => "NSW",
				"lat" => "-35.648735",
				"lon" => "144.855319"
			],
			[
				"postcode" => "2710",
				"suburb" => "LINDIFFERON",
				"state" => "NSW",
				"lat" => "-35.395855",
				"lon" => "145.175155"
			],
			[
				"postcode" => "2710",
				"suburb" => "MATHOURA",
				"state" => "NSW",
				"lat" => "-35.81262",
				"lon" => "144.9026"
			],
			[
				"postcode" => "2710",
				"suburb" => "MAYRUNG",
				"state" => "NSW",
				"lat" => "-35.464979",
				"lon" => "145.320415"
			],
			[
				"postcode" => "2710",
				"suburb" => "MOIRA",
				"state" => "NSW",
				"lat" => "-35.927134",
				"lon" => "144.847987"
			],
			[
				"postcode" => "2710",
				"suburb" => "MOONAHCULLAH",
				"state" => "NSW",
				"lat" => "-35.396927",
				"lon" => "144.627427"
			],
			[
				"postcode" => "2710",
				"suburb" => "MOONBRIA",
				"state" => "NSW",
				"lat" => "-35.125135",
				"lon" => "145.481776"
			],
			[
				"postcode" => "2710",
				"suburb" => "MORAGO",
				"state" => "NSW",
				"lat" => "-35.371594",
				"lon" => "144.679778"
			],
			[
				"postcode" => "2710",
				"suburb" => "PRETTY PINE",
				"state" => "NSW",
				"lat" => "-35.350061",
				"lon" => "144.9019"
			],
			[
				"postcode" => "2710",
				"suburb" => "STEAM PLAINS",
				"state" => "NSW",
				"lat" => "-35.065467",
				"lon" => "145.379931"
			],
			[
				"postcode" => "2710",
				"suburb" => "STUD PARK",
				"state" => "NSW",
				"lat" => "-35.386864",
				"lon" => "144.968605"
			],
			[
				"postcode" => "2710",
				"suburb" => "WAKOOL",
				"state" => "NSW",
				"lat" => "-35.470616",
				"lon" => "144.395693"
			],
			[
				"postcode" => "2710",
				"suburb" => "WANDOOK",
				"state" => "NSW",
				"lat" => "-35.424523",
				"lon" => "145.046238"
			],
			[
				"postcode" => "2710",
				"suburb" => "WANGANELLA",
				"state" => "NSW",
				"lat" => "-35.211335",
				"lon" => "144.815368"
			],
			[
				"postcode" => "2710",
				"suburb" => "WARRAGOON",
				"state" => "NSW",
				"lat" => "-35.632619",
				"lon" => "145.166984"
			],
			[
				"postcode" => "2710",
				"suburb" => "WILLURAH",
				"state" => "NSW",
				"lat" => "-34.970074",
				"lon" => "145.139926"
			],
			[
				"postcode" => "2710",
				"suburb" => "YALLAKOOL",
				"state" => "NSW",
				"lat" => "-35.5286",
				"lon" => "144.458708"
			],
			[
				"postcode" => "2711",
				"suburb" => "BOOLIGAL",
				"state" => "NSW",
				"lat" => "-33.679442",
				"lon" => "144.749504"
			],
			[
				"postcode" => "2711",
				"suburb" => "CARRATHOOL",
				"state" => "NSW",
				"lat" => "-34.407182",
				"lon" => "145.430787"
			],
			[
				"postcode" => "2711",
				"suburb" => "CLARE",
				"state" => "NSW",
				"lat" => "-33.405401",
				"lon" => "143.926085"
			],
			[
				"postcode" => "2711",
				"suburb" => "CORRONG",
				"state" => "NSW",
				"lat" => "-34.214814",
				"lon" => "144.463302"
			],
			[
				"postcode" => "2711",
				"suburb" => "GUNBAR",
				"state" => "NSW",
				"lat" => "-34.008897",
				"lon" => "145.311528"
			],
			[
				"postcode" => "2711",
				"suburb" => "HAY",
				"state" => "NSW",
				"lat" => "-34.500508",
				"lon" => "144.845099"
			],
			[
				"postcode" => "2711",
				"suburb" => "HAY SOUTH",
				"state" => "NSW",
				"lat" => "-34.512685",
				"lon" => "144.842938"
			],
			[
				"postcode" => "2711",
				"suburb" => "KERI KERI",
				"state" => "NSW",
				"lat" => "-34.867191",
				"lon" => "143.902993"
			],
			[
				"postcode" => "2711",
				"suburb" => "MAUDE",
				"state" => "NSW",
				"lat" => "-34.467859",
				"lon" => "144.303163"
			],
			[
				"postcode" => "2711",
				"suburb" => "ONE TREE",
				"state" => "NSW",
				"lat" => "-34.191215",
				"lon" => "144.723706"
			],
			[
				"postcode" => "2711",
				"suburb" => "OXLEY",
				"state" => "NSW",
				"lat" => "-33.880662",
				"lon" => "144.214565"
			],
			[
				"postcode" => "2711",
				"suburb" => "WAUGORAH",
				"state" => "NSW",
				"lat" => "-34.401793",
				"lon" => "143.88141"
			],
			[
				"postcode" => "2711",
				"suburb" => "YANGA",
				"state" => "NSW",
				"lat" => "-34.704979",
				"lon" => "143.625551"
			],
			[
				"postcode" => "2712",
				"suburb" => "BERRIGAN",
				"state" => "NSW",
				"lat" => "-35.65743",
				"lon" => "145.812641"
			],
			[
				"postcode" => "2712",
				"suburb" => "BOOMANOOMANA",
				"state" => "NSW",
				"lat" => "-35.883985",
				"lon" => "145.828692"
			],
			[
				"postcode" => "2713",
				"suburb" => "BLIGHTY",
				"state" => "NSW",
				"lat" => "-35.591687",
				"lon" => "145.285731"
			],
			[
				"postcode" => "2713",
				"suburb" => "FINLEY",
				"state" => "NSW",
				"lat" => "-35.645434",
				"lon" => "145.575436"
			],
			[
				"postcode" => "2713",
				"suburb" => "LOGIE BRAE",
				"state" => "NSW",
				"lat" => "-35.452322",
				"lon" => "145.56387"
			],
			[
				"postcode" => "2713",
				"suburb" => "MYRTLE PARK",
				"state" => "NSW",
				"lat" => "-35.567714",
				"lon" => "145.474356"
			],
			[
				"postcode" => "2714",
				"suburb" => "ARATULA",
				"state" => "NSW",
				"lat" => "-35.511748",
				"lon" => "145.051193"
			],
			[
				"postcode" => "2714",
				"suburb" => "PINE LODGE",
				"state" => "NSW",
				"lat" => "-35.665208",
				"lon" => "145.433686"
			],
			[
				"postcode" => "2714",
				"suburb" => "TOCUMWAL",
				"state" => "NSW",
				"lat" => "-35.812107",
				"lon" => "145.567389"
			],
			[
				"postcode" => "2714",
				"suburb" => "TUPPAL",
				"state" => "NSW",
				"lat" => "-35.658765",
				"lon" => "145.347047"
			],
			[
				"postcode" => "2715",
				"suburb" => "ARUMPO",
				"state" => "NSW",
				"lat" => "-33.873621",
				"lon" => "142.885264"
			],
			[
				"postcode" => "2715",
				"suburb" => "BALRANALD",
				"state" => "NSW",
				"lat" => "-34.638049",
				"lon" => "143.561101"
			],
			[
				"postcode" => "2715",
				"suburb" => "HATFIELD",
				"state" => "NSW",
				"lat" => "-33.86648",
				"lon" => "143.738495"
			],
			[
				"postcode" => "2715",
				"suburb" => "MUNGO",
				"state" => "NSW",
				"lat" => "-33.557412",
				"lon" => "143.048741"
			],
			[
				"postcode" => "2715",
				"suburb" => "PENARIE",
				"state" => "NSW",
				"lat" => "-34.303814",
				"lon" => "143.577849"
			],
			[
				"postcode" => "2716",
				"suburb" => "COREE SOUTH",
				"state" => "NSW",
				"lat" => "-35.354272",
				"lon" => "145.529572"
			],
			[
				"postcode" => "2716",
				"suburb" => "FOUR CORNERS",
				"state" => "NSW",
				"lat" => "-34.812125",
				"lon" => "145.42709"
			],
			[
				"postcode" => "2716",
				"suburb" => "JERILDERIE",
				"state" => "NSW",
				"lat" => "-35.356448",
				"lon" => "145.72928"
			],
			[
				"postcode" => "2716",
				"suburb" => "MABINS WELL",
				"state" => "NSW",
				"lat" => "-34.856532",
				"lon" => "145.552861"
			],
			[
				"postcode" => "2717",
				"suburb" => "DARETON",
				"state" => "NSW",
				"lat" => "-34.091641",
				"lon" => "142.042284"
			],
			[
				"postcode" => "2720",
				"suburb" => "ARGALONG",
				"state" => "NSW",
				"lat" => "-35.315496",
				"lon" => "148.453868"
			],
			[
				"postcode" => "2720",
				"suburb" => "BLOWERING",
				"state" => "NSW",
				"lat" => "-35.422374",
				"lon" => "148.271095"
			],
			[
				"postcode" => "2720",
				"suburb" => "BOGONG PEAKS WILDERNESS",
				"state" => "NSW",
				"lat" => "-35.537239",
				"lon" => "148.392534"
			],
			[
				"postcode" => "2720",
				"suburb" => "BOMBOWLEE",
				"state" => "NSW",
				"lat" => "-35.259811",
				"lon" => "148.250133"
			],
			[
				"postcode" => "2720",
				"suburb" => "BOMBOWLEE CREEK",
				"state" => "NSW",
				"lat" => "-35.278606",
				"lon" => "148.279996"
			],
			[
				"postcode" => "2720",
				"suburb" => "BUDDONG",
				"state" => "NSW",
				"lat" => "-35.676092",
				"lon" => "148.242949"
			],
			[
				"postcode" => "2720",
				"suburb" => "COURAGAGO",
				"state" => "NSW",
				"lat" => "-35.139376",
				"lon" => "148.558038"
			],
			[
				"postcode" => "2720",
				"suburb" => "GADARA",
				"state" => "NSW",
				"lat" => "-35.318001",
				"lon" => "148.127508"
			],
			[
				"postcode" => "2720",
				"suburb" => "GILMORE",
				"state" => "NSW",
				"lat" => "-35.328188",
				"lon" => "148.163783"
			],
			[
				"postcode" => "2720",
				"suburb" => "GOCUP",
				"state" => "NSW",
				"lat" => "-35.2214",
				"lon" => "148.184582"
			],
			[
				"postcode" => "2720",
				"suburb" => "GOOBARRAGANDRA",
				"state" => "NSW",
				"lat" => "-35.393646",
				"lon" => "148.428259"
			],
			[
				"postcode" => "2720",
				"suburb" => "JONES BRIDGE",
				"state" => "NSW",
				"lat" => "-35.373313",
				"lon" => "148.256564"
			],
			[
				"postcode" => "2720",
				"suburb" => "KILLIMICAT",
				"state" => "NSW",
				"lat" => "-35.199229",
				"lon" => "148.238168"
			],
			[
				"postcode" => "2720",
				"suburb" => "LACMALAC",
				"state" => "NSW",
				"lat" => "-35.316215",
				"lon" => "148.315449"
			],
			[
				"postcode" => "2720",
				"suburb" => "LITTLE RIVER",
				"state" => "NSW",
				"lat" => "-35.332826",
				"lon" => "148.316365"
			],
			[
				"postcode" => "2720",
				"suburb" => "MINJARY",
				"state" => "NSW",
				"lat" => "-35.232244",
				"lon" => "148.140156"
			],
			[
				"postcode" => "2720",
				"suburb" => "MUNDONGO",
				"state" => "NSW",
				"lat" => "-35.291721",
				"lon" => "148.25641"
			],
			[
				"postcode" => "2720",
				"suburb" => "PINBEYAN",
				"state" => "NSW",
				"lat" => "-35.72004",
				"lon" => "148.416132"
			],
			[
				"postcode" => "2720",
				"suburb" => "RED HILL",
				"state" => "NSW",
				"lat" => "-35.153563",
				"lon" => "148.384459"
			],
			[
				"postcode" => "2720",
				"suburb" => "TALBINGO",
				"state" => "NSW",
				"lat" => "-35.581624",
				"lon" => "148.303311"
			],
			[
				"postcode" => "2720",
				"suburb" => "TUMORRAMA",
				"state" => "NSW",
				"lat" => "-35.19041",
				"lon" => "148.395155"
			],
			[
				"postcode" => "2720",
				"suburb" => "TUMUT",
				"state" => "NSW",
				"lat" => "-35.300634",
				"lon" => "148.224961"
			],
			[
				"postcode" => "2720",
				"suburb" => "TUMUT PLAINS",
				"state" => "NSW",
				"lat" => "-35.339564",
				"lon" => "148.271903"
			],
			[
				"postcode" => "2720",
				"suburb" => "WEREBOLDERA",
				"state" => "NSW",
				"lat" => "-35.387999",
				"lon" => "148.238971"
			],
			[
				"postcode" => "2720",
				"suburb" => "WERMATONG",
				"state" => "NSW",
				"lat" => "-35.375157",
				"lon" => "148.29153"
			],
			[
				"postcode" => "2720",
				"suburb" => "WINDOWIE",
				"state" => "NSW",
				"lat" => "-35.362039",
				"lon" => "148.147422"
			],
			[
				"postcode" => "2720",
				"suburb" => "WYANGLE",
				"state" => "NSW",
				"lat" => "-35.222072",
				"lon" => "148.317644"
			],
			[
				"postcode" => "2720",
				"suburb" => "YARRANGOBILLY",
				"state" => "NSW",
				"lat" => "-35.643548",
				"lon" => "148.450975"
			],
			[
				"postcode" => "2721",
				"suburb" => "BLAND",
				"state" => "NSW",
				"lat" => "-33.994749",
				"lon" => "147.678307"
			],
			[
				"postcode" => "2721",
				"suburb" => "QUANDIALLA",
				"state" => "NSW",
				"lat" => "-34.009523",
				"lon" => "147.793336"
			],
			[
				"postcode" => "2722",
				"suburb" => "BONGALONG",
				"state" => "NSW",
				"lat" => "-34.820143",
				"lon" => "148.084812"
			],
			[
				"postcode" => "2722",
				"suburb" => "BONGONGALONG",
				"state" => "NSW",
				"lat" => "-34.93097",
				"lon" => "148.05819"
			],
			[
				"postcode" => "2722",
				"suburb" => "BRUNGLE",
				"state" => "NSW",
				"lat" => "-35.139141",
				"lon" => "148.223575"
			],
			[
				"postcode" => "2722",
				"suburb" => "BRUNGLE CREEK",
				"state" => "NSW",
				"lat" => "-35.163476",
				"lon" => "148.316225"
			],
			[
				"postcode" => "2722",
				"suburb" => "BURRA CREEK",
				"state" => "NSW",
				"lat" => "-34.892408",
				"lon" => "148.101801"
			],
			[
				"postcode" => "2722",
				"suburb" => "DARBALARA",
				"state" => "NSW",
				"lat" => "-35.026814",
				"lon" => "148.208625"
			],
			[
				"postcode" => "2722",
				"suburb" => "EDWARDSTOWN",
				"state" => "NSW",
				"lat" => "-35.129526",
				"lon" => "148.101738"
			],
			[
				"postcode" => "2722",
				"suburb" => "GUNDAGAI",
				"state" => "NSW",
				"lat" => "-35.065534",
				"lon" => "148.107529"
			],
			[
				"postcode" => "2722",
				"suburb" => "JACKALASS",
				"state" => "NSW",
				"lat" => "-35.081026",
				"lon" => "148.130445"
			],
			[
				"postcode" => "2722",
				"suburb" => "JONES CREEK",
				"state" => "NSW",
				"lat" => "-35.034905",
				"lon" => "148.074826"
			],
			[
				"postcode" => "2722",
				"suburb" => "MUTTAMA",
				"state" => "NSW",
				"lat" => "-34.802774",
				"lon" => "148.116901"
			],
			[
				"postcode" => "2722",
				"suburb" => "NANGUS",
				"state" => "NSW",
				"lat" => "-35.055354",
				"lon" => "147.907046"
			],
			[
				"postcode" => "2722",
				"suburb" => "RENO",
				"state" => "NSW",
				"lat" => "-35.023519",
				"lon" => "148.055829"
			],
			[
				"postcode" => "2722",
				"suburb" => "SOUTH GUNDAGAI",
				"state" => "NSW",
				"lat" => "-35.077496",
				"lon" => "148.100558"
			],
			[
				"postcode" => "2722",
				"suburb" => "TARRABANDRA",
				"state" => "NSW",
				"lat" => "-35.121668",
				"lon" => "148.188169"
			],
			[
				"postcode" => "2722",
				"suburb" => "WAGRAGOBILLY",
				"state" => "NSW",
				"lat" => "-35.081381",
				"lon" => "148.209513"
			],
			[
				"postcode" => "2722",
				"suburb" => "WILLIE PLOMA",
				"state" => "NSW",
				"lat" => "-35.100084",
				"lon" => "148.070283"
			],
			[
				"postcode" => "2725",
				"suburb" => "STOCKINBINGAL",
				"state" => "NSW",
				"lat" => "-34.506023",
				"lon" => "147.879961"
			],
			[
				"postcode" => "2726",
				"suburb" => "BUNDARBO",
				"state" => "NSW",
				"lat" => "-34.906288",
				"lon" => "148.320014"
			],
			[
				"postcode" => "2726",
				"suburb" => "JUGIONG",
				"state" => "NSW",
				"lat" => "-34.823299",
				"lon" => "148.324895"
			],
			[
				"postcode" => "2727",
				"suburb" => "ADJUNGBILLY",
				"state" => "NSW",
				"lat" => "-35.081463",
				"lon" => "148.40992"
			],
			[
				"postcode" => "2727",
				"suburb" => "COOLAC",
				"state" => "NSW",
				"lat" => "-34.902613",
				"lon" => "148.193499"
			],
			[
				"postcode" => "2727",
				"suburb" => "GOBARRALONG",
				"state" => "NSW",
				"lat" => "-35.03562",
				"lon" => "148.324517"
			],
			[
				"postcode" => "2727",
				"suburb" => "MINGAY",
				"state" => "NSW",
				"lat" => "-34.97179",
				"lon" => "148.148362"
			],
			[
				"postcode" => "2729",
				"suburb" => "ADELONG",
				"state" => "NSW",
				"lat" => "-35.307947",
				"lon" => "148.063682"
			],
			[
				"postcode" => "2729",
				"suburb" => "BANGADANG",
				"state" => "NSW",
				"lat" => "-35.284504",
				"lon" => "147.984044"
			],
			[
				"postcode" => "2729",
				"suburb" => "BLACK CREEK",
				"state" => "NSW",
				"lat" => "-35.326938",
				"lon" => "148.036262"
			],
			[
				"postcode" => "2729",
				"suburb" => "CALIFAT",
				"state" => "NSW",
				"lat" => "-35.243609",
				"lon" => "148.080654"
			],
			[
				"postcode" => "2729",
				"suburb" => "COOLEYS CREEK",
				"state" => "NSW",
				"lat" => "-35.338496",
				"lon" => "148.078179"
			],
			[
				"postcode" => "2729",
				"suburb" => "DARLOW",
				"state" => "NSW",
				"lat" => "-35.384204",
				"lon" => "147.918168"
			],
			[
				"postcode" => "2729",
				"suburb" => "ELLERSLIE",
				"state" => "NSW",
				"lat" => "-35.301601",
				"lon" => "147.938272"
			],
			[
				"postcode" => "2729",
				"suburb" => "GRAHAMSTOWN",
				"state" => "NSW",
				"lat" => "-35.264738",
				"lon" => "148.035551"
			],
			[
				"postcode" => "2729",
				"suburb" => "MOUNT ADRAH",
				"state" => "NSW",
				"lat" => "-35.24211",
				"lon" => "147.913156"
			],
			[
				"postcode" => "2729",
				"suburb" => "MOUNT HOREB",
				"state" => "NSW",
				"lat" => "-35.210263",
				"lon" => "148.033505"
			],
			[
				"postcode" => "2729",
				"suburb" => "MUNDARLO",
				"state" => "NSW",
				"lat" => "-35.07795",
				"lon" => "147.84419"
			],
			[
				"postcode" => "2729",
				"suburb" => "SANDY GULLY",
				"state" => "NSW",
				"lat" => "-35.315676",
				"lon" => "148.035725"
			],
			[
				"postcode" => "2729",
				"suburb" => "SHARPS CREEK",
				"state" => "NSW",
				"lat" => "-35.403228",
				"lon" => "148.057387"
			],
			[
				"postcode" => "2729",
				"suburb" => "TUMBLONG",
				"state" => "NSW",
				"lat" => "-35.136655",
				"lon" => "148.00974"
			],
			[
				"postcode" => "2729",
				"suburb" => "WESTWOOD",
				"state" => "NSW",
				"lat" => "-35.365834",
				"lon" => "147.977015"
			],
			[
				"postcode" => "2729",
				"suburb" => "WONDALGA",
				"state" => "NSW",
				"lat" => "-35.395476",
				"lon" => "148.110309"
			],
			[
				"postcode" => "2729",
				"suburb" => "YAVEN CREEK",
				"state" => "NSW",
				"lat" => "-35.516716",
				"lon" => "147.95717"
			],
			[
				"postcode" => "2730",
				"suburb" => "BAGO",
				"state" => "NSW",
				"lat" => "-31.488259",
				"lon" => "152.660113"
			],
			[
				"postcode" => "2730",
				"suburb" => "BATLOW",
				"state" => "NSW",
				"lat" => "-35.522019",
				"lon" => "148.144623"
			],
			[
				"postcode" => "2730",
				"suburb" => "GREEN HILLS",
				"state" => "NSW",
				"lat" => "-35.443993",
				"lon" => "148.072874"
			],
			[
				"postcode" => "2730",
				"suburb" => "KUNAMA",
				"state" => "NSW",
				"lat" => "-35.554435",
				"lon" => "148.088372"
			],
			[
				"postcode" => "2730",
				"suburb" => "LOWER BAGO",
				"state" => "NSW",
				"lat" => "-35.567374",
				"lon" => "147.966686"
			],
			[
				"postcode" => "2731",
				"suburb" => "BUNNALOO",
				"state" => "NSW",
				"lat" => "-35.791187",
				"lon" => "144.629848"
			],
			[
				"postcode" => "2731",
				"suburb" => "MOAMA",
				"state" => "NSW",
				"lat" => "-36.112624",
				"lon" => "144.755549"
			],
			[
				"postcode" => "2731",
				"suburb" => "TANTONAN",
				"state" => "NSW",
				"lat" => "-35.694669",
				"lon" => "144.540604"
			],
			[
				"postcode" => "2731",
				"suburb" => "THYRA",
				"state" => "NSW",
				"lat" => "-35.805836",
				"lon" => "144.770764"
			],
			[
				"postcode" => "2731",
				"suburb" => "WOMBOOTA",
				"state" => "NSW",
				"lat" => "-35.95719",
				"lon" => "144.588651"
			],
			[
				"postcode" => "2732",
				"suburb" => "BARHAM",
				"state" => "NSW",
				"lat" => "-35.630473",
				"lon" => "144.130423"
			],
			[
				"postcode" => "2732",
				"suburb" => "BURRABOI",
				"state" => "NSW",
				"lat" => "-35.342175",
				"lon" => "144.399744"
			],
			[
				"postcode" => "2732",
				"suburb" => "COBRAMUNGA",
				"state" => "NSW",
				"lat" => "-35.451022",
				"lon" => "143.864748"
			],
			[
				"postcode" => "2732",
				"suburb" => "GONN",
				"state" => "NSW",
				"lat" => "-35.473525",
				"lon" => "143.96366"
			],
			[
				"postcode" => "2732",
				"suburb" => "NOORONG",
				"state" => "NSW",
				"lat" => "-35.329028",
				"lon" => "143.936373"
			],
			[
				"postcode" => "2732",
				"suburb" => "THULE",
				"state" => "NSW",
				"lat" => "-35.702799",
				"lon" => "144.443621"
			],
			[
				"postcode" => "2732",
				"suburb" => "TULLAKOOL",
				"state" => "NSW",
				"lat" => "-35.37707",
				"lon" => "144.206"
			],
			[
				"postcode" => "2733",
				"suburb" => "DHURAGOON",
				"state" => "NSW",
				"lat" => "-35.194233",
				"lon" => "144.155278"
			],
			[
				"postcode" => "2733",
				"suburb" => "MALLAN",
				"state" => "NSW",
				"lat" => "-35.114021",
				"lon" => "143.792594"
			],
			[
				"postcode" => "2733",
				"suburb" => "MOULAMEIN",
				"state" => "NSW",
				"lat" => "-35.089135",
				"lon" => "144.036636"
			],
			[
				"postcode" => "2733",
				"suburb" => "NIEMUR",
				"state" => "NSW",
				"lat" => "-35.245988",
				"lon" => "144.212848"
			],
			[
				"postcode" => "2734",
				"suburb" => "CUNNINYEUK",
				"state" => "NSW",
				"lat" => "-35.247256",
				"lon" => "143.89834"
			],
			[
				"postcode" => "2734",
				"suburb" => "DILPURRA",
				"state" => "NSW",
				"lat" => "-35.163919",
				"lon" => "143.680743"
			],
			[
				"postcode" => "2734",
				"suburb" => "KYALITE",
				"state" => "NSW",
				"lat" => "-34.951605",
				"lon" => "143.484273"
			],
			[
				"postcode" => "2734",
				"suburb" => "MELLOOL",
				"state" => "NSW",
				"lat" => "-35.340232",
				"lon" => "143.771627"
			],
			[
				"postcode" => "2734",
				"suburb" => "MOOLPA",
				"state" => "NSW",
				"lat" => "-34.870892",
				"lon" => "143.793059"
			],
			[
				"postcode" => "2734",
				"suburb" => "STONY CROSSING",
				"state" => "NSW",
				"lat" => "-35.076135",
				"lon" => "143.556647"
			],
			[
				"postcode" => "2734",
				"suburb" => "TOORANIE",
				"state" => "NSW",
				"lat" => "-35.036099",
				"lon" => "143.745427"
			],
			[
				"postcode" => "2734",
				"suburb" => "WETUPPA",
				"state" => "NSW",
				"lat" => "-35.327963",
				"lon" => "143.872165"
			],
			[
				"postcode" => "2735",
				"suburb" => "MURRAY DOWNS",
				"state" => "NSW",
				"lat" => "-35.658614",
				"lon" => "144.136534"
			],
			[
				"postcode" => "2735",
				"suburb" => "SPEEWA",
				"state" => "NSW",
				"lat" => "-35.183898",
				"lon" => "143.523043"
			],
			[
				"postcode" => "2736",
				"suburb" => "GOODNIGHT",
				"state" => "NSW",
				"lat" => "-34.958682",
				"lon" => "143.33744"
			],
			[
				"postcode" => "2736",
				"suburb" => "TOOLEYBUC",
				"state" => "NSW",
				"lat" => "-35.027891",
				"lon" => "143.338275"
			],
			[
				"postcode" => "2737",
				"suburb" => "BENANEE",
				"state" => "NSW",
				"lat" => "-34.513995",
				"lon" => "142.848756"
			],
			[
				"postcode" => "2737",
				"suburb" => "EUSTON",
				"state" => "NSW",
				"lat" => "-34.574977",
				"lon" => "142.745126"
			],
			[
				"postcode" => "2738",
				"suburb" => "GOL GOL",
				"state" => "NSW",
				"lat" => "-34.180087",
				"lon" => "142.219531"
			],
			[
				"postcode" => "2738",
				"suburb" => "MONAK",
				"state" => "NSW",
				"lat" => "-34.301472",
				"lon" => "142.532797"
			],
			[
				"postcode" => "2738",
				"suburb" => "TRENTHAM CLIFFS",
				"state" => "NSW",
				"lat" => "-34.210222",
				"lon" => "142.248696"
			],
			[
				"postcode" => "2739",
				"suburb" => "BURONGA",
				"state" => "NSW",
				"lat" => "-34.171443",
				"lon" => "142.182794"
			],
			[
				"postcode" => "2745",
				"suburb" => "GLENMORE PARK",
				"state" => "NSW",
				"lat" => "-33.790683",
				"lon" => "150.6693"
			],
			[
				"postcode" => "2745",
				"suburb" => "GREENDALE",
				"state" => "NSW",
				"lat" => "-33.904792",
				"lon" => "150.646795"
			],
			[
				"postcode" => "2745",
				"suburb" => "LUDDENHAM",
				"state" => "NSW",
				"lat" => "-33.883725",
				"lon" => "150.693079"
			],
			[
				"postcode" => "2745",
				"suburb" => "MULGOA",
				"state" => "NSW",
				"lat" => "-33.838167",
				"lon" => "150.683371"
			],
			[
				"postcode" => "2745",
				"suburb" => "REGENTVILLE",
				"state" => "NSW",
				"lat" => "-33.773649",
				"lon" => "150.669102"
			],
			[
				"postcode" => "2745",
				"suburb" => "WALLACIA",
				"state" => "NSW",
				"lat" => "-33.865179",
				"lon" => "150.640418"
			],
			[
				"postcode" => "2747",
				"suburb" => "CAMBRIDGE GARDENS",
				"state" => "NSW",
				"lat" => "-33.735558",
				"lon" => "150.721712"
			],
			[
				"postcode" => "2747",
				"suburb" => "CAMBRIDGE PARK",
				"state" => "NSW",
				"lat" => "-33.75152",
				"lon" => "150.725439"
			],
			[
				"postcode" => "2747",
				"suburb" => "CLAREMONT MEADOWS",
				"state" => "NSW",
				"lat" => "-33.770438",
				"lon" => "150.752791"
			],
			[
				"postcode" => "2747",
				"suburb" => "KINGSWOOD",
				"state" => "NSW",
				"lat" => "-33.759967",
				"lon" => "150.72046"
			],
			[
				"postcode" => "2747",
				"suburb" => "LLANDILO",
				"state" => "NSW",
				"lat" => "-33.708904",
				"lon" => "150.756773"
			],
			[
				"postcode" => "2747",
				"suburb" => "SHANES PARK",
				"state" => "NSW",
				"lat" => "-33.711305",
				"lon" => "150.783287"
			],
			[
				"postcode" => "2747",
				"suburb" => "WERRINGTON",
				"state" => "NSW",
				"lat" => "-33.757725",
				"lon" => "150.739982"
			],
			[
				"postcode" => "2747",
				"suburb" => "WERRINGTON COUNTY",
				"state" => "NSW",
				"lat" => "-33.747939",
				"lon" => "150.751155"
			],
			[
				"postcode" => "2747",
				"suburb" => "WERRINGTON DOWNS",
				"state" => "NSW",
				"lat" => "-33.740586",
				"lon" => "150.733755"
			],
			[
				"postcode" => "2748",
				"suburb" => "ORCHARD HILLS",
				"state" => "NSW",
				"lat" => "-33.779331",
				"lon" => "150.716312"
			],
			[
				"postcode" => "2749",
				"suburb" => "CASTLEREAGH",
				"state" => "NSW",
				"lat" => "-33.668796",
				"lon" => "150.67655"
			],
			[
				"postcode" => "2749",
				"suburb" => "CRANEBROOK",
				"state" => "NSW",
				"lat" => "-33.71431",
				"lon" => "150.709986"
			],
			[
				"postcode" => "2750",
				"suburb" => "EMU HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.735636",
				"lon" => "150.650321"
			],
			[
				"postcode" => "2750",
				"suburb" => "EMU PLAINS",
				"state" => "NSW",
				"lat" => "-33.754097",
				"lon" => "150.653269"
			],
			[
				"postcode" => "2750",
				"suburb" => "JAMISONTOWN",
				"state" => "NSW",
				"lat" => "-33.766193",
				"lon" => "150.67951"
			],
			[
				"postcode" => "2750",
				"suburb" => "LEONAY",
				"state" => "NSW",
				"lat" => "-33.759156",
				"lon" => "150.652318"
			],
			[
				"postcode" => "2750",
				"suburb" => "PENRITH",
				"state" => "NSW",
				"lat" => "-33.744073",
				"lon" => "150.69602"
			],
			[
				"postcode" => "2750",
				"suburb" => "PENRITH PLAZA",
				"state" => "NSW",
				"lat" => "-33.750982",
				"lon" => "150.692201"
			],
			[
				"postcode" => "2750",
				"suburb" => "PENRITH SOUTH",
				"state" => "NSW",
				"lat" => "-33.767176",
				"lon" => "150.703837"
			],
			[
				"postcode" => "2750",
				"suburb" => "SOUTH PENRITH",
				"state" => "NSW",
				"lat" => "-33.767176",
				"lon" => "150.703837"
			],
			[
				"postcode" => "2751",
				"suburb" => "PENRITH",
				"state" => "NSW",
				"lat" => "-33.732127",
				"lon" => "151.280352"
			],
			[
				"postcode" => "2752",
				"suburb" => "SILVERDALE",
				"state" => "NSW",
				"lat" => "-33.942212",
				"lon" => "150.580102"
			],
			[
				"postcode" => "2752",
				"suburb" => "WARRAGAMBA",
				"state" => "NSW",
				"lat" => "-33.889727",
				"lon" => "150.604819"
			],
			[
				"postcode" => "2753",
				"suburb" => "AGNES BANKS",
				"state" => "NSW",
				"lat" => "-33.618877",
				"lon" => "150.707372"
			],
			[
				"postcode" => "2753",
				"suburb" => "BOWEN MOUNTAIN",
				"state" => "NSW",
				"lat" => "-33.573871",
				"lon" => "150.627819"
			],
			[
				"postcode" => "2753",
				"suburb" => "GROSE VALE",
				"state" => "NSW",
				"lat" => "-33.584089",
				"lon" => "150.672944"
			],
			[
				"postcode" => "2753",
				"suburb" => "GROSE WOLD",
				"state" => "NSW",
				"lat" => "-33.602392",
				"lon" => "150.688628"
			],
			[
				"postcode" => "2753",
				"suburb" => "HOBARTVILLE",
				"state" => "NSW",
				"lat" => "-33.601557",
				"lon" => "150.735673"
			],
			[
				"postcode" => "2753",
				"suburb" => "LONDONDERRY",
				"state" => "NSW",
				"lat" => "-33.645188",
				"lon" => "150.73698"
			],
			[
				"postcode" => "2753",
				"suburb" => "RICHMOND",
				"state" => "NSW",
				"lat" => "-33.597753",
				"lon" => "150.75289"
			],
			[
				"postcode" => "2753",
				"suburb" => "RICHMOND LOWLANDS",
				"state" => "NSW",
				"lat" => "-33.568631",
				"lon" => "150.757565"
			],
			[
				"postcode" => "2753",
				"suburb" => "YARRAMUNDI",
				"state" => "NSW",
				"lat" => "-33.627259",
				"lon" => "150.672695"
			],
			[
				"postcode" => "2754",
				"suburb" => "NORTH RICHMOND",
				"state" => "NSW",
				"lat" => "-33.582355",
				"lon" => "150.721891"
			],
			[
				"postcode" => "2754",
				"suburb" => "TENNYSON",
				"state" => "NSW",
				"lat" => "-33.536388",
				"lon" => "150.736946"
			],
			[
				"postcode" => "2754",
				"suburb" => "THE SLOPES",
				"state" => "NSW",
				"lat" => "-33.532102",
				"lon" => "150.708405"
			],
			[
				"postcode" => "2755",
				"suburb" => "RICHMOND RAAF",
				"state" => "NSW",
				"lat" => "-33.604378",
				"lon" => "150.796234"
			],
			[
				"postcode" => "2756",
				"suburb" => "BLIGH PARK",
				"state" => "NSW",
				"lat" => "-33.63765",
				"lon" => "150.79458"
			],
			[
				"postcode" => "2756",
				"suburb" => "CATTAI",
				"state" => "NSW",
				"lat" => "-33.555841",
				"lon" => "150.909515"
			],
			[
				"postcode" => "2756",
				"suburb" => "CENTRAL COLO",
				"state" => "NSW",
				"lat" => "-33.416384",
				"lon" => "150.784635"
			],
			[
				"postcode" => "2756",
				"suburb" => "CLARENDON",
				"state" => "NSW",
				"lat" => "-33.614736",
				"lon" => "150.78198"
			],
			[
				"postcode" => "2756",
				"suburb" => "COLO",
				"state" => "NSW",
				"lat" => "-33.416721",
				"lon" => "150.803157"
			],
			[
				"postcode" => "2756",
				"suburb" => "COLO HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.368491",
				"lon" => "150.72214"
			],
			[
				"postcode" => "2756",
				"suburb" => "CORNWALLIS",
				"state" => "NSW",
				"lat" => "-33.592375",
				"lon" => "150.812216"
			],
			[
				"postcode" => "2756",
				"suburb" => "CUMBERLAND REACH",
				"state" => "NSW",
				"lat" => "-33.455858",
				"lon" => "150.896276"
			],
			[
				"postcode" => "2756",
				"suburb" => "EBENEZER",
				"state" => "NSW",
				"lat" => "-33.52466",
				"lon" => "150.881372"
			],
			[
				"postcode" => "2756",
				"suburb" => "FREEMANS REACH",
				"state" => "NSW",
				"lat" => "-33.545429",
				"lon" => "150.794878"
			],
			[
				"postcode" => "2756",
				"suburb" => "GLOSSODIA",
				"state" => "NSW",
				"lat" => "-33.535657",
				"lon" => "150.765856"
			],
			[
				"postcode" => "2756",
				"suburb" => "LOWER PORTLAND",
				"state" => "NSW",
				"lat" => "-33.451409",
				"lon" => "150.865871"
			],
			[
				"postcode" => "2756",
				"suburb" => "MAROOTA",
				"state" => "NSW",
				"lat" => "-33.473024",
				"lon" => "150.970972"
			],
			[
				"postcode" => "2756",
				"suburb" => "MCGRATHS HILL",
				"state" => "NSW",
				"lat" => "-33.613435",
				"lon" => "150.840222"
			],
			[
				"postcode" => "2756",
				"suburb" => "MELLONG",
				"state" => "NSW",
				"lat" => "-33.17087",
				"lon" => "150.693859"
			],
			[
				"postcode" => "2756",
				"suburb" => "MULGRAVE",
				"state" => "NSW",
				"lat" => "-33.626053",
				"lon" => "150.829912"
			],
			[
				"postcode" => "2756",
				"suburb" => "PITT TOWN",
				"state" => "NSW",
				"lat" => "-33.586184",
				"lon" => "150.860081"
			],
			[
				"postcode" => "2756",
				"suburb" => "PITT TOWN BOTTOMS",
				"state" => "NSW",
				"lat" => "-33.596291",
				"lon" => "150.841424"
			],
			[
				"postcode" => "2756",
				"suburb" => "SACKVILLE",
				"state" => "NSW",
				"lat" => "-33.502935",
				"lon" => "150.875982"
			],
			[
				"postcode" => "2756",
				"suburb" => "SACKVILLE NORTH",
				"state" => "NSW",
				"lat" => "-33.489441",
				"lon" => "150.926902"
			],
			[
				"postcode" => "2756",
				"suburb" => "SCHEYVILLE",
				"state" => "NSW",
				"lat" => "-33.61069",
				"lon" => "150.88031"
			],
			[
				"postcode" => "2756",
				"suburb" => "SOUTH MAROOTA",
				"state" => "NSW",
				"lat" => "-33.52308",
				"lon" => "150.948575"
			],
			[
				"postcode" => "2756",
				"suburb" => "SOUTH WINDSOR",
				"state" => "NSW",
				"lat" => "-33.620168",
				"lon" => "150.804452"
			],
			[
				"postcode" => "2756",
				"suburb" => "UPPER COLO",
				"state" => "NSW",
				"lat" => "-33.418342",
				"lon" => "150.735929"
			],
			[
				"postcode" => "2756",
				"suburb" => "WILBERFORCE",
				"state" => "NSW",
				"lat" => "-33.558179",
				"lon" => "150.847506"
			],
			[
				"postcode" => "2756",
				"suburb" => "WINDSOR",
				"state" => "NSW",
				"lat" => "-33.608814",
				"lon" => "150.817481"
			],
			[
				"postcode" => "2756",
				"suburb" => "WINDSOR DOWNS",
				"state" => "NSW",
				"lat" => "-33.667695",
				"lon" => "150.803079"
			],
			[
				"postcode" => "2756",
				"suburb" => "WOMERAH",
				"state" => "NSW",
				"lat" => "-33.216771",
				"lon" => "150.756175"
			],
			[
				"postcode" => "2757",
				"suburb" => "KURMOND",
				"state" => "NSW",
				"lat" => "-33.549452",
				"lon" => "150.701116"
			],
			[
				"postcode" => "2758",
				"suburb" => "BERAMBING",
				"state" => "NSW",
				"lat" => "-33.53648",
				"lon" => "150.442845"
			],
			[
				"postcode" => "2758",
				"suburb" => "BILPIN",
				"state" => "NSW",
				"lat" => "-33.498253",
				"lon" => "150.522195"
			],
			[
				"postcode" => "2758",
				"suburb" => "BLAXLANDS RIDGE",
				"state" => "NSW",
				"lat" => "-33.502253",
				"lon" => "150.712367"
			],
			[
				"postcode" => "2758",
				"suburb" => "EAST KURRAJONG",
				"state" => "NSW",
				"lat" => "-33.514481",
				"lon" => "150.764601"
			],
			[
				"postcode" => "2758",
				"suburb" => "KURRAJONG",
				"state" => "NSW",
				"lat" => "-33.546749",
				"lon" => "150.660686"
			],
			[
				"postcode" => "2758",
				"suburb" => "KURRAJONG HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.523862",
				"lon" => "150.628716"
			],
			[
				"postcode" => "2758",
				"suburb" => "KURRAJONG HILLS",
				"state" => "NSW",
				"lat" => "-33.541464",
				"lon" => "150.639331"
			],
			[
				"postcode" => "2758",
				"suburb" => "MOUNT TOMAH",
				"state" => "NSW",
				"lat" => "-33.541442",
				"lon" => "150.42235"
			],
			[
				"postcode" => "2758",
				"suburb" => "MOUNTAIN LAGOON",
				"state" => "NSW",
				"lat" => "-33.445615",
				"lon" => "150.624552"
			],
			[
				"postcode" => "2758",
				"suburb" => "THE DEVILS WILDERNESS",
				"state" => "NSW",
				"lat" => "-33.52602",
				"lon" => "150.565213"
			],
			[
				"postcode" => "2758",
				"suburb" => "WHEENY CREEK",
				"state" => "NSW",
				"lat" => "-33.429767",
				"lon" => "150.811149"
			],
			[
				"postcode" => "2759",
				"suburb" => "ERSKINE PARK",
				"state" => "NSW",
				"lat" => "-33.807618",
				"lon" => "150.789313"
			],
			[
				"postcode" => "2759",
				"suburb" => "ST CLAIR",
				"state" => "NSW",
				"lat" => "-33.794362",
				"lon" => "150.790261"
			],
			[
				"postcode" => "2760",
				"suburb" => "COLYTON",
				"state" => "NSW",
				"lat" => "-33.776657",
				"lon" => "150.793433"
			],
			[
				"postcode" => "2760",
				"suburb" => "NORTH ST MARYS",
				"state" => "NSW",
				"lat" => "-33.776502",
				"lon" => "150.781319"
			],
			[
				"postcode" => "2760",
				"suburb" => "OXLEY PARK",
				"state" => "NSW",
				"lat" => "-33.771261",
				"lon" => "150.79264"
			],
			[
				"postcode" => "2760",
				"suburb" => "ROPES CROSSING",
				"state" => "NSW",
				"lat" => "-33.77448",
				"lon" => "150.810841"
			],
			[
				"postcode" => "2760",
				"suburb" => "ST MARYS",
				"state" => "NSW",
				"lat" => "-33.76676",
				"lon" => "150.774015"
			],
			[
				"postcode" => "2760",
				"suburb" => "ST MARYS EAST",
				"state" => "NSW",
				"lat" => "-33.782203",
				"lon" => "150.791603"
			],
			[
				"postcode" => "2760",
				"suburb" => "ST MARYS SOUTH",
				"state" => "NSW",
				"lat" => "-33.77854",
				"lon" => "150.775645"
			],
			[
				"postcode" => "2761",
				"suburb" => "COLEBEE",
				"state" => "NSW",
				"lat" => "-33.730647",
				"lon" => "150.866046"
			],
			[
				"postcode" => "2761",
				"suburb" => "DEAN PARK",
				"state" => "NSW",
				"lat" => "-33.73616",
				"lon" => "150.860027"
			],
			[
				"postcode" => "2761",
				"suburb" => "GLENDENNING",
				"state" => "NSW",
				"lat" => "-33.739075",
				"lon" => "150.855174"
			],
			[
				"postcode" => "2761",
				"suburb" => "HASSALL GROVE",
				"state" => "NSW",
				"lat" => "-33.733813",
				"lon" => "150.834277"
			],
			[
				"postcode" => "2761",
				"suburb" => "OAKHURST",
				"state" => "NSW",
				"lat" => "-33.744048",
				"lon" => "150.834819"
			],
			[
				"postcode" => "2761",
				"suburb" => "PLUMPTON",
				"state" => "NSW",
				"lat" => "-33.751432",
				"lon" => "150.841204"
			],
			[
				"postcode" => "2762",
				"suburb" => "SCHOFIELDS",
				"state" => "NSW",
				"lat" => "-33.697217",
				"lon" => "150.888428"
			],
			[
				"postcode" => "2763",
				"suburb" => "ACACIA GARDENS",
				"state" => "NSW",
				"lat" => "-33.730077",
				"lon" => "150.906502"
			],
			[
				"postcode" => "2763",
				"suburb" => "QUAKERS HILL",
				"state" => "NSW",
				"lat" => "-33.728356",
				"lon" => "150.881177"
			],
			[
				"postcode" => "2765",
				"suburb" => "BERKSHIRE PARK",
				"state" => "NSW",
				"lat" => "-33.672237",
				"lon" => "150.79576"
			],
			[
				"postcode" => "2765",
				"suburb" => "BOX HILL",
				"state" => "NSW",
				"lat" => "-33.639115",
				"lon" => "150.904697"
			],
			[
				"postcode" => "2765",
				"suburb" => "MARAYLYA",
				"state" => "NSW",
				"lat" => "-33.58198",
				"lon" => "150.90695"
			],
			[
				"postcode" => "2765",
				"suburb" => "MARSDEN PARK",
				"state" => "NSW",
				"lat" => "-33.697585",
				"lon" => "150.832318"
			],
			[
				"postcode" => "2765",
				"suburb" => "NELSON",
				"state" => "NSW",
				"lat" => "-33.652795",
				"lon" => "150.915685"
			],
			[
				"postcode" => "2765",
				"suburb" => "OAKVILLE",
				"state" => "NSW",
				"lat" => "-33.622562",
				"lon" => "150.862154"
			],
			[
				"postcode" => "2765",
				"suburb" => "RIVERSTONE",
				"state" => "NSW",
				"lat" => "-33.679382",
				"lon" => "150.861595"
			],
			[
				"postcode" => "2766",
				"suburb" => "EASTERN CREEK",
				"state" => "NSW",
				"lat" => "-33.803114",
				"lon" => "150.852192"
			],
			[
				"postcode" => "2766",
				"suburb" => "ROOTY HILL",
				"state" => "NSW",
				"lat" => "-33.77155",
				"lon" => "150.843922"
			],
			[
				"postcode" => "2767",
				"suburb" => "DOONSIDE",
				"state" => "NSW",
				"lat" => "-33.765071",
				"lon" => "150.86929"
			],
			[
				"postcode" => "2767",
				"suburb" => "WOODCROFT",
				"state" => "NSW",
				"lat" => "-33.754986",
				"lon" => "150.879666"
			],
			[
				"postcode" => "2768",
				"suburb" => "GLENWOOD",
				"state" => "NSW",
				"lat" => "-33.737863",
				"lon" => "150.922732"
			],
			[
				"postcode" => "2768",
				"suburb" => "PARKLEA",
				"state" => "NSW",
				"lat" => "-33.728123",
				"lon" => "150.923807"
			],
			[
				"postcode" => "2768",
				"suburb" => "STANHOPE GARDENS",
				"state" => "NSW",
				"lat" => "-33.711215",
				"lon" => "150.933621"
			],
			[
				"postcode" => "2769",
				"suburb" => "THE PONDS",
				"state" => "NSW",
				"lat" => "-34.054326",
				"lon" => "150.753104"
			],
			[
				"postcode" => "2770",
				"suburb" => "BIDWILL",
				"state" => "NSW",
				"lat" => "-33.73024",
				"lon" => "150.822765"
			],
			[
				"postcode" => "2770",
				"suburb" => "BLACKETT",
				"state" => "NSW",
				"lat" => "-33.738507",
				"lon" => "150.811206"
			],
			[
				"postcode" => "2770",
				"suburb" => "DHARRUK",
				"state" => "NSW",
				"lat" => "-33.743232",
				"lon" => "150.816642"
			],
			[
				"postcode" => "2770",
				"suburb" => "EMERTON",
				"state" => "NSW",
				"lat" => "-33.742855",
				"lon" => "150.808263"
			],
			[
				"postcode" => "2770",
				"suburb" => "HEBERSHAM",
				"state" => "NSW",
				"lat" => "-33.743504",
				"lon" => "150.822682"
			],
			[
				"postcode" => "2770",
				"suburb" => "LETHBRIDGE PARK",
				"state" => "NSW",
				"lat" => "-33.736938",
				"lon" => "150.799824"
			],
			[
				"postcode" => "2770",
				"suburb" => "MINCHINBURY",
				"state" => "NSW",
				"lat" => "-33.781673",
				"lon" => "150.813667"
			],
			[
				"postcode" => "2770",
				"suburb" => "MOUNT DRUITT",
				"state" => "NSW",
				"lat" => "-33.766434",
				"lon" => "150.816989"
			],
			[
				"postcode" => "2770",
				"suburb" => "MOUNT DRUITT VILLAGE",
				"state" => "NSW",
				"lat" => "-33.772053",
				"lon" => "150.811583"
			],
			[
				"postcode" => "2770",
				"suburb" => "SHALVEY",
				"state" => "NSW",
				"lat" => "-33.729373",
				"lon" => "150.808375"
			],
			[
				"postcode" => "2770",
				"suburb" => "TREGEAR",
				"state" => "NSW",
				"lat" => "-33.751082",
				"lon" => "150.795678"
			],
			[
				"postcode" => "2770",
				"suburb" => "WHALAN",
				"state" => "NSW",
				"lat" => "-33.760165",
				"lon" => "150.809528"
			],
			[
				"postcode" => "2770",
				"suburb" => "WILLMOT",
				"state" => "NSW",
				"lat" => "-33.727621",
				"lon" => "150.791569"
			],
			[
				"postcode" => "2773",
				"suburb" => "GLENBROOK",
				"state" => "NSW",
				"lat" => "-33.768024",
				"lon" => "150.621693"
			],
			[
				"postcode" => "2773",
				"suburb" => "LAPSTONE",
				"state" => "NSW",
				"lat" => "-33.774112",
				"lon" => "150.636657"
			],
			[
				"postcode" => "2774",
				"suburb" => "BLAXLAND",
				"state" => "NSW",
				"lat" => "-33.744263",
				"lon" => "150.610076"
			],
			[
				"postcode" => "2774",
				"suburb" => "BLAXLAND EAST",
				"state" => "NSW",
				"lat" => "-33.745661",
				"lon" => "150.622142"
			],
			[
				"postcode" => "2774",
				"suburb" => "MOUNT RIVERVIEW",
				"state" => "NSW",
				"lat" => "-33.734273",
				"lon" => "150.631177"
			],
			[
				"postcode" => "2774",
				"suburb" => "WARRIMOO",
				"state" => "NSW",
				"lat" => "-33.722958",
				"lon" => "150.604162"
			],
			[
				"postcode" => "2775",
				"suburb" => "CENTRAL MACDONALD",
				"state" => "NSW",
				"lat" => "-33.331658",
				"lon" => "150.975498"
			],
			[
				"postcode" => "2775",
				"suburb" => "FERNANCES",
				"state" => "NSW",
				"lat" => "-33.201482",
				"lon" => "150.995227"
			],
			[
				"postcode" => "2775",
				"suburb" => "GUNDERMAN",
				"state" => "NSW",
				"lat" => "-33.436367",
				"lon" => "151.057224"
			],
			[
				"postcode" => "2775",
				"suburb" => "HIGHER MACDONALD",
				"state" => "NSW",
				"lat" => "-33.215527",
				"lon" => "150.937207"
			],
			[
				"postcode" => "2775",
				"suburb" => "LAUGHTONDALE",
				"state" => "NSW",
				"lat" => "-33.410229",
				"lon" => "151.024592"
			],
			[
				"postcode" => "2775",
				"suburb" => "LEETS VALE",
				"state" => "NSW",
				"lat" => "-33.427708",
				"lon" => "150.948095"
			],
			[
				"postcode" => "2775",
				"suburb" => "LOWER MACDONALD",
				"state" => "NSW",
				"lat" => "-33.363005",
				"lon" => "150.967058"
			],
			[
				"postcode" => "2775",
				"suburb" => "MARLOW",
				"state" => "NSW",
				"lat" => "-33.466447",
				"lon" => "151.170312"
			],
			[
				"postcode" => "2775",
				"suburb" => "MOGO CREEK",
				"state" => "NSW",
				"lat" => "-33.165969",
				"lon" => "151.064931"
			],
			[
				"postcode" => "2775",
				"suburb" => "PERRYS CROSSING",
				"state" => "NSW",
				"lat" => "-33.196805",
				"lon" => "150.96959"
			],
			[
				"postcode" => "2775",
				"suburb" => "SINGLETONS MILL",
				"state" => "NSW",
				"lat" => "-33.463598",
				"lon" => "151.075938"
			],
			[
				"postcode" => "2775",
				"suburb" => "SPENCER",
				"state" => "NSW",
				"lat" => "-33.459455",
				"lon" => "151.142385"
			],
			[
				"postcode" => "2775",
				"suburb" => "ST ALBANS",
				"state" => "NSW",
				"lat" => "-33.290934",
				"lon" => "150.970263"
			],
			[
				"postcode" => "2775",
				"suburb" => "UPPER MACDONALD",
				"state" => "NSW",
				"lat" => "-33.257372",
				"lon" => "150.942071"
			],
			[
				"postcode" => "2775",
				"suburb" => "WEBBS CREEK",
				"state" => "NSW",
				"lat" => "-33.389342",
				"lon" => "150.958034"
			],
			[
				"postcode" => "2775",
				"suburb" => "WISEMANS FERRY",
				"state" => "NSW",
				"lat" => "-33.408879",
				"lon" => "150.980048"
			],
			[
				"postcode" => "2775",
				"suburb" => "WRIGHTS CREEK",
				"state" => "NSW",
				"lat" => "-33.302809",
				"lon" => "151.005933"
			],
			[
				"postcode" => "2776",
				"suburb" => "FAULCONBRIDGE",
				"state" => "NSW",
				"lat" => "-33.696505",
				"lon" => "150.534998"
			],
			[
				"postcode" => "2777",
				"suburb" => "HAWKESBURY HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.665114",
				"lon" => "150.650802"
			],
			[
				"postcode" => "2777",
				"suburb" => "SPRINGWOOD",
				"state" => "NSW",
				"lat" => "-33.700645",
				"lon" => "150.55875"
			],
			[
				"postcode" => "2777",
				"suburb" => "SUN VALLEY",
				"state" => "NSW",
				"lat" => "-33.712081",
				"lon" => "150.592445"
			],
			[
				"postcode" => "2777",
				"suburb" => "VALLEY HEIGHTS",
				"state" => "NSW",
				"lat" => "-33.705288",
				"lon" => "150.584919"
			],
			[
				"postcode" => "2777",
				"suburb" => "WINMALEE",
				"state" => "NSW",
				"lat" => "-33.673276",
				"lon" => "150.61911"
			],
			[
				"postcode" => "2777",
				"suburb" => "YELLOW ROCK",
				"state" => "NSW",
				"lat" => "-33.695065",
				"lon" => "150.624083"
			],
			[
				"postcode" => "2778",
				"suburb" => "BULLS CAMP",
				"state" => "NSW",
				"lat" => "-33.794605",
				"lon" => "150.04041"
			],
			[
				"postcode" => "2778",
				"suburb" => "LINDEN",
				"state" => "NSW",
				"lat" => "-33.715529",
				"lon" => "150.504477"
			],
			[
				"postcode" => "2778",
				"suburb" => "WOODFORD",
				"state" => "NSW",
				"lat" => "-33.735174",
				"lon" => "150.479149"
			],
			[
				"postcode" => "2779",
				"suburb" => "HAZELBROOK",
				"state" => "NSW",
				"lat" => "-33.720992",
				"lon" => "150.451629"
			],
			[
				"postcode" => "2780",
				"suburb" => "KATOOMBA",
				"state" => "NSW",
				"lat" => "-33.714043",
				"lon" => "150.311589"
			],
			[
				"postcode" => "2780",
				"suburb" => "LEURA",
				"state" => "NSW",
				"lat" => "-33.714149",
				"lon" => "150.330827"
			],
			[
				"postcode" => "2780",
				"suburb" => "MEDLOW BATH",
				"state" => "NSW",
				"lat" => "-33.672526",
				"lon" => "150.280742"
			],
			[
				"postcode" => "2780",
				"suburb" => "YOSEMITE",
				"state" => "NSW",
				"lat" => "-33.68806",
				"lon" => "150.315011"
			],
			[
				"postcode" => "2782",
				"suburb" => "WENTWORTH FALLS",
				"state" => "NSW",
				"lat" => "-33.709836",
				"lon" => "150.376454"
			],
			[
				"postcode" => "2783",
				"suburb" => "LAWSON",
				"state" => "NSW",
				"lat" => "-33.718957",
				"lon" => "150.430094"
			],
			[
				"postcode" => "2784",
				"suburb" => "BULLABURRA",
				"state" => "NSW",
				"lat" => "-33.722751",
				"lon" => "150.41364"
			],
			[
				"postcode" => "2785",
				"suburb" => "BLACKHEATH",
				"state" => "NSW",
				"lat" => "-33.635556",
				"lon" => "150.28483"
			],
			[
				"postcode" => "2785",
				"suburb" => "MEGALONG",
				"state" => "NSW",
				"lat" => "-33.704121",
				"lon" => "150.246224"
			],
			[
				"postcode" => "2786",
				"suburb" => "BELL",
				"state" => "NSW",
				"lat" => "-33.513745",
				"lon" => "150.279391"
			],
			[
				"postcode" => "2786",
				"suburb" => "DARGAN",
				"state" => "NSW",
				"lat" => "-33.489256",
				"lon" => "150.263514"
			],
			[
				"postcode" => "2786",
				"suburb" => "MOUNT IRVINE",
				"state" => "NSW",
				"lat" => "-33.492148",
				"lon" => "150.445296"
			],
			[
				"postcode" => "2786",
				"suburb" => "MOUNT VICTORIA",
				"state" => "NSW",
				"lat" => "-33.588561",
				"lon" => "150.251161"
			],
			[
				"postcode" => "2786",
				"suburb" => "MOUNT WILSON",
				"state" => "NSW",
				"lat" => "-33.503126",
				"lon" => "150.388368"
			],
			[
				"postcode" => "2787",
				"suburb" => "BLACK SPRINGS",
				"state" => "NSW",
				"lat" => "-33.840966",
				"lon" => "149.711027"
			],
			[
				"postcode" => "2787",
				"suburb" => "CHATHAM VALLEY",
				"state" => "NSW",
				"lat" => "-33.820288",
				"lon" => "149.88752"
			],
			[
				"postcode" => "2787",
				"suburb" => "DUCKMALOI",
				"state" => "NSW",
				"lat" => "-33.679898",
				"lon" => "149.964207"
			],
			[
				"postcode" => "2787",
				"suburb" => "EDITH",
				"state" => "NSW",
				"lat" => "-33.800214",
				"lon" => "149.922383"
			],
			[
				"postcode" => "2787",
				"suburb" => "GINGKIN",
				"state" => "NSW",
				"lat" => "-33.888788",
				"lon" => "149.927471"
			],
			[
				"postcode" => "2787",
				"suburb" => "GURNANG",
				"state" => "NSW",
				"lat" => "-34.011316",
				"lon" => "149.837299"
			],
			[
				"postcode" => "2787",
				"suburb" => "HAZELGROVE",
				"state" => "NSW",
				"lat" => "-33.650014",
				"lon" => "149.893713"
			],
			[
				"postcode" => "2787",
				"suburb" => "JAUNTER",
				"state" => "NSW",
				"lat" => "-33.993635",
				"lon" => "149.887663"
			],
			[
				"postcode" => "2787",
				"suburb" => "KANANGRA",
				"state" => "NSW",
				"lat" => "-33.99038",
				"lon" => "150.104745"
			],
			[
				"postcode" => "2787",
				"suburb" => "MAYFIELD",
				"state" => "NSW",
				"lat" => "-33.66329",
				"lon" => "149.780209"
			],
			[
				"postcode" => "2787",
				"suburb" => "MOUNT OLIVE",
				"state" => "NSW",
				"lat" => "-33.598187",
				"lon" => "149.917271"
			],
			[
				"postcode" => "2787",
				"suburb" => "MOUNT WERONG",
				"state" => "NSW",
				"lat" => "-34.085969",
				"lon" => "149.903856"
			],
			[
				"postcode" => "2787",
				"suburb" => "MOZART",
				"state" => "NSW",
				"lat" => "-33.819672",
				"lon" => "149.856164"
			],
			[
				"postcode" => "2787",
				"suburb" => "NORWAY",
				"state" => "NSW",
				"lat" => "-33.760741",
				"lon" => "149.817231"
			],
			[
				"postcode" => "2787",
				"suburb" => "OBERON",
				"state" => "NSW",
				"lat" => "-33.703856",
				"lon" => "149.855484"
			],
			[
				"postcode" => "2787",
				"suburb" => "PORTERS RETREAT",
				"state" => "NSW",
				"lat" => "-33.988815",
				"lon" => "149.760628"
			],
			[
				"postcode" => "2787",
				"suburb" => "SHOOTERS HILL",
				"state" => "NSW",
				"lat" => "-33.895788",
				"lon" => "149.861766"
			],
			[
				"postcode" => "2787",
				"suburb" => "TARANA",
				"state" => "NSW",
				"lat" => "-33.526572",
				"lon" => "149.908189"
			],
			[
				"postcode" => "2787",
				"suburb" => "THE MEADOWS",
				"state" => "NSW",
				"lat" => "-33.63655",
				"lon" => "149.926845"
			],
			[
				"postcode" => "2790",
				"suburb" => "BEN BULLEN",
				"state" => "NSW",
				"lat" => "-33.219587",
				"lon" => "150.021733"
			],
			[
				"postcode" => "2790",
				"suburb" => "BLACKMANS FLAT",
				"state" => "NSW",
				"lat" => "-33.364149",
				"lon" => "150.059386"
			],
			[
				"postcode" => "2790",
				"suburb" => "BOWENFELS",
				"state" => "NSW",
				"lat" => "-33.471596",
				"lon" => "150.124112"
			],
			[
				"postcode" => "2790",
				"suburb" => "CLARENCE",
				"state" => "NSW",
				"lat" => "-33.479311",
				"lon" => "150.215559"
			],
			[
				"postcode" => "2790",
				"suburb" => "COBAR PARK",
				"state" => "NSW",
				"lat" => "-33.469948",
				"lon" => "150.154968"
			],
			[
				"postcode" => "2790",
				"suburb" => "CORNEY TOWN",
				"state" => "NSW",
				"lat" => "-33.47489",
				"lon" => "150.1773"
			],
			[
				"postcode" => "2790",
				"suburb" => "CULLEN BULLEN",
				"state" => "NSW",
				"lat" => "-33.303402",
				"lon" => "150.032518"
			],
			[
				"postcode" => "2790",
				"suburb" => "DOCTORS GAP",
				"state" => "NSW",
				"lat" => "-33.491005",
				"lon" => "150.176015"
			],
			[
				"postcode" => "2790",
				"suburb" => "GANBENANG",
				"state" => "NSW",
				"lat" => "-33.651781",
				"lon" => "150.135829"
			],
			[
				"postcode" => "2790",
				"suburb" => "HARTLEY",
				"state" => "NSW",
				"lat" => "-33.548476",
				"lon" => "150.154588"
			],
			[
				"postcode" => "2790",
				"suburb" => "HARTLEY VALE",
				"state" => "NSW",
				"lat" => "-33.535511",
				"lon" => "150.233807"
			],
			[
				"postcode" => "2790",
				"suburb" => "HASSANS WALLS",
				"state" => "NSW",
				"lat" => "-33.512259",
				"lon" => "150.149759"
			],
			[
				"postcode" => "2790",
				"suburb" => "HERMITAGE FLAT",
				"state" => "NSW",
				"lat" => "-33.47971",
				"lon" => "150.145293"
			],
			[
				"postcode" => "2790",
				"suburb" => "JENOLAN",
				"state" => "NSW",
				"lat" => "-33.76405",
				"lon" => "150.029554"
			],
			[
				"postcode" => "2790",
				"suburb" => "KANIMBLA",
				"state" => "NSW",
				"lat" => "-33.620702",
				"lon" => "150.187891"
			],
			[
				"postcode" => "2790",
				"suburb" => "LIDSDALE",
				"state" => "NSW",
				"lat" => "-33.378535",
				"lon" => "150.083775"
			],
			[
				"postcode" => "2790",
				"suburb" => "LITHGOW",
				"state" => "NSW",
				"lat" => "-33.480068",
				"lon" => "150.157987"
			],
			[
				"postcode" => "2790",
				"suburb" => "LITTLE HARTLEY",
				"state" => "NSW",
				"lat" => "-33.571701",
				"lon" => "150.208607"
			],
			[
				"postcode" => "2790",
				"suburb" => "LITTLETON",
				"state" => "NSW",
				"lat" => "-33.495525",
				"lon" => "150.136672"
			],
			[
				"postcode" => "2790",
				"suburb" => "LOWTHER",
				"state" => "NSW",
				"lat" => "-33.624853",
				"lon" => "150.100331"
			],
			[
				"postcode" => "2790",
				"suburb" => "MARRANGAROO",
				"state" => "NSW",
				"lat" => "-33.428678",
				"lon" => "150.106225"
			],
			[
				"postcode" => "2790",
				"suburb" => "MCKELLARS PARK",
				"state" => "NSW",
				"lat" => "-33.47156",
				"lon" => "150.154148"
			],
			[
				"postcode" => "2790",
				"suburb" => "MORTS ESTATE",
				"state" => "NSW",
				"lat" => "-33.468424",
				"lon" => "150.168076"
			],
			[
				"postcode" => "2790",
				"suburb" => "MOUNT LAMBIE",
				"state" => "NSW",
				"lat" => "-33.455786",
				"lon" => "149.98258"
			],
			[
				"postcode" => "2790",
				"suburb" => "NEWNES",
				"state" => "NSW",
				"lat" => "-33.176787",
				"lon" => "150.236022"
			],
			[
				"postcode" => "2790",
				"suburb" => "OAKY PARK",
				"state" => "NSW",
				"lat" => "-33.471048",
				"lon" => "150.178208"
			],
			[
				"postcode" => "2790",
				"suburb" => "POTTERY ESTATE",
				"state" => "NSW",
				"lat" => "-33.484868",
				"lon" => "150.154533"
			],
			[
				"postcode" => "2790",
				"suburb" => "RYDAL",
				"state" => "NSW",
				"lat" => "-33.49253",
				"lon" => "150.036915"
			],
			[
				"postcode" => "2790",
				"suburb" => "SHEEDYS GULLY",
				"state" => "NSW",
				"lat" => "-33.495736",
				"lon" => "150.15021"
			],
			[
				"postcode" => "2790",
				"suburb" => "SODWALLS",
				"state" => "NSW",
				"lat" => "-33.516429",
				"lon" => "150.007266"
			],
			[
				"postcode" => "2790",
				"suburb" => "SOUTH BOWENFELS",
				"state" => "NSW",
				"lat" => "-33.60463",
				"lon" => "150.120913"
			],
			[
				"postcode" => "2790",
				"suburb" => "SOUTH LITTLETON",
				"state" => "NSW",
				"lat" => "-33.498267",
				"lon" => "150.13517"
			],
			[
				"postcode" => "2790",
				"suburb" => "SPRINGVALE",
				"state" => "NSW",
				"lat" => "-33.412094",
				"lon" => "150.11719"
			],
			[
				"postcode" => "2790",
				"suburb" => "STATE MINE GULLY",
				"state" => "NSW",
				"lat" => "-33.456482",
				"lon" => "150.172201"
			],
			[
				"postcode" => "2790",
				"suburb" => "VALE OF CLWYDD",
				"state" => "NSW",
				"lat" => "-33.483955",
				"lon" => "150.176542"
			],
			[
				"postcode" => "2790",
				"suburb" => "WOLGAN VALLEY",
				"state" => "NSW",
				"lat" => "-33.259041",
				"lon" => "150.150781"
			],
			[
				"postcode" => "2790",
				"suburb" => "WOLLANGAMBE",
				"state" => "NSW",
				"lat" => "-33.365624",
				"lon" => "150.428803"
			],
			[
				"postcode" => "2791",
				"suburb" => "CARCOAR",
				"state" => "NSW",
				"lat" => "-33.609622",
				"lon" => "149.140601"
			],
			[
				"postcode" => "2791",
				"suburb" => "ERROWANBANG",
				"state" => "NSW",
				"lat" => "-33.545345",
				"lon" => "149.051172"
			],
			[
				"postcode" => "2792",
				"suburb" => "BURNT YARDS",
				"state" => "NSW",
				"lat" => "-33.585625",
				"lon" => "149.031455"
			],
			[
				"postcode" => "2792",
				"suburb" => "MANDURAMA",
				"state" => "NSW",
				"lat" => "-33.648855",
				"lon" => "149.075273"
			],
			[
				"postcode" => "2793",
				"suburb" => "DARBYS FALLS",
				"state" => "NSW",
				"lat" => "-33.931096",
				"lon" => "148.859104"
			],
			[
				"postcode" => "2793",
				"suburb" => "MOUNT MCDONALD",
				"state" => "NSW",
				"lat" => "-33.916495",
				"lon" => "148.946017"
			],
			[
				"postcode" => "2793",
				"suburb" => "ROSEBERG",
				"state" => "NSW",
				"lat" => "-33.804739",
				"lon" => "149.024918"
			],
			[
				"postcode" => "2793",
				"suburb" => "WOODSTOCK",
				"state" => "NSW",
				"lat" => "-33.74518",
				"lon" => "148.847958"
			],
			[
				"postcode" => "2794",
				"suburb" => "BUMBALDRY",
				"state" => "NSW",
				"lat" => "-33.906339",
				"lon" => "148.456385"
			],
			[
				"postcode" => "2794",
				"suburb" => "COWRA",
				"state" => "NSW",
				"lat" => "-33.83468",
				"lon" => "148.691192"
			],
			[
				"postcode" => "2794",
				"suburb" => "HOVELLS CREEK",
				"state" => "NSW",
				"lat" => "-34.055204",
				"lon" => "148.882689"
			],
			[
				"postcode" => "2794",
				"suburb" => "MOUNT COLLINS",
				"state" => "NSW",
				"lat" => "-34.019282",
				"lon" => "148.803923"
			],
			[
				"postcode" => "2794",
				"suburb" => "NOONBINNA",
				"state" => "NSW",
				"lat" => "-33.887663",
				"lon" => "148.643696"
			],
			[
				"postcode" => "2794",
				"suburb" => "WATTAMONDARA",
				"state" => "NSW",
				"lat" => "-33.938468",
				"lon" => "148.606068"
			],
			[
				"postcode" => "2795",
				"suburb" => "ABERCROMBIE RIVER",
				"state" => "NSW",
				"lat" => "-33.911806",
				"lon" => "149.332781"
			],
			[
				"postcode" => "2795",
				"suburb" => "ARKELL",
				"state" => "NSW",
				"lat" => "-33.727778",
				"lon" => "149.382952"
			],
			[
				"postcode" => "2795",
				"suburb" => "ARKSTONE",
				"state" => "NSW",
				"lat" => "-34.042417",
				"lon" => "149.64425"
			],
			[
				"postcode" => "2795",
				"suburb" => "BALD RIDGE",
				"state" => "NSW",
				"lat" => "-33.934672",
				"lon" => "149.428474"
			],
			[
				"postcode" => "2795",
				"suburb" => "BALLYROE",
				"state" => "NSW",
				"lat" => "-34.084405",
				"lon" => "149.604294"
			],
			[
				"postcode" => "2795",
				"suburb" => "BATHAMPTON",
				"state" => "NSW",
				"lat" => "-33.491908",
				"lon" => "149.4077"
			],
			[
				"postcode" => "2795",
				"suburb" => "BATHURST",
				"state" => "NSW",
				"lat" => "-33.41978",
				"lon" => "149.574258"
			],
			[
				"postcode" => "2795",
				"suburb" => "BILLYWILLINGA",
				"state" => "NSW",
				"lat" => "-33.273015",
				"lon" => "149.43985"
			],
			[
				"postcode" => "2795",
				"suburb" => "BOX RIDGE",
				"state" => "NSW",
				"lat" => "-31.451631",
				"lon" => "149.484056"
			],
			[
				"postcode" => "2795",
				"suburb" => "BREWONGLE",
				"state" => "NSW",
				"lat" => "-33.48878",
				"lon" => "149.67541"
			],
			[
				"postcode" => "2795",
				"suburb" => "BRUINBUN",
				"state" => "NSW",
				"lat" => "-33.129853",
				"lon" => "149.431806"
			],
			[
				"postcode" => "2795",
				"suburb" => "BURRAGA",
				"state" => "NSW",
				"lat" => "-33.947964",
				"lon" => "149.53013"
			],
			[
				"postcode" => "2795",
				"suburb" => "CALOOLA",
				"state" => "NSW",
				"lat" => "-33.617883",
				"lon" => "149.434865"
			],
			[
				"postcode" => "2795",
				"suburb" => "CHARLES STURT UNIVERSITY",
				"state" => "NSW",
				"lat" => "-33.429521",
				"lon" => "149.56287"
			],
			[
				"postcode" => "2795",
				"suburb" => "CHARLTON",
				"state" => "NSW",
				"lat" => "-33.679428",
				"lon" => "149.62245"
			],
			[
				"postcode" => "2795",
				"suburb" => "CLEAR CREEK",
				"state" => "NSW",
				"lat" => "-33.332296",
				"lon" => "149.707746"
			],
			[
				"postcode" => "2795",
				"suburb" => "COLO",
				"state" => "NSW",
				"lat" => "-33.788188",
				"lon" => "149.259388"
			],
			[
				"postcode" => "2795",
				"suburb" => "COPPERHANNIA",
				"state" => "NSW",
				"lat" => "-33.896561",
				"lon" => "149.265436"
			],
			[
				"postcode" => "2795",
				"suburb" => "COW FLAT",
				"state" => "NSW",
				"lat" => "-33.569555",
				"lon" => "149.534684"
			],
			[
				"postcode" => "2795",
				"suburb" => "CRUDINE",
				"state" => "NSW",
				"lat" => "-32.939577",
				"lon" => "149.700948"
			],
			[
				"postcode" => "2795",
				"suburb" => "CURRAGH",
				"state" => "NSW",
				"lat" => "-33.952685",
				"lon" => "149.211431"
			],
			[
				"postcode" => "2795",
				"suburb" => "DARK CORNER",
				"state" => "NSW",
				"lat" => "-33.306755",
				"lon" => "149.877371"
			],
			[
				"postcode" => "2795",
				"suburb" => "DOG ROCKS",
				"state" => "NSW",
				"lat" => "-33.757261",
				"lon" => "149.613316"
			],
			[
				"postcode" => "2795",
				"suburb" => "DUNKELD",
				"state" => "NSW",
				"lat" => "-33.406577",
				"lon" => "149.485667"
			],
			[
				"postcode" => "2795",
				"suburb" => "DURAMANA",
				"state" => "NSW",
				"lat" => "-33.267558",
				"lon" => "149.532753"
			],
			[
				"postcode" => "2795",
				"suburb" => "EGLINTON",
				"state" => "NSW",
				"lat" => "-33.374597",
				"lon" => "149.558662"
			],
			[
				"postcode" => "2795",
				"suburb" => "ESSINGTON",
				"state" => "NSW",
				"lat" => "-33.707264",
				"lon" => "149.688616"
			],
			[
				"postcode" => "2795",
				"suburb" => "EVANS PLAINS",
				"state" => "NSW",
				"lat" => "-33.438124",
				"lon" => "149.500376"
			],
			[
				"postcode" => "2795",
				"suburb" => "FITZGERALDS VALLEY",
				"state" => "NSW",
				"lat" => "-33.526441",
				"lon" => "149.39537"
			],
			[
				"postcode" => "2795",
				"suburb" => "FOREST GROVE",
				"state" => "NSW",
				"lat" => "-33.378077",
				"lon" => "149.658372"
			],
			[
				"postcode" => "2795",
				"suburb" => "FOSTERS VALLEY",
				"state" => "NSW",
				"lat" => "-33.615833",
				"lon" => "149.55865"
			],
			[
				"postcode" => "2795",
				"suburb" => "FREEMANTLE",
				"state" => "NSW",
				"lat" => "-33.243663",
				"lon" => "149.378571"
			],
			[
				"postcode" => "2795",
				"suburb" => "GARTHOWEN",
				"state" => "NSW",
				"lat" => "-33.596772",
				"lon" => "149.622184"
			],
			[
				"postcode" => "2795",
				"suburb" => "GEMALLA",
				"state" => "NSW",
				"lat" => "-33.524129",
				"lon" => "149.837333"
			],
			[
				"postcode" => "2795",
				"suburb" => "GEORGES PLAINS",
				"state" => "NSW",
				"lat" => "-33.515629",
				"lon" => "149.523182"
			],
			[
				"postcode" => "2795",
				"suburb" => "GILMANDYKE",
				"state" => "NSW",
				"lat" => "-33.778548",
				"lon" => "149.564365"
			],
			[
				"postcode" => "2795",
				"suburb" => "GLANMIRE",
				"state" => "NSW",
				"lat" => "-33.425985",
				"lon" => "149.706091"
			],
			[
				"postcode" => "2795",
				"suburb" => "GORMANS HILL",
				"state" => "NSW",
				"lat" => "-33.43404",
				"lon" => "149.590433"
			],
			[
				"postcode" => "2795",
				"suburb" => "GOWAN",
				"state" => "NSW",
				"lat" => "-33.200595",
				"lon" => "149.349168"
			],
			[
				"postcode" => "2795",
				"suburb" => "HOBBYS YARDS",
				"state" => "NSW",
				"lat" => "-33.700136",
				"lon" => "149.327338"
			],
			[
				"postcode" => "2795",
				"suburb" => "ISABELLA",
				"state" => "NSW",
				"lat" => "-33.954418",
				"lon" => "149.666899"
			],
			[
				"postcode" => "2795",
				"suburb" => "JEREMY",
				"state" => "NSW",
				"lat" => "-33.978707",
				"lon" => "149.548194"
			],
			[
				"postcode" => "2795",
				"suburb" => "JUDDS CREEK",
				"state" => "NSW",
				"lat" => "-33.833712",
				"lon" => "149.550988"
			],
			[
				"postcode" => "2795",
				"suburb" => "KELSO",
				"state" => "NSW",
				"lat" => "-33.419196",
				"lon" => "149.611555"
			],
			[
				"postcode" => "2795",
				"suburb" => "KILLONGBUTTA",
				"state" => "NSW",
				"lat" => "-33.195026",
				"lon" => "149.421481"
			],
			[
				"postcode" => "2795",
				"suburb" => "KIRKCONNELL",
				"state" => "NSW",
				"lat" => "-33.437694",
				"lon" => "149.847879"
			],
			[
				"postcode" => "2795",
				"suburb" => "LAFFING WATERS",
				"state" => "NSW",
				"lat" => "-33.387823",
				"lon" => "149.610662"
			],
			[
				"postcode" => "2795",
				"suburb" => "LIMEKILNS",
				"state" => "NSW",
				"lat" => "-33.24008",
				"lon" => "149.770699"
			],
			[
				"postcode" => "2795",
				"suburb" => "LLANARTH",
				"state" => "NSW",
				"lat" => "-33.399527",
				"lon" => "149.557591"
			],
			[
				"postcode" => "2795",
				"suburb" => "LOCKSLEY",
				"state" => "NSW",
				"lat" => "-33.515828",
				"lon" => "149.776599"
			],
			[
				"postcode" => "2795",
				"suburb" => "MEADOW FLAT",
				"state" => "NSW",
				"lat" => "-33.434919",
				"lon" => "149.921282"
			],
			[
				"postcode" => "2795",
				"suburb" => "MILKERS FLAT",
				"state" => "NSW",
				"lat" => "-33.282441",
				"lon" => "149.394756"
			],
			[
				"postcode" => "2795",
				"suburb" => "MILLAH MURRAH",
				"state" => "NSW",
				"lat" => "-33.186729",
				"lon" => "149.580265"
			],
			[
				"postcode" => "2795",
				"suburb" => "MITCHELL",
				"state" => "NSW",
				"lat" => "-33.432706",
				"lon" => "149.564408"
			],
			[
				"postcode" => "2795",
				"suburb" => "MOORILDA",
				"state" => "NSW",
				"lat" => "-33.616499",
				"lon" => "149.335023"
			],
			[
				"postcode" => "2795",
				"suburb" => "MOUNT DAVID",
				"state" => "NSW",
				"lat" => "-33.860821",
				"lon" => "149.604108"
			],
			[
				"postcode" => "2795",
				"suburb" => "MOUNT PANORAMA",
				"state" => "NSW",
				"lat" => "-33.455686",
				"lon" => "149.551681"
			],
			[
				"postcode" => "2795",
				"suburb" => "MOUNT RANKIN",
				"state" => "NSW",
				"lat" => "-33.316695",
				"lon" => "149.496674"
			],
			[
				"postcode" => "2795",
				"suburb" => "NAPOLEON REEF",
				"state" => "NSW",
				"lat" => "-33.4235",
				"lon" => "149.750769"
			],
			[
				"postcode" => "2795",
				"suburb" => "NEWBRIDGE",
				"state" => "NSW",
				"lat" => "-33.585731",
				"lon" => "149.364826"
			],
			[
				"postcode" => "2795",
				"suburb" => "O'CONNELL",
				"state" => "NSW",
				"lat" => "-33.536286",
				"lon" => "149.723143"
			],
			[
				"postcode" => "2795",
				"suburb" => "ORTON PARK",
				"state" => "NSW",
				"lat" => "-33.469181",
				"lon" => "149.574285"
			],
			[
				"postcode" => "2795",
				"suburb" => "PALING YARDS",
				"state" => "NSW",
				"lat" => "-34.115372",
				"lon" => "149.754175"
			],
			[
				"postcode" => "2795",
				"suburb" => "PALMERS OAKY",
				"state" => "NSW",
				"lat" => "-33.175237",
				"lon" => "149.861851"
			],
			[
				"postcode" => "2795",
				"suburb" => "PEEL",
				"state" => "NSW",
				"lat" => "-33.290006",
				"lon" => "149.615645"
			],
			[
				"postcode" => "2795",
				"suburb" => "PERTHVILLE",
				"state" => "NSW",
				"lat" => "-33.4859",
				"lon" => "149.54698"
			],
			[
				"postcode" => "2795",
				"suburb" => "RAGLAN",
				"state" => "NSW",
				"lat" => "-33.422275",
				"lon" => "149.649389"
			],
			[
				"postcode" => "2795",
				"suburb" => "ROBIN HILL",
				"state" => "NSW",
				"lat" => "-33.41473",
				"lon" => "149.550475"
			],
			[
				"postcode" => "2795",
				"suburb" => "ROCK FOREST",
				"state" => "NSW",
				"lat" => "-33.354231",
				"lon" => "149.396538"
			],
			[
				"postcode" => "2795",
				"suburb" => "ROCKLEY",
				"state" => "NSW",
				"lat" => "-33.692545",
				"lon" => "149.569433"
			],
			[
				"postcode" => "2795",
				"suburb" => "ROCKLEY MOUNT",
				"state" => "NSW",
				"lat" => "-33.547323",
				"lon" => "149.552941"
			],
			[
				"postcode" => "2795",
				"suburb" => "SOFALA",
				"state" => "NSW",
				"lat" => "-33.080698",
				"lon" => "149.689626"
			],
			[
				"postcode" => "2795",
				"suburb" => "SOUTH BATHURST",
				"state" => "NSW",
				"lat" => "-33.440113",
				"lon" => "149.578565"
			],
			[
				"postcode" => "2795",
				"suburb" => "STEWARTS MOUNT",
				"state" => "NSW",
				"lat" => "-33.41215",
				"lon" => "149.505697"
			],
			[
				"postcode" => "2795",
				"suburb" => "SUNNY CORNER",
				"state" => "NSW",
				"lat" => "-33.381925",
				"lon" => "149.885191"
			],
			[
				"postcode" => "2795",
				"suburb" => "TAMBAROORA",
				"state" => "NSW",
				"lat" => "-33.001044",
				"lon" => "149.424332"
			],
			[
				"postcode" => "2795",
				"suburb" => "THE LAGOON",
				"state" => "NSW",
				"lat" => "-33.544702",
				"lon" => "149.624725"
			],
			[
				"postcode" => "2795",
				"suburb" => "THE ROCKS",
				"state" => "NSW",
				"lat" => "-33.42508",
				"lon" => "149.424872"
			],
			[
				"postcode" => "2795",
				"suburb" => "TRIANGLE FLAT",
				"state" => "NSW",
				"lat" => "-33.798107",
				"lon" => "149.489443"
			],
			[
				"postcode" => "2795",
				"suburb" => "TRUNKEY CREEK",
				"state" => "NSW",
				"lat" => "-33.824738",
				"lon" => "149.363007"
			],
			[
				"postcode" => "2795",
				"suburb" => "TURONDALE",
				"state" => "NSW",
				"lat" => "-33.121542",
				"lon" => "149.601111"
			],
			[
				"postcode" => "2795",
				"suburb" => "TWENTY FORESTS",
				"state" => "NSW",
				"lat" => "-33.682344",
				"lon" => "149.741725"
			],
			[
				"postcode" => "2795",
				"suburb" => "UPPER TURON",
				"state" => "NSW",
				"lat" => "-33.100772",
				"lon" => "149.756062"
			],
			[
				"postcode" => "2795",
				"suburb" => "WALANG",
				"state" => "NSW",
				"lat" => "-33.431788",
				"lon" => "149.749308"
			],
			[
				"postcode" => "2795",
				"suburb" => "WAMBOOL",
				"state" => "NSW",
				"lat" => "-33.507576",
				"lon" => "149.763255"
			],
			[
				"postcode" => "2795",
				"suburb" => "WATTLE FLAT",
				"state" => "NSW",
				"lat" => "-33.140507",
				"lon" => "149.693813"
			],
			[
				"postcode" => "2795",
				"suburb" => "WATTON",
				"state" => "NSW",
				"lat" => "-33.302071",
				"lon" => "149.410294"
			],
			[
				"postcode" => "2795",
				"suburb" => "WEST BATHURST",
				"state" => "NSW",
				"lat" => "-33.412695",
				"lon" => "149.564797"
			],
			[
				"postcode" => "2795",
				"suburb" => "WHITE ROCK",
				"state" => "NSW",
				"lat" => "-33.470807",
				"lon" => "149.614381"
			],
			[
				"postcode" => "2795",
				"suburb" => "WIAGDON",
				"state" => "NSW",
				"lat" => "-33.210163",
				"lon" => "149.664833"
			],
			[
				"postcode" => "2795",
				"suburb" => "WIMBLEDON",
				"state" => "NSW",
				"lat" => "-33.546855",
				"lon" => "149.428684"
			],
			[
				"postcode" => "2795",
				"suburb" => "WINBURNDALE",
				"state" => "NSW",
				"lat" => "-33.28587",
				"lon" => "149.79624"
			],
			[
				"postcode" => "2795",
				"suburb" => "WINDRADYNE",
				"state" => "NSW",
				"lat" => "-33.408309",
				"lon" => "149.550561"
			],
			[
				"postcode" => "2795",
				"suburb" => "WISEMANS CREEK",
				"state" => "NSW",
				"lat" => "-33.618978",
				"lon" => "149.718319"
			],
			[
				"postcode" => "2795",
				"suburb" => "YARRAS",
				"state" => "NSW",
				"lat" => "-33.355607",
				"lon" => "149.673968"
			],
			[
				"postcode" => "2795",
				"suburb" => "YETHOLME",
				"state" => "NSW",
				"lat" => "-33.449583",
				"lon" => "149.816693"
			],
			[
				"postcode" => "2797",
				"suburb" => "GARLAND",
				"state" => "NSW",
				"lat" => "-33.707873",
				"lon" => "149.025809"
			],
			[
				"postcode" => "2797",
				"suburb" => "LYNDHURST",
				"state" => "NSW",
				"lat" => "-33.674888",
				"lon" => "149.045193"
			],
			[
				"postcode" => "2798",
				"suburb" => "BYNG",
				"state" => "NSW",
				"lat" => "-33.343288",
				"lon" => "149.254464"
			],
			[
				"postcode" => "2798",
				"suburb" => "FLYERS CREEK",
				"state" => "NSW",
				"lat" => "-33.510818",
				"lon" => "149.044072"
			],
			[
				"postcode" => "2798",
				"suburb" => "FOREST REEFS",
				"state" => "NSW",
				"lat" => "-33.453985",
				"lon" => "149.10924"
			],
			[
				"postcode" => "2798",
				"suburb" => "GUYONG",
				"state" => "NSW",
				"lat" => "-33.414685",
				"lon" => "149.248914"
			],
			[
				"postcode" => "2798",
				"suburb" => "MILLTHORPE",
				"state" => "NSW",
				"lat" => "-33.445862",
				"lon" => "149.185397"
			],
			[
				"postcode" => "2798",
				"suburb" => "SPRING TERRACE",
				"state" => "NSW",
				"lat" => "-33.402381",
				"lon" => "149.069863"
			],
			[
				"postcode" => "2798",
				"suburb" => "TALLWOOD",
				"state" => "NSW",
				"lat" => "-33.500866",
				"lon" => "149.123535"
			],
			[
				"postcode" => "2799",
				"suburb" => "BARRY",
				"state" => "NSW",
				"lat" => "-33.648293",
				"lon" => "149.269545"
			],
			[
				"postcode" => "2799",
				"suburb" => "BLAYNEY",
				"state" => "NSW",
				"lat" => "-33.532319",
				"lon" => "149.255263"
			],
			[
				"postcode" => "2799",
				"suburb" => "BROWNS CREEK",
				"state" => "NSW",
				"lat" => "-33.525683",
				"lon" => "149.149876"
			],
			[
				"postcode" => "2799",
				"suburb" => "FITZGERALDS MOUNT",
				"state" => "NSW",
				"lat" => "-33.499865",
				"lon" => "149.377023"
			],
			[
				"postcode" => "2799",
				"suburb" => "KINGS PLAINS",
				"state" => "NSW",
				"lat" => "-33.500593",
				"lon" => "149.3252"
			],
			[
				"postcode" => "2799",
				"suburb" => "NEVILLE",
				"state" => "NSW",
				"lat" => "-33.709398",
				"lon" => "149.215073"
			],
			[
				"postcode" => "2799",
				"suburb" => "VITTORIA",
				"state" => "NSW",
				"lat" => "-33.435894",
				"lon" => "149.372967"
			],
			[
				"postcode" => "2800",
				"suburb" => "BELGRAVIA",
				"state" => "NSW",
				"lat" => "-33.123439",
				"lon" => "149.026661"
			],
			[
				"postcode" => "2800",
				"suburb" => "BLOOMFIELD",
				"state" => "NSW",
				"lat" => "-33.319696",
				"lon" => "149.088375"
			],
			[
				"postcode" => "2800",
				"suburb" => "BORENORE",
				"state" => "NSW",
				"lat" => "-33.247292",
				"lon" => "148.974505"
			],
			[
				"postcode" => "2800",
				"suburb" => "CADIA",
				"state" => "NSW",
				"lat" => "-33.455109",
				"lon" => "148.99351"
			],
			[
				"postcode" => "2800",
				"suburb" => "CANOBOLAS",
				"state" => "NSW",
				"lat" => "-33.298346",
				"lon" => "149.047339"
			],
			[
				"postcode" => "2800",
				"suburb" => "CARGO",
				"state" => "NSW",
				"lat" => "-33.423633",
				"lon" => "148.808929"
			],
			[
				"postcode" => "2800",
				"suburb" => "CLERGATE",
				"state" => "NSW",
				"lat" => "-33.191476",
				"lon" => "149.110963"
			],
			[
				"postcode" => "2800",
				"suburb" => "CLIFTON GROVE",
				"state" => "NSW",
				"lat" => "-33.247034",
				"lon" => "149.173554"
			],
			[
				"postcode" => "2800",
				"suburb" => "EMU SWAMP",
				"state" => "NSW",
				"lat" => "-33.32574",
				"lon" => "149.200205"
			],
			[
				"postcode" => "2800",
				"suburb" => "FOUR MILE CREEK",
				"state" => "NSW",
				"lat" => "-33.42829",
				"lon" => "148.964642"
			],
			[
				"postcode" => "2800",
				"suburb" => "HUNTLEY",
				"state" => "NSW",
				"lat" => "-33.369243",
				"lon" => "149.131811"
			],
			[
				"postcode" => "2800",
				"suburb" => "KALEENTHA",
				"state" => "NSW",
				"lat" => "-32.618061",
				"lon" => "143.015537"
			],
			[
				"postcode" => "2800",
				"suburb" => "KANGAROOBIE",
				"state" => "NSW",
				"lat" => "-33.17312",
				"lon" => "149.049508"
			],
			[
				"postcode" => "2800",
				"suburb" => "KERRS CREEK",
				"state" => "NSW",
				"lat" => "-33.048539",
				"lon" => "149.092046"
			],
			[
				"postcode" => "2800",
				"suburb" => "LEWIS PONDS",
				"state" => "NSW",
				"lat" => "-33.271366",
				"lon" => "149.267788"
			],
			[
				"postcode" => "2800",
				"suburb" => "LIDSTER",
				"state" => "NSW",
				"lat" => "-33.297893",
				"lon" => "148.958974"
			],
			[
				"postcode" => "2800",
				"suburb" => "LONG POINT",
				"state" => "NSW",
				"lat" => "-33.046998",
				"lon" => "149.212519"
			],
			[
				"postcode" => "2800",
				"suburb" => "LUCKNOW",
				"state" => "NSW",
				"lat" => "-33.345662",
				"lon" => "149.161068"
			],
			[
				"postcode" => "2800",
				"suburb" => "MARCH",
				"state" => "NSW",
				"lat" => "-33.216351",
				"lon" => "149.076541"
			],
			[
				"postcode" => "2800",
				"suburb" => "MULLION CREEK",
				"state" => "NSW",
				"lat" => "-33.140704",
				"lon" => "149.120663"
			],
			[
				"postcode" => "2800",
				"suburb" => "NANGAR",
				"state" => "NSW",
				"lat" => "-33.462455",
				"lon" => "148.61237"
			],
			[
				"postcode" => "2800",
				"suburb" => "NASHDALE",
				"state" => "NSW",
				"lat" => "-33.296696",
				"lon" => "149.018299"
			],
			[
				"postcode" => "2800",
				"suburb" => "OPHIR",
				"state" => "NSW",
				"lat" => "-33.177045",
				"lon" => "149.23907"
			],
			[
				"postcode" => "2800",
				"suburb" => "ORANGE",
				"state" => "NSW",
				"lat" => "-33.276948",
				"lon" => "149.099775"
			],
			[
				"postcode" => "2800",
				"suburb" => "ORANGE EAST",
				"state" => "NSW",
				"lat" => "-33.281109",
				"lon" => "149.081766"
			],
			[
				"postcode" => "2800",
				"suburb" => "PANUARA",
				"state" => "NSW",
				"lat" => "-33.498441",
				"lon" => "148.959444"
			],
			[
				"postcode" => "2800",
				"suburb" => "PINNACLE",
				"state" => "NSW",
				"lat" => "-33.342295",
				"lon" => "149.016965"
			],
			[
				"postcode" => "2800",
				"suburb" => "SHADFORTH",
				"state" => "NSW",
				"lat" => "-33.375088",
				"lon" => "149.189492"
			],
			[
				"postcode" => "2800",
				"suburb" => "SPRING CREEK",
				"state" => "NSW",
				"lat" => "-33.345446",
				"lon" => "149.097677"
			],
			[
				"postcode" => "2800",
				"suburb" => "SPRING HILL",
				"state" => "NSW",
				"lat" => "-33.398706",
				"lon" => "149.15235"
			],
			[
				"postcode" => "2800",
				"suburb" => "SPRINGSIDE",
				"state" => "NSW",
				"lat" => "-33.364503",
				"lon" => "149.064852"
			],
			[
				"postcode" => "2800",
				"suburb" => "SUMMER HILL CREEK",
				"state" => "NSW",
				"lat" => "-33.217273",
				"lon" => "149.132468"
			],
			[
				"postcode" => "2800",
				"suburb" => "TOWAC",
				"state" => "NSW",
				"lat" => "-33.326243",
				"lon" => "149.021763"
			],
			[
				"postcode" => "2800",
				"suburb" => "WINDERA",
				"state" => "NSW",
				"lat" => "-33.199067",
				"lon" => "149.027236"
			],
			[
				"postcode" => "2803",
				"suburb" => "BENDICK MURRELL",
				"state" => "NSW",
				"lat" => "-34.16282",
				"lon" => "148.449846"
			],
			[
				"postcode" => "2803",
				"suburb" => "CROWTHER",
				"state" => "NSW",
				"lat" => "-34.096639",
				"lon" => "148.507118"
			],
			[
				"postcode" => "2803",
				"suburb" => "WIRRIMAH",
				"state" => "NSW",
				"lat" => "-34.129056",
				"lon" => "148.424253"
			],
			[
				"postcode" => "2804",
				"suburb" => "BILLIMARI",
				"state" => "NSW",
				"lat" => "-33.682514",
				"lon" => "148.615476"
			],
			[
				"postcode" => "2804",
				"suburb" => "CANOWINDRA",
				"state" => "NSW",
				"lat" => "-33.562223",
				"lon" => "148.66491"
			],
			[
				"postcode" => "2804",
				"suburb" => "MOORBEL",
				"state" => "NSW",
				"lat" => "-33.566841",
				"lon" => "148.69457"
			],
			[
				"postcode" => "2804",
				"suburb" => "NYRANG CREEK",
				"state" => "NSW",
				"lat" => "-33.539368",
				"lon" => "148.578981"
			],
			[
				"postcode" => "2805",
				"suburb" => "GOOLOOGONG",
				"state" => "NSW",
				"lat" => "-33.650848",
				"lon" => "148.41385"
			],
			[
				"postcode" => "2806",
				"suburb" => "EUGOWRA",
				"state" => "NSW",
				"lat" => "-33.427107",
				"lon" => "148.37165"
			],
			[
				"postcode" => "2806",
				"suburb" => "EULIMORE",
				"state" => "NSW",
				"lat" => "-33.360225",
				"lon" => "148.437246"
			],
			[
				"postcode" => "2807",
				"suburb" => "KOORAWATHA",
				"state" => "NSW",
				"lat" => "-34.039891",
				"lon" => "148.553887"
			],
			[
				"postcode" => "2808",
				"suburb" => "WYANGALA",
				"state" => "NSW",
				"lat" => "-33.936693",
				"lon" => "149.046361"
			],
			[
				"postcode" => "2809",
				"suburb" => "GREENETHORPE",
				"state" => "NSW",
				"lat" => "-34.041955",
				"lon" => "148.395001"
			],
			[
				"postcode" => "2810",
				"suburb" => "BIMBI",
				"state" => "NSW",
				"lat" => "-33.985252",
				"lon" => "147.927491"
			],
			[
				"postcode" => "2810",
				"suburb" => "CARAGABAL",
				"state" => "NSW",
				"lat" => "-33.843829",
				"lon" => "147.739256"
			],
			[
				"postcode" => "2810",
				"suburb" => "GLENELG",
				"state" => "NSW",
				"lat" => "-33.757223",
				"lon" => "148.082222"
			],
			[
				"postcode" => "2810",
				"suburb" => "GRENFELL",
				"state" => "NSW",
				"lat" => "-33.894985",
				"lon" => "148.161154"
			],
			[
				"postcode" => "2810",
				"suburb" => "PINEY RANGE",
				"state" => "NSW",
				"lat" => "-33.815301",
				"lon" => "147.953319"
			],
			[
				"postcode" => "2810",
				"suburb" => "PINNACLE",
				"state" => "NSW",
				"lat" => "-33.70586",
				"lon" => "147.928216"
			],
			[
				"postcode" => "2810",
				"suburb" => "PULLABOOKA",
				"state" => "NSW",
				"lat" => "-33.755424",
				"lon" => "147.825318"
			],
			[
				"postcode" => "2810",
				"suburb" => "WARRADERRY",
				"state" => "NSW",
				"lat" => "-33.757869",
				"lon" => "148.205709"
			],
			[
				"postcode" => "2820",
				"suburb" => "APSLEY",
				"state" => "NSW",
				"lat" => "-32.598356",
				"lon" => "148.963925"
			],
			[
				"postcode" => "2820",
				"suburb" => "ARTHURVILLE",
				"state" => "NSW",
				"lat" => "-32.554843",
				"lon" => "148.742709"
			],
			[
				"postcode" => "2820",
				"suburb" => "BAKERS SWAMP",
				"state" => "NSW",
				"lat" => "-32.778925",
				"lon" => "148.923303"
			],
			[
				"postcode" => "2820",
				"suburb" => "BODANGORA",
				"state" => "NSW",
				"lat" => "-32.450253",
				"lon" => "149.032287"
			],
			[
				"postcode" => "2820",
				"suburb" => "COMOBELLA",
				"state" => "NSW",
				"lat" => "-32.391643",
				"lon" => "148.961267"
			],
			[
				"postcode" => "2820",
				"suburb" => "CURRA CREEK",
				"state" => "NSW",
				"lat" => "-32.661219",
				"lon" => "148.850385"
			],
			[
				"postcode" => "2820",
				"suburb" => "DRIPSTONE",
				"state" => "NSW",
				"lat" => "-32.650329",
				"lon" => "148.989515"
			],
			[
				"postcode" => "2820",
				"suburb" => "FARNHAM",
				"state" => "NSW",
				"lat" => "-32.83936",
				"lon" => "149.086437"
			],
			[
				"postcode" => "2820",
				"suburb" => "GOLLAN",
				"state" => "NSW",
				"lat" => "-32.258244",
				"lon" => "149.070381"
			],
			[
				"postcode" => "2820",
				"suburb" => "LAKE BURRENDONG",
				"state" => "NSW",
				"lat" => "-32.675362",
				"lon" => "149.099557"
			],
			[
				"postcode" => "2820",
				"suburb" => "MARYVALE",
				"state" => "NSW",
				"lat" => "-32.464179",
				"lon" => "148.899155"
			],
			[
				"postcode" => "2820",
				"suburb" => "MEDWAY",
				"state" => "NSW",
				"lat" => "-32.127033",
				"lon" => "149.170568"
			],
			[
				"postcode" => "2820",
				"suburb" => "MONTEFIORES",
				"state" => "NSW",
				"lat" => "-32.538869",
				"lon" => "148.944461"
			],
			[
				"postcode" => "2820",
				"suburb" => "MOOKERAWA",
				"state" => "NSW",
				"lat" => "-32.764216",
				"lon" => "149.161591"
			],
			[
				"postcode" => "2820",
				"suburb" => "MOUNT AQUILA",
				"state" => "NSW",
				"lat" => "-32.833533",
				"lon" => "149.17328"
			],
			[
				"postcode" => "2820",
				"suburb" => "MOUNT ARTHUR",
				"state" => "NSW",
				"lat" => "-32.554619",
				"lon" => "148.935597"
			],
			[
				"postcode" => "2820",
				"suburb" => "MUMBIL",
				"state" => "NSW",
				"lat" => "-32.725539",
				"lon" => "149.049691"
			],
			[
				"postcode" => "2820",
				"suburb" => "NANIMA",
				"state" => "NSW",
				"lat" => "-32.511172",
				"lon" => "148.981159"
			],
			[
				"postcode" => "2820",
				"suburb" => "NEUREA",
				"state" => "NSW",
				"lat" => "-32.708193",
				"lon" => "148.947815"
			],
			[
				"postcode" => "2820",
				"suburb" => "SPICERS CREEK",
				"state" => "NSW",
				"lat" => "-32.395842",
				"lon" => "149.143044"
			],
			[
				"postcode" => "2820",
				"suburb" => "STUART TOWN",
				"state" => "NSW",
				"lat" => "-32.805688",
				"lon" => "149.077263"
			],
			[
				"postcode" => "2820",
				"suburb" => "SUNTOP",
				"state" => "NSW",
				"lat" => "-32.568222",
				"lon" => "148.824214"
			],
			[
				"postcode" => "2820",
				"suburb" => "WALMER",
				"state" => "NSW",
				"lat" => "-32.662974",
				"lon" => "148.719692"
			],
			[
				"postcode" => "2820",
				"suburb" => "WELLINGTON",
				"state" => "NSW",
				"lat" => "-32.55588",
				"lon" => "148.944797"
			],
			[
				"postcode" => "2820",
				"suburb" => "WUULUMAN",
				"state" => "NSW",
				"lat" => "-32.522858",
				"lon" => "149.074071"
			],
			[
				"postcode" => "2820",
				"suburb" => "YARRAGAL",
				"state" => "NSW",
				"lat" => "-32.611257",
				"lon" => "149.066308"
			],
			[
				"postcode" => "2821",
				"suburb" => "BURROWAY",
				"state" => "NSW",
				"lat" => "-32.057228",
				"lon" => "148.263375"
			],
			[
				"postcode" => "2821",
				"suburb" => "NARROMINE",
				"state" => "NSW",
				"lat" => "-32.23192",
				"lon" => "148.239606"
			],
			[
				"postcode" => "2823",
				"suburb" => "BUNDEMAR",
				"state" => "NSW",
				"lat" => "-31.835994",
				"lon" => "148.180564"
			],
			[
				"postcode" => "2823",
				"suburb" => "CATHUNDRAL",
				"state" => "NSW",
				"lat" => "-31.921496",
				"lon" => "147.837012"
			],
			[
				"postcode" => "2823",
				"suburb" => "DANDALOO",
				"state" => "NSW",
				"lat" => "-32.269172",
				"lon" => "147.615413"
			],
			[
				"postcode" => "2823",
				"suburb" => "GIN GIN",
				"state" => "NSW",
				"lat" => "-31.938641",
				"lon" => "148.112824"
			],
			[
				"postcode" => "2823",
				"suburb" => "TRANGIE",
				"state" => "NSW",
				"lat" => "-32.031887",
				"lon" => "147.983937"
			],
			[
				"postcode" => "2824",
				"suburb" => "BEEMUNNEL",
				"state" => "NSW",
				"lat" => "-31.673327",
				"lon" => "147.855054"
			],
			[
				"postcode" => "2824",
				"suburb" => "EENAWEENA",
				"state" => "NSW",
				"lat" => "-31.511559",
				"lon" => "147.533155"
			],
			[
				"postcode" => "2824",
				"suburb" => "MARTHAGUY",
				"state" => "NSW",
				"lat" => "-31.191038",
				"lon" => "147.86783"
			],
			[
				"postcode" => "2824",
				"suburb" => "MOUNT FOSTER",
				"state" => "NSW",
				"lat" => "-31.236032",
				"lon" => "147.614338"
			],
			[
				"postcode" => "2824",
				"suburb" => "MOUNT HARRIS",
				"state" => "NSW",
				"lat" => "-31.316722",
				"lon" => "147.656073"
			],
			[
				"postcode" => "2824",
				"suburb" => "MUMBLEBONE PLAIN",
				"state" => "NSW",
				"lat" => "-31.495946",
				"lon" => "147.689713"
			],
			[
				"postcode" => "2824",
				"suburb" => "OXLEY",
				"state" => "NSW",
				"lat" => "-31.117187",
				"lon" => "147.570991"
			],
			[
				"postcode" => "2824",
				"suburb" => "PIGEONBAH",
				"state" => "NSW",
				"lat" => "-31.553976",
				"lon" => "148.009402"
			],
			[
				"postcode" => "2824",
				"suburb" => "RAVENSWOOD",
				"state" => "NSW",
				"lat" => "-31.699958",
				"lon" => "147.847318"
			],
			[
				"postcode" => "2824",
				"suburb" => "RED HILL",
				"state" => "NSW",
				"lat" => "-35.148861",
				"lon" => "147.344983"
			],
			[
				"postcode" => "2824",
				"suburb" => "SNAKES PLAIN",
				"state" => "NSW",
				"lat" => "-31.776004",
				"lon" => "147.760218"
			],
			[
				"postcode" => "2824",
				"suburb" => "TENANDRA",
				"state" => "NSW",
				"lat" => "-31.566684",
				"lon" => "147.944978"
			],
			[
				"postcode" => "2824",
				"suburb" => "WARREN",
				"state" => "NSW",
				"lat" => "-31.699379",
				"lon" => "147.83731"
			],
			[
				"postcode" => "2825",
				"suburb" => "BABINDA",
				"state" => "NSW",
				"lat" => "-31.940261",
				"lon" => "146.479353"
			],
			[
				"postcode" => "2825",
				"suburb" => "BOBADAH",
				"state" => "NSW",
				"lat" => "-32.307388",
				"lon" => "146.68978"
			],
			[
				"postcode" => "2825",
				"suburb" => "BOGAN",
				"state" => "NSW",
				"lat" => "-31.943157",
				"lon" => "147.463241"
			],
			[
				"postcode" => "2825",
				"suburb" => "BUDDABADAH",
				"state" => "NSW",
				"lat" => "-31.851494",
				"lon" => "147.311968"
			],
			[
				"postcode" => "2825",
				"suburb" => "CANONBA",
				"state" => "NSW",
				"lat" => "-31.347072",
				"lon" => "147.345556"
			],
			[
				"postcode" => "2825",
				"suburb" => "FIVE WAYS",
				"state" => "NSW",
				"lat" => "-32.117497",
				"lon" => "147.035919"
			],
			[
				"postcode" => "2825",
				"suburb" => "HONEYBUGLE",
				"state" => "NSW",
				"lat" => "-31.829745",
				"lon" => "146.909688"
			],
			[
				"postcode" => "2825",
				"suburb" => "MIANDETTA",
				"state" => "NSW",
				"lat" => "-31.566221",
				"lon" => "146.970793"
			],
			[
				"postcode" => "2825",
				"suburb" => "MULLA",
				"state" => "NSW",
				"lat" => "-31.80673",
				"lon" => "147.311183"
			],
			[
				"postcode" => "2825",
				"suburb" => "MULLENGUDGERY",
				"state" => "NSW",
				"lat" => "-31.747549",
				"lon" => "147.428918"
			],
			[
				"postcode" => "2825",
				"suburb" => "MURRAWOMBIE",
				"state" => "NSW",
				"lat" => "-31.100101",
				"lon" => "147.145087"
			],
			[
				"postcode" => "2825",
				"suburb" => "NYNGAN",
				"state" => "NSW",
				"lat" => "-31.562487",
				"lon" => "147.192356"
			],
			[
				"postcode" => "2825",
				"suburb" => "PANGEE",
				"state" => "NSW",
				"lat" => "-32.053698",
				"lon" => "146.754447"
			],
			[
				"postcode" => "2827",
				"suburb" => "BEARBONG",
				"state" => "NSW",
				"lat" => "-31.66393",
				"lon" => "148.881171"
			],
			[
				"postcode" => "2827",
				"suburb" => "BIDDON",
				"state" => "NSW",
				"lat" => "-31.572035",
				"lon" => "148.847467"
			],
			[
				"postcode" => "2827",
				"suburb" => "BREELONG",
				"state" => "NSW",
				"lat" => "-31.811735",
				"lon" => "148.799571"
			],
			[
				"postcode" => "2827",
				"suburb" => "COLLIE",
				"state" => "NSW",
				"lat" => "-31.667727",
				"lon" => "148.30349"
			],
			[
				"postcode" => "2827",
				"suburb" => "CURBAN",
				"state" => "NSW",
				"lat" => "-31.512136",
				"lon" => "148.612071"
			],
			[
				"postcode" => "2827",
				"suburb" => "GILGANDRA",
				"state" => "NSW",
				"lat" => "-31.711715",
				"lon" => "148.663131"
			],
			[
				"postcode" => "2827",
				"suburb" => "MERRIGAL",
				"state" => "NSW",
				"lat" => "-31.548435",
				"lon" => "148.23572"
			],
			[
				"postcode" => "2828",
				"suburb" => "BLACK HOLLOW",
				"state" => "NSW",
				"lat" => "-31.107835",
				"lon" => "148.862661"
			],
			[
				"postcode" => "2828",
				"suburb" => "BOURBAH",
				"state" => "NSW",
				"lat" => "-31.285984",
				"lon" => "148.26613"
			],
			[
				"postcode" => "2828",
				"suburb" => "GULARGAMBONE",
				"state" => "NSW",
				"lat" => "-31.329692",
				"lon" => "148.471189"
			],
			[
				"postcode" => "2828",
				"suburb" => "MOUNT TENANDRA",
				"state" => "NSW",
				"lat" => "-31.209036",
				"lon" => "148.753764"
			],
			[
				"postcode" => "2828",
				"suburb" => "QUANDA",
				"state" => "NSW",
				"lat" => "-31.121736",
				"lon" => "148.674665"
			],
			[
				"postcode" => "2828",
				"suburb" => "TONDERBURINE",
				"state" => "NSW",
				"lat" => "-31.337795",
				"lon" => "148.732746"
			],
			[
				"postcode" => "2828",
				"suburb" => "WARRUMBUNGLE",
				"state" => "NSW",
				"lat" => "-31.277554",
				"lon" => "148.982041"
			],
			[
				"postcode" => "2829",
				"suburb" => "COMBARA",
				"state" => "NSW",
				"lat" => "-31.124693",
				"lon" => "148.37341"
			],
			[
				"postcode" => "2829",
				"suburb" => "CONIMBIA",
				"state" => "NSW",
				"lat" => "-30.684075",
				"lon" => "148.002403"
			],
			[
				"postcode" => "2829",
				"suburb" => "COONAMBLE",
				"state" => "NSW",
				"lat" => "-30.954311",
				"lon" => "148.388448"
			],
			[
				"postcode" => "2829",
				"suburb" => "GILGOOMA",
				"state" => "NSW",
				"lat" => "-30.760088",
				"lon" => "148.534645"
			],
			[
				"postcode" => "2829",
				"suburb" => "MAGOMETON",
				"state" => "NSW",
				"lat" => "-31.034537",
				"lon" => "148.606765"
			],
			[
				"postcode" => "2829",
				"suburb" => "NEBEA",
				"state" => "NSW",
				"lat" => "-30.898081",
				"lon" => "148.555961"
			],
			[
				"postcode" => "2829",
				"suburb" => "PINE GROVE",
				"state" => "NSW",
				"lat" => "-30.90021",
				"lon" => "148.684965"
			],
			[
				"postcode" => "2829",
				"suburb" => "TERIDGERIE",
				"state" => "NSW",
				"lat" => "-30.884455",
				"lon" => "148.845525"
			],
			[
				"postcode" => "2829",
				"suburb" => "URAWILKIE",
				"state" => "NSW",
				"lat" => "-30.790618",
				"lon" => "148.699185"
			],
			[
				"postcode" => "2829",
				"suburb" => "WINGADEE",
				"state" => "NSW",
				"lat" => "-30.584524",
				"lon" => "148.308474"
			],
			[
				"postcode" => "2830",
				"suburb" => "BALLIMORE",
				"state" => "NSW",
				"lat" => "-32.195726",
				"lon" => "148.902065"
			],
			[
				"postcode" => "2830",
				"suburb" => "BARBIGAL",
				"state" => "NSW",
				"lat" => "-32.217776",
				"lon" => "148.827352"
			],
			[
				"postcode" => "2830",
				"suburb" => "BELGRAVIA",
				"state" => "NSW",
				"lat" => "-32.340137",
				"lon" => "148.58218"
			],
			[
				"postcode" => "2830",
				"suburb" => "BENI",
				"state" => "NSW",
				"lat" => "-32.194638",
				"lon" => "148.740477"
			],
			[
				"postcode" => "2830",
				"suburb" => "BENOLONG",
				"state" => "NSW",
				"lat" => "-32.413736",
				"lon" => "148.63938"
			],
			[
				"postcode" => "2830",
				"suburb" => "BOOTHENBA",
				"state" => "NSW",
				"lat" => "-32.195636",
				"lon" => "148.689577"
			],
			[
				"postcode" => "2830",
				"suburb" => "BROCKLEHURST",
				"state" => "NSW",
				"lat" => "-32.150735",
				"lon" => "148.688877"
			],
			[
				"postcode" => "2830",
				"suburb" => "BRUAH",
				"state" => "NSW",
				"lat" => "-32.130935",
				"lon" => "148.736775"
			],
			[
				"postcode" => "2830",
				"suburb" => "BUNGLEGUMBIE",
				"state" => "NSW",
				"lat" => "-32.193536",
				"lon" => "148.574679"
			],
			[
				"postcode" => "2830",
				"suburb" => "BURRABADINE",
				"state" => "NSW",
				"lat" => "-32.237737",
				"lon" => "148.51668"
			],
			[
				"postcode" => "2830",
				"suburb" => "BUTLERS FALLS",
				"state" => "NSW",
				"lat" => "-32.310736",
				"lon" => "148.625579"
			],
			[
				"postcode" => "2830",
				"suburb" => "COOLBAGGIE",
				"state" => "NSW",
				"lat" => "-32.029037",
				"lon" => "148.513178"
			],
			[
				"postcode" => "2830",
				"suburb" => "CUMBOOGLE",
				"state" => "NSW",
				"lat" => "-32.325237",
				"lon" => "148.59388"
			],
			[
				"postcode" => "2830",
				"suburb" => "DELROY GARDENS",
				"state" => "NSW",
				"lat" => "-32.252537",
				"lon" => "148.55038"
			],
			[
				"postcode" => "2830",
				"suburb" => "DICKYGUNDI",
				"state" => "NSW",
				"lat" => "-32.193003",
				"lon" => "148.456877"
			],
			[
				"postcode" => "2830",
				"suburb" => "DUBBO",
				"state" => "NSW",
				"lat" => "-32.245192",
				"lon" => "148.604212"
			],
			[
				"postcode" => "2830",
				"suburb" => "DUBBO EAST",
				"state" => "NSW",
				"lat" => "-32.242225",
				"lon" => "148.628668"
			],
			[
				"postcode" => "2830",
				"suburb" => "DUBBO GROVE",
				"state" => "NSW",
				"lat" => "-32.268021",
				"lon" => "148.609834"
			],
			[
				"postcode" => "2830",
				"suburb" => "DUBBO WEST",
				"state" => "NSW",
				"lat" => "-32.247975",
				"lon" => "148.593099"
			],
			[
				"postcode" => "2830",
				"suburb" => "DUNGARY",
				"state" => "NSW",
				"lat" => "-32.351599",
				"lon" => "148.479629"
			],
			[
				"postcode" => "2830",
				"suburb" => "ERSKINE",
				"state" => "NSW",
				"lat" => "-32.158033",
				"lon" => "148.851873"
			],
			[
				"postcode" => "2830",
				"suburb" => "ESCHOL",
				"state" => "NSW",
				"lat" => "-32.327836",
				"lon" => "148.64488"
			],
			[
				"postcode" => "2830",
				"suburb" => "EULOMOGO",
				"state" => "NSW",
				"lat" => "-32.277813",
				"lon" => "148.670297"
			],
			[
				"postcode" => "2830",
				"suburb" => "HYANDRA",
				"state" => "NSW",
				"lat" => "-32.346937",
				"lon" => "148.520882"
			],
			[
				"postcode" => "2830",
				"suburb" => "KICKABIL",
				"state" => "NSW",
				"lat" => "-31.900235",
				"lon" => "148.424281"
			],
			[
				"postcode" => "2830",
				"suburb" => "MANERA HEIGHTS",
				"state" => "NSW",
				"lat" => "-32.239336",
				"lon" => "148.627018"
			],
			[
				"postcode" => "2830",
				"suburb" => "MINORE",
				"state" => "NSW",
				"lat" => "-32.259512",
				"lon" => "148.455401"
			],
			[
				"postcode" => "2830",
				"suburb" => "MOGRIGUY",
				"state" => "NSW",
				"lat" => "-32.06639",
				"lon" => "148.660576"
			],
			[
				"postcode" => "2830",
				"suburb" => "MURRUMBIDGERIE",
				"state" => "NSW",
				"lat" => "-32.400036",
				"lon" => "148.718178"
			],
			[
				"postcode" => "2830",
				"suburb" => "NORTH DUBBO",
				"state" => "NSW",
				"lat" => "-32.23802",
				"lon" => "148.61054"
			],
			[
				"postcode" => "2830",
				"suburb" => "ORANA HEIGHTS",
				"state" => "NSW",
				"lat" => "-32.25128",
				"lon" => "148.627076"
			],
			[
				"postcode" => "2830",
				"suburb" => "RAWSONVILLE",
				"state" => "NSW",
				"lat" => "-32.167606",
				"lon" => "148.451172"
			],
			[
				"postcode" => "2830",
				"suburb" => "SOUTH DUBBO",
				"state" => "NSW",
				"lat" => "-32.258397",
				"lon" => "148.597254"
			],
			[
				"postcode" => "2830",
				"suburb" => "TALBRAGAR",
				"state" => "NSW",
				"lat" => "-32.195236",
				"lon" => "148.627178"
			],
			[
				"postcode" => "2830",
				"suburb" => "TERRAMUNGAMINE",
				"state" => "NSW",
				"lat" => "-32.153936",
				"lon" => "148.573778"
			],
			[
				"postcode" => "2830",
				"suburb" => "THE SPRINGS",
				"state" => "NSW",
				"lat" => "-32.543347",
				"lon" => "148.598091"
			],
			[
				"postcode" => "2830",
				"suburb" => "TOONGI",
				"state" => "NSW",
				"lat" => "-32.441636",
				"lon" => "148.592881"
			],
			[
				"postcode" => "2830",
				"suburb" => "TROY JUNCTION",
				"state" => "NSW",
				"lat" => "-32.212246",
				"lon" => "148.61817"
			],
			[
				"postcode" => "2830",
				"suburb" => "WARRIE",
				"state" => "NSW",
				"lat" => "-32.362036",
				"lon" => "148.647379"
			],
			[
				"postcode" => "2830",
				"suburb" => "WEST DUBBO",
				"state" => "NSW",
				"lat" => "-32.247975",
				"lon" => "148.593099"
			],
			[
				"postcode" => "2830",
				"suburb" => "WHYLANDRA CROSSING",
				"state" => "NSW",
				"lat" => "-32.19394",
				"lon" => "148.496756"
			],
			[
				"postcode" => "2831",
				"suburb" => "ARMATREE",
				"state" => "NSW",
				"lat" => "-31.453726",
				"lon" => "148.407695"
			],
			[
				"postcode" => "2831",
				"suburb" => "BALLADORAN",
				"state" => "NSW",
				"lat" => "-31.852136",
				"lon" => "148.626475"
			],
			[
				"postcode" => "2831",
				"suburb" => "BILLEROY",
				"state" => "NSW",
				"lat" => "-33.752204",
				"lon" => "150.967368"
			],
			[
				"postcode" => "2831",
				"suburb" => "BRENDA",
				"state" => "NSW",
				"lat" => "-29.099918",
				"lon" => "147.212959"
			],
			[
				"postcode" => "2831",
				"suburb" => "BULLAGREEN",
				"state" => "NSW",
				"lat" => "-31.421334",
				"lon" => "148.080506"
			],
			[
				"postcode" => "2831",
				"suburb" => "BYROCK",
				"state" => "NSW",
				"lat" => "-30.66186",
				"lon" => "146.40397"
			],
			[
				"postcode" => "2831",
				"suburb" => "CARINDA",
				"state" => "NSW",
				"lat" => "-30.461198",
				"lon" => "147.691173"
			],
			[
				"postcode" => "2831",
				"suburb" => "COOLABAH",
				"state" => "NSW",
				"lat" => "-31.027986",
				"lon" => "146.714264"
			],
			[
				"postcode" => "2831",
				"suburb" => "ELONG ELONG",
				"state" => "NSW",
				"lat" => "-32.116012",
				"lon" => "149.026202"
			],
			[
				"postcode" => "2831",
				"suburb" => "EUMUNGERIE",
				"state" => "NSW",
				"lat" => "-31.951112",
				"lon" => "148.626363"
			],
			[
				"postcode" => "2831",
				"suburb" => "GEURIE",
				"state" => "NSW",
				"lat" => "-32.399032",
				"lon" => "148.828532"
			],
			[
				"postcode" => "2831",
				"suburb" => "GIRILAMBONE",
				"state" => "NSW",
				"lat" => "-31.248445",
				"lon" => "146.904869"
			],
			[
				"postcode" => "2831",
				"suburb" => "GOODOOGA",
				"state" => "NSW",
				"lat" => "-29.113037",
				"lon" => "147.452139"
			],
			[
				"postcode" => "2831",
				"suburb" => "GUNGALMAN",
				"state" => "NSW",
				"lat" => "-30.519341",
				"lon" => "147.937893"
			],
			[
				"postcode" => "2831",
				"suburb" => "HERMIDALE",
				"state" => "NSW",
				"lat" => "-31.638848",
				"lon" => "146.689584"
			],
			[
				"postcode" => "2831",
				"suburb" => "MACQUARIE MARSHES",
				"state" => "NSW",
				"lat" => "-30.596748",
				"lon" => "147.693508"
			],
			[
				"postcode" => "2831",
				"suburb" => "MERRYGOEN",
				"state" => "NSW",
				"lat" => "-31.824229",
				"lon" => "149.230644"
			],
			[
				"postcode" => "2831",
				"suburb" => "MURIEL",
				"state" => "NSW",
				"lat" => "-31.553443",
				"lon" => "146.476642"
			],
			[
				"postcode" => "2831",
				"suburb" => "NEILREX",
				"state" => "NSW",
				"lat" => "-31.720632",
				"lon" => "149.307062"
			],
			[
				"postcode" => "2831",
				"suburb" => "NEVERTIRE",
				"state" => "NSW",
				"lat" => "-31.838854",
				"lon" => "147.718723"
			],
			[
				"postcode" => "2831",
				"suburb" => "NUBINGERIE",
				"state" => "NSW",
				"lat" => "-32.507871",
				"lon" => "148.673914"
			],
			[
				"postcode" => "2831",
				"suburb" => "NYMAGEE",
				"state" => "NSW",
				"lat" => "-32.163806",
				"lon" => "146.29953"
			],
			[
				"postcode" => "2831",
				"suburb" => "PINE CLUMP",
				"state" => "NSW",
				"lat" => "-31.408026",
				"lon" => "148.214197"
			],
			[
				"postcode" => "2831",
				"suburb" => "PONTO",
				"state" => "NSW",
				"lat" => "-32.446636",
				"lon" => "148.797077"
			],
			[
				"postcode" => "2831",
				"suburb" => "QUAMBONE",
				"state" => "NSW",
				"lat" => "-30.929382",
				"lon" => "147.869963"
			],
			[
				"postcode" => "2831",
				"suburb" => "TERRABELLA",
				"state" => "NSW",
				"lat" => "-32.432936",
				"lon" => "148.737378"
			],
			[
				"postcode" => "2831",
				"suburb" => "THE MARRA",
				"state" => "NSW",
				"lat" => "-30.879083",
				"lon" => "147.366759"
			],
			[
				"postcode" => "2831",
				"suburb" => "TOOLOON",
				"state" => "NSW",
				"lat" => "-31.089857",
				"lon" => "148.040826"
			],
			[
				"postcode" => "2831",
				"suburb" => "TOORAWEENAH",
				"state" => "NSW",
				"lat" => "-31.439404",
				"lon" => "148.910428"
			],
			[
				"postcode" => "2831",
				"suburb" => "WESTELLA",
				"state" => "NSW",
				"lat" => "-32.294635",
				"lon" => "148.829275"
			],
			[
				"postcode" => "2831",
				"suburb" => "WONGARBON",
				"state" => "NSW",
				"lat" => "-32.334144",
				"lon" => "148.756921"
			],
			[
				"postcode" => "2832",
				"suburb" => "ANGLEDOOL",
				"state" => "NSW",
				"lat" => "-29.113122",
				"lon" => "147.902562"
			],
			[
				"postcode" => "2832",
				"suburb" => "BOOROOMA",
				"state" => "NSW",
				"lat" => "-30.103871",
				"lon" => "147.465609"
			],
			[
				"postcode" => "2832",
				"suburb" => "COME BY CHANCE",
				"state" => "NSW",
				"lat" => "-30.361591",
				"lon" => "148.467361"
			],
			[
				"postcode" => "2832",
				"suburb" => "CRYON",
				"state" => "NSW",
				"lat" => "-30.127724",
				"lon" => "148.61168"
			],
			[
				"postcode" => "2832",
				"suburb" => "CUMBORAH",
				"state" => "NSW",
				"lat" => "-29.742525",
				"lon" => "147.767956"
			],
			[
				"postcode" => "2832",
				"suburb" => "WALGETT",
				"state" => "NSW",
				"lat" => "-30.021558",
				"lon" => "148.116684"
			],
			[
				"postcode" => "2833",
				"suburb" => "COLLARENEBRI",
				"state" => "NSW",
				"lat" => "-29.54581",
				"lon" => "148.576548"
			],
			[
				"postcode" => "2834",
				"suburb" => "LIGHTNING RIDGE",
				"state" => "NSW",
				"lat" => "-29.425724",
				"lon" => "147.979236"
			],
			[
				"postcode" => "2835",
				"suburb" => "BULLA",
				"state" => "NSW",
				"lat" => "-32.032911",
				"lon" => "144.440184"
			],
			[
				"postcode" => "2835",
				"suburb" => "CANBELEGO",
				"state" => "NSW",
				"lat" => "-31.456755",
				"lon" => "146.282759"
			],
			[
				"postcode" => "2835",
				"suburb" => "COBAR",
				"state" => "NSW",
				"lat" => "-31.498218",
				"lon" => "145.840727"
			],
			[
				"postcode" => "2835",
				"suburb" => "CUBBA",
				"state" => "NSW",
				"lat" => "-31.441759",
				"lon" => "145.347238"
			],
			[
				"postcode" => "2835",
				"suburb" => "GILGUNNIA",
				"state" => "NSW",
				"lat" => "-32.416874",
				"lon" => "146.033997"
			],
			[
				"postcode" => "2835",
				"suburb" => "IRYMPLE",
				"state" => "NSW",
				"lat" => "-32.571209",
				"lon" => "145.553486"
			],
			[
				"postcode" => "2835",
				"suburb" => "KERRIGUNDI",
				"state" => "NSW",
				"lat" => "-30.98702",
				"lon" => "145.257578"
			],
			[
				"postcode" => "2835",
				"suburb" => "KULWIN",
				"state" => "NSW",
				"lat" => "-31.997738",
				"lon" => "144.597194"
			],
			[
				"postcode" => "2835",
				"suburb" => "LERIDA",
				"state" => "NSW",
				"lat" => "-31.818753",
				"lon" => "145.716439"
			],
			[
				"postcode" => "2835",
				"suburb" => "NOONA",
				"state" => "NSW",
				"lat" => "-31.522667",
				"lon" => "144.534569"
			],
			[
				"postcode" => "2835",
				"suburb" => "SANDY CREEK",
				"state" => "NSW",
				"lat" => "-31.788971",
				"lon" => "145.337298"
			],
			[
				"postcode" => "2835",
				"suburb" => "TINDAREY",
				"state" => "NSW",
				"lat" => "-31.00911",
				"lon" => "145.925341"
			],
			[
				"postcode" => "2836",
				"suburb" => "GEMVILLE",
				"state" => "NSW",
				"lat" => "-30.808105",
				"lon" => "142.879729"
			],
			[
				"postcode" => "2836",
				"suburb" => "WHITE CLIFFS",
				"state" => "NSW",
				"lat" => "-30.850444",
				"lon" => "143.083844"
			],
			[
				"postcode" => "2836",
				"suburb" => "WILCANNIA",
				"state" => "NSW",
				"lat" => "-31.558559",
				"lon" => "143.377976"
			],
			[
				"postcode" => "2839",
				"suburb" => "BOGAN",
				"state" => "NSW",
				"lat" => "-30.198141",
				"lon" => "146.5382"
			],
			[
				"postcode" => "2839",
				"suburb" => "BREWARRINA",
				"state" => "NSW",
				"lat" => "-29.961519",
				"lon" => "146.858999"
			],
			[
				"postcode" => "2839",
				"suburb" => "GONGOLGON",
				"state" => "NSW",
				"lat" => "-30.480989",
				"lon" => "146.708252"
			],
			[
				"postcode" => "2839",
				"suburb" => "TALAWANTA",
				"state" => "NSW",
				"lat" => "-29.519999",
				"lon" => "146.950229"
			],
			[
				"postcode" => "2839",
				"suburb" => "WEILMORINGLE",
				"state" => "NSW",
				"lat" => "-29.218812",
				"lon" => "146.867097"
			],
			[
				"postcode" => "2840",
				"suburb" => "BARRINGUN",
				"state" => "NSW",
				"lat" => "-29.18925",
				"lon" => "145.88159"
			],
			[
				"postcode" => "2840",
				"suburb" => "BOURKE",
				"state" => "NSW",
				"lat" => "-30.088847",
				"lon" => "145.937742"
			],
			[
				"postcode" => "2840",
				"suburb" => "ENNGONIA",
				"state" => "NSW",
				"lat" => "-29.318123",
				"lon" => "145.84617"
			],
			[
				"postcode" => "2840",
				"suburb" => "FORDS BRIDGE",
				"state" => "NSW",
				"lat" => "-29.752523",
				"lon" => "145.424979"
			],
			[
				"postcode" => "2840",
				"suburb" => "GUMBALIE",
				"state" => "NSW",
				"lat" => "-29.9812",
				"lon" => "145.398014"
			],
			[
				"postcode" => "2840",
				"suburb" => "GUNDERBOOKA",
				"state" => "NSW",
				"lat" => "-30.639875",
				"lon" => "145.543282"
			],
			[
				"postcode" => "2840",
				"suburb" => "HUNGERFORD",
				"state" => "NSW",
				"lat" => "-29.004927",
				"lon" => "144.409768"
			],
			[
				"postcode" => "2840",
				"suburb" => "LOUTH",
				"state" => "NSW",
				"lat" => "-30.533836",
				"lon" => "145.115335"
			],
			[
				"postcode" => "2840",
				"suburb" => "TILPA",
				"state" => "NSW",
				"lat" => "-30.940579",
				"lon" => "144.421865"
			],
			[
				"postcode" => "2840",
				"suburb" => "URISINO",
				"state" => "NSW",
				"lat" => "-29.70804",
				"lon" => "143.730397"
			],
			[
				"postcode" => "2840",
				"suburb" => "WANAARING",
				"state" => "NSW",
				"lat" => "-29.706274",
				"lon" => "144.147343"
			],
			[
				"postcode" => "2840",
				"suburb" => "YANTABULLA",
				"state" => "NSW",
				"lat" => "-29.338394",
				"lon" => "145.002751"
			],
			[
				"postcode" => "2842",
				"suburb" => "MENDOORAN",
				"state" => "NSW",
				"lat" => "-31.822488",
				"lon" => "149.118008"
			],
			[
				"postcode" => "2842",
				"suburb" => "MOLLYAN",
				"state" => "NSW",
				"lat" => "-31.595632",
				"lon" => "149.221061"
			],
			[
				"postcode" => "2842",
				"suburb" => "WATTLE SPRINGS",
				"state" => "NSW",
				"lat" => "-31.452532",
				"lon" => "149.277759"
			],
			[
				"postcode" => "2842",
				"suburb" => "YARRAGRIN",
				"state" => "NSW",
				"lat" => "-31.694633",
				"lon" => "149.088165"
			],
			[
				"postcode" => "2843",
				"suburb" => "COOLAH",
				"state" => "NSW",
				"lat" => "-31.774418",
				"lon" => "149.611621"
			],
			[
				"postcode" => "2844",
				"suburb" => "BIRRIWA",
				"state" => "NSW",
				"lat" => "-32.122232",
				"lon" => "149.465064"
			],
			[
				"postcode" => "2844",
				"suburb" => "DUNEDOO",
				"state" => "NSW",
				"lat" => "-32.016184",
				"lon" => "149.395838"
			],
			[
				"postcode" => "2844",
				"suburb" => "LEADVILLE",
				"state" => "NSW",
				"lat" => "-32.017507",
				"lon" => "149.544871"
			],
			[
				"postcode" => "2845",
				"suburb" => "WALLERAWANG",
				"state" => "NSW",
				"lat" => "-33.410618",
				"lon" => "150.062597"
			],
			[
				"postcode" => "2846",
				"suburb" => "CAPERTEE",
				"state" => "NSW",
				"lat" => "-33.148969",
				"lon" => "149.99001"
			],
			[
				"postcode" => "2846",
				"suburb" => "GLEN DAVIS",
				"state" => "NSW",
				"lat" => "-33.134333",
				"lon" => "150.147648"
			],
			[
				"postcode" => "2846",
				"suburb" => "KANGAROO FLAT",
				"state" => "NSW",
				"lat" => "-31.129349",
				"lon" => "152.132742"
			],
			[
				"postcode" => "2846",
				"suburb" => "ROUND SWAMP",
				"state" => "NSW",
				"lat" => "-33.078278",
				"lon" => "149.938657"
			],
			[
				"postcode" => "2847",
				"suburb" => "PORTLAND",
				"state" => "NSW",
				"lat" => "-33.353124",
				"lon" => "149.98227"
			],
			[
				"postcode" => "2848",
				"suburb" => "BROGANS CREEK",
				"state" => "NSW",
				"lat" => "-32.971718",
				"lon" => "149.959593"
			],
			[
				"postcode" => "2848",
				"suburb" => "CHARBON",
				"state" => "NSW",
				"lat" => "-32.881265",
				"lon" => "149.965119"
			],
			[
				"postcode" => "2848",
				"suburb" => "CLANDULLA",
				"state" => "NSW",
				"lat" => "-32.906521",
				"lon" => "149.950771"
			],
			[
				"postcode" => "2848",
				"suburb" => "KANDOS",
				"state" => "NSW",
				"lat" => "-32.857495",
				"lon" => "149.96946"
			],
			[
				"postcode" => "2849",
				"suburb" => "BOGEE",
				"state" => "NSW",
				"lat" => "-32.975826",
				"lon" => "150.104239"
			],
			[
				"postcode" => "2849",
				"suburb" => "BREAKFAST CREEK",
				"state" => "NSW",
				"lat" => "-32.676966",
				"lon" => "150.012848"
			],
			[
				"postcode" => "2849",
				"suburb" => "BUDDEN",
				"state" => "NSW",
				"lat" => "-32.502023",
				"lon" => "150.081841"
			],
			[
				"postcode" => "2849",
				"suburb" => "BYLONG",
				"state" => "NSW",
				"lat" => "-32.417309",
				"lon" => "150.114058"
			],
			[
				"postcode" => "2849",
				"suburb" => "CAMBOON",
				"state" => "NSW",
				"lat" => "-32.70845",
				"lon" => "149.959934"
			],
			[
				"postcode" => "2849",
				"suburb" => "CARWELL",
				"state" => "NSW",
				"lat" => "-32.840409",
				"lon" => "149.906368"
			],
			[
				"postcode" => "2849",
				"suburb" => "COGGAN",
				"state" => "NSW",
				"lat" => "-32.349639",
				"lon" => "150.09037"
			],
			[
				"postcode" => "2849",
				"suburb" => "COXS CREEK",
				"state" => "NSW",
				"lat" => "-32.735933",
				"lon" => "150.1385"
			],
			[
				"postcode" => "2849",
				"suburb" => "COXS CROWN",
				"state" => "NSW",
				"lat" => "-32.750604",
				"lon" => "150.046932"
			],
			[
				"postcode" => "2849",
				"suburb" => "DABEE",
				"state" => "NSW",
				"lat" => "-32.824533",
				"lon" => "150.03869"
			],
			[
				"postcode" => "2849",
				"suburb" => "DUNGEREE",
				"state" => "NSW",
				"lat" => "-32.751226",
				"lon" => "149.867728"
			],
			[
				"postcode" => "2849",
				"suburb" => "DUNVILLE LOOP",
				"state" => "NSW",
				"lat" => "-32.90458",
				"lon" => "150.136232"
			],
			[
				"postcode" => "2849",
				"suburb" => "GINGHI",
				"state" => "NSW",
				"lat" => "-32.584119",
				"lon" => "150.088533"
			],
			[
				"postcode" => "2849",
				"suburb" => "GLEN ALICE",
				"state" => "NSW",
				"lat" => "-33.043925",
				"lon" => "150.216201"
			],
			[
				"postcode" => "2849",
				"suburb" => "GROWEE",
				"state" => "NSW",
				"lat" => "-32.620543",
				"lon" => "150.068963"
			],
			[
				"postcode" => "2849",
				"suburb" => "KELGOOLA",
				"state" => "NSW",
				"lat" => "-32.871618",
				"lon" => "150.280871"
			],
			[
				"postcode" => "2849",
				"suburb" => "LEE CREEK",
				"state" => "NSW",
				"lat" => "-32.535051",
				"lon" => "150.119193"
			],
			[
				"postcode" => "2849",
				"suburb" => "MOUNT MARSDEN",
				"state" => "NSW",
				"lat" => "-32.93869",
				"lon" => "150.047574"
			],
			[
				"postcode" => "2849",
				"suburb" => "MURRUMBO",
				"state" => "NSW",
				"lat" => "-32.40333",
				"lon" => "150.230338"
			],
			[
				"postcode" => "2849",
				"suburb" => "NULLO MOUNTAIN",
				"state" => "NSW",
				"lat" => "-32.729269",
				"lon" => "150.234097"
			],
			[
				"postcode" => "2849",
				"suburb" => "OLINDA",
				"state" => "NSW",
				"lat" => "-32.796019",
				"lon" => "150.167675"
			],
			[
				"postcode" => "2849",
				"suburb" => "PINNACLE SWAMP",
				"state" => "NSW",
				"lat" => "-32.771363",
				"lon" => "149.925929"
			],
			[
				"postcode" => "2849",
				"suburb" => "PYANGLE",
				"state" => "NSW",
				"lat" => "-32.620816",
				"lon" => "149.932721"
			],
			[
				"postcode" => "2849",
				"suburb" => "REEDY CREEK",
				"state" => "NSW",
				"lat" => "-32.729382",
				"lon" => "149.993111"
			],
			[
				"postcode" => "2849",
				"suburb" => "RYLSTONE",
				"state" => "NSW",
				"lat" => "-32.799369",
				"lon" => "149.970442"
			],
			[
				"postcode" => "2849",
				"suburb" => "UPPER BYLONG",
				"state" => "NSW",
				"lat" => "-32.474175",
				"lon" => "150.13369"
			],
			[
				"postcode" => "2849",
				"suburb" => "UPPER GROWEE",
				"state" => "NSW",
				"lat" => "-32.648795",
				"lon" => "150.023565"
			],
			[
				"postcode" => "2849",
				"suburb" => "UPPER NILE",
				"state" => "NSW",
				"lat" => "-33.008125",
				"lon" => "150.250221"
			],
			[
				"postcode" => "2849",
				"suburb" => "WIRRABA",
				"state" => "NSW",
				"lat" => "-33.12108",
				"lon" => "150.512544"
			],
			[
				"postcode" => "2850",
				"suburb" => "AARONS PASS",
				"state" => "NSW",
				"lat" => "-32.863277",
				"lon" => "149.803751"
			],
			[
				"postcode" => "2850",
				"suburb" => "APPLE TREE FLAT",
				"state" => "NSW",
				"lat" => "-32.685217",
				"lon" => "149.705047"
			],
			[
				"postcode" => "2850",
				"suburb" => "AVISFORD",
				"state" => "NSW",
				"lat" => "-32.745583",
				"lon" => "149.480112"
			],
			[
				"postcode" => "2850",
				"suburb" => "BARA",
				"state" => "NSW",
				"lat" => "-32.571389",
				"lon" => "149.843164"
			],
			[
				"postcode" => "2850",
				"suburb" => "BARIGAN",
				"state" => "NSW",
				"lat" => "-32.443069",
				"lon" => "149.979665"
			],
			[
				"postcode" => "2850",
				"suburb" => "BEN BUCKLEY",
				"state" => "NSW",
				"lat" => "-32.492949",
				"lon" => "149.297871"
			],
			[
				"postcode" => "2850",
				"suburb" => "BOCOBLE",
				"state" => "NSW",
				"lat" => "-32.798969",
				"lon" => "149.724411"
			],
			[
				"postcode" => "2850",
				"suburb" => "BOMBIRA",
				"state" => "NSW",
				"lat" => "-32.563794",
				"lon" => "149.599775"
			],
			[
				"postcode" => "2850",
				"suburb" => "BOTOBOLAR",
				"state" => "NSW",
				"lat" => "-32.512931",
				"lon" => "149.797549"
			],
			[
				"postcode" => "2850",
				"suburb" => "BUCKAROO",
				"state" => "NSW",
				"lat" => "-32.559654",
				"lon" => "149.63106"
			],
			[
				"postcode" => "2850",
				"suburb" => "BUDGEE BUDGEE",
				"state" => "NSW",
				"lat" => "-32.543565",
				"lon" => "149.676562"
			],
			[
				"postcode" => "2850",
				"suburb" => "BURRUNDULLA",
				"state" => "NSW",
				"lat" => "-32.623433",
				"lon" => "149.639181"
			],
			[
				"postcode" => "2850",
				"suburb" => "CAERLEON",
				"state" => "NSW",
				"lat" => "-32.569912",
				"lon" => "149.549841"
			],
			[
				"postcode" => "2850",
				"suburb" => "CANADIAN LEAD",
				"state" => "NSW",
				"lat" => "-32.410681",
				"lon" => "149.581564"
			],
			[
				"postcode" => "2850",
				"suburb" => "CARCALGONG",
				"state" => "NSW",
				"lat" => "-32.85342",
				"lon" => "149.6972"
			],
			[
				"postcode" => "2850",
				"suburb" => "COLLINGWOOD",
				"state" => "NSW",
				"lat" => "-32.604231",
				"lon" => "149.446459"
			],
			[
				"postcode" => "2850",
				"suburb" => "COOKS GAP",
				"state" => "NSW",
				"lat" => "-32.378224",
				"lon" => "149.717505"
			],
			[
				"postcode" => "2850",
				"suburb" => "COOYAL",
				"state" => "NSW",
				"lat" => "-32.450436",
				"lon" => "149.757343"
			],
			[
				"postcode" => "2850",
				"suburb" => "CROSS ROADS",
				"state" => "NSW",
				"lat" => "-32.506399",
				"lon" => "149.70536"
			],
			[
				"postcode" => "2850",
				"suburb" => "CUDGEGONG",
				"state" => "NSW",
				"lat" => "-32.808314",
				"lon" => "149.809365"
			],
			[
				"postcode" => "2850",
				"suburb" => "CULLENBONE",
				"state" => "NSW",
				"lat" => "-32.488762",
				"lon" => "149.510225"
			],
			[
				"postcode" => "2850",
				"suburb" => "CUMBO",
				"state" => "NSW",
				"lat" => "-32.388571",
				"lon" => "149.877718"
			],
			[
				"postcode" => "2850",
				"suburb" => "ERUDGERE",
				"state" => "NSW",
				"lat" => "-32.553682",
				"lon" => "149.493111"
			],
			[
				"postcode" => "2850",
				"suburb" => "EURUNDEREE",
				"state" => "NSW",
				"lat" => "-32.52605",
				"lon" => "149.608821"
			],
			[
				"postcode" => "2850",
				"suburb" => "FROG ROCK",
				"state" => "NSW",
				"lat" => "-32.476946",
				"lon" => "149.686857"
			],
			[
				"postcode" => "2850",
				"suburb" => "GALAMBINE",
				"state" => "NSW",
				"lat" => "-32.479768",
				"lon" => "149.506881"
			],
			[
				"postcode" => "2850",
				"suburb" => "GLEN AYR",
				"state" => "NSW",
				"lat" => "-32.603763",
				"lon" => "149.566335"
			],
			[
				"postcode" => "2850",
				"suburb" => "GRATTAI",
				"state" => "NSW",
				"lat" => "-32.654782",
				"lon" => "149.482995"
			],
			[
				"postcode" => "2850",
				"suburb" => "GREEN GULLY",
				"state" => "NSW",
				"lat" => "-32.78442",
				"lon" => "149.686239"
			],
			[
				"postcode" => "2850",
				"suburb" => "HARGRAVES",
				"state" => "NSW",
				"lat" => "-32.78886",
				"lon" => "149.465034"
			],
			[
				"postcode" => "2850",
				"suburb" => "HAVILAH",
				"state" => "NSW",
				"lat" => "-32.620676",
				"lon" => "149.764365"
			],
			[
				"postcode" => "2850",
				"suburb" => "HAYES GAP",
				"state" => "NSW",
				"lat" => "-32.581125",
				"lon" => "149.747489"
			],
			[
				"postcode" => "2850",
				"suburb" => "HILL END",
				"state" => "NSW",
				"lat" => "-33.031247",
				"lon" => "149.417014"
			],
			[
				"postcode" => "2850",
				"suburb" => "HOME RULE",
				"state" => "NSW",
				"lat" => "-32.41662",
				"lon" => "149.627493"
			],
			[
				"postcode" => "2850",
				"suburb" => "ILFORD",
				"state" => "NSW",
				"lat" => "-32.942209",
				"lon" => "149.859658"
			],
			[
				"postcode" => "2850",
				"suburb" => "KAINS FLAT",
				"state" => "NSW",
				"lat" => "-32.465595",
				"lon" => "149.836857"
			],
			[
				"postcode" => "2850",
				"suburb" => "LINBURN",
				"state" => "NSW",
				"lat" => "-32.43254",
				"lon" => "149.715338"
			],
			[
				"postcode" => "2850",
				"suburb" => "LUE",
				"state" => "NSW",
				"lat" => "-32.65414",
				"lon" => "149.842171"
			],
			[
				"postcode" => "2850",
				"suburb" => "MAITLAND BAR",
				"state" => "NSW",
				"lat" => "-32.745542",
				"lon" => "149.427201"
			],
			[
				"postcode" => "2850",
				"suburb" => "MENAH",
				"state" => "NSW",
				"lat" => "-32.548716",
				"lon" => "149.542687"
			],
			[
				"postcode" => "2850",
				"suburb" => "MEROO",
				"state" => "NSW",
				"lat" => "-32.764728",
				"lon" => "149.62479"
			],
			[
				"postcode" => "2850",
				"suburb" => "MILROY",
				"state" => "NSW",
				"lat" => "-32.588784",
				"lon" => "149.61667"
			],
			[
				"postcode" => "2850",
				"suburb" => "MOGO",
				"state" => "NSW",
				"lat" => "-32.265783",
				"lon" => "150.011498"
			],
			[
				"postcode" => "2850",
				"suburb" => "MONIVAE",
				"state" => "NSW",
				"lat" => "-32.678931",
				"lon" => "149.900209"
			],
			[
				"postcode" => "2850",
				"suburb" => "MOOLARBEN",
				"state" => "NSW",
				"lat" => "-32.351145",
				"lon" => "149.781639"
			],
			[
				"postcode" => "2850",
				"suburb" => "MOUNT FROME",
				"state" => "NSW",
				"lat" => "-32.605845",
				"lon" => "149.644578"
			],
			[
				"postcode" => "2850",
				"suburb" => "MOUNT KNOWLES",
				"state" => "NSW",
				"lat" => "-32.622653",
				"lon" => "149.706902"
			],
			[
				"postcode" => "2850",
				"suburb" => "MOUNT VINCENT",
				"state" => "NSW",
				"lat" => "-32.984059",
				"lon" => "149.904293"
			],
			[
				"postcode" => "2850",
				"suburb" => "MUDGEE",
				"state" => "NSW",
				"lat" => "-32.59072",
				"lon" => "149.586126"
			],
			[
				"postcode" => "2850",
				"suburb" => "MULLAMUDDY",
				"state" => "NSW",
				"lat" => "-32.657707",
				"lon" => "149.67374"
			],
			[
				"postcode" => "2850",
				"suburb" => "MUNGHORN",
				"state" => "NSW",
				"lat" => "-32.404419",
				"lon" => "149.836027"
			],
			[
				"postcode" => "2850",
				"suburb" => "PIAMBONG",
				"state" => "NSW",
				"lat" => "-32.520454",
				"lon" => "149.455131"
			],
			[
				"postcode" => "2850",
				"suburb" => "PUTTA BUCCA",
				"state" => "NSW",
				"lat" => "-32.570896",
				"lon" => "149.584181"
			],
			[
				"postcode" => "2850",
				"suburb" => "PYRAMUL",
				"state" => "NSW",
				"lat" => "-32.887171",
				"lon" => "149.618838"
			],
			[
				"postcode" => "2850",
				"suburb" => "QUEENS PINCH",
				"state" => "NSW",
				"lat" => "-32.729065",
				"lon" => "149.682426"
			],
			[
				"postcode" => "2850",
				"suburb" => "RAZORBACK",
				"state" => "NSW",
				"lat" => "-33.033803",
				"lon" => "149.81923"
			],
			[
				"postcode" => "2850",
				"suburb" => "RIVERLEA",
				"state" => "NSW",
				"lat" => "-32.691941",
				"lon" => "149.722168"
			],
			[
				"postcode" => "2850",
				"suburb" => "RUNNING STREAM",
				"state" => "NSW",
				"lat" => "-33.02011",
				"lon" => "149.911201"
			],
			[
				"postcode" => "2850",
				"suburb" => "SALLYS FLAT",
				"state" => "NSW",
				"lat" => "-33.001222",
				"lon" => "149.567131"
			],
			[
				"postcode" => "2850",
				"suburb" => "SPRING FLAT",
				"state" => "NSW",
				"lat" => "-32.638843",
				"lon" => "149.606908"
			],
			[
				"postcode" => "2850",
				"suburb" => "ST FILLANS",
				"state" => "NSW",
				"lat" => "-32.468156",
				"lon" => "149.632641"
			],
			[
				"postcode" => "2850",
				"suburb" => "STONY CREEK",
				"state" => "NSW",
				"lat" => "-32.474196",
				"lon" => "149.72319"
			],
			[
				"postcode" => "2850",
				"suburb" => "TAMBAROORA",
				"state" => "NSW",
				"lat" => "-33.001044",
				"lon" => "149.424332"
			],
			[
				"postcode" => "2850",
				"suburb" => "TICHULAR",
				"state" => "NSW",
				"lat" => "-32.441908",
				"lon" => "149.95393"
			],
			[
				"postcode" => "2850",
				"suburb" => "TOTNES VALLEY",
				"state" => "NSW",
				"lat" => "-32.482731",
				"lon" => "149.91647"
			],
			[
				"postcode" => "2850",
				"suburb" => "TRIAMBLE",
				"state" => "NSW",
				"lat" => "-32.897487",
				"lon" => "149.315864"
			],
			[
				"postcode" => "2850",
				"suburb" => "TURILL",
				"state" => "NSW",
				"lat" => "-32.156945",
				"lon" => "149.879274"
			],
			[
				"postcode" => "2850",
				"suburb" => "TWELVE MILE",
				"state" => "NSW",
				"lat" => "-32.493014",
				"lon" => "149.27045"
			],
			[
				"postcode" => "2850",
				"suburb" => "ULAN",
				"state" => "NSW",
				"lat" => "-32.282873",
				"lon" => "149.736439"
			],
			[
				"postcode" => "2850",
				"suburb" => "ULLAMALLA",
				"state" => "NSW",
				"lat" => "-32.988158",
				"lon" => "149.330478"
			],
			[
				"postcode" => "2850",
				"suburb" => "WILBETREE",
				"state" => "NSW",
				"lat" => "-32.479583",
				"lon" => "149.568046"
			],
			[
				"postcode" => "2850",
				"suburb" => "WILPINJONG",
				"state" => "NSW",
				"lat" => "-32.324393",
				"lon" => "149.870882"
			],
			[
				"postcode" => "2850",
				"suburb" => "WINDEYER",
				"state" => "NSW",
				"lat" => "-32.77632",
				"lon" => "149.5453"
			],
			[
				"postcode" => "2850",
				"suburb" => "WOLLAR",
				"state" => "NSW",
				"lat" => "-32.361338",
				"lon" => "149.94876"
			],
			[
				"postcode" => "2850",
				"suburb" => "WORLDS END",
				"state" => "NSW",
				"lat" => "-32.663892",
				"lon" => "149.39776"
			],
			[
				"postcode" => "2850",
				"suburb" => "YARRABIN",
				"state" => "NSW",
				"lat" => "-32.593854",
				"lon" => "149.315898"
			],
			[
				"postcode" => "2850",
				"suburb" => "YARRAWONGA",
				"state" => "NSW",
				"lat" => "-32.356621",
				"lon" => "149.65883"
			],
			[
				"postcode" => "2852",
				"suburb" => "BARNEYS REEF",
				"state" => "NSW",
				"lat" => "-32.185066",
				"lon" => "149.529756"
			],
			[
				"postcode" => "2852",
				"suburb" => "BERYL",
				"state" => "NSW",
				"lat" => "-32.351413",
				"lon" => "149.437976"
			],
			[
				"postcode" => "2852",
				"suburb" => "BIRAGANBIL",
				"state" => "NSW",
				"lat" => "-32.393249",
				"lon" => "149.40783"
			],
			[
				"postcode" => "2852",
				"suburb" => "BUNGABA",
				"state" => "NSW",
				"lat" => "-32.12915",
				"lon" => "149.660757"
			],
			[
				"postcode" => "2852",
				"suburb" => "COPE",
				"state" => "NSW",
				"lat" => "-32.303181",
				"lon" => "149.619773"
			],
			[
				"postcode" => "2852",
				"suburb" => "CUMBANDRY",
				"state" => "NSW",
				"lat" => "-32.380741",
				"lon" => "149.605898"
			],
			[
				"postcode" => "2852",
				"suburb" => "GOOLMA",
				"state" => "NSW",
				"lat" => "-32.346144",
				"lon" => "149.256869"
			],
			[
				"postcode" => "2852",
				"suburb" => "GULGONG",
				"state" => "NSW",
				"lat" => "-32.362587",
				"lon" => "149.533528"
			],
			[
				"postcode" => "2852",
				"suburb" => "MEBUL",
				"state" => "NSW",
				"lat" => "-32.352453",
				"lon" => "149.354117"
			],
			[
				"postcode" => "2852",
				"suburb" => "MEROTHERIE",
				"state" => "NSW",
				"lat" => "-32.11485",
				"lon" => "149.575007"
			],
			[
				"postcode" => "2852",
				"suburb" => "STUBBO",
				"state" => "NSW",
				"lat" => "-32.317461",
				"lon" => "149.585099"
			],
			[
				"postcode" => "2852",
				"suburb" => "TALLAWANG",
				"state" => "NSW",
				"lat" => "-32.211532",
				"lon" => "149.397065"
			],
			[
				"postcode" => "2864",
				"suburb" => "BOREE",
				"state" => "NSW",
				"lat" => "-33.232729",
				"lon" => "148.841207"
			],
			[
				"postcode" => "2864",
				"suburb" => "BOWAN PARK",
				"state" => "NSW",
				"lat" => "-33.323962",
				"lon" => "148.80572"
			],
			[
				"postcode" => "2864",
				"suburb" => "CUDAL",
				"state" => "NSW",
				"lat" => "-33.286704",
				"lon" => "148.738898"
			],
			[
				"postcode" => "2864",
				"suburb" => "MURGA",
				"state" => "NSW",
				"lat" => "-33.369988",
				"lon" => "148.545278"
			],
			[
				"postcode" => "2864",
				"suburb" => "TOOGONG",
				"state" => "NSW",
				"lat" => "-33.351419",
				"lon" => "148.624917"
			],
			[
				"postcode" => "2865",
				"suburb" => "BOCOBRA",
				"state" => "NSW",
				"lat" => "-33.100422",
				"lon" => "148.544553"
			],
			[
				"postcode" => "2865",
				"suburb" => "GREGRA",
				"state" => "NSW",
				"lat" => "-33.176844",
				"lon" => "148.761052"
			],
			[
				"postcode" => "2865",
				"suburb" => "GUMBLE",
				"state" => "NSW",
				"lat" => "-33.084541",
				"lon" => "148.651852"
			],
			[
				"postcode" => "2865",
				"suburb" => "MANILDRA",
				"state" => "NSW",
				"lat" => "-33.186578",
				"lon" => "148.696347"
			],
			[
				"postcode" => "2866",
				"suburb" => "AMAROO",
				"state" => "NSW",
				"lat" => "-33.184094",
				"lon" => "148.928934"
			],
			[
				"postcode" => "2866",
				"suburb" => "BOOMEY",
				"state" => "NSW",
				"lat" => "-33.000881",
				"lon" => "148.982331"
			],
			[
				"postcode" => "2866",
				"suburb" => "COPPER HILL",
				"state" => "NSW",
				"lat" => "-33.069517",
				"lon" => "148.90132"
			],
			[
				"postcode" => "2866",
				"suburb" => "CUNDUMBUL",
				"state" => "NSW",
				"lat" => "-32.836702",
				"lon" => "148.911559"
			],
			[
				"postcode" => "2866",
				"suburb" => "EUCHAREENA",
				"state" => "NSW",
				"lat" => "-32.939006",
				"lon" => "149.067204"
			],
			[
				"postcode" => "2866",
				"suburb" => "GARRA",
				"state" => "NSW",
				"lat" => "-33.114374",
				"lon" => "148.75626"
			],
			[
				"postcode" => "2866",
				"suburb" => "LARRAS LEE",
				"state" => "NSW",
				"lat" => "-32.970377",
				"lon" => "148.881707"
			],
			[
				"postcode" => "2866",
				"suburb" => "MOLONG",
				"state" => "NSW",
				"lat" => "-33.09197",
				"lon" => "148.868772"
			],
			[
				"postcode" => "2867",
				"suburb" => "BALDRY",
				"state" => "NSW",
				"lat" => "-32.865448",
				"lon" => "148.500123"
			],
			[
				"postcode" => "2867",
				"suburb" => "CUMNOCK",
				"state" => "NSW",
				"lat" => "-32.927818",
				"lon" => "148.754509"
			],
			[
				"postcode" => "2867",
				"suburb" => "EURIMBLA",
				"state" => "NSW",
				"lat" => "-33.918741",
				"lon" => "151.236993"
			],
			[
				"postcode" => "2867",
				"suburb" => "LOOMBAH",
				"state" => "NSW",
				"lat" => "-32.78685",
				"lon" => "148.735871"
			],
			[
				"postcode" => "2867",
				"suburb" => "YULLUNDRY",
				"state" => "NSW",
				"lat" => "-32.85003",
				"lon" => "148.71792"
			],
			[
				"postcode" => "2868",
				"suburb" => "BOURNEWOOD",
				"state" => "NSW",
				"lat" => "-32.752421",
				"lon" => "148.753515"
			],
			[
				"postcode" => "2868",
				"suburb" => "NORTH YEOVAL",
				"state" => "NSW",
				"lat" => "-32.736454",
				"lon" => "148.655087"
			],
			[
				"postcode" => "2868",
				"suburb" => "OBLEY",
				"state" => "NSW",
				"lat" => "-32.705881",
				"lon" => "148.552549"
			],
			[
				"postcode" => "2868",
				"suburb" => "YEOVAL",
				"state" => "NSW",
				"lat" => "-32.751829",
				"lon" => "148.649032"
			],
			[
				"postcode" => "2869",
				"suburb" => "PEAK HILL",
				"state" => "NSW",
				"lat" => "-32.725328",
				"lon" => "148.185188"
			],
			[
				"postcode" => "2869",
				"suburb" => "TOMINGLEY",
				"state" => "NSW",
				"lat" => "-32.556854",
				"lon" => "148.217991"
			],
			[
				"postcode" => "2869",
				"suburb" => "TREWILGA",
				"state" => "NSW",
				"lat" => "-32.791363",
				"lon" => "148.219646"
			],
			[
				"postcode" => "2870",
				"suburb" => "ALECTOWN",
				"state" => "NSW",
				"lat" => "-32.933075",
				"lon" => "148.257653"
			],
			[
				"postcode" => "2870",
				"suburb" => "BEARGAMIL",
				"state" => "NSW",
				"lat" => "-33.004174",
				"lon" => "148.309445"
			],
			[
				"postcode" => "2870",
				"suburb" => "BINDOGUNDRA",
				"state" => "NSW",
				"lat" => "-33.127339",
				"lon" => "148.276592"
			],
			[
				"postcode" => "2870",
				"suburb" => "BROLGAN",
				"state" => "NSW",
				"lat" => "-33.136961",
				"lon" => "148.097454"
			],
			[
				"postcode" => "2870",
				"suburb" => "BUMBERRY",
				"state" => "NSW",
				"lat" => "-33.187179",
				"lon" => "148.494076"
			],
			[
				"postcode" => "2870",
				"suburb" => "COOKAMIDGERA",
				"state" => "NSW",
				"lat" => "-33.2249",
				"lon" => "148.324968"
			],
			[
				"postcode" => "2870",
				"suburb" => "COOKS MYALLS",
				"state" => "NSW",
				"lat" => "-33.00458",
				"lon" => "148.009181"
			],
			[
				"postcode" => "2870",
				"suburb" => "DAROOBALGIE",
				"state" => "NSW",
				"lat" => "-33.321111",
				"lon" => "148.063142"
			],
			[
				"postcode" => "2870",
				"suburb" => "GOOBANG",
				"state" => "NSW",
				"lat" => "-33.036188",
				"lon" => "148.241011"
			],
			[
				"postcode" => "2870",
				"suburb" => "GOONUMBLA",
				"state" => "NSW",
				"lat" => "-32.998672",
				"lon" => "148.16101"
			],
			[
				"postcode" => "2870",
				"suburb" => "KADINA",
				"state" => "NSW",
				"lat" => "-32.88602",
				"lon" => "148.272815"
			],
			[
				"postcode" => "2870",
				"suburb" => "MANDAGERY",
				"state" => "NSW",
				"lat" => "-33.224277",
				"lon" => "148.40161"
			],
			[
				"postcode" => "2870",
				"suburb" => "MICKIBRI",
				"state" => "NSW",
				"lat" => "-32.858288",
				"lon" => "148.19819"
			],
			[
				"postcode" => "2870",
				"suburb" => "MUGINCOBLE",
				"state" => "NSW",
				"lat" => "-33.192013",
				"lon" => "148.22456"
			],
			[
				"postcode" => "2870",
				"suburb" => "NANARDINE",
				"state" => "NSW",
				"lat" => "-33.064093",
				"lon" => "148.116536"
			],
			[
				"postcode" => "2870",
				"suburb" => "PARKES",
				"state" => "NSW",
				"lat" => "-33.138326",
				"lon" => "148.174166"
			],
			[
				"postcode" => "2870",
				"suburb" => "PARKESBOROUGH",
				"state" => "NSW",
				"lat" => "-33.177499",
				"lon" => "148.161403"
			],
			[
				"postcode" => "2870",
				"suburb" => "TICHBORNE",
				"state" => "NSW",
				"lat" => "-33.231851",
				"lon" => "148.117191"
			],
			[
				"postcode" => "2871",
				"suburb" => "BANDON",
				"state" => "NSW",
				"lat" => "-33.501308",
				"lon" => "148.305788"
			],
			[
				"postcode" => "2871",
				"suburb" => "BEDGEREBONG",
				"state" => "NSW",
				"lat" => "-33.360915",
				"lon" => "147.696173"
			],
			[
				"postcode" => "2871",
				"suburb" => "BUNDABURRAH",
				"state" => "NSW",
				"lat" => "-33.469477",
				"lon" => "147.876587"
			],
			[
				"postcode" => "2871",
				"suburb" => "CALARIE",
				"state" => "NSW",
				"lat" => "-33.334669",
				"lon" => "147.989966"
			],
			[
				"postcode" => "2871",
				"suburb" => "CARRAWABBITY",
				"state" => "NSW",
				"lat" => "-33.36439",
				"lon" => "147.841057"
			],
			[
				"postcode" => "2871",
				"suburb" => "CORINELLA",
				"state" => "NSW",
				"lat" => "-33.432869",
				"lon" => "147.54766"
			],
			[
				"postcode" => "2871",
				"suburb" => "CUMBIJOWA",
				"state" => "NSW",
				"lat" => "-33.452171",
				"lon" => "148.173479"
			],
			[
				"postcode" => "2871",
				"suburb" => "FAIRHOLME",
				"state" => "NSW",
				"lat" => "-33.276639",
				"lon" => "147.360344"
			],
			[
				"postcode" => "2871",
				"suburb" => "FORBES",
				"state" => "NSW",
				"lat" => "-33.385343",
				"lon" => "148.007905"
			],
			[
				"postcode" => "2871",
				"suburb" => "GAREMA",
				"state" => "NSW",
				"lat" => "-33.566905",
				"lon" => "147.991044"
			],
			[
				"postcode" => "2871",
				"suburb" => "GRAWLIN",
				"state" => "NSW",
				"lat" => "-33.465386",
				"lon" => "148.036128"
			],
			[
				"postcode" => "2871",
				"suburb" => "GUNNING GAP",
				"state" => "NSW",
				"lat" => "-33.294388",
				"lon" => "147.716584"
			],
			[
				"postcode" => "2871",
				"suburb" => "JEMALONG",
				"state" => "NSW",
				"lat" => "-33.400878",
				"lon" => "147.776867"
			],
			[
				"postcode" => "2871",
				"suburb" => "MULYANDRY",
				"state" => "NSW",
				"lat" => "-33.571904",
				"lon" => "148.163085"
			],
			[
				"postcode" => "2871",
				"suburb" => "OOMA",
				"state" => "NSW",
				"lat" => "-33.57577",
				"lon" => "148.037643"
			],
			[
				"postcode" => "2871",
				"suburb" => "WARROO",
				"state" => "NSW",
				"lat" => "-33.328777",
				"lon" => "147.581381"
			],
			[
				"postcode" => "2871",
				"suburb" => "WEELONG",
				"state" => "NSW",
				"lat" => "-33.534927",
				"lon" => "147.780464"
			],
			[
				"postcode" => "2871",
				"suburb" => "WIRRINYA",
				"state" => "NSW",
				"lat" => "-33.684093",
				"lon" => "147.74749"
			],
			[
				"postcode" => "2871",
				"suburb" => "YARRAGONG",
				"state" => "NSW",
				"lat" => "-33.309075",
				"lon" => "147.894893"
			],
			[
				"postcode" => "2873",
				"suburb" => "ALBERT",
				"state" => "NSW",
				"lat" => "-32.41586",
				"lon" => "147.508111"
			],
			[
				"postcode" => "2873",
				"suburb" => "LANSDALE",
				"state" => "NSW",
				"lat" => "-32.232584",
				"lon" => "147.176786"
			],
			[
				"postcode" => "2873",
				"suburb" => "TOTTENHAM",
				"state" => "NSW",
				"lat" => "-32.244042",
				"lon" => "147.356028"
			],
			[
				"postcode" => "2874",
				"suburb" => "TULLAMORE",
				"state" => "NSW",
				"lat" => "-32.631463",
				"lon" => "147.564026"
			],
			[
				"postcode" => "2874",
				"suburb" => "YETHERA",
				"state" => "NSW",
				"lat" => "-32.459538",
				"lon" => "147.694665"
			],
			[
				"postcode" => "2875",
				"suburb" => "BRUIE PLAINS",
				"state" => "NSW",
				"lat" => "-32.780391",
				"lon" => "147.864053"
			],
			[
				"postcode" => "2875",
				"suburb" => "FIFIELD",
				"state" => "NSW",
				"lat" => "-32.807977",
				"lon" => "147.458805"
			],
			[
				"postcode" => "2875",
				"suburb" => "OOTHA",
				"state" => "NSW",
				"lat" => "-33.129346",
				"lon" => "147.434598"
			],
			[
				"postcode" => "2875",
				"suburb" => "THE TROFFS",
				"state" => "NSW",
				"lat" => "-32.833152",
				"lon" => "147.65353"
			],
			[
				"postcode" => "2875",
				"suburb" => "TRUNDLE",
				"state" => "NSW",
				"lat" => "-32.922887",
				"lon" => "147.709904"
			],
			[
				"postcode" => "2875",
				"suburb" => "YARRABANDAI",
				"state" => "NSW",
				"lat" => "-33.03106",
				"lon" => "147.635533"
			],
			[
				"postcode" => "2876",
				"suburb" => "BOGAN GATE",
				"state" => "NSW",
				"lat" => "-33.106229",
				"lon" => "147.802354"
			],
			[
				"postcode" => "2876",
				"suburb" => "BOTFIELDS",
				"state" => "NSW",
				"lat" => "-32.977451",
				"lon" => "147.82647"
			],
			[
				"postcode" => "2876",
				"suburb" => "GUNNINGBLAND",
				"state" => "NSW",
				"lat" => "-33.138047",
				"lon" => "147.922419"
			],
			[
				"postcode" => "2876",
				"suburb" => "NELUNGALOO",
				"state" => "NSW",
				"lat" => "-33.144016",
				"lon" => "147.998225"
			],
			[
				"postcode" => "2877",
				"suburb" => "CONDOBOLIN",
				"state" => "NSW",
				"lat" => "-33.089095",
				"lon" => "147.15218"
			],
			[
				"postcode" => "2877",
				"suburb" => "DERRIWONG",
				"state" => "NSW",
				"lat" => "-33.119671",
				"lon" => "147.364777"
			],
			[
				"postcode" => "2877",
				"suburb" => "EREMERANG",
				"state" => "NSW",
				"lat" => "-32.531644",
				"lon" => "146.308629"
			],
			[
				"postcode" => "2877",
				"suburb" => "EUABALONG",
				"state" => "NSW",
				"lat" => "-33.112515",
				"lon" => "146.472715"
			],
			[
				"postcode" => "2877",
				"suburb" => "EUABALONG WEST",
				"state" => "NSW",
				"lat" => "-33.055677",
				"lon" => "146.393986"
			],
			[
				"postcode" => "2877",
				"suburb" => "KIACATOO",
				"state" => "NSW",
				"lat" => "-33.043432",
				"lon" => "146.831621"
			],
			[
				"postcode" => "2877",
				"suburb" => "MILBY",
				"state" => "NSW",
				"lat" => "-33.236714",
				"lon" => "147.028122"
			],
			[
				"postcode" => "2877",
				"suburb" => "MOUNT HOPE",
				"state" => "NSW",
				"lat" => "-32.824527",
				"lon" => "145.88303"
			],
			[
				"postcode" => "2877",
				"suburb" => "MULGUTHRIE",
				"state" => "NSW",
				"lat" => "-33.197927",
				"lon" => "147.440247"
			],
			[
				"postcode" => "2878",
				"suburb" => "BEILPAJAH",
				"state" => "NSW",
				"lat" => "-32.827693",
				"lon" => "143.859144"
			],
			[
				"postcode" => "2878",
				"suburb" => "CONOBLE",
				"state" => "NSW",
				"lat" => "-32.724745",
				"lon" => "144.551875"
			],
			[
				"postcode" => "2878",
				"suburb" => "IVANHOE",
				"state" => "NSW",
				"lat" => "-32.899777",
				"lon" => "144.300441"
			],
			[
				"postcode" => "2878",
				"suburb" => "MANARA",
				"state" => "NSW",
				"lat" => "-32.471391",
				"lon" => "143.936712"
			],
			[
				"postcode" => "2878",
				"suburb" => "MOSSGIEL",
				"state" => "NSW",
				"lat" => "-33.251799",
				"lon" => "144.56695"
			],
			[
				"postcode" => "2878",
				"suburb" => "TRIDA",
				"state" => "NSW",
				"lat" => "-33.020873",
				"lon" => "145.015119"
			],
			[
				"postcode" => "2879",
				"suburb" => "COPI HOLLOW",
				"state" => "NSW",
				"lat" => "-32.263499",
				"lon" => "142.4066"
			],
			[
				"postcode" => "2879",
				"suburb" => "MENINDEE",
				"state" => "NSW",
				"lat" => "-32.392053",
				"lon" => "142.417613"
			],
			[
				"postcode" => "2880",
				"suburb" => "BROKEN HILL",
				"state" => "NSW",
				"lat" => "-31.959193",
				"lon" => "141.466614"
			],
			[
				"postcode" => "2880",
				"suburb" => "BROKEN HILL NORTH",
				"state" => "NSW",
				"lat" => "-31.950359",
				"lon" => "141.45619"
			],
			[
				"postcode" => "2880",
				"suburb" => "BROKEN HILL WEST",
				"state" => "NSW",
				"lat" => "-31.965867",
				"lon" => "141.444081"
			],
			[
				"postcode" => "2880",
				"suburb" => "BURNS",
				"state" => "NSW",
				"lat" => "-32.043365",
				"lon" => "141.195887"
			],
			[
				"postcode" => "2880",
				"suburb" => "CAMERON CORNER",
				"state" => "NSW",
				"lat" => "-29.001582",
				"lon" => "141.001978"
			],
			[
				"postcode" => "2880",
				"suburb" => "EURIOWIE",
				"state" => "NSW",
				"lat" => "-31.435409",
				"lon" => "141.641063"
			],
			[
				"postcode" => "2880",
				"suburb" => "FOWLERS GAP",
				"state" => "NSW",
				"lat" => "-31.091457",
				"lon" => "141.705399"
			],
			[
				"postcode" => "2880",
				"suburb" => "KINALUNG",
				"state" => "NSW",
				"lat" => "-32.062484",
				"lon" => "141.960232"
			],
			[
				"postcode" => "2880",
				"suburb" => "LITTLE TOPAR",
				"state" => "NSW",
				"lat" => "-31.710493",
				"lon" => "142.576981"
			],
			[
				"postcode" => "2880",
				"suburb" => "MILPARINKA",
				"state" => "NSW",
				"lat" => "-30.240564",
				"lon" => "142.111152"
			],
			[
				"postcode" => "2880",
				"suburb" => "MOUNT GIPPS",
				"state" => "NSW",
				"lat" => "-31.897755",
				"lon" => "141.595281"
			],
			[
				"postcode" => "2880",
				"suburb" => "PACKSADDLE",
				"state" => "NSW",
				"lat" => "-30.874708",
				"lon" => "141.785678"
			],
			[
				"postcode" => "2880",
				"suburb" => "SILVERTON",
				"state" => "NSW",
				"lat" => "-31.885923",
				"lon" => "141.232907"
			],
			[
				"postcode" => "2880",
				"suburb" => "SOUTH BROKEN HILL",
				"state" => "NSW",
				"lat" => "-31.977238",
				"lon" => "141.458131"
			],
			[
				"postcode" => "2880",
				"suburb" => "STEPHENS CREEK",
				"state" => "NSW",
				"lat" => "-31.835489",
				"lon" => "141.512534"
			],
			[
				"postcode" => "2880",
				"suburb" => "TIBOOBURRA",
				"state" => "NSW",
				"lat" => "-29.434259",
				"lon" => "142.010079"
			],
			[
				"postcode" => "2898",
				"suburb" => "LORD HOWE ISLAND",
				"state" => "NSW",
				"lat" => "-31.55247",
				"lon" => "159.081217"
			],
			[
				"postcode" => "2899",
				"suburb" => "NORFOLK ISLAND",
				"state" => "NSW",
				"lat" => "-36.084231",
				"lon" => "146.928783"
			],
			[
				"postcode" => "2900",
				"suburb" => "GREENWAY",
				"state" => "ACT",
				"lat" => "-35.417991",
				"lon" => "149.069414"
			],
			[
				"postcode" => "2900",
				"suburb" => "TUGGERANONG",
				"state" => "ACT",
				"lat" => "-35.415165",
				"lon" => "149.0658"
			],
			[
				"postcode" => "2902",
				"suburb" => "KAMBAH",
				"state" => "ACT",
				"lat" => "-35.378876",
				"lon" => "149.045895"
			],
			[
				"postcode" => "2903",
				"suburb" => "ERINDALE CENTRE",
				"state" => "ACT",
				"lat" => "-35.403016",
				"lon" => "149.097207"
			],
			[
				"postcode" => "2903",
				"suburb" => "OXLEY",
				"state" => "ACT",
				"lat" => "-35.414349",
				"lon" => "149.079888"
			],
			[
				"postcode" => "2903",
				"suburb" => "WANNIASSA",
				"state" => "ACT",
				"lat" => "-35.401661",
				"lon" => "149.099239"
			],
			[
				"postcode" => "2904",
				"suburb" => "FADDEN",
				"state" => "ACT",
				"lat" => "-35.400996",
				"lon" => "149.115023"
			],
			[
				"postcode" => "2904",
				"suburb" => "GOWRIE",
				"state" => "ACT",
				"lat" => "-35.413419",
				"lon" => "149.108473"
			],
			[
				"postcode" => "2904",
				"suburb" => "MACARTHUR",
				"state" => "ACT",
				"lat" => "-35.408559",
				"lon" => "149.131961"
			],
			[
				"postcode" => "2904",
				"suburb" => "MONASH",
				"state" => "ACT",
				"lat" => "-35.416103",
				"lon" => "149.089758"
			],
			[
				"postcode" => "2905",
				"suburb" => "BONYTHON",
				"state" => "ACT",
				"lat" => "-35.429018",
				"lon" => "149.081746"
			],
			[
				"postcode" => "2905",
				"suburb" => "CALWELL",
				"state" => "ACT",
				"lat" => "-35.43528",
				"lon" => "149.11229"
			],
			[
				"postcode" => "2905",
				"suburb" => "CHISHOLM",
				"state" => "ACT",
				"lat" => "-35.424193",
				"lon" => "149.122569"
			],
			[
				"postcode" => "2905",
				"suburb" => "GILMORE",
				"state" => "ACT",
				"lat" => "-35.416056",
				"lon" => "149.134017"
			],
			[
				"postcode" => "2905",
				"suburb" => "ISABELLA PLAINS",
				"state" => "ACT",
				"lat" => "-35.431945",
				"lon" => "149.092689"
			],
			[
				"postcode" => "2905",
				"suburb" => "RICHARDSON",
				"state" => "ACT",
				"lat" => "-35.427581",
				"lon" => "149.109787"
			],
			[
				"postcode" => "2905",
				"suburb" => "THEODORE",
				"state" => "ACT",
				"lat" => "-35.448697",
				"lon" => "149.124445"
			],
			[
				"postcode" => "2906",
				"suburb" => "BANKS",
				"state" => "ACT",
				"lat" => "-35.522639",
				"lon" => "149.08098"
			],
			[
				"postcode" => "2906",
				"suburb" => "CONDER",
				"state" => "ACT",
				"lat" => "-35.456295",
				"lon" => "149.094031"
			],
			[
				"postcode" => "2906",
				"suburb" => "GORDON",
				"state" => "ACT",
				"lat" => "-35.450547",
				"lon" => "149.083449"
			],
			[
				"postcode" => "2911",
				"suburb" => "CRACE",
				"state" => "ACT",
				"lat" => "-35.218473",
				"lon" => "149.124813"
			],
			[
				"postcode" => "2911",
				"suburb" => "MITCHELL",
				"state" => "ACT",
				"lat" => "-35.217487",
				"lon" => "149.141164"
			],
			[
				"postcode" => "2912",
				"suburb" => "GUNGAHLIN",
				"state" => "ACT",
				"lat" => "-35.522639",
				"lon" => "149.08098"
			],
			[
				"postcode" => "2913",
				"suburb" => "FRANKLIN",
				"state" => "ACT",
				"lat" => "-35.201802",
				"lon" => "149.132349"
			],
			[
				"postcode" => "2913",
				"suburb" => "GINNINDERRA VILLAGE",
				"state" => "ACT",
				"lat" => "-35.191111",
				"lon" => "149.084139"
			],
			[
				"postcode" => "2913",
				"suburb" => "NGUNNAWAL",
				"state" => "ACT",
				"lat" => "-35.177716",
				"lon" => "149.106022"
			],
			[
				"postcode" => "2913",
				"suburb" => "NICHOLLS",
				"state" => "ACT",
				"lat" => "-35.190785",
				"lon" => "149.099951"
			],
			[
				"postcode" => "2913",
				"suburb" => "PALMERSTON",
				"state" => "ACT",
				"lat" => "-35.194578",
				"lon" => "149.114697"
			],
			[
				"postcode" => "2914",
				"suburb" => "AMAROO",
				"state" => "ACT",
				"lat" => "-35.170334",
				"lon" => "149.125877"
			],
			[
				"postcode" => "2914",
				"suburb" => "BONNER",
				"state" => "ACT",
				"lat" => "-35.164311",
				"lon" => "149.13395"
			],
			[
				"postcode" => "2914",
				"suburb" => "FORDE",
				"state" => "ACT",
				"lat" => "-35.164368",
				"lon" => "149.147539"
			],
			[
				"postcode" => "2914",
				"suburb" => "HARRISON",
				"state" => "ACT",
				"lat" => "-35.180788",
				"lon" => "149.144499"
			],
			[
				"postcode" => "3000",
				"suburb" => "MELBOURNE",
				"state" => "VIC",
				"lat" => "-37.814563",
				"lon" => "144.970267"
			],
			[
				"postcode" => "3001",
				"suburb" => "MELBOURNE",
				"state" => "VIC",
				"lat" => "-38.365017",
				"lon" => "144.76592"
			],
			[
				"postcode" => "3002",
				"suburb" => "EAST MELBOURNE",
				"state" => "VIC",
				"lat" => "-37.81664",
				"lon" => "144.987811"
			],
			[
				"postcode" => "3003",
				"suburb" => "WEST MELBOURNE",
				"state" => "VIC",
				"lat" => "-37.806255",
				"lon" => "144.941123"
			],
			[
				"postcode" => "3004",
				"suburb" => "MELBOURNE",
				"state" => "VIC",
				"lat" => "-37.837324",
				"lon" => "144.976335"
			],
			[
				"postcode" => "3005",
				"suburb" => "WORLD TRADE CENTRE",
				"state" => "VIC",
				"lat" => "-37.822262",
				"lon" => "144.954856"
			],
			[
				"postcode" => "3006",
				"suburb" => "SOUTHBANK",
				"state" => "VIC",
				"lat" => "-37.823258",
				"lon" => "144.965926"
			],
			[
				"postcode" => "3008",
				"suburb" => "DOCKLANDS",
				"state" => "VIC",
				"lat" => "-37.814719",
				"lon" => "144.948039"
			],
			[
				"postcode" => "3010",
				"suburb" => "UNIVERSITY OF MELBOURNE",
				"state" => "VIC",
				"lat" => "-37.796152",
				"lon" => "144.961351"
			],
			[
				"postcode" => "3011",
				"suburb" => "FOOTSCRAY",
				"state" => "VIC",
				"lat" => "-37.79977",
				"lon" => "144.899587"
			],
			[
				"postcode" => "3011",
				"suburb" => "SEDDON",
				"state" => "VIC",
				"lat" => "-37.808769",
				"lon" => "144.895486"
			],
			[
				"postcode" => "3011",
				"suburb" => "SEDDON WEST",
				"state" => "VIC",
				"lat" => "-37.795059",
				"lon" => "144.866197"
			],
			[
				"postcode" => "3012",
				"suburb" => "BROOKLYN",
				"state" => "VIC",
				"lat" => "-37.814624",
				"lon" => "144.847108"
			],
			[
				"postcode" => "3012",
				"suburb" => "KINGSVILLE",
				"state" => "VIC",
				"lat" => "-37.812635",
				"lon" => "144.881803"
			],
			[
				"postcode" => "3012",
				"suburb" => "KINGSVILLE WEST",
				"state" => "VIC",
				"lat" => "-37.795059",
				"lon" => "144.866197"
			],
			[
				"postcode" => "3012",
				"suburb" => "MAIDSTONE",
				"state" => "VIC",
				"lat" => "-37.782096",
				"lon" => "144.874299"
			],
			[
				"postcode" => "3012",
				"suburb" => "TOTTENHAM",
				"state" => "VIC",
				"lat" => "-37.799065",
				"lon" => "144.857829"
			],
			[
				"postcode" => "3012",
				"suburb" => "WEST FOOTSCRAY",
				"state" => "VIC",
				"lat" => "-37.797701",
				"lon" => "144.879924"
			],
			[
				"postcode" => "3013",
				"suburb" => "YARRAVILLE",
				"state" => "VIC",
				"lat" => "-37.816178",
				"lon" => "144.889774"
			],
			[
				"postcode" => "3013",
				"suburb" => "YARRAVILLE WEST",
				"state" => "VIC",
				"lat" => "-37.818019",
				"lon" => "144.883582"
			],
			[
				"postcode" => "3015",
				"suburb" => "NEWPORT",
				"state" => "VIC",
				"lat" => "-37.842477",
				"lon" => "144.883145"
			],
			[
				"postcode" => "3015",
				"suburb" => "SOUTH KINGSVILLE",
				"state" => "VIC",
				"lat" => "-37.833627",
				"lon" => "144.870742"
			],
			[
				"postcode" => "3015",
				"suburb" => "SPOTSWOOD",
				"state" => "VIC",
				"lat" => "-37.82967",
				"lon" => "144.885078"
			],
			[
				"postcode" => "3016",
				"suburb" => "WILLIAMSTOWN",
				"state" => "VIC",
				"lat" => "-37.856902",
				"lon" => "144.897698"
			],
			[
				"postcode" => "3016",
				"suburb" => "WILLIAMSTOWN NORTH",
				"state" => "VIC",
				"lat" => "-37.857681",
				"lon" => "144.887041"
			],
			[
				"postcode" => "3018",
				"suburb" => "ALTONA",
				"state" => "VIC",
				"lat" => "-37.869275",
				"lon" => "144.830286"
			],
			[
				"postcode" => "3018",
				"suburb" => "SEAHOLME",
				"state" => "VIC",
				"lat" => "-37.867992",
				"lon" => "144.843609"
			],
			[
				"postcode" => "3019",
				"suburb" => "BRAYBROOK",
				"state" => "VIC",
				"lat" => "-37.779309",
				"lon" => "144.855359"
			],
			[
				"postcode" => "3019",
				"suburb" => "BRAYBROOK NORTH",
				"state" => "VIC",
				"lat" => "-37.84536",
				"lon" => "144.894555"
			],
			[
				"postcode" => "3019",
				"suburb" => "ROBINSON",
				"state" => "VIC",
				"lat" => "-37.834094",
				"lon" => "145.040941"
			],
			[
				"postcode" => "3020",
				"suburb" => "ALBION",
				"state" => "VIC",
				"lat" => "-37.775954",
				"lon" => "144.819395"
			],
			[
				"postcode" => "3020",
				"suburb" => "GLENGALA",
				"state" => "VIC",
				"lat" => "-37.788346",
				"lon" => "144.809505"
			],
			[
				"postcode" => "3020",
				"suburb" => "SUNSHINE NORTH",
				"state" => "VIC",
				"lat" => "-37.768904",
				"lon" => "144.830258"
			],
			[
				"postcode" => "3020",
				"suburb" => "SUNSHINE WEST",
				"state" => "VIC",
				"lat" => "-37.79983",
				"lon" => "144.81845"
			],
			[
				"postcode" => "3021",
				"suburb" => "ALBANVALE",
				"state" => "VIC",
				"lat" => "-37.745934",
				"lon" => "144.770027"
			],
			[
				"postcode" => "3021",
				"suburb" => "KEALBA",
				"state" => "VIC",
				"lat" => "-37.742331",
				"lon" => "144.825918"
			],
			[
				"postcode" => "3021",
				"suburb" => "KINGS PARK",
				"state" => "VIC",
				"lat" => "-37.734277",
				"lon" => "144.780872"
			],
			[
				"postcode" => "3021",
				"suburb" => "ST ALBANS",
				"state" => "VIC",
				"lat" => "-37.745063",
				"lon" => "144.799626"
			],
			[
				"postcode" => "3022",
				"suburb" => "ARDEER",
				"state" => "VIC",
				"lat" => "-37.78292",
				"lon" => "144.801018"
			],
			[
				"postcode" => "3022",
				"suburb" => "DEER PARK EAST",
				"state" => "VIC",
				"lat" => "-37.740815",
				"lon" => "144.797867"
			],
			[
				"postcode" => "3023",
				"suburb" => "BURNSIDE",
				"state" => "VIC",
				"lat" => "-37.753381",
				"lon" => "144.752618"
			],
			[
				"postcode" => "3023",
				"suburb" => "BURNSIDE HEIGHTS",
				"state" => "VIC",
				"lat" => "-37.771039",
				"lon" => "144.772248"
			],
			[
				"postcode" => "3023",
				"suburb" => "CAIRNLEA",
				"state" => "VIC",
				"lat" => "-37.762076",
				"lon" => "144.754169"
			],
			[
				"postcode" => "3023",
				"suburb" => "CAROLINE SPRINGS",
				"state" => "VIC",
				"lat" => "-37.74124",
				"lon" => "144.736311"
			],
			[
				"postcode" => "3023",
				"suburb" => "DEER PARK",
				"state" => "VIC",
				"lat" => "-37.770312",
				"lon" => "144.77472"
			],
			[
				"postcode" => "3023",
				"suburb" => "DEER PARK NORTH",
				"state" => "VIC",
				"lat" => "-37.744466",
				"lon" => "144.751767"
			],
			[
				"postcode" => "3023",
				"suburb" => "RAVENHALL",
				"state" => "VIC",
				"lat" => "-37.766501",
				"lon" => "144.738709"
			],
			[
				"postcode" => "3024",
				"suburb" => "MAMBOURIN",
				"state" => "VIC",
				"lat" => "-37.899873",
				"lon" => "144.556552"
			],
			[
				"postcode" => "3024",
				"suburb" => "MOUNT COTTRELL",
				"state" => "VIC",
				"lat" => "-37.76516",
				"lon" => "144.609501"
			],
			[
				"postcode" => "3024",
				"suburb" => "WYNDHAM VALE",
				"state" => "VIC",
				"lat" => "-37.891641",
				"lon" => "144.629467"
			],
			[
				"postcode" => "3025",
				"suburb" => "ALTONA EAST",
				"state" => "VIC",
				"lat" => "-37.835657",
				"lon" => "144.85995"
			],
			[
				"postcode" => "3025",
				"suburb" => "ALTONA GATE",
				"state" => "VIC",
				"lat" => "-37.825297",
				"lon" => "144.842988"
			],
			[
				"postcode" => "3025",
				"suburb" => "ALTONA NORTH",
				"state" => "VIC",
				"lat" => "-37.842879",
				"lon" => "144.850049"
			],
			[
				"postcode" => "3026",
				"suburb" => "LAVERTON NORTH",
				"state" => "VIC",
				"lat" => "-37.841653",
				"lon" => "144.795959"
			],
			[
				"postcode" => "3027",
				"suburb" => "LAVERTON RAAF",
				"state" => "VIC",
				"lat" => "-37.859941",
				"lon" => "144.760517"
			],
			[
				"postcode" => "3028",
				"suburb" => "ALTONA MEADOWS",
				"state" => "VIC",
				"lat" => "-37.871632",
				"lon" => "144.778084"
			],
			[
				"postcode" => "3028",
				"suburb" => "LAVERTON",
				"state" => "VIC",
				"lat" => "-37.866939",
				"lon" => "144.761748"
			],
			[
				"postcode" => "3028",
				"suburb" => "SEABROOK",
				"state" => "VIC",
				"lat" => "-37.877626",
				"lon" => "144.75777"
			],
			[
				"postcode" => "3029",
				"suburb" => "HOPPERS CROSSING",
				"state" => "VIC",
				"lat" => "-37.882636",
				"lon" => "144.700297"
			],
			[
				"postcode" => "3029",
				"suburb" => "TARNEIT",
				"state" => "VIC",
				"lat" => "-37.823738",
				"lon" => "144.692893"
			],
			[
				"postcode" => "3029",
				"suburb" => "TRUGANINA",
				"state" => "VIC",
				"lat" => "-37.825004",
				"lon" => "144.748931"
			],
			[
				"postcode" => "3030",
				"suburb" => "COCOROC",
				"state" => "VIC",
				"lat" => "-37.969994",
				"lon" => "144.582987"
			],
			[
				"postcode" => "3030",
				"suburb" => "DERRIMUT",
				"state" => "VIC",
				"lat" => "-37.797549",
				"lon" => "144.771097"
			],
			[
				"postcode" => "3030",
				"suburb" => "POINT COOK",
				"state" => "VIC",
				"lat" => "-37.914616",
				"lon" => "144.751038"
			],
			[
				"postcode" => "3030",
				"suburb" => "QUANDONG",
				"state" => "VIC",
				"lat" => "-37.838725",
				"lon" => "144.554915"
			],
			[
				"postcode" => "3030",
				"suburb" => "WERRIBEE",
				"state" => "VIC",
				"lat" => "-37.903337",
				"lon" => "144.657731"
			],
			[
				"postcode" => "3030",
				"suburb" => "WERRIBEE SOUTH",
				"state" => "VIC",
				"lat" => "-37.903337",
				"lon" => "144.657731"
			],
			[
				"postcode" => "3031",
				"suburb" => "FLEMINGTON",
				"state" => "VIC",
				"lat" => "-37.788375",
				"lon" => "144.931472"
			],
			[
				"postcode" => "3031",
				"suburb" => "KENSINGTON",
				"state" => "VIC",
				"lat" => "-37.794333",
				"lon" => "144.929217"
			],
			[
				"postcode" => "3032",
				"suburb" => "ASCOT VALE",
				"state" => "VIC",
				"lat" => "-37.77583",
				"lon" => "144.923377"
			],
			[
				"postcode" => "3032",
				"suburb" => "HIGHPOINT CITY",
				"state" => "VIC",
				"lat" => "-37.773272",
				"lon" => "144.888794"
			],
			[
				"postcode" => "3032",
				"suburb" => "MARIBYRNONG",
				"state" => "VIC",
				"lat" => "-37.772229",
				"lon" => "144.886116"
			],
			[
				"postcode" => "3032",
				"suburb" => "TRAVANCORE",
				"state" => "VIC",
				"lat" => "-37.777773",
				"lon" => "144.929915"
			],
			[
				"postcode" => "3033",
				"suburb" => "KEILOR EAST",
				"state" => "VIC",
				"lat" => "-37.736264",
				"lon" => "144.796336"
			],
			[
				"postcode" => "3034",
				"suburb" => "AVONDALE HEIGHTS",
				"state" => "VIC",
				"lat" => "-37.742284",
				"lon" => "144.81515"
			],
			[
				"postcode" => "3036",
				"suburb" => "KEILOR",
				"state" => "VIC",
				"lat" => "-37.718965",
				"lon" => "144.834166"
			],
			[
				"postcode" => "3036",
				"suburb" => "KEILOR NORTH",
				"state" => "VIC",
				"lat" => "-37.704771",
				"lon" => "144.814229"
			],
			[
				"postcode" => "3037",
				"suburb" => "DELAHEY",
				"state" => "VIC",
				"lat" => "-37.715579",
				"lon" => "144.780474"
			],
			[
				"postcode" => "3037",
				"suburb" => "HILLSIDE",
				"state" => "VIC",
				"lat" => "-37.691437",
				"lon" => "144.74002"
			],
			[
				"postcode" => "3037",
				"suburb" => "SYDENHAM",
				"state" => "VIC",
				"lat" => "-37.70004",
				"lon" => "144.764617"
			],
			[
				"postcode" => "3037",
				"suburb" => "TAYLORS HILL",
				"state" => "VIC",
				"lat" => "-37.710381",
				"lon" => "144.766791"
			],
			[
				"postcode" => "3038",
				"suburb" => "KEILOR DOWNS",
				"state" => "VIC",
				"lat" => "-37.725726",
				"lon" => "144.811346"
			],
			[
				"postcode" => "3038",
				"suburb" => "KEILOR LODGE",
				"state" => "VIC",
				"lat" => "-37.695768",
				"lon" => "144.797032"
			],
			[
				"postcode" => "3038",
				"suburb" => "TAYLORS LAKES",
				"state" => "VIC",
				"lat" => "-37.698758",
				"lon" => "144.78766"
			],
			[
				"postcode" => "3038",
				"suburb" => "WATERGARDENS",
				"state" => "VIC",
				"lat" => "-37.698952",
				"lon" => "144.777576"
			],
			[
				"postcode" => "3039",
				"suburb" => "MOONEE PONDS",
				"state" => "VIC",
				"lat" => "-37.765707",
				"lon" => "144.919163"
			],
			[
				"postcode" => "3040",
				"suburb" => "ABERFELDIE",
				"state" => "VIC",
				"lat" => "-37.75669",
				"lon" => "144.896259"
			],
			[
				"postcode" => "3040",
				"suburb" => "ESSENDON",
				"state" => "VIC",
				"lat" => "-37.754973",
				"lon" => "144.917407"
			],
			[
				"postcode" => "3040",
				"suburb" => "ESSENDON WEST",
				"state" => "VIC",
				"lat" => "-37.753802",
				"lon" => "144.888271"
			],
			[
				"postcode" => "3041",
				"suburb" => "ESSENDON NORTH",
				"state" => "VIC",
				"lat" => "-37.744374",
				"lon" => "144.909853"
			],
			[
				"postcode" => "3041",
				"suburb" => "STRATHMORE",
				"state" => "VIC",
				"lat" => "-37.735876",
				"lon" => "144.919176"
			],
			[
				"postcode" => "3041",
				"suburb" => "STRATHMORE HEIGHTS",
				"state" => "VIC",
				"lat" => "-37.716678",
				"lon" => "144.897568"
			],
			[
				"postcode" => "3042",
				"suburb" => "AIRPORT WEST",
				"state" => "VIC",
				"lat" => "-37.711698",
				"lon" => "144.887037"
			],
			[
				"postcode" => "3042",
				"suburb" => "KEILOR PARK",
				"state" => "VIC",
				"lat" => "-37.72465",
				"lon" => "144.850373"
			],
			[
				"postcode" => "3042",
				"suburb" => "NIDDRIE",
				"state" => "VIC",
				"lat" => "-37.736031",
				"lon" => "144.889072"
			],
			[
				"postcode" => "3043",
				"suburb" => "GLADSTONE PARK",
				"state" => "VIC",
				"lat" => "-37.68861",
				"lon" => "144.883628"
			],
			[
				"postcode" => "3043",
				"suburb" => "GOWANBRAE",
				"state" => "VIC",
				"lat" => "-37.706316",
				"lon" => "144.894885"
			],
			[
				"postcode" => "3043",
				"suburb" => "TULLAMARINE",
				"state" => "VIC",
				"lat" => "-37.68656",
				"lon" => "144.882698"
			],
			[
				"postcode" => "3044",
				"suburb" => "PASCOE VALE",
				"state" => "VIC",
				"lat" => "-37.727568",
				"lon" => "144.939122"
			],
			[
				"postcode" => "3044",
				"suburb" => "PASCOE VALE SOUTH",
				"state" => "VIC",
				"lat" => "-37.739198",
				"lon" => "144.945722"
			],
			[
				"postcode" => "3045",
				"suburb" => "MELBOURNE AIRPORT",
				"state" => "VIC",
				"lat" => "-37.668873",
				"lon" => "144.833931"
			],
			[
				"postcode" => "3046",
				"suburb" => "GLENROY",
				"state" => "VIC",
				"lat" => "-37.704581",
				"lon" => "144.915758"
			],
			[
				"postcode" => "3046",
				"suburb" => "HADFIELD",
				"state" => "VIC",
				"lat" => "-37.707238",
				"lon" => "144.93832"
			],
			[
				"postcode" => "3046",
				"suburb" => "OAK PARK",
				"state" => "VIC",
				"lat" => "-37.71817",
				"lon" => "144.919959"
			],
			[
				"postcode" => "3047",
				"suburb" => "BROADMEADOWS",
				"state" => "VIC",
				"lat" => "-37.680792",
				"lon" => "144.921009"
			],
			[
				"postcode" => "3047",
				"suburb" => "DALLAS",
				"state" => "VIC",
				"lat" => "-37.673333",
				"lon" => "144.931141"
			],
			[
				"postcode" => "3047",
				"suburb" => "JACANA",
				"state" => "VIC",
				"lat" => "-37.690301",
				"lon" => "144.915729"
			],
			[
				"postcode" => "3048",
				"suburb" => "COOLAROO",
				"state" => "VIC",
				"lat" => "-37.651811",
				"lon" => "144.930466"
			],
			[
				"postcode" => "3048",
				"suburb" => "MEADOW HEIGHTS",
				"state" => "VIC",
				"lat" => "-37.64986",
				"lon" => "144.922104"
			],
			[
				"postcode" => "3049",
				"suburb" => "ATTWOOD",
				"state" => "VIC",
				"lat" => "-37.667515",
				"lon" => "144.88529"
			],
			[
				"postcode" => "3049",
				"suburb" => "CALDER PARK",
				"state" => "VIC",
				"lat" => "-37.700648",
				"lon" => "144.755896"
			],
			[
				"postcode" => "3049",
				"suburb" => "WESTMEADOWS",
				"state" => "VIC",
				"lat" => "-37.673551",
				"lon" => "144.90086"
			],
			[
				"postcode" => "3050",
				"suburb" => "ROYAL MELBOURNE HOSPITAL",
				"state" => "VIC",
				"lat" => "-37.798631",
				"lon" => "144.955627"
			],
			[
				"postcode" => "3051",
				"suburb" => "NORTH MELBOURNE",
				"state" => "VIC",
				"lat" => "-37.905996",
				"lon" => "145.056254"
			],
			[
				"postcode" => "3052",
				"suburb" => "MELBOURNE UNIVERSITY",
				"state" => "VIC",
				"lat" => "-37.796152",
				"lon" => "144.961351"
			],
			[
				"postcode" => "3052",
				"suburb" => "PARKVILLE",
				"state" => "VIC",
				"lat" => "-37.788531",
				"lon" => "144.947731"
			],
			[
				"postcode" => "3053",
				"suburb" => "CARLTON",
				"state" => "VIC",
				"lat" => "-37.784337",
				"lon" => "144.969747"
			],
			[
				"postcode" => "3053",
				"suburb" => "CARLTON SOUTH",
				"state" => "VIC",
				"lat" => "-37.778987",
				"lon" => "145.0026"
			],
			[
				"postcode" => "3054",
				"suburb" => "CARLTON NORTH",
				"state" => "VIC",
				"lat" => "-37.784337",
				"lon" => "144.969747"
			],
			[
				"postcode" => "3054",
				"suburb" => "PRINCES HILL",
				"state" => "VIC",
				"lat" => "-37.780995",
				"lon" => "144.962792"
			],
			[
				"postcode" => "3055",
				"suburb" => "BRUNSWICK SOUTH",
				"state" => "VIC",
				"lat" => "-37.772049",
				"lon" => "144.944635"
			],
			[
				"postcode" => "3055",
				"suburb" => "BRUNSWICK WEST",
				"state" => "VIC",
				"lat" => "-37.762489",
				"lon" => "144.961176"
			],
			[
				"postcode" => "3055",
				"suburb" => "MOONEE VALE",
				"state" => "VIC",
				"lat" => "-37.763919",
				"lon" => "144.940314"
			],
			[
				"postcode" => "3055",
				"suburb" => "MORELAND WEST",
				"state" => "VIC",
				"lat" => "-37.713902",
				"lon" => "144.937112"
			],
			[
				"postcode" => "3056",
				"suburb" => "BRUNSWICK",
				"state" => "VIC",
				"lat" => "-37.764829",
				"lon" => "144.943778"
			],
			[
				"postcode" => "3056",
				"suburb" => "BRUNSWICK LOWER",
				"state" => "VIC",
				"lat" => "-37.759717",
				"lon" => "144.95137"
			],
			[
				"postcode" => "3056",
				"suburb" => "BRUNSWICK NORTH",
				"state" => "VIC",
				"lat" => "-37.760071",
				"lon" => "144.972291"
			],
			[
				"postcode" => "3057",
				"suburb" => "BRUNSWICK EAST",
				"state" => "VIC",
				"lat" => "-37.76491",
				"lon" => "144.979567"
			],
			[
				"postcode" => "3058",
				"suburb" => "BATMAN",
				"state" => "VIC",
				"lat" => "-37.733524",
				"lon" => "144.962837"
			],
			[
				"postcode" => "3058",
				"suburb" => "COBURG",
				"state" => "VIC",
				"lat" => "-37.743188",
				"lon" => "144.966279"
			],
			[
				"postcode" => "3058",
				"suburb" => "COBURG NORTH",
				"state" => "VIC",
				"lat" => "-37.730842",
				"lon" => "144.971699"
			],
			[
				"postcode" => "3058",
				"suburb" => "MERLYNSTON",
				"state" => "VIC",
				"lat" => "-37.720932",
				"lon" => "144.96131"
			],
			[
				"postcode" => "3058",
				"suburb" => "MORELAND",
				"state" => "VIC",
				"lat" => "-37.748315",
				"lon" => "144.961827"
			],
			[
				"postcode" => "3059",
				"suburb" => "GREENVALE",
				"state" => "VIC",
				"lat" => "-37.642984",
				"lon" => "144.88872"
			],
			[
				"postcode" => "3060",
				"suburb" => "FAWKNER",
				"state" => "VIC",
				"lat" => "-37.759823",
				"lon" => "144.89571"
			],
			[
				"postcode" => "3060",
				"suburb" => "FAWKNER EAST",
				"state" => "VIC",
				"lat" => "-37.709159",
				"lon" => "144.950411"
			],
			[
				"postcode" => "3060",
				"suburb" => "FAWKNER NORTH",
				"state" => "VIC",
				"lat" => "-37.705055",
				"lon" => "144.944577"
			],
			[
				"postcode" => "3061",
				"suburb" => "CAMPBELLFIELD",
				"state" => "VIC",
				"lat" => "-37.643746",
				"lon" => "144.951369"
			],
			[
				"postcode" => "3062",
				"suburb" => "SOMERTON",
				"state" => "VIC",
				"lat" => "-37.642563",
				"lon" => "144.944259"
			],
			[
				"postcode" => "3063",
				"suburb" => "OAKLANDS JUNCTION",
				"state" => "VIC",
				"lat" => "-37.629826",
				"lon" => "144.839244"
			],
			[
				"postcode" => "3063",
				"suburb" => "YUROKE",
				"state" => "VIC",
				"lat" => "-37.589589",
				"lon" => "144.879406"
			],
			[
				"postcode" => "3064",
				"suburb" => "CRAIGIEBURN",
				"state" => "VIC",
				"lat" => "-37.598975",
				"lon" => "144.941287"
			],
			[
				"postcode" => "3064",
				"suburb" => "DONNYBROOK",
				"state" => "VIC",
				"lat" => "-37.542028",
				"lon" => "144.963579"
			],
			[
				"postcode" => "3064",
				"suburb" => "KALKALLO",
				"state" => "VIC",
				"lat" => "-37.529372",
				"lon" => "144.947106"
			],
			[
				"postcode" => "3064",
				"suburb" => "MICKLEHAM",
				"state" => "VIC",
				"lat" => "-37.560864",
				"lon" => "144.879078"
			],
			[
				"postcode" => "3064",
				"suburb" => "ROXBURGH PARK",
				"state" => "VIC",
				"lat" => "-37.636795",
				"lon" => "144.932604"
			],
			[
				"postcode" => "3065",
				"suburb" => "FITZROY",
				"state" => "VIC",
				"lat" => "-37.800917",
				"lon" => "144.979165"
			],
			[
				"postcode" => "3066",
				"suburb" => "COLLINGWOOD",
				"state" => "VIC",
				"lat" => "-37.800366",
				"lon" => "144.984149"
			],
			[
				"postcode" => "3066",
				"suburb" => "COLLINGWOOD NORTH",
				"state" => "VIC",
				"lat" => "-37.789805",
				"lon" => "144.990796"
			],
			[
				"postcode" => "3067",
				"suburb" => "ABBOTSFORD",
				"state" => "VIC",
				"lat" => "-37.801781",
				"lon" => "144.998752"
			],
			[
				"postcode" => "3068",
				"suburb" => "CLIFTON HILL",
				"state" => "VIC",
				"lat" => "-37.788118",
				"lon" => "144.992067"
			],
			[
				"postcode" => "3068",
				"suburb" => "FITZROY NORTH",
				"state" => "VIC",
				"lat" => "-37.7834",
				"lon" => "144.984688"
			],
			[
				"postcode" => "3070",
				"suburb" => "NORTHCOTE",
				"state" => "VIC",
				"lat" => "-37.769857",
				"lon" => "144.995276"
			],
			[
				"postcode" => "3070",
				"suburb" => "NORTHCOTE SOUTH",
				"state" => "VIC",
				"lat" => "-37.779039",
				"lon" => "145.006746"
			],
			[
				"postcode" => "3071",
				"suburb" => "THORNBURY",
				"state" => "VIC",
				"lat" => "-37.75504",
				"lon" => "144.998589"
			],
			[
				"postcode" => "3072",
				"suburb" => "NORTHLAND CENTRE",
				"state" => "VIC",
				"lat" => "-37.742047",
				"lon" => "145.027716"
			],
			[
				"postcode" => "3072",
				"suburb" => "PRESTON",
				"state" => "VIC",
				"lat" => "-37.738736",
				"lon" => "145.000515"
			],
			[
				"postcode" => "3072",
				"suburb" => "PRESTON LOWER",
				"state" => "VIC",
				"lat" => "-37.743606",
				"lon" => "145.019624"
			],
			[
				"postcode" => "3072",
				"suburb" => "PRESTON SOUTH",
				"state" => "VIC",
				"lat" => "-37.743356",
				"lon" => "145.009123"
			],
			[
				"postcode" => "3072",
				"suburb" => "PRESTON WEST",
				"state" => "VIC",
				"lat" => "-37.736855",
				"lon" => "145.003005"
			],
			[
				"postcode" => "3073",
				"suburb" => "KEON PARK",
				"state" => "VIC",
				"lat" => "-37.694672",
				"lon" => "145.011907"
			],
			[
				"postcode" => "3073",
				"suburb" => "RESERVOIR",
				"state" => "VIC",
				"lat" => "-37.716897",
				"lon" => "145.006985"
			],
			[
				"postcode" => "3073",
				"suburb" => "RESERVOIR EAST",
				"state" => "VIC",
				"lat" => "-37.722243",
				"lon" => "145.011124"
			],
			[
				"postcode" => "3073",
				"suburb" => "RESERVOIR NORTH",
				"state" => "VIC",
				"lat" => "-37.723105",
				"lon" => "145.018195"
			],
			[
				"postcode" => "3073",
				"suburb" => "RESERVOIR SOUTH",
				"state" => "VIC",
				"lat" => "-37.714796",
				"lon" => "144.944655"
			],
			[
				"postcode" => "3074",
				"suburb" => "THOMASTOWN",
				"state" => "VIC",
				"lat" => "-37.680338",
				"lon" => "145.014287"
			],
			[
				"postcode" => "3075",
				"suburb" => "LALOR",
				"state" => "VIC",
				"lat" => "-37.665857",
				"lon" => "145.017194"
			],
			[
				"postcode" => "3075",
				"suburb" => "LALOR PLAZA",
				"state" => "VIC",
				"lat" => "-37.673141",
				"lon" => "145.016634"
			],
			[
				"postcode" => "3076",
				"suburb" => "EPPING",
				"state" => "VIC",
				"lat" => "-37.638363",
				"lon" => "145.009493"
			],
			[
				"postcode" => "3078",
				"suburb" => "ALPHINGTON",
				"state" => "VIC",
				"lat" => "-37.780767",
				"lon" => "145.03116"
			],
			[
				"postcode" => "3078",
				"suburb" => "FAIRFIELD",
				"state" => "VIC",
				"lat" => "-37.776946",
				"lon" => "145.018479"
			],
			[
				"postcode" => "3079",
				"suburb" => "IVANHOE",
				"state" => "VIC",
				"lat" => "-37.76964",
				"lon" => "145.041425"
			],
			[
				"postcode" => "3079",
				"suburb" => "IVANHOE EAST",
				"state" => "VIC",
				"lat" => "-37.77283",
				"lon" => "145.059401"
			],
			[
				"postcode" => "3079",
				"suburb" => "IVANHOE NORTH",
				"state" => "VIC",
				"lat" => "-37.723105",
				"lon" => "145.018195"
			],
			[
				"postcode" => "3081",
				"suburb" => "BELLFIELD",
				"state" => "VIC",
				"lat" => "-37.751819",
				"lon" => "145.045449"
			],
			[
				"postcode" => "3081",
				"suburb" => "HEIDELBERG HEIGHTS",
				"state" => "VIC",
				"lat" => "-37.742268",
				"lon" => "145.048873"
			],
			[
				"postcode" => "3081",
				"suburb" => "HEIDELBERG WEST",
				"state" => "VIC",
				"lat" => "-37.74944",
				"lon" => "145.0414"
			],
			[
				"postcode" => "3082",
				"suburb" => "MILL PARK",
				"state" => "VIC",
				"lat" => "-37.667957",
				"lon" => "145.060693"
			],
			[
				"postcode" => "3083",
				"suburb" => "BUNDOORA",
				"state" => "VIC",
				"lat" => "-37.70132",
				"lon" => "145.071967"
			],
			[
				"postcode" => "3083",
				"suburb" => "KINGSBURY",
				"state" => "VIC",
				"lat" => "-37.714064",
				"lon" => "145.035103"
			],
			[
				"postcode" => "3083",
				"suburb" => "LA TROBE UNIVERSITY",
				"state" => "VIC",
				"lat" => "-37.721328",
				"lon" => "145.047012"
			],
			[
				"postcode" => "3084",
				"suburb" => "BANYULE",
				"state" => "VIC",
				"lat" => "-37.744219",
				"lon" => "145.08793"
			],
			[
				"postcode" => "3084",
				"suburb" => "EAGLEMONT",
				"state" => "VIC",
				"lat" => "-37.762519",
				"lon" => "145.068208"
			],
			[
				"postcode" => "3084",
				"suburb" => "HEIDELBERG",
				"state" => "VIC",
				"lat" => "-37.756341",
				"lon" => "145.067145"
			],
			[
				"postcode" => "3084",
				"suburb" => "ROSANNA",
				"state" => "VIC",
				"lat" => "-37.742893",
				"lon" => "145.065044"
			],
			[
				"postcode" => "3084",
				"suburb" => "VIEWBANK",
				"state" => "VIC",
				"lat" => "-37.739262",
				"lon" => "145.096424"
			],
			[
				"postcode" => "3085",
				"suburb" => "MACLEOD",
				"state" => "VIC",
				"lat" => "-37.726038",
				"lon" => "145.068457"
			],
			[
				"postcode" => "3085",
				"suburb" => "MACLEOD WEST",
				"state" => "VIC",
				"lat" => "-37.736354",
				"lon" => "145.038518"
			],
			[
				"postcode" => "3085",
				"suburb" => "YALLAMBIE",
				"state" => "VIC",
				"lat" => "-37.727482",
				"lon" => "145.102309"
			],
			[
				"postcode" => "3086",
				"suburb" => "LA TROBE UNIVERSITY",
				"state" => "VIC",
				"lat" => "-37.721328",
				"lon" => "145.047012"
			],
			[
				"postcode" => "3087",
				"suburb" => "WATSONIA",
				"state" => "VIC",
				"lat" => "-37.712531",
				"lon" => "145.082098"
			],
			[
				"postcode" => "3087",
				"suburb" => "WATSONIA NORTH",
				"state" => "VIC",
				"lat" => "-37.698352",
				"lon" => "145.084586"
			],
			[
				"postcode" => "3088",
				"suburb" => "BRIAR HILL",
				"state" => "VIC",
				"lat" => "-37.709483",
				"lon" => "145.120135"
			],
			[
				"postcode" => "3088",
				"suburb" => "GREENSBOROUGH",
				"state" => "VIC",
				"lat" => "-37.704622",
				"lon" => "145.103024"
			],
			[
				"postcode" => "3088",
				"suburb" => "SAINT HELENA",
				"state" => "VIC",
				"lat" => "-37.690585",
				"lon" => "145.130847"
			],
			[
				"postcode" => "3089",
				"suburb" => "DIAMOND CREEK",
				"state" => "VIC",
				"lat" => "-37.642629",
				"lon" => "145.217595"
			],
			[
				"postcode" => "3090",
				"suburb" => "PLENTY",
				"state" => "VIC",
				"lat" => "-37.671565",
				"lon" => "145.124024"
			],
			[
				"postcode" => "3091",
				"suburb" => "YARRAMBAT",
				"state" => "VIC",
				"lat" => "-37.639769",
				"lon" => "145.132663"
			],
			[
				"postcode" => "3093",
				"suburb" => "LOWER PLENTY",
				"state" => "VIC",
				"lat" => "-37.730758",
				"lon" => "145.088118"
			],
			[
				"postcode" => "3094",
				"suburb" => "MONTMORENCY",
				"state" => "VIC",
				"lat" => "-37.715294",
				"lon" => "145.121583"
			],
			[
				"postcode" => "3095",
				"suburb" => "ELTHAM",
				"state" => "VIC",
				"lat" => "-37.71383",
				"lon" => "145.148537"
			],
			[
				"postcode" => "3095",
				"suburb" => "ELTHAM NORTH",
				"state" => "VIC",
				"lat" => "-37.69401",
				"lon" => "145.147506"
			],
			[
				"postcode" => "3095",
				"suburb" => "RESEARCH",
				"state" => "VIC",
				"lat" => "-37.703602",
				"lon" => "145.180636"
			],
			[
				"postcode" => "3096",
				"suburb" => "WATTLE GLEN",
				"state" => "VIC",
				"lat" => "-37.670101",
				"lon" => "145.190928"
			],
			[
				"postcode" => "3097",
				"suburb" => "BEND OF ISLANDS",
				"state" => "VIC",
				"lat" => "-37.697232",
				"lon" => "145.284134"
			],
			[
				"postcode" => "3097",
				"suburb" => "KANGAROO GROUND",
				"state" => "VIC",
				"lat" => "-37.692032",
				"lon" => "145.215528"
			],
			[
				"postcode" => "3097",
				"suburb" => "WATSONS CREEK",
				"state" => "VIC",
				"lat" => "-37.67058",
				"lon" => "145.256526"
			],
			[
				"postcode" => "3099",
				"suburb" => "ARTHURS CREEK",
				"state" => "VIC",
				"lat" => "-37.587697",
				"lon" => "145.218156"
			],
			[
				"postcode" => "3099",
				"suburb" => "COTTLES BRIDGE",
				"state" => "VIC",
				"lat" => "-37.625074",
				"lon" => "145.216671"
			],
			[
				"postcode" => "3099",
				"suburb" => "HURSTBRIDGE",
				"state" => "VIC",
				"lat" => "-37.640166",
				"lon" => "145.192477"
			],
			[
				"postcode" => "3099",
				"suburb" => "NUTFIELD",
				"state" => "VIC",
				"lat" => "-37.610518",
				"lon" => "145.173559"
			],
			[
				"postcode" => "3099",
				"suburb" => "STRATHEWEN",
				"state" => "VIC",
				"lat" => "-37.53633",
				"lon" => "145.273454"
			],
			[
				"postcode" => "3101",
				"suburb" => "COTHAM",
				"state" => "VIC",
				"lat" => "-37.808497",
				"lon" => "145.044922"
			],
			[
				"postcode" => "3101",
				"suburb" => "KEW",
				"state" => "VIC",
				"lat" => "-37.797982",
				"lon" => "145.053727"
			],
			[
				"postcode" => "3102",
				"suburb" => "KEW EAST",
				"state" => "VIC",
				"lat" => "-37.796246",
				"lon" => "145.049017"
			],
			[
				"postcode" => "3103",
				"suburb" => "BALWYN",
				"state" => "VIC",
				"lat" => "-37.809701",
				"lon" => "145.082303"
			],
			[
				"postcode" => "3103",
				"suburb" => "BALWYN EAST",
				"state" => "VIC",
				"lat" => "-37.807312",
				"lon" => "145.096698"
			],
			[
				"postcode" => "3104",
				"suburb" => "BALWYN NORTH",
				"state" => "VIC",
				"lat" => "-37.792835",
				"lon" => "145.071727"
			],
			[
				"postcode" => "3104",
				"suburb" => "GREYTHORN",
				"state" => "VIC",
				"lat" => "-37.796947",
				"lon" => "145.098434"
			],
			[
				"postcode" => "3105",
				"suburb" => "BULLEEN",
				"state" => "VIC",
				"lat" => "-37.768554",
				"lon" => "145.079543"
			],
			[
				"postcode" => "3106",
				"suburb" => "TEMPLESTOWE",
				"state" => "VIC",
				"lat" => "-37.768882",
				"lon" => "145.117873"
			],
			[
				"postcode" => "3107",
				"suburb" => "TEMPLESTOWE LOWER",
				"state" => "VIC",
				"lat" => "-37.7563",
				"lon" => "145.102997"
			],
			[
				"postcode" => "3108",
				"suburb" => "DONCASTER",
				"state" => "VIC",
				"lat" => "-37.783031",
				"lon" => "145.122517"
			],
			[
				"postcode" => "3109",
				"suburb" => "DONCASTER EAST",
				"state" => "VIC",
				"lat" => "-37.811994",
				"lon" => "145.19474"
			],
			[
				"postcode" => "3109",
				"suburb" => "DONCASTER HEIGHTS",
				"state" => "VIC",
				"lat" => "-37.788827",
				"lon" => "145.159247"
			],
			[
				"postcode" => "3109",
				"suburb" => "THE PINES",
				"state" => "VIC",
				"lat" => "-37.757762",
				"lon" => "145.169626"
			],
			[
				"postcode" => "3111",
				"suburb" => "DONVALE",
				"state" => "VIC",
				"lat" => "-38.183899",
				"lon" => "144.468019"
			],
			[
				"postcode" => "3113",
				"suburb" => "NORTH WARRANDYTE",
				"state" => "VIC",
				"lat" => "-37.731758",
				"lon" => "145.221282"
			],
			[
				"postcode" => "3113",
				"suburb" => "WARRANDYTE",
				"state" => "VIC",
				"lat" => "-37.736915",
				"lon" => "145.22314"
			],
			[
				"postcode" => "3114",
				"suburb" => "PARK ORCHARDS",
				"state" => "VIC",
				"lat" => "-37.778442",
				"lon" => "145.214586"
			],
			[
				"postcode" => "3115",
				"suburb" => "WONGA PARK",
				"state" => "VIC",
				"lat" => "-37.738666",
				"lon" => "145.270483"
			],
			[
				"postcode" => "3116",
				"suburb" => "CHIRNSIDE PARK",
				"state" => "VIC",
				"lat" => "-37.750325",
				"lon" => "145.326463"
			],
			[
				"postcode" => "3121",
				"suburb" => "BURNLEY",
				"state" => "VIC",
				"lat" => "-37.826869",
				"lon" => "145.007098"
			],
			[
				"postcode" => "3121",
				"suburb" => "BURNLEY NORTH",
				"state" => "VIC",
				"lat" => "-37.829382",
				"lon" => "145.007165"
			],
			[
				"postcode" => "3121",
				"suburb" => "CREMORNE",
				"state" => "VIC",
				"lat" => "-37.829719",
				"lon" => "144.990346"
			],
			[
				"postcode" => "3121",
				"suburb" => "RICHMOND",
				"state" => "VIC",
				"lat" => "-37.818587",
				"lon" => "144.999181"
			],
			[
				"postcode" => "3121",
				"suburb" => "RICHMOND EAST",
				"state" => "VIC",
				"lat" => "-37.826421",
				"lon" => "144.996431"
			],
			[
				"postcode" => "3121",
				"suburb" => "RICHMOND NORTH",
				"state" => "VIC",
				"lat" => "-37.816323",
				"lon" => "145.011044"
			],
			[
				"postcode" => "3121",
				"suburb" => "RICHMOND SOUTH",
				"state" => "VIC",
				"lat" => "-37.814951",
				"lon" => "144.991415"
			],
			[
				"postcode" => "3122",
				"suburb" => "AUBURN SOUTH",
				"state" => "VIC",
				"lat" => "-37.842105",
				"lon" => "145.045951"
			],
			[
				"postcode" => "3122",
				"suburb" => "HAWTHORN",
				"state" => "VIC",
				"lat" => "-37.834855",
				"lon" => "145.052097"
			],
			[
				"postcode" => "3122",
				"suburb" => "HAWTHORN NORTH",
				"state" => "VIC",
				"lat" => "-37.828845",
				"lon" => "145.007261"
			],
			[
				"postcode" => "3122",
				"suburb" => "HAWTHORN WEST",
				"state" => "VIC",
				"lat" => "-37.819687",
				"lon" => "145.017455"
			],
			[
				"postcode" => "3123",
				"suburb" => "AUBURN",
				"state" => "VIC",
				"lat" => "-37.832121",
				"lon" => "145.044832"
			],
			[
				"postcode" => "3123",
				"suburb" => "HAWTHORN EAST",
				"state" => "VIC",
				"lat" => "-37.782254",
				"lon" => "145.001811"
			],
			[
				"postcode" => "3124",
				"suburb" => "CAMBERWELL",
				"state" => "VIC",
				"lat" => "-37.824818",
				"lon" => "145.057957"
			],
			[
				"postcode" => "3124",
				"suburb" => "CAMBERWELL NORTH",
				"state" => "VIC",
				"lat" => "-37.825705",
				"lon" => "145.068352"
			],
			[
				"postcode" => "3124",
				"suburb" => "CAMBERWELL SOUTH",
				"state" => "VIC",
				"lat" => "-37.825705",
				"lon" => "145.068352"
			],
			[
				"postcode" => "3124",
				"suburb" => "CAMBERWELL WEST",
				"state" => "VIC",
				"lat" => "-37.840088",
				"lon" => "145.093634"
			],
			[
				"postcode" => "3124",
				"suburb" => "HARTWELL",
				"state" => "VIC",
				"lat" => "-37.843985",
				"lon" => "145.075562"
			],
			[
				"postcode" => "3124",
				"suburb" => "MIDDLE CAMBERWELL",
				"state" => "VIC",
				"lat" => "-37.844",
				"lon" => "145.056955"
			],
			[
				"postcode" => "3125",
				"suburb" => "BENNETTSWOOD",
				"state" => "VIC",
				"lat" => "-37.844825",
				"lon" => "145.115681"
			],
			[
				"postcode" => "3125",
				"suburb" => "BURWOOD",
				"state" => "VIC",
				"lat" => "-37.852805",
				"lon" => "145.151909"
			],
			[
				"postcode" => "3125",
				"suburb" => "SURREY HILLS SOUTH",
				"state" => "VIC",
				"lat" => "-37.835047",
				"lon" => "145.096407"
			],
			[
				"postcode" => "3126",
				"suburb" => "CAMBERWELL EAST",
				"state" => "VIC",
				"lat" => "-37.840195",
				"lon" => "145.094524"
			],
			[
				"postcode" => "3126",
				"suburb" => "CANTERBURY",
				"state" => "VIC",
				"lat" => "-37.824249",
				"lon" => "145.073114"
			],
			[
				"postcode" => "3127",
				"suburb" => "MONT ALBERT",
				"state" => "VIC",
				"lat" => "-37.821232",
				"lon" => "145.104996"
			],
			[
				"postcode" => "3127",
				"suburb" => "SURREY HILLS",
				"state" => "VIC",
				"lat" => "-37.825077",
				"lon" => "145.097412"
			],
			[
				"postcode" => "3127",
				"suburb" => "SURREY HILLS NORTH",
				"state" => "VIC",
				"lat" => "-37.834288",
				"lon" => "145.096516"
			],
			[
				"postcode" => "3128",
				"suburb" => "BOX HILL",
				"state" => "VIC",
				"lat" => "-37.817455",
				"lon" => "145.119314"
			],
			[
				"postcode" => "3128",
				"suburb" => "BOX HILL CENTRAL",
				"state" => "VIC",
				"lat" => "-37.819107",
				"lon" => "145.121273"
			],
			[
				"postcode" => "3128",
				"suburb" => "BOX HILL SOUTH",
				"state" => "VIC",
				"lat" => "-37.828744",
				"lon" => "145.121843"
			],
			[
				"postcode" => "3128",
				"suburb" => "HOUSTON",
				"state" => "VIC",
				"lat" => "-37.844706",
				"lon" => "145.130113"
			],
			[
				"postcode" => "3128",
				"suburb" => "WATTLE PARK",
				"state" => "VIC",
				"lat" => "-37.839076",
				"lon" => "145.104165"
			],
			[
				"postcode" => "3129",
				"suburb" => "BOX HILL NORTH",
				"state" => "VIC",
				"lat" => "-37.801761",
				"lon" => "145.126869"
			],
			[
				"postcode" => "3129",
				"suburb" => "KERRIMUIR",
				"state" => "VIC",
				"lat" => "-37.805767",
				"lon" => "145.136413"
			],
			[
				"postcode" => "3129",
				"suburb" => "MONT ALBERT NORTH",
				"state" => "VIC",
				"lat" => "-37.807247",
				"lon" => "145.11205"
			],
			[
				"postcode" => "3130",
				"suburb" => "BLACKBURN",
				"state" => "VIC",
				"lat" => "-37.819374",
				"lon" => "145.153852"
			],
			[
				"postcode" => "3130",
				"suburb" => "BLACKBURN NORTH",
				"state" => "VIC",
				"lat" => "-37.810403",
				"lon" => "145.1521"
			],
			[
				"postcode" => "3130",
				"suburb" => "BLACKBURN SOUTH",
				"state" => "VIC",
				"lat" => "-37.831666",
				"lon" => "145.146719"
			],
			[
				"postcode" => "3130",
				"suburb" => "LABURNUM",
				"state" => "VIC",
				"lat" => "-37.821142",
				"lon" => "145.145303"
			],
			[
				"postcode" => "3131",
				"suburb" => "BRENTFORD SQUARE",
				"state" => "VIC",
				"lat" => "-37.837379",
				"lon" => "145.183948"
			],
			[
				"postcode" => "3131",
				"suburb" => "FOREST HILL",
				"state" => "VIC",
				"lat" => "-37.834099",
				"lon" => "145.166527"
			],
			[
				"postcode" => "3131",
				"suburb" => "NUNAWADING",
				"state" => "VIC",
				"lat" => "-37.820037",
				"lon" => "145.175726"
			],
			[
				"postcode" => "3132",
				"suburb" => "MITCHAM",
				"state" => "VIC",
				"lat" => "-37.816878",
				"lon" => "145.193712"
			],
			[
				"postcode" => "3132",
				"suburb" => "MITCHAM NORTH",
				"state" => "VIC",
				"lat" => "-37.837478",
				"lon" => "145.170024"
			],
			[
				"postcode" => "3132",
				"suburb" => "RANGEVIEW",
				"state" => "VIC",
				"lat" => "-37.805715",
				"lon" => "145.200802"
			],
			[
				"postcode" => "3133",
				"suburb" => "VERMONT",
				"state" => "VIC",
				"lat" => "-37.836235",
				"lon" => "145.194651"
			],
			[
				"postcode" => "3133",
				"suburb" => "VERMONT SOUTH",
				"state" => "VIC",
				"lat" => "-37.856647",
				"lon" => "145.183576"
			],
			[
				"postcode" => "3134",
				"suburb" => "RINGWOOD",
				"state" => "VIC",
				"lat" => "-37.81402",
				"lon" => "145.227362"
			],
			[
				"postcode" => "3134",
				"suburb" => "RINGWOOD NORTH",
				"state" => "VIC",
				"lat" => "-37.787064",
				"lon" => "145.2356"
			],
			[
				"postcode" => "3134",
				"suburb" => "WARRANDYTE SOUTH",
				"state" => "VIC",
				"lat" => "-37.759339",
				"lon" => "145.233973"
			],
			[
				"postcode" => "3134",
				"suburb" => "WARRANWOOD",
				"state" => "VIC",
				"lat" => "-37.774017",
				"lon" => "145.2483"
			],
			[
				"postcode" => "3135",
				"suburb" => "BEDFORD ROAD",
				"state" => "VIC",
				"lat" => "-37.820951",
				"lon" => "145.246663"
			],
			[
				"postcode" => "3135",
				"suburb" => "HEATHMONT",
				"state" => "VIC",
				"lat" => "-37.830334",
				"lon" => "145.244356"
			],
			[
				"postcode" => "3135",
				"suburb" => "RINGWOOD EAST",
				"state" => "VIC",
				"lat" => "-37.812999",
				"lon" => "145.247551"
			],
			[
				"postcode" => "3136",
				"suburb" => "CROYDON",
				"state" => "VIC",
				"lat" => "-37.798729",
				"lon" => "145.280685"
			],
			[
				"postcode" => "3136",
				"suburb" => "CROYDON HILLS",
				"state" => "VIC",
				"lat" => "-37.774437",
				"lon" => "145.27557"
			],
			[
				"postcode" => "3136",
				"suburb" => "CROYDON NORTH",
				"state" => "VIC",
				"lat" => "-37.770695",
				"lon" => "145.294691"
			],
			[
				"postcode" => "3136",
				"suburb" => "CROYDON SOUTH",
				"state" => "VIC",
				"lat" => "-37.811967",
				"lon" => "145.269481"
			],
			[
				"postcode" => "3137",
				"suburb" => "KILSYTH",
				"state" => "VIC",
				"lat" => "-37.802304",
				"lon" => "145.312198"
			],
			[
				"postcode" => "3137",
				"suburb" => "KILSYTH SOUTH",
				"state" => "VIC",
				"lat" => "-37.829539",
				"lon" => "145.302768"
			],
			[
				"postcode" => "3138",
				"suburb" => "MOOROOLBARK",
				"state" => "VIC",
				"lat" => "-37.774337",
				"lon" => "145.329954"
			],
			[
				"postcode" => "3139",
				"suburb" => "BEENAK",
				"state" => "VIC",
				"lat" => "-37.795679",
				"lon" => "145.538569"
			],
			[
				"postcode" => "3139",
				"suburb" => "DON VALLEY",
				"state" => "VIC",
				"lat" => "-37.75689",
				"lon" => "145.587606"
			],
			[
				"postcode" => "3139",
				"suburb" => "HODDLES CREEK",
				"state" => "VIC",
				"lat" => "-37.828887",
				"lon" => "145.597894"
			],
			[
				"postcode" => "3139",
				"suburb" => "LAUNCHING PLACE",
				"state" => "VIC",
				"lat" => "-37.780668",
				"lon" => "145.566625"
			],
			[
				"postcode" => "3139",
				"suburb" => "SEVILLE",
				"state" => "VIC",
				"lat" => "-37.777197",
				"lon" => "145.460734"
			],
			[
				"postcode" => "3139",
				"suburb" => "SEVILLE EAST",
				"state" => "VIC",
				"lat" => "-37.775456",
				"lon" => "145.495905"
			],
			[
				"postcode" => "3139",
				"suburb" => "WANDIN EAST",
				"state" => "VIC",
				"lat" => "-37.815707",
				"lon" => "145.46037"
			],
			[
				"postcode" => "3139",
				"suburb" => "WANDIN NORTH",
				"state" => "VIC",
				"lat" => "-37.771838",
				"lon" => "145.414182"
			],
			[
				"postcode" => "3139",
				"suburb" => "WOORI YALLOCK",
				"state" => "VIC",
				"lat" => "-37.780019",
				"lon" => "145.530363"
			],
			[
				"postcode" => "3139",
				"suburb" => "YELLINGBO",
				"state" => "VIC",
				"lat" => "-37.813485",
				"lon" => "145.508258"
			],
			[
				"postcode" => "3140",
				"suburb" => "LILYDALE",
				"state" => "VIC",
				"lat" => "-37.755519",
				"lon" => "145.347707"
			],
			[
				"postcode" => "3141",
				"suburb" => "CHAPEL STREET NORTH",
				"state" => "VIC",
				"lat" => "-36.990185",
				"lon" => "144.063338"
			],
			[
				"postcode" => "3141",
				"suburb" => "SOUTH YARRA",
				"state" => "VIC",
				"lat" => "-37.837883",
				"lon" => "144.991123"
			],
			[
				"postcode" => "3142",
				"suburb" => "HAWKSBURN",
				"state" => "VIC",
				"lat" => "-37.842378",
				"lon" => "145.001779"
			],
			[
				"postcode" => "3142",
				"suburb" => "TOORAK",
				"state" => "VIC",
				"lat" => "-37.84216",
				"lon" => "145.017966"
			],
			[
				"postcode" => "3143",
				"suburb" => "ARMADALE",
				"state" => "VIC",
				"lat" => "-37.85934",
				"lon" => "145.018505"
			],
			[
				"postcode" => "3143",
				"suburb" => "ARMADALE NORTH",
				"state" => "VIC",
				"lat" => "-37.828845",
				"lon" => "145.007261"
			],
			[
				"postcode" => "3144",
				"suburb" => "KOOYONG",
				"state" => "VIC",
				"lat" => "-37.840702",
				"lon" => "145.032101"
			],
			[
				"postcode" => "3144",
				"suburb" => "MALVERN",
				"state" => "VIC",
				"lat" => "-37.861427",
				"lon" => "145.028508"
			],
			[
				"postcode" => "3144",
				"suburb" => "MALVERN NORTH",
				"state" => "VIC",
				"lat" => "-37.856852",
				"lon" => "145.036518"
			],
			[
				"postcode" => "3145",
				"suburb" => "CAULFIELD EAST",
				"state" => "VIC",
				"lat" => "-37.875412",
				"lon" => "145.041976"
			],
			[
				"postcode" => "3145",
				"suburb" => "CENTRAL PARK",
				"state" => "VIC",
				"lat" => "-37.866895",
				"lon" => "145.048737"
			],
			[
				"postcode" => "3145",
				"suburb" => "DARLING",
				"state" => "VIC",
				"lat" => "-37.877328",
				"lon" => "145.059305"
			],
			[
				"postcode" => "3145",
				"suburb" => "MALVERN EAST",
				"state" => "VIC",
				"lat" => "-37.87837",
				"lon" => "145.067892"
			],
			[
				"postcode" => "3146",
				"suburb" => "GLEN IRIS",
				"state" => "VIC",
				"lat" => "-37.854687",
				"lon" => "145.067215"
			],
			[
				"postcode" => "3147",
				"suburb" => "ASHBURTON",
				"state" => "VIC",
				"lat" => "-37.863393",
				"lon" => "145.07942"
			],
			[
				"postcode" => "3147",
				"suburb" => "ASHWOOD",
				"state" => "VIC",
				"lat" => "-37.864686",
				"lon" => "145.093061"
			],
			[
				"postcode" => "3148",
				"suburb" => "CHADSTONE",
				"state" => "VIC",
				"lat" => "-37.886372",
				"lon" => "145.082527"
			],
			[
				"postcode" => "3148",
				"suburb" => "CHADSTONE CENTRE",
				"state" => "VIC",
				"lat" => "-37.886372",
				"lon" => "145.082527"
			],
			[
				"postcode" => "3148",
				"suburb" => "HOLMESGLEN",
				"state" => "VIC",
				"lat" => "-37.874223",
				"lon" => "145.091587"
			],
			[
				"postcode" => "3149",
				"suburb" => "MOUNT WAVERLEY",
				"state" => "VIC",
				"lat" => "-37.875273",
				"lon" => "145.128398"
			],
			[
				"postcode" => "3149",
				"suburb" => "PINEWOOD",
				"state" => "VIC",
				"lat" => "-37.891595",
				"lon" => "145.143314"
			],
			[
				"postcode" => "3149",
				"suburb" => "SYNDAL",
				"state" => "VIC",
				"lat" => "-37.87947",
				"lon" => "145.143233"
			],
			[
				"postcode" => "3150",
				"suburb" => "GLEN WAVERLEY",
				"state" => "VIC",
				"lat" => "-37.877631",
				"lon" => "145.166222"
			],
			[
				"postcode" => "3150",
				"suburb" => "WHEELERS HILL",
				"state" => "VIC",
				"lat" => "-37.909349",
				"lon" => "145.188659"
			],
			[
				"postcode" => "3151",
				"suburb" => "BURWOOD EAST",
				"state" => "VIC",
				"lat" => "-37.858352",
				"lon" => "145.138553"
			],
			[
				"postcode" => "3151",
				"suburb" => "BURWOOD HEIGHTS",
				"state" => "VIC",
				"lat" => "-37.852535",
				"lon" => "145.150335"
			],
			[
				"postcode" => "3152",
				"suburb" => "KNOX CITY CENTRE",
				"state" => "VIC",
				"lat" => "-37.869224",
				"lon" => "145.241382"
			],
			[
				"postcode" => "3152",
				"suburb" => "WANTIRNA",
				"state" => "VIC",
				"lat" => "-37.847915",
				"lon" => "145.228757"
			],
			[
				"postcode" => "3152",
				"suburb" => "WANTIRNA SOUTH",
				"state" => "VIC",
				"lat" => "-37.868979",
				"lon" => "145.235211"
			],
			[
				"postcode" => "3153",
				"suburb" => "BAYSWATER",
				"state" => "VIC",
				"lat" => "-37.84126",
				"lon" => "145.266725"
			],
			[
				"postcode" => "3153",
				"suburb" => "BAYSWATER NORTH",
				"state" => "VIC",
				"lat" => "-37.8303",
				"lon" => "145.275095"
			],
			[
				"postcode" => "3154",
				"suburb" => "THE BASIN",
				"state" => "VIC",
				"lat" => "-37.851467",
				"lon" => "145.307133"
			],
			[
				"postcode" => "3155",
				"suburb" => "BORONIA",
				"state" => "VIC",
				"lat" => "-37.861504",
				"lon" => "145.275762"
			],
			[
				"postcode" => "3156",
				"suburb" => "FERNTREE GULLY",
				"state" => "VIC",
				"lat" => "-37.883019",
				"lon" => "145.295404"
			],
			[
				"postcode" => "3156",
				"suburb" => "LYSTERFIELD",
				"state" => "VIC",
				"lat" => "-37.926533",
				"lon" => "145.303402"
			],
			[
				"postcode" => "3156",
				"suburb" => "LYSTERFIELD SOUTH",
				"state" => "VIC",
				"lat" => "-37.927092",
				"lon" => "145.291015"
			],
			[
				"postcode" => "3156",
				"suburb" => "MOUNTAIN GATE",
				"state" => "VIC",
				"lat" => "-37.890107",
				"lon" => "145.273576"
			],
			[
				"postcode" => "3156",
				"suburb" => "UPPER FERNTREE GULLY",
				"state" => "VIC",
				"lat" => "-37.893513",
				"lon" => "145.310777"
			],
			[
				"postcode" => "3158",
				"suburb" => "UPWEY",
				"state" => "VIC",
				"lat" => "-37.903672",
				"lon" => "145.33131"
			],
			[
				"postcode" => "3159",
				"suburb" => "MENZIES CREEK",
				"state" => "VIC",
				"lat" => "-37.921323",
				"lon" => "145.403546"
			],
			[
				"postcode" => "3159",
				"suburb" => "SELBY",
				"state" => "VIC",
				"lat" => "-37.915182",
				"lon" => "145.372016"
			],
			[
				"postcode" => "3160",
				"suburb" => "BELGRAVE",
				"state" => "VIC",
				"lat" => "-37.908422",
				"lon" => "145.355075"
			],
			[
				"postcode" => "3160",
				"suburb" => "BELGRAVE HEIGHTS",
				"state" => "VIC",
				"lat" => "-37.926012",
				"lon" => "145.352597"
			],
			[
				"postcode" => "3160",
				"suburb" => "BELGRAVE SOUTH",
				"state" => "VIC",
				"lat" => "-37.941795",
				"lon" => "145.356068"
			],
			[
				"postcode" => "3160",
				"suburb" => "TECOMA",
				"state" => "VIC",
				"lat" => "-37.906626",
				"lon" => "145.343987"
			],
			[
				"postcode" => "3161",
				"suburb" => "CAULFIELD JUNCTION",
				"state" => "VIC",
				"lat" => "-38.033451",
				"lon" => "145.309748"
			],
			[
				"postcode" => "3161",
				"suburb" => "CAULFIELD NORTH",
				"state" => "VIC",
				"lat" => "-37.901678",
				"lon" => "145.02357"
			],
			[
				"postcode" => "3162",
				"suburb" => "CAULFIELD",
				"state" => "VIC",
				"lat" => "-37.880479",
				"lon" => "145.026806"
			],
			[
				"postcode" => "3162",
				"suburb" => "CAULFIELD SOUTH",
				"state" => "VIC",
				"lat" => "-37.886903",
				"lon" => "145.021979"
			],
			[
				"postcode" => "3162",
				"suburb" => "HOPETOUN GARDENS",
				"state" => "VIC",
				"lat" => "-37.886719",
				"lon" => "145.010619"
			],
			[
				"postcode" => "3163",
				"suburb" => "CARNEGIE",
				"state" => "VIC",
				"lat" => "-37.889336",
				"lon" => "145.058121"
			],
			[
				"postcode" => "3163",
				"suburb" => "GLEN HUNTLY",
				"state" => "VIC",
				"lat" => "-37.889239",
				"lon" => "145.040629"
			],
			[
				"postcode" => "3163",
				"suburb" => "MURRUMBEENA",
				"state" => "VIC",
				"lat" => "-37.89069",
				"lon" => "145.067589"
			],
			[
				"postcode" => "3164",
				"suburb" => "DANDENONG SOUTH",
				"state" => "VIC",
				"lat" => "-38.02243",
				"lon" => "145.23738"
			],
			[
				"postcode" => "3165",
				"suburb" => "BENTLEIGH EAST",
				"state" => "VIC",
				"lat" => "-37.927402",
				"lon" => "145.059412"
			],
			[
				"postcode" => "3165",
				"suburb" => "COATESVILLE",
				"state" => "VIC",
				"lat" => "-37.92075",
				"lon" => "145.072839"
			],
			[
				"postcode" => "3166",
				"suburb" => "HUGHESDALE",
				"state" => "VIC",
				"lat" => "-37.895763",
				"lon" => "145.076545"
			],
			[
				"postcode" => "3166",
				"suburb" => "HUNTINGDALE",
				"state" => "VIC",
				"lat" => "-37.909347",
				"lon" => "145.103841"
			],
			[
				"postcode" => "3166",
				"suburb" => "OAKLEIGH",
				"state" => "VIC",
				"lat" => "-37.899854",
				"lon" => "145.087116"
			],
			[
				"postcode" => "3166",
				"suburb" => "OAKLEIGH EAST",
				"state" => "VIC",
				"lat" => "-37.900071",
				"lon" => "145.105574"
			],
			[
				"postcode" => "3167",
				"suburb" => "OAKLEIGH SOUTH",
				"state" => "VIC",
				"lat" => "-37.926986",
				"lon" => "145.0964"
			],
			[
				"postcode" => "3168",
				"suburb" => "CLAYTON",
				"state" => "VIC",
				"lat" => "-37.925488",
				"lon" => "145.119662"
			],
			[
				"postcode" => "3168",
				"suburb" => "NOTTING HILL",
				"state" => "VIC",
				"lat" => "-37.901596",
				"lon" => "145.145776"
			],
			[
				"postcode" => "3169",
				"suburb" => "CLARINDA",
				"state" => "VIC",
				"lat" => "-37.941228",
				"lon" => "145.10244"
			],
			[
				"postcode" => "3169",
				"suburb" => "CLAYTON SOUTH",
				"state" => "VIC",
				"lat" => "-37.939215",
				"lon" => "145.126625"
			],
			[
				"postcode" => "3170",
				"suburb" => "MULGRAVE",
				"state" => "VIC",
				"lat" => "-37.869611",
				"lon" => "145.102866"
			],
			[
				"postcode" => "3170",
				"suburb" => "WAVERLEY GARDENS",
				"state" => "VIC",
				"lat" => "-37.92246",
				"lon" => "145.189181"
			],
			[
				"postcode" => "3171",
				"suburb" => "SANDOWN VILLAGE",
				"state" => "VIC",
				"lat" => "-37.950802",
				"lon" => "145.15696"
			],
			[
				"postcode" => "3171",
				"suburb" => "SPRINGVALE",
				"state" => "VIC",
				"lat" => "-37.97103",
				"lon" => "145.148499"
			],
			[
				"postcode" => "3172",
				"suburb" => "DINGLEY VILLAGE",
				"state" => "VIC",
				"lat" => "-37.973323",
				"lon" => "145.119941"
			],
			[
				"postcode" => "3172",
				"suburb" => "SPRINGVALE SOUTH",
				"state" => "VIC",
				"lat" => "-37.97103",
				"lon" => "145.148499"
			],
			[
				"postcode" => "3173",
				"suburb" => "KEYSBOROUGH",
				"state" => "VIC",
				"lat" => "-37.989707",
				"lon" => "145.149037"
			],
			[
				"postcode" => "3174",
				"suburb" => "NOBLE PARK",
				"state" => "VIC",
				"lat" => "-37.967254",
				"lon" => "145.176167"
			],
			[
				"postcode" => "3174",
				"suburb" => "NOBLE PARK EAST",
				"state" => "VIC",
				"lat" => "-37.94488",
				"lon" => "145.17965"
			],
			[
				"postcode" => "3174",
				"suburb" => "NOBLE PARK NORTH",
				"state" => "VIC",
				"lat" => "-37.9547",
				"lon" => "145.192117"
			],
			[
				"postcode" => "3175",
				"suburb" => "BANGHOLME",
				"state" => "VIC",
				"lat" => "-38.033107",
				"lon" => "145.179482"
			],
			[
				"postcode" => "3175",
				"suburb" => "DANDENONG",
				"state" => "VIC",
				"lat" => "-37.987271",
				"lon" => "145.214317"
			],
			[
				"postcode" => "3175",
				"suburb" => "DANDENONG EAST",
				"state" => "VIC",
				"lat" => "-38.13467",
				"lon" => "145.129955"
			],
			[
				"postcode" => "3175",
				"suburb" => "DANDENONG NORTH",
				"state" => "VIC",
				"lat" => "-37.965724",
				"lon" => "145.205645"
			],
			[
				"postcode" => "3175",
				"suburb" => "DANDENONG SOUTH",
				"state" => "VIC",
				"lat" => "-38.034031",
				"lon" => "145.201711"
			],
			[
				"postcode" => "3175",
				"suburb" => "DUNEARN",
				"state" => "VIC",
				"lat" => "-37.967601",
				"lon" => "145.202509"
			],
			[
				"postcode" => "3177",
				"suburb" => "DOVETON",
				"state" => "VIC",
				"lat" => "-37.995245",
				"lon" => "145.240156"
			],
			[
				"postcode" => "3177",
				"suburb" => "EUMEMMERRING",
				"state" => "VIC",
				"lat" => "-37.997711",
				"lon" => "145.250273"
			],
			[
				"postcode" => "3178",
				"suburb" => "ROWVILLE",
				"state" => "VIC",
				"lat" => "-37.928005",
				"lon" => "145.235811"
			],
			[
				"postcode" => "3179",
				"suburb" => "SCORESBY",
				"state" => "VIC",
				"lat" => "-37.864883",
				"lon" => "145.26427"
			],
			[
				"postcode" => "3180",
				"suburb" => "KNOXFIELD",
				"state" => "VIC",
				"lat" => "-37.888895",
				"lon" => "145.248383"
			],
			[
				"postcode" => "3181",
				"suburb" => "PRAHRAN",
				"state" => "VIC",
				"lat" => "-37.849577",
				"lon" => "144.993714"
			],
			[
				"postcode" => "3181",
				"suburb" => "PRAHRAN EAST",
				"state" => "VIC",
				"lat" => "-37.855396",
				"lon" => "145.039566"
			],
			[
				"postcode" => "3181",
				"suburb" => "WINDSOR",
				"state" => "VIC",
				"lat" => "-37.856159",
				"lon" => "144.9922"
			],
			[
				"postcode" => "3182",
				"suburb" => "ST KILDA",
				"state" => "VIC",
				"lat" => "-37.867573",
				"lon" => "144.978814"
			],
			[
				"postcode" => "3182",
				"suburb" => "ST KILDA WEST",
				"state" => "VIC",
				"lat" => "-37.860901",
				"lon" => "144.972523"
			],
			[
				"postcode" => "3183",
				"suburb" => "BALACLAVA",
				"state" => "VIC",
				"lat" => "-37.869023",
				"lon" => "144.995478"
			],
			[
				"postcode" => "3183",
				"suburb" => "ST KILDA EAST",
				"state" => "VIC",
				"lat" => "-37.866458",
				"lon" => "145.000047"
			],
			[
				"postcode" => "3184",
				"suburb" => "BRIGHTON ROAD",
				"state" => "VIC",
				"lat" => "-37.882825",
				"lon" => "144.996354"
			],
			[
				"postcode" => "3184",
				"suburb" => "ELWOOD",
				"state" => "VIC",
				"lat" => "-37.888121",
				"lon" => "144.985026"
			],
			[
				"postcode" => "3185",
				"suburb" => "ELSTERNWICK",
				"state" => "VIC",
				"lat" => "-37.884724",
				"lon" => "145.004153"
			],
			[
				"postcode" => "3185",
				"suburb" => "GARDENVALE",
				"state" => "VIC",
				"lat" => "-37.896915",
				"lon" => "145.005249"
			],
			[
				"postcode" => "3185",
				"suburb" => "RIPPONLEA",
				"state" => "VIC",
				"lat" => "-37.876692",
				"lon" => "144.996194"
			],
			[
				"postcode" => "3186",
				"suburb" => "BRIGHTON",
				"state" => "VIC",
				"lat" => "-37.913149",
				"lon" => "144.991682"
			],
			[
				"postcode" => "3186",
				"suburb" => "BRIGHTON NORTH",
				"state" => "VIC",
				"lat" => "-37.903864",
				"lon" => "145.001899"
			],
			[
				"postcode" => "3186",
				"suburb" => "DENDY",
				"state" => "VIC",
				"lat" => "-37.919885",
				"lon" => "144.996826"
			],
			[
				"postcode" => "3187",
				"suburb" => "BRIGHTON EAST",
				"state" => "VIC",
				"lat" => "-37.904879",
				"lon" => "145.002603"
			],
			[
				"postcode" => "3187",
				"suburb" => "NORTH ROAD",
				"state" => "VIC",
				"lat" => "-37.90106",
				"lon" => "145.01669"
			],
			[
				"postcode" => "3188",
				"suburb" => "HAMPTON EAST",
				"state" => "VIC",
				"lat" => "-37.933603",
				"lon" => "145.034175"
			],
			[
				"postcode" => "3188",
				"suburb" => "HAMPTON NORTH",
				"state" => "VIC",
				"lat" => "-37.89802",
				"lon" => "144.991601"
			],
			[
				"postcode" => "3189",
				"suburb" => "MOORABBIN",
				"state" => "VIC",
				"lat" => "-37.934352",
				"lon" => "145.036735"
			],
			[
				"postcode" => "3189",
				"suburb" => "WISHART",
				"state" => "VIC",
				"lat" => "-38.61358",
				"lon" => "145.581353"
			],
			[
				"postcode" => "3190",
				"suburb" => "HIGHETT",
				"state" => "VIC",
				"lat" => "-37.947848",
				"lon" => "145.034294"
			],
			[
				"postcode" => "3191",
				"suburb" => "SANDRINGHAM",
				"state" => "VIC",
				"lat" => "-37.952493",
				"lon" => "145.012316"
			],
			[
				"postcode" => "3192",
				"suburb" => "CHELTENHAM",
				"state" => "VIC",
				"lat" => "-37.96451",
				"lon" => "145.055873"
			],
			[
				"postcode" => "3192",
				"suburb" => "CHELTENHAM EAST",
				"state" => "VIC",
				"lat" => "-37.965351",
				"lon" => "145.068392"
			],
			[
				"postcode" => "3192",
				"suburb" => "CHELTENHAM NORTH",
				"state" => "VIC",
				"lat" => "-37.930579",
				"lon" => "145.033786"
			],
			[
				"postcode" => "3192",
				"suburb" => "SOUTHLAND CENTRE",
				"state" => "VIC",
				"lat" => "-37.958621",
				"lon" => "145.052468"
			],
			[
				"postcode" => "3193",
				"suburb" => "BEAUMARIS",
				"state" => "VIC",
				"lat" => "-37.986285",
				"lon" => "145.032876"
			],
			[
				"postcode" => "3193",
				"suburb" => "BLACK ROCK",
				"state" => "VIC",
				"lat" => "-37.973503",
				"lon" => "145.01658"
			],
			[
				"postcode" => "3193",
				"suburb" => "BLACK ROCK NORTH",
				"state" => "VIC",
				"lat" => "-37.985535",
				"lon" => "145.034742"
			],
			[
				"postcode" => "3193",
				"suburb" => "CROMER",
				"state" => "VIC",
				"lat" => "-37.98452",
				"lon" => "145.0451"
			],
			[
				"postcode" => "3194",
				"suburb" => "MENTONE",
				"state" => "VIC",
				"lat" => "-37.982859",
				"lon" => "145.0649"
			],
			[
				"postcode" => "3194",
				"suburb" => "MENTONE EAST",
				"state" => "VIC",
				"lat" => "-37.986195",
				"lon" => "145.03462"
			],
			[
				"postcode" => "3194",
				"suburb" => "MOORABBIN AIRPORT",
				"state" => "VIC",
				"lat" => "-37.977934",
				"lon" => "145.09892"
			],
			[
				"postcode" => "3195",
				"suburb" => "ASPENDALE",
				"state" => "VIC",
				"lat" => "-38.026479",
				"lon" => "145.101908"
			],
			[
				"postcode" => "3195",
				"suburb" => "ASPENDALE GARDENS",
				"state" => "VIC",
				"lat" => "-38.023456",
				"lon" => "145.118374"
			],
			[
				"postcode" => "3195",
				"suburb" => "BRAESIDE",
				"state" => "VIC",
				"lat" => "-38.008295",
				"lon" => "145.112478"
			],
			[
				"postcode" => "3195",
				"suburb" => "MORDIALLOC",
				"state" => "VIC",
				"lat" => "-38.007154",
				"lon" => "145.086849"
			],
			[
				"postcode" => "3195",
				"suburb" => "PARKDALE",
				"state" => "VIC",
				"lat" => "-37.992659",
				"lon" => "145.075479"
			],
			[
				"postcode" => "3195",
				"suburb" => "WATERWAYS",
				"state" => "VIC",
				"lat" => "-38.008051",
				"lon" => "145.110473"
			],
			[
				"postcode" => "3196",
				"suburb" => "BONBEACH",
				"state" => "VIC",
				"lat" => "-38.062472",
				"lon" => "145.119404"
			],
			[
				"postcode" => "3196",
				"suburb" => "CHELSEA",
				"state" => "VIC",
				"lat" => "-38.052346",
				"lon" => "145.115941"
			],
			[
				"postcode" => "3196",
				"suburb" => "CHELSEA HEIGHTS",
				"state" => "VIC",
				"lat" => "-38.045473",
				"lon" => "145.135901"
			],
			[
				"postcode" => "3196",
				"suburb" => "EDITHVALE",
				"state" => "VIC",
				"lat" => "-38.037415",
				"lon" => "145.107846"
			],
			[
				"postcode" => "3197",
				"suburb" => "CARRUM",
				"state" => "VIC",
				"lat" => "-38.076364",
				"lon" => "145.123205"
			],
			[
				"postcode" => "3197",
				"suburb" => "PATTERSON LAKES",
				"state" => "VIC",
				"lat" => "-38.067368",
				"lon" => "145.144762"
			],
			[
				"postcode" => "3198",
				"suburb" => "BELVEDERE PARK",
				"state" => "VIC",
				"lat" => "-38.10667",
				"lon" => "145.158496"
			],
			[
				"postcode" => "3198",
				"suburb" => "SEAFORD",
				"state" => "VIC",
				"lat" => "-38.110191",
				"lon" => "145.142512"
			],
			[
				"postcode" => "3199",
				"suburb" => "FRANKSTON",
				"state" => "VIC",
				"lat" => "-38.145001",
				"lon" => "145.122477"
			],
			[
				"postcode" => "3199",
				"suburb" => "FRANKSTON EAST",
				"state" => "VIC",
				"lat" => "-38.146186",
				"lon" => "145.145408"
			],
			[
				"postcode" => "3199",
				"suburb" => "FRANKSTON HEIGHTS",
				"state" => "VIC",
				"lat" => "-38.126908",
				"lon" => "145.136323"
			],
			[
				"postcode" => "3199",
				"suburb" => "FRANKSTON SOUTH",
				"state" => "VIC",
				"lat" => "-38.156538",
				"lon" => "145.123524"
			],
			[
				"postcode" => "3199",
				"suburb" => "KARINGAL",
				"state" => "VIC",
				"lat" => "-38.143729",
				"lon" => "145.160676"
			],
			[
				"postcode" => "3199",
				"suburb" => "KARINGAL CENTRE",
				"state" => "VIC",
				"lat" => "-38.143729",
				"lon" => "145.160676"
			],
			[
				"postcode" => "3200",
				"suburb" => "FRANKSTON NORTH",
				"state" => "VIC",
				"lat" => "-38.165002",
				"lon" => "145.188595"
			],
			[
				"postcode" => "3200",
				"suburb" => "PINES FOREST",
				"state" => "VIC",
				"lat" => "-38.122727",
				"lon" => "145.151093"
			],
			[
				"postcode" => "3201",
				"suburb" => "CARRUM DOWNS",
				"state" => "VIC",
				"lat" => "-38.090783",
				"lon" => "145.191719"
			],
			[
				"postcode" => "3202",
				"suburb" => "HEATHERTON",
				"state" => "VIC",
				"lat" => "-37.969954",
				"lon" => "145.214164"
			],
			[
				"postcode" => "3204",
				"suburb" => "BENTLEIGH",
				"state" => "VIC",
				"lat" => "-37.918057",
				"lon" => "145.035444"
			],
			[
				"postcode" => "3204",
				"suburb" => "MCKINNON",
				"state" => "VIC",
				"lat" => "-37.910967",
				"lon" => "145.037483"
			],
			[
				"postcode" => "3204",
				"suburb" => "ORMOND",
				"state" => "VIC",
				"lat" => "-37.904059",
				"lon" => "145.040899"
			],
			[
				"postcode" => "3204",
				"suburb" => "PATTERSON",
				"state" => "VIC",
				"lat" => "-37.925967",
				"lon" => "145.038194"
			],
			[
				"postcode" => "3205",
				"suburb" => "SOUTH MELBOURNE",
				"state" => "VIC",
				"lat" => "-37.93291",
				"lon" => "145.033718"
			],
			[
				"postcode" => "3206",
				"suburb" => "ALBERT PARK",
				"state" => "VIC",
				"lat" => "-37.840705",
				"lon" => "144.95571"
			],
			[
				"postcode" => "3206",
				"suburb" => "MIDDLE PARK",
				"state" => "VIC",
				"lat" => "-37.849721",
				"lon" => "144.965136"
			],
			[
				"postcode" => "3207",
				"suburb" => "GARDEN CITY",
				"state" => "VIC",
				"lat" => "-37.829244",
				"lon" => "144.956207"
			],
			[
				"postcode" => "3207",
				"suburb" => "PORT MELBOURNE",
				"state" => "VIC",
				"lat" => "-37.975682",
				"lon" => "145.030468"
			],
			[
				"postcode" => "3211",
				"suburb" => "LITTLE RIVER",
				"state" => "VIC",
				"lat" => "-37.971627",
				"lon" => "144.526585"
			],
			[
				"postcode" => "3212",
				"suburb" => "LARA",
				"state" => "VIC",
				"lat" => "-38.022416",
				"lon" => "144.407891"
			],
			[
				"postcode" => "3212",
				"suburb" => "POINT WILSON",
				"state" => "VIC",
				"lat" => "-38.086796",
				"lon" => "144.506744"
			],
			[
				"postcode" => "3214",
				"suburb" => "CORIO",
				"state" => "VIC",
				"lat" => "-38.074162",
				"lon" => "144.358659"
			],
			[
				"postcode" => "3214",
				"suburb" => "NORLANE",
				"state" => "VIC",
				"lat" => "-38.099498",
				"lon" => "144.360982"
			],
			[
				"postcode" => "3214",
				"suburb" => "NORTH SHORE",
				"state" => "VIC",
				"lat" => "-38.0993",
				"lon" => "144.371887"
			],
			[
				"postcode" => "3215",
				"suburb" => "BELL PARK",
				"state" => "VIC",
				"lat" => "-38.113738",
				"lon" => "144.330983"
			],
			[
				"postcode" => "3215",
				"suburb" => "BELL POST HILL",
				"state" => "VIC",
				"lat" => "-38.097317",
				"lon" => "144.323541"
			],
			[
				"postcode" => "3215",
				"suburb" => "DRUMCONDRA",
				"state" => "VIC",
				"lat" => "-38.132518",
				"lon" => "144.351714"
			],
			[
				"postcode" => "3215",
				"suburb" => "GEELONG NORTH",
				"state" => "VIC",
				"lat" => "-38.110822",
				"lon" => "144.343406"
			],
			[
				"postcode" => "3215",
				"suburb" => "HAMLYN HEIGHTS",
				"state" => "VIC",
				"lat" => "-38.121956",
				"lon" => "144.328051"
			],
			[
				"postcode" => "3215",
				"suburb" => "NORTH GEELONG",
				"state" => "VIC",
				"lat" => "-38.110822",
				"lon" => "144.343406"
			],
			[
				"postcode" => "3215",
				"suburb" => "RIPPLESIDE",
				"state" => "VIC",
				"lat" => "-38.128049",
				"lon" => "144.355394"
			],
			[
				"postcode" => "3216",
				"suburb" => "BELMONT",
				"state" => "VIC",
				"lat" => "-38.175587",
				"lon" => "144.342666"
			],
			[
				"postcode" => "3216",
				"suburb" => "FRESHWATER CREEK",
				"state" => "VIC",
				"lat" => "-38.284774",
				"lon" => "144.269652"
			],
			[
				"postcode" => "3216",
				"suburb" => "GROVEDALE",
				"state" => "VIC",
				"lat" => "-38.200538",
				"lon" => "144.323683"
			],
			[
				"postcode" => "3216",
				"suburb" => "GROVEDALE EAST",
				"state" => "VIC",
				"lat" => "-38.208841",
				"lon" => "144.328038"
			],
			[
				"postcode" => "3216",
				"suburb" => "HIGHTON",
				"state" => "VIC",
				"lat" => "-38.170938",
				"lon" => "144.31905"
			],
			[
				"postcode" => "3216",
				"suburb" => "MOUNT DUNEED",
				"state" => "VIC",
				"lat" => "-38.24927",
				"lon" => "144.338652"
			],
			[
				"postcode" => "3216",
				"suburb" => "WANDANA HEIGHTS",
				"state" => "VIC",
				"lat" => "-38.169419",
				"lon" => "144.303375"
			],
			[
				"postcode" => "3216",
				"suburb" => "WAURN PONDS",
				"state" => "VIC",
				"lat" => "-38.214211",
				"lon" => "144.292324"
			],
			[
				"postcode" => "3217",
				"suburb" => "DEAKIN UNIVERSITY",
				"state" => "VIC",
				"lat" => "-38.198946",
				"lon" => "144.297736"
			],
			[
				"postcode" => "3218",
				"suburb" => "GEELONG WEST",
				"state" => "VIC",
				"lat" => "-38.142148",
				"lon" => "144.348006"
			],
			[
				"postcode" => "3218",
				"suburb" => "HERNE HILL",
				"state" => "VIC",
				"lat" => "-38.133564",
				"lon" => "144.331213"
			],
			[
				"postcode" => "3218",
				"suburb" => "MANIFOLD HEIGHTS",
				"state" => "VIC",
				"lat" => "-38.139542",
				"lon" => "144.330072"
			],
			[
				"postcode" => "3219",
				"suburb" => "BREAKWATER",
				"state" => "VIC",
				"lat" => "-38.180291",
				"lon" => "144.382352"
			],
			[
				"postcode" => "3219",
				"suburb" => "EAST GEELONG",
				"state" => "VIC",
				"lat" => "-38.162171",
				"lon" => "144.378088"
			],
			[
				"postcode" => "3219",
				"suburb" => "NEWCOMB",
				"state" => "VIC",
				"lat" => "-38.169089",
				"lon" => "144.387388"
			],
			[
				"postcode" => "3219",
				"suburb" => "ST ALBANS PARK",
				"state" => "VIC",
				"lat" => "-38.192769",
				"lon" => "144.387321"
			],
			[
				"postcode" => "3219",
				"suburb" => "THOMSON",
				"state" => "VIC",
				"lat" => "-38.170044",
				"lon" => "144.380797"
			],
			[
				"postcode" => "3219",
				"suburb" => "WHITTINGTON",
				"state" => "VIC",
				"lat" => "-38.178536",
				"lon" => "144.389963"
			],
			[
				"postcode" => "3220",
				"suburb" => "BAREENA",
				"state" => "VIC",
				"lat" => "-38.181164",
				"lon" => "145.109544"
			],
			[
				"postcode" => "3220",
				"suburb" => "GEELONG",
				"state" => "VIC",
				"lat" => "-38.14729",
				"lon" => "144.360735"
			],
			[
				"postcode" => "3220",
				"suburb" => "NEWTOWN",
				"state" => "VIC",
				"lat" => "-38.153717",
				"lon" => "144.334977"
			],
			[
				"postcode" => "3220",
				"suburb" => "SOUTH GEELONG",
				"state" => "VIC",
				"lat" => "-38.161708",
				"lon" => "144.354122"
			],
			[
				"postcode" => "3221",
				"suburb" => "ANAKIE",
				"state" => "VIC",
				"lat" => "-37.896843",
				"lon" => "144.253862"
			],
			[
				"postcode" => "3221",
				"suburb" => "BARRABOOL",
				"state" => "VIC",
				"lat" => "-38.16997",
				"lon" => "144.226425"
			],
			[
				"postcode" => "3221",
				"suburb" => "BATESFORD",
				"state" => "VIC",
				"lat" => "-38.088082",
				"lon" => "144.274343"
			],
			[
				"postcode" => "3221",
				"suburb" => "BELLARINE",
				"state" => "VIC",
				"lat" => "-38.130331",
				"lon" => "144.621908"
			],
			[
				"postcode" => "3221",
				"suburb" => "CERES",
				"state" => "VIC",
				"lat" => "-38.172189",
				"lon" => "144.25895"
			],
			[
				"postcode" => "3221",
				"suburb" => "FYANSFORD",
				"state" => "VIC",
				"lat" => "-38.14232",
				"lon" => "144.308137"
			],
			[
				"postcode" => "3221",
				"suburb" => "GNARWARRE",
				"state" => "VIC",
				"lat" => "-38.168643",
				"lon" => "144.160558"
			],
			[
				"postcode" => "3221",
				"suburb" => "GREY RIVER",
				"state" => "VIC",
				"lat" => "-38.683577",
				"lon" => "143.839267"
			],
			[
				"postcode" => "3221",
				"suburb" => "KENNETT RIVER",
				"state" => "VIC",
				"lat" => "-38.666687",
				"lon" => "143.86199"
			],
			[
				"postcode" => "3221",
				"suburb" => "LOVELY BANKS",
				"state" => "VIC",
				"lat" => "-38.07927",
				"lon" => "144.318144"
			],
			[
				"postcode" => "3221",
				"suburb" => "MOOLAP",
				"state" => "VIC",
				"lat" => "-38.173006",
				"lon" => "144.421246"
			],
			[
				"postcode" => "3221",
				"suburb" => "MOORABOOL",
				"state" => "VIC",
				"lat" => "-38.057464",
				"lon" => "144.278005"
			],
			[
				"postcode" => "3221",
				"suburb" => "MURGHEBOLUC",
				"state" => "VIC",
				"lat" => "-38.106304",
				"lon" => "144.136517"
			],
			[
				"postcode" => "3221",
				"suburb" => "SEPARATION CREEK",
				"state" => "VIC",
				"lat" => "-38.633456",
				"lon" => "143.893806"
			],
			[
				"postcode" => "3221",
				"suburb" => "STAUGHTON VALE",
				"state" => "VIC",
				"lat" => "-37.854746",
				"lon" => "144.28058"
			],
			[
				"postcode" => "3221",
				"suburb" => "STONEHAVEN",
				"state" => "VIC",
				"lat" => "-38.126164",
				"lon" => "144.242063"
			],
			[
				"postcode" => "3221",
				"suburb" => "SUGARLOAF",
				"state" => "VIC",
				"lat" => "-38.696665",
				"lon" => "143.79923"
			],
			[
				"postcode" => "3221",
				"suburb" => "WALLINGTON",
				"state" => "VIC",
				"lat" => "-38.214837",
				"lon" => "144.520638"
			],
			[
				"postcode" => "3221",
				"suburb" => "WONGARRA",
				"state" => "VIC",
				"lat" => "-38.704967",
				"lon" => "143.767791"
			],
			[
				"postcode" => "3221",
				"suburb" => "WYE RIVER",
				"state" => "VIC",
				"lat" => "-38.635001",
				"lon" => "143.890896"
			],
			[
				"postcode" => "3222",
				"suburb" => "CLIFTON SPRINGS",
				"state" => "VIC",
				"lat" => "-38.15748",
				"lon" => "144.561541"
			],
			[
				"postcode" => "3222",
				"suburb" => "CURLEWIS",
				"state" => "VIC",
				"lat" => "-38.184438",
				"lon" => "144.512272"
			],
			[
				"postcode" => "3222",
				"suburb" => "DRYSDALE",
				"state" => "VIC",
				"lat" => "-38.172318",
				"lon" => "144.570987"
			],
			[
				"postcode" => "3222",
				"suburb" => "MANNERIM",
				"state" => "VIC",
				"lat" => "-38.2197",
				"lon" => "144.591314"
			],
			[
				"postcode" => "3222",
				"suburb" => "MARCUS HILL",
				"state" => "VIC",
				"lat" => "-38.260117",
				"lon" => "144.560583"
			],
			[
				"postcode" => "3223",
				"suburb" => "INDENTED HEAD",
				"state" => "VIC",
				"lat" => "-38.139121",
				"lon" => "144.711239"
			],
			[
				"postcode" => "3223",
				"suburb" => "PORTARLINGTON",
				"state" => "VIC",
				"lat" => "-38.114836",
				"lon" => "144.651414"
			],
			[
				"postcode" => "3223",
				"suburb" => "ST LEONARDS",
				"state" => "VIC",
				"lat" => "-38.171243",
				"lon" => "144.717383"
			],
			[
				"postcode" => "3224",
				"suburb" => "LEOPOLD",
				"state" => "VIC",
				"lat" => "-38.183967",
				"lon" => "144.459914"
			],
			[
				"postcode" => "3225",
				"suburb" => "POINT LONSDALE",
				"state" => "VIC",
				"lat" => "-38.286113",
				"lon" => "144.614489"
			],
			[
				"postcode" => "3225",
				"suburb" => "QUEENSCLIFF",
				"state" => "VIC",
				"lat" => "-38.267113",
				"lon" => "144.661329"
			],
			[
				"postcode" => "3225",
				"suburb" => "SWAN BAY",
				"state" => "VIC",
				"lat" => "-38.252385",
				"lon" => "144.616144"
			],
			[
				"postcode" => "3225",
				"suburb" => "SWAN ISLAND",
				"state" => "VIC",
				"lat" => "-38.249982",
				"lon" => "144.688434"
			],
			[
				"postcode" => "3226",
				"suburb" => "OCEAN GROVE",
				"state" => "VIC",
				"lat" => "-38.270293",
				"lon" => "144.540778"
			],
			[
				"postcode" => "3227",
				"suburb" => "BARWON HEADS",
				"state" => "VIC",
				"lat" => "-38.281078",
				"lon" => "144.49179"
			],
			[
				"postcode" => "3227",
				"suburb" => "BREAMLEA",
				"state" => "VIC",
				"lat" => "-38.293801",
				"lon" => "144.395262"
			],
			[
				"postcode" => "3227",
				"suburb" => "CONNEWARRE",
				"state" => "VIC",
				"lat" => "-38.250963",
				"lon" => "144.387919"
			],
			[
				"postcode" => "3228",
				"suburb" => "BELLBRAE",
				"state" => "VIC",
				"lat" => "-38.329558",
				"lon" => "144.262559"
			],
			[
				"postcode" => "3228",
				"suburb" => "BELLS BEACH",
				"state" => "VIC",
				"lat" => "-38.367595",
				"lon" => "144.28172"
			],
			[
				"postcode" => "3228",
				"suburb" => "JAN JUC",
				"state" => "VIC",
				"lat" => "-38.344147",
				"lon" => "144.303646"
			],
			[
				"postcode" => "3228",
				"suburb" => "TORQUAY",
				"state" => "VIC",
				"lat" => "-38.332818",
				"lon" => "144.32389"
			],
			[
				"postcode" => "3230",
				"suburb" => "ANGLESEA",
				"state" => "VIC",
				"lat" => "-38.405129",
				"lon" => "144.189268"
			],
			[
				"postcode" => "3231",
				"suburb" => "AIREYS INLET",
				"state" => "VIC",
				"lat" => "-38.459435",
				"lon" => "144.106892"
			],
			[
				"postcode" => "3231",
				"suburb" => "BIG HILL",
				"state" => "VIC",
				"lat" => "-38.488885",
				"lon" => "144.023772"
			],
			[
				"postcode" => "3231",
				"suburb" => "EASTERN VIEW",
				"state" => "VIC",
				"lat" => "-38.47118",
				"lon" => "144.047598"
			],
			[
				"postcode" => "3231",
				"suburb" => "FAIRHAVEN",
				"state" => "VIC",
				"lat" => "-38.468132",
				"lon" => "144.08437"
			],
			[
				"postcode" => "3231",
				"suburb" => "MOGGS CREEK",
				"state" => "VIC",
				"lat" => "-38.468585",
				"lon" => "144.06487"
			],
			[
				"postcode" => "3232",
				"suburb" => "LORNE",
				"state" => "VIC",
				"lat" => "-38.518801",
				"lon" => "143.99579"
			],
			[
				"postcode" => "3233",
				"suburb" => "APOLLO BAY",
				"state" => "VIC",
				"lat" => "-38.748434",
				"lon" => "143.670432"
			],
			[
				"postcode" => "3233",
				"suburb" => "CAPE OTWAY",
				"state" => "VIC",
				"lat" => "-38.852976",
				"lon" => "143.522782"
			],
			[
				"postcode" => "3233",
				"suburb" => "MARENGO",
				"state" => "VIC",
				"lat" => "-38.76996",
				"lon" => "143.664514"
			],
			[
				"postcode" => "3233",
				"suburb" => "PETTICOAT CREEK",
				"state" => "VIC",
				"lat" => "-38.718949",
				"lon" => "143.725959"
			],
			[
				"postcode" => "3233",
				"suburb" => "SKENES CREEK",
				"state" => "VIC",
				"lat" => "-38.724133",
				"lon" => "143.711487"
			],
			[
				"postcode" => "3233",
				"suburb" => "SKENES CREEK NORTH",
				"state" => "VIC",
				"lat" => "-38.686026",
				"lon" => "143.715192"
			],
			[
				"postcode" => "3235",
				"suburb" => "BENWERRIN",
				"state" => "VIC",
				"lat" => "-38.472753",
				"lon" => "143.93252"
			],
			[
				"postcode" => "3235",
				"suburb" => "BOONAH",
				"state" => "VIC",
				"lat" => "-38.419956",
				"lon" => "143.948435"
			],
			[
				"postcode" => "3235",
				"suburb" => "DEANS MARSH",
				"state" => "VIC",
				"lat" => "-38.39667",
				"lon" => "143.886147"
			],
			[
				"postcode" => "3235",
				"suburb" => "PENNYROYAL",
				"state" => "VIC",
				"lat" => "-38.422717",
				"lon" => "143.836555"
			],
			[
				"postcode" => "3236",
				"suburb" => "FORREST",
				"state" => "VIC",
				"lat" => "-38.51882",
				"lon" => "143.71457"
			],
			[
				"postcode" => "3236",
				"suburb" => "MOUNT SABINE",
				"state" => "VIC",
				"lat" => "-38.62353",
				"lon" => "143.725095"
			],
			[
				"postcode" => "3237",
				"suburb" => "AIRE VALLEY",
				"state" => "VIC",
				"lat" => "-38.693169",
				"lon" => "143.564483"
			],
			[
				"postcode" => "3237",
				"suburb" => "BEECH FOREST",
				"state" => "VIC",
				"lat" => "-38.632695",
				"lon" => "143.561186"
			],
			[
				"postcode" => "3237",
				"suburb" => "GELLIBRAND LOWER",
				"state" => "VIC",
				"lat" => "-38.72801",
				"lon" => "143.252192"
			],
			[
				"postcode" => "3237",
				"suburb" => "WATTLE HILL",
				"state" => "VIC",
				"lat" => "-38.747885",
				"lon" => "143.257897"
			],
			[
				"postcode" => "3237",
				"suburb" => "WEEAPROINAH",
				"state" => "VIC",
				"lat" => "-38.633818",
				"lon" => "143.503912"
			],
			[
				"postcode" => "3237",
				"suburb" => "WYELANGTA",
				"state" => "VIC",
				"lat" => "-38.661019",
				"lon" => "143.454743"
			],
			[
				"postcode" => "3237",
				"suburb" => "YUULONG",
				"state" => "VIC",
				"lat" => "-38.725903",
				"lon" => "143.313646"
			],
			[
				"postcode" => "3238",
				"suburb" => "GLENAIRE",
				"state" => "VIC",
				"lat" => "-38.781787",
				"lon" => "143.429978"
			],
			[
				"postcode" => "3238",
				"suburb" => "HORDERN VALE",
				"state" => "VIC",
				"lat" => "-38.772927",
				"lon" => "143.509048"
			],
			[
				"postcode" => "3238",
				"suburb" => "JOHANNA",
				"state" => "VIC",
				"lat" => "-38.757603",
				"lon" => "143.380466"
			],
			[
				"postcode" => "3238",
				"suburb" => "LAVERS HILL",
				"state" => "VIC",
				"lat" => "-38.679082",
				"lon" => "143.392452"
			],
			[
				"postcode" => "3239",
				"suburb" => "CARLISLE RIVER",
				"state" => "VIC",
				"lat" => "-38.556481",
				"lon" => "143.398828"
			],
			[
				"postcode" => "3239",
				"suburb" => "CHAPPLE VALE",
				"state" => "VIC",
				"lat" => "-38.639761",
				"lon" => "143.309752"
			],
			[
				"postcode" => "3239",
				"suburb" => "GELLIBRAND",
				"state" => "VIC",
				"lat" => "-38.525021",
				"lon" => "143.540186"
			],
			[
				"postcode" => "3239",
				"suburb" => "KENNEDYS CREEK",
				"state" => "VIC",
				"lat" => "-38.5969",
				"lon" => "143.248332"
			],
			[
				"postcode" => "3240",
				"suburb" => "BUCKLEY",
				"state" => "VIC",
				"lat" => "-38.216777",
				"lon" => "144.076977"
			],
			[
				"postcode" => "3240",
				"suburb" => "GHERANG",
				"state" => "VIC",
				"lat" => "-38.240175",
				"lon" => "144.0497"
			],
			[
				"postcode" => "3240",
				"suburb" => "MODEWARRE",
				"state" => "VIC",
				"lat" => "-38.272912",
				"lon" => "144.170663"
			],
			[
				"postcode" => "3240",
				"suburb" => "MORIAC",
				"state" => "VIC",
				"lat" => "-38.241495",
				"lon" => "144.172731"
			],
			[
				"postcode" => "3240",
				"suburb" => "MOUNT MORIAC",
				"state" => "VIC",
				"lat" => "-38.212726",
				"lon" => "144.190017"
			],
			[
				"postcode" => "3240",
				"suburb" => "PARAPARAP",
				"state" => "VIC",
				"lat" => "-38.292979",
				"lon" => "144.193897"
			],
			[
				"postcode" => "3241",
				"suburb" => "BAMBRA",
				"state" => "VIC",
				"lat" => "-38.366594",
				"lon" => "143.946392"
			],
			[
				"postcode" => "3241",
				"suburb" => "OMBERSLEY",
				"state" => "VIC",
				"lat" => "-38.185619",
				"lon" => "143.846877"
			],
			[
				"postcode" => "3241",
				"suburb" => "WENSLEYDALE",
				"state" => "VIC",
				"lat" => "-38.345372",
				"lon" => "144.040955"
			],
			[
				"postcode" => "3241",
				"suburb" => "WINCHELSEA",
				"state" => "VIC",
				"lat" => "-38.243461",
				"lon" => "143.989297"
			],
			[
				"postcode" => "3241",
				"suburb" => "WINCHELSEA SOUTH",
				"state" => "VIC",
				"lat" => "-38.339586",
				"lon" => "143.966264"
			],
			[
				"postcode" => "3241",
				"suburb" => "WURDIBOLUC",
				"state" => "VIC",
				"lat" => "-38.293781",
				"lon" => "144.02637"
			],
			[
				"postcode" => "3242",
				"suburb" => "BIRREGURRA",
				"state" => "VIC",
				"lat" => "-38.314855",
				"lon" => "143.789367"
			],
			[
				"postcode" => "3243",
				"suburb" => "BARWON DOWNS",
				"state" => "VIC",
				"lat" => "-38.468578",
				"lon" => "143.758408"
			],
			[
				"postcode" => "3243",
				"suburb" => "GERANGAMETE",
				"state" => "VIC",
				"lat" => "-38.479503",
				"lon" => "143.735576"
			],
			[
				"postcode" => "3243",
				"suburb" => "MURROON",
				"state" => "VIC",
				"lat" => "-38.426626",
				"lon" => "143.826576"
			],
			[
				"postcode" => "3243",
				"suburb" => "WARNCOORT",
				"state" => "VIC",
				"lat" => "-38.312758",
				"lon" => "143.721438"
			],
			[
				"postcode" => "3243",
				"suburb" => "WHOOREL",
				"state" => "VIC",
				"lat" => "-38.380379",
				"lon" => "143.822207"
			],
			[
				"postcode" => "3249",
				"suburb" => "ALVIE",
				"state" => "VIC",
				"lat" => "-38.244321",
				"lon" => "143.481901"
			],
			[
				"postcode" => "3249",
				"suburb" => "BALINTORE",
				"state" => "VIC",
				"lat" => "-38.274944",
				"lon" => "143.585061"
			],
			[
				"postcode" => "3249",
				"suburb" => "BARONGAROOK",
				"state" => "VIC",
				"lat" => "-38.413808",
				"lon" => "143.583605"
			],
			[
				"postcode" => "3249",
				"suburb" => "BARONGAROOK WEST",
				"state" => "VIC",
				"lat" => "-38.404379",
				"lon" => "143.547697"
			],
			[
				"postcode" => "3249",
				"suburb" => "BARRAMUNGA",
				"state" => "VIC",
				"lat" => "-38.56935",
				"lon" => "143.692959"
			],
			[
				"postcode" => "3249",
				"suburb" => "CORAGULAC",
				"state" => "VIC",
				"lat" => "-38.254894",
				"lon" => "143.536852"
			],
			[
				"postcode" => "3249",
				"suburb" => "CORUNNUN",
				"state" => "VIC",
				"lat" => "-38.280625",
				"lon" => "143.492726"
			],
			[
				"postcode" => "3249",
				"suburb" => "DREEITE",
				"state" => "VIC",
				"lat" => "-38.181027",
				"lon" => "143.516602"
			],
			[
				"postcode" => "3249",
				"suburb" => "DREEITE SOUTH",
				"state" => "VIC",
				"lat" => "-38.19734",
				"lon" => "143.477068"
			],
			[
				"postcode" => "3249",
				"suburb" => "IRREWARRA",
				"state" => "VIC",
				"lat" => "-38.316082",
				"lon" => "143.647693"
			],
			[
				"postcode" => "3249",
				"suburb" => "IRREWILLIPE",
				"state" => "VIC",
				"lat" => "-38.405265",
				"lon" => "143.401036"
			],
			[
				"postcode" => "3249",
				"suburb" => "IRREWILLIPE EAST",
				"state" => "VIC",
				"lat" => "-38.434643",
				"lon" => "143.483722"
			],
			[
				"postcode" => "3249",
				"suburb" => "KAWARREN",
				"state" => "VIC",
				"lat" => "-38.482629",
				"lon" => "143.580706"
			],
			[
				"postcode" => "3249",
				"suburb" => "LARPENT",
				"state" => "VIC",
				"lat" => "-38.359447",
				"lon" => "143.501999"
			],
			[
				"postcode" => "3249",
				"suburb" => "NALANGIL",
				"state" => "VIC",
				"lat" => "-38.317258",
				"lon" => "143.461562"
			],
			[
				"postcode" => "3249",
				"suburb" => "ONDIT",
				"state" => "VIC",
				"lat" => "-38.250573",
				"lon" => "143.637097"
			],
			[
				"postcode" => "3249",
				"suburb" => "PIRRON YALLOCK",
				"state" => "VIC",
				"lat" => "-38.351075",
				"lon" => "143.436796"
			],
			[
				"postcode" => "3249",
				"suburb" => "POMBORNEIT EAST",
				"state" => "VIC",
				"lat" => "-38.294074",
				"lon" => "143.355451"
			],
			[
				"postcode" => "3249",
				"suburb" => "SWAN MARSH",
				"state" => "VIC",
				"lat" => "-38.372377",
				"lon" => "143.385865"
			],
			[
				"postcode" => "3249",
				"suburb" => "TANYBRYN",
				"state" => "VIC",
				"lat" => "-38.654956",
				"lon" => "143.709748"
			],
			[
				"postcode" => "3249",
				"suburb" => "WARRION",
				"state" => "VIC",
				"lat" => "-38.215408",
				"lon" => "143.582584"
			],
			[
				"postcode" => "3249",
				"suburb" => "WOOL WOOL",
				"state" => "VIC",
				"lat" => "-38.212309",
				"lon" => "143.434892"
			],
			[
				"postcode" => "3249",
				"suburb" => "YEO",
				"state" => "VIC",
				"lat" => "-38.388318",
				"lon" => "143.634765"
			],
			[
				"postcode" => "3249",
				"suburb" => "YEODENE",
				"state" => "VIC",
				"lat" => "-38.397487",
				"lon" => "143.693909"
			],
			[
				"postcode" => "3250",
				"suburb" => "COLAC",
				"state" => "VIC",
				"lat" => "-38.339298",
				"lon" => "143.58166"
			],
			[
				"postcode" => "3250",
				"suburb" => "COLAC EAST",
				"state" => "VIC",
				"lat" => "-38.334962",
				"lon" => "143.610172"
			],
			[
				"postcode" => "3250",
				"suburb" => "COLAC WEST",
				"state" => "VIC",
				"lat" => "-38.33741",
				"lon" => "143.571934"
			],
			[
				"postcode" => "3250",
				"suburb" => "ELLIMINYT",
				"state" => "VIC",
				"lat" => "-38.367034",
				"lon" => "143.58264"
			],
			[
				"postcode" => "3251",
				"suburb" => "BEEAC",
				"state" => "VIC",
				"lat" => "-38.193925",
				"lon" => "143.640459"
			],
			[
				"postcode" => "3251",
				"suburb" => "CUNDARE NORTH",
				"state" => "VIC",
				"lat" => "-38.110935",
				"lon" => "143.565124"
			],
			[
				"postcode" => "3251",
				"suburb" => "EURACK",
				"state" => "VIC",
				"lat" => "-38.145536",
				"lon" => "143.710447"
			],
			[
				"postcode" => "3251",
				"suburb" => "WEERING",
				"state" => "VIC",
				"lat" => "-38.094341",
				"lon" => "143.690365"
			],
			[
				"postcode" => "3254",
				"suburb" => "COROROOKE",
				"state" => "VIC",
				"lat" => "-38.296263",
				"lon" => "143.522505"
			],
			[
				"postcode" => "3260",
				"suburb" => "BOOKAAR",
				"state" => "VIC",
				"lat" => "-38.134947",
				"lon" => "143.102803"
			],
			[
				"postcode" => "3260",
				"suburb" => "BOSTOCKS CREEK",
				"state" => "VIC",
				"lat" => "-38.296169",
				"lon" => "143.115205"
			],
			[
				"postcode" => "3260",
				"suburb" => "BUNGADOR",
				"state" => "VIC",
				"lat" => "-38.438373",
				"lon" => "143.328801"
			],
			[
				"postcode" => "3260",
				"suburb" => "CAMPERDOWN",
				"state" => "VIC",
				"lat" => "-38.232708",
				"lon" => "143.146911"
			],
			[
				"postcode" => "3260",
				"suburb" => "CARPENDEIT",
				"state" => "VIC",
				"lat" => "-38.380341",
				"lon" => "143.258021"
			],
			[
				"postcode" => "3260",
				"suburb" => "CHOCOLYN",
				"state" => "VIC",
				"lat" => "-38.195394",
				"lon" => "143.213576"
			],
			[
				"postcode" => "3260",
				"suburb" => "GNOTUK",
				"state" => "VIC",
				"lat" => "-38.207809",
				"lon" => "143.104686"
			],
			[
				"postcode" => "3260",
				"suburb" => "KARIAH",
				"state" => "VIC",
				"lat" => "-38.147055",
				"lon" => "143.22677"
			],
			[
				"postcode" => "3260",
				"suburb" => "KOALLAH",
				"state" => "VIC",
				"lat" => "-38.293712",
				"lon" => "143.241732"
			],
			[
				"postcode" => "3260",
				"suburb" => "LESLIE MANOR",
				"state" => "VIC",
				"lat" => "-38.133271",
				"lon" => "143.356149"
			],
			[
				"postcode" => "3260",
				"suburb" => "POMBORNEIT",
				"state" => "VIC",
				"lat" => "-38.29677",
				"lon" => "143.298926"
			],
			[
				"postcode" => "3260",
				"suburb" => "POMBORNEIT NORTH",
				"state" => "VIC",
				"lat" => "-38.22066",
				"lon" => "143.355624"
			],
			[
				"postcode" => "3260",
				"suburb" => "SKIBO",
				"state" => "VIC",
				"lat" => "-38.199825",
				"lon" => "143.131904"
			],
			[
				"postcode" => "3260",
				"suburb" => "SOUTH PURRUMBETE",
				"state" => "VIC",
				"lat" => "-38.367171",
				"lon" => "143.214364"
			],
			[
				"postcode" => "3260",
				"suburb" => "STONYFORD",
				"state" => "VIC",
				"lat" => "-38.325844",
				"lon" => "143.340311"
			],
			[
				"postcode" => "3260",
				"suburb" => "TANDAROOK",
				"state" => "VIC",
				"lat" => "-38.329228",
				"lon" => "143.177254"
			],
			[
				"postcode" => "3260",
				"suburb" => "TESBURY",
				"state" => "VIC",
				"lat" => "-38.291281",
				"lon" => "143.181217"
			],
			[
				"postcode" => "3260",
				"suburb" => "WEERITE",
				"state" => "VIC",
				"lat" => "-38.255408",
				"lon" => "143.241487"
			],
			[
				"postcode" => "3264",
				"suburb" => "TERANG",
				"state" => "VIC",
				"lat" => "-38.236207",
				"lon" => "142.911483"
			],
			[
				"postcode" => "3265",
				"suburb" => "BOORCAN",
				"state" => "VIC",
				"lat" => "-38.21456",
				"lon" => "143.013298"
			],
			[
				"postcode" => "3265",
				"suburb" => "CUDGEE",
				"state" => "VIC",
				"lat" => "-38.344819",
				"lon" => "142.652003"
			],
			[
				"postcode" => "3265",
				"suburb" => "DIXIE",
				"state" => "VIC",
				"lat" => "-38.299183",
				"lon" => "142.928662"
			],
			[
				"postcode" => "3265",
				"suburb" => "ECKLIN SOUTH",
				"state" => "VIC",
				"lat" => "-38.393462",
				"lon" => "142.910041"
			],
			[
				"postcode" => "3265",
				"suburb" => "ELLERSLIE",
				"state" => "VIC",
				"lat" => "-38.168548",
				"lon" => "142.687023"
			],
			[
				"postcode" => "3265",
				"suburb" => "FRAMLINGHAM",
				"state" => "VIC",
				"lat" => "-38.241844",
				"lon" => "142.711734"
			],
			[
				"postcode" => "3265",
				"suburb" => "FRAMLINGHAM EAST",
				"state" => "VIC",
				"lat" => "-38.20016",
				"lon" => "142.69827"
			],
			[
				"postcode" => "3265",
				"suburb" => "GARVOC",
				"state" => "VIC",
				"lat" => "-38.298057",
				"lon" => "142.80421"
			],
			[
				"postcode" => "3265",
				"suburb" => "GLENORMISTON NORTH",
				"state" => "VIC",
				"lat" => "-38.145768",
				"lon" => "142.966197"
			],
			[
				"postcode" => "3265",
				"suburb" => "GLENORMISTON SOUTH",
				"state" => "VIC",
				"lat" => "-38.160502",
				"lon" => "142.970512"
			],
			[
				"postcode" => "3265",
				"suburb" => "KOLORA",
				"state" => "VIC",
				"lat" => "-38.136481",
				"lon" => "142.882808"
			],
			[
				"postcode" => "3265",
				"suburb" => "LAANG",
				"state" => "VIC",
				"lat" => "-38.354958",
				"lon" => "142.814975"
			],
			[
				"postcode" => "3265",
				"suburb" => "NOORAT",
				"state" => "VIC",
				"lat" => "-38.191027",
				"lon" => "142.929541"
			],
			[
				"postcode" => "3265",
				"suburb" => "NOORAT EAST",
				"state" => "VIC",
				"lat" => "-38.20797",
				"lon" => "142.973112"
			],
			[
				"postcode" => "3265",
				"suburb" => "PANMURE",
				"state" => "VIC",
				"lat" => "-38.337534",
				"lon" => "142.725221"
			],
			[
				"postcode" => "3265",
				"suburb" => "TAROON",
				"state" => "VIC",
				"lat" => "-38.34207",
				"lon" => "142.872698"
			],
			[
				"postcode" => "3265",
				"suburb" => "THE SISTERS",
				"state" => "VIC",
				"lat" => "-38.198076",
				"lon" => "142.769514"
			],
			[
				"postcode" => "3266",
				"suburb" => "BULLAHARRE",
				"state" => "VIC",
				"lat" => "-38.343488",
				"lon" => "143.141647"
			],
			[
				"postcode" => "3266",
				"suburb" => "COBDEN",
				"state" => "VIC",
				"lat" => "-38.328583",
				"lon" => "143.077199"
			],
			[
				"postcode" => "3266",
				"suburb" => "COBRICO",
				"state" => "VIC",
				"lat" => "-38.29128",
				"lon" => "143.017563"
			],
			[
				"postcode" => "3266",
				"suburb" => "ELINGAMITE",
				"state" => "VIC",
				"lat" => "-38.366951",
				"lon" => "143.0211"
			],
			[
				"postcode" => "3266",
				"suburb" => "ELINGAMITE NORTH",
				"state" => "VIC",
				"lat" => "-38.346708",
				"lon" => "143.014801"
			],
			[
				"postcode" => "3266",
				"suburb" => "GLENFYNE",
				"state" => "VIC",
				"lat" => "-38.401647",
				"lon" => "142.987414"
			],
			[
				"postcode" => "3266",
				"suburb" => "JANCOURT",
				"state" => "VIC",
				"lat" => "-38.368137",
				"lon" => "143.097811"
			],
			[
				"postcode" => "3266",
				"suburb" => "JANCOURT EAST",
				"state" => "VIC",
				"lat" => "-38.38846",
				"lon" => "143.146555"
			],
			[
				"postcode" => "3266",
				"suburb" => "NAROGHID",
				"state" => "VIC",
				"lat" => "-38.260257",
				"lon" => "143.056853"
			],
			[
				"postcode" => "3266",
				"suburb" => "SIMPSON",
				"state" => "VIC",
				"lat" => "-38.496167",
				"lon" => "143.210488"
			],
			[
				"postcode" => "3267",
				"suburb" => "SCOTTS CREEK",
				"state" => "VIC",
				"lat" => "-38.448909",
				"lon" => "143.10623"
			],
			[
				"postcode" => "3268",
				"suburb" => "AYRFORD",
				"state" => "VIC",
				"lat" => "-38.415663",
				"lon" => "142.85945"
			],
			[
				"postcode" => "3268",
				"suburb" => "BRUCKNELL",
				"state" => "VIC",
				"lat" => "-38.466719",
				"lon" => "142.917465"
			],
			[
				"postcode" => "3268",
				"suburb" => "COORIEMUNGLE",
				"state" => "VIC",
				"lat" => "-38.541094",
				"lon" => "143.078426"
			],
			[
				"postcode" => "3268",
				"suburb" => "COWLEYS CREEK",
				"state" => "VIC",
				"lat" => "-38.483271",
				"lon" => "143.054403"
			],
			[
				"postcode" => "3268",
				"suburb" => "CURDIES RIVER",
				"state" => "VIC",
				"lat" => "-38.457871",
				"lon" => "142.956959"
			],
			[
				"postcode" => "3268",
				"suburb" => "CURDIEVALE",
				"state" => "VIC",
				"lat" => "-38.505198",
				"lon" => "142.914428"
			],
			[
				"postcode" => "3268",
				"suburb" => "HEYTESBURY LOWER",
				"state" => "VIC",
				"lat" => "-38.564595",
				"lon" => "142.921624"
			],
			[
				"postcode" => "3268",
				"suburb" => "NEWFIELD",
				"state" => "VIC",
				"lat" => "-38.559974",
				"lon" => "143.010759"
			],
			[
				"postcode" => "3268",
				"suburb" => "NIRRANDA",
				"state" => "VIC",
				"lat" => "-38.500415",
				"lon" => "142.760581"
			],
			[
				"postcode" => "3268",
				"suburb" => "NIRRANDA EAST",
				"state" => "VIC",
				"lat" => "-38.47906",
				"lon" => "142.847696"
			],
			[
				"postcode" => "3268",
				"suburb" => "NIRRANDA SOUTH",
				"state" => "VIC",
				"lat" => "-38.53066",
				"lon" => "142.793949"
			],
			[
				"postcode" => "3268",
				"suburb" => "NULLAWARRE",
				"state" => "VIC",
				"lat" => "-38.469347",
				"lon" => "142.749913"
			],
			[
				"postcode" => "3268",
				"suburb" => "PAARATTE",
				"state" => "VIC",
				"lat" => "-38.54149",
				"lon" => "142.974983"
			],
			[
				"postcode" => "3268",
				"suburb" => "THE COVE",
				"state" => "VIC",
				"lat" => "-38.486643",
				"lon" => "142.70914"
			],
			[
				"postcode" => "3268",
				"suburb" => "TIMBOON",
				"state" => "VIC",
				"lat" => "-38.484442",
				"lon" => "142.981066"
			],
			[
				"postcode" => "3268",
				"suburb" => "TIMBOON WEST",
				"state" => "VIC",
				"lat" => "-38.505198",
				"lon" => "142.914428"
			],
			[
				"postcode" => "3269",
				"suburb" => "PORT CAMPBELL",
				"state" => "VIC",
				"lat" => "-38.619083",
				"lon" => "142.996136"
			],
			[
				"postcode" => "3269",
				"suburb" => "PRINCETOWN",
				"state" => "VIC",
				"lat" => "-38.690367",
				"lon" => "143.156055"
			],
			[
				"postcode" => "3269",
				"suburb" => "WAARRE",
				"state" => "VIC",
				"lat" => "-38.575231",
				"lon" => "143.050126"
			],
			[
				"postcode" => "3270",
				"suburb" => "PETERBOROUGH",
				"state" => "VIC",
				"lat" => "-38.579938",
				"lon" => "142.857049"
			],
			[
				"postcode" => "3271",
				"suburb" => "DARLINGTON",
				"state" => "VIC",
				"lat" => "-37.998527",
				"lon" => "143.051384"
			],
			[
				"postcode" => "3271",
				"suburb" => "DUNDONNELL",
				"state" => "VIC",
				"lat" => "-37.890316",
				"lon" => "142.977335"
			],
			[
				"postcode" => "3271",
				"suburb" => "PURA PURA",
				"state" => "VIC",
				"lat" => "-37.821152",
				"lon" => "143.081778"
			],
			[
				"postcode" => "3272",
				"suburb" => "MORTLAKE",
				"state" => "VIC",
				"lat" => "-38.081236",
				"lon" => "142.807986"
			],
			[
				"postcode" => "3272",
				"suburb" => "WOORNDOO",
				"state" => "VIC",
				"lat" => "-37.876231",
				"lon" => "142.794858"
			],
			[
				"postcode" => "3273",
				"suburb" => "HEXHAM",
				"state" => "VIC",
				"lat" => "-38.057308",
				"lon" => "142.607374"
			],
			[
				"postcode" => "3274",
				"suburb" => "CARAMUT",
				"state" => "VIC",
				"lat" => "-37.912068",
				"lon" => "142.523202"
			],
			[
				"postcode" => "3275",
				"suburb" => "MAILORS FLAT",
				"state" => "VIC",
				"lat" => "-38.301794",
				"lon" => "142.457611"
			],
			[
				"postcode" => "3276",
				"suburb" => "MINJAH",
				"state" => "VIC",
				"lat" => "-38.035006",
				"lon" => "142.441935"
			],
			[
				"postcode" => "3276",
				"suburb" => "WOOLSTHORPE",
				"state" => "VIC",
				"lat" => "-38.16607",
				"lon" => "142.39753"
			],
			[
				"postcode" => "3277",
				"suburb" => "ALLANSFORD",
				"state" => "VIC",
				"lat" => "-38.386474",
				"lon" => "142.590674"
			],
			[
				"postcode" => "3277",
				"suburb" => "MEPUNGA",
				"state" => "VIC",
				"lat" => "-38.433683",
				"lon" => "142.660911"
			],
			[
				"postcode" => "3277",
				"suburb" => "MEPUNGA EAST",
				"state" => "VIC",
				"lat" => "-38.44303",
				"lon" => "142.717555"
			],
			[
				"postcode" => "3277",
				"suburb" => "MEPUNGA WEST",
				"state" => "VIC",
				"lat" => "-38.421839",
				"lon" => "142.643932"
			],
			[
				"postcode" => "3277",
				"suburb" => "NARINGAL",
				"state" => "VIC",
				"lat" => "-38.395724",
				"lon" => "142.689407"
			],
			[
				"postcode" => "3277",
				"suburb" => "NARINGAL EAST",
				"state" => "VIC",
				"lat" => "-38.408509",
				"lon" => "142.798682"
			],
			[
				"postcode" => "3278",
				"suburb" => "PURNIM",
				"state" => "VIC",
				"lat" => "-38.278013",
				"lon" => "142.624719"
			],
			[
				"postcode" => "3278",
				"suburb" => "PURNIM WEST",
				"state" => "VIC",
				"lat" => "-38.300776",
				"lon" => "142.559686"
			],
			[
				"postcode" => "3279",
				"suburb" => "BALLANGEICH",
				"state" => "VIC",
				"lat" => "-38.214555",
				"lon" => "142.657483"
			],
			[
				"postcode" => "3279",
				"suburb" => "WANGOOM",
				"state" => "VIC",
				"lat" => "-38.329882",
				"lon" => "142.578578"
			],
			[
				"postcode" => "3280",
				"suburb" => "DENNINGTON",
				"state" => "VIC",
				"lat" => "-38.35811",
				"lon" => "142.441982"
			],
			[
				"postcode" => "3280",
				"suburb" => "WARRNAMBOOL",
				"state" => "VIC",
				"lat" => "-38.383313",
				"lon" => "142.482959"
			],
			[
				"postcode" => "3280",
				"suburb" => "WARRNAMBOOL EAST",
				"state" => "VIC",
				"lat" => "-38.390915",
				"lon" => "142.497056"
			],
			[
				"postcode" => "3280",
				"suburb" => "WARRNAMBOOL WEST",
				"state" => "VIC",
				"lat" => "-38.37766",
				"lon" => "142.457911"
			],
			[
				"postcode" => "3281",
				"suburb" => "BUSHFIELD",
				"state" => "VIC",
				"lat" => "-38.325329",
				"lon" => "142.505522"
			],
			[
				"postcode" => "3281",
				"suburb" => "GRASSMERE",
				"state" => "VIC",
				"lat" => "-38.286544",
				"lon" => "142.524682"
			],
			[
				"postcode" => "3281",
				"suburb" => "WINSLOW",
				"state" => "VIC",
				"lat" => "-38.244448",
				"lon" => "142.458116"
			],
			[
				"postcode" => "3281",
				"suburb" => "WOODFORD",
				"state" => "VIC",
				"lat" => "-38.313439",
				"lon" => "142.463881"
			],
			[
				"postcode" => "3282",
				"suburb" => "ILLOWA",
				"state" => "VIC",
				"lat" => "-38.32991",
				"lon" => "142.411507"
			],
			[
				"postcode" => "3282",
				"suburb" => "KOROIT",
				"state" => "VIC",
				"lat" => "-38.292155",
				"lon" => "142.367405"
			],
			[
				"postcode" => "3283",
				"suburb" => "CROSSLEY",
				"state" => "VIC",
				"lat" => "-38.313434",
				"lon" => "142.328761"
			],
			[
				"postcode" => "3283",
				"suburb" => "KILLARNEY",
				"state" => "VIC",
				"lat" => "-38.338738",
				"lon" => "142.329837"
			],
			[
				"postcode" => "3283",
				"suburb" => "KIRKSTALL",
				"state" => "VIC",
				"lat" => "-38.270741",
				"lon" => "142.3132"
			],
			[
				"postcode" => "3283",
				"suburb" => "SOUTHERN CROSS",
				"state" => "VIC",
				"lat" => "-38.298693",
				"lon" => "142.428893"
			],
			[
				"postcode" => "3283",
				"suburb" => "TARRONE",
				"state" => "VIC",
				"lat" => "-38.217637",
				"lon" => "142.192786"
			],
			[
				"postcode" => "3283",
				"suburb" => "TOWER HILL",
				"state" => "VIC",
				"lat" => "-38.33373",
				"lon" => "142.356412"
			],
			[
				"postcode" => "3283",
				"suburb" => "WARRONG",
				"state" => "VIC",
				"lat" => "-38.193076",
				"lon" => "142.31918"
			],
			[
				"postcode" => "3283",
				"suburb" => "WILLATOOK",
				"state" => "VIC",
				"lat" => "-38.152712",
				"lon" => "142.255157"
			],
			[
				"postcode" => "3283",
				"suburb" => "YANGERY",
				"state" => "VIC",
				"lat" => "-38.3144",
				"lon" => "142.428986"
			],
			[
				"postcode" => "3283",
				"suburb" => "YARPTURK",
				"state" => "VIC",
				"lat" => "-38.283548",
				"lon" => "142.432861"
			],
			[
				"postcode" => "3284",
				"suburb" => "ORFORD",
				"state" => "VIC",
				"lat" => "-38.214987",
				"lon" => "142.153594"
			],
			[
				"postcode" => "3284",
				"suburb" => "PORT FAIRY",
				"state" => "VIC",
				"lat" => "-38.385516",
				"lon" => "142.236711"
			],
			[
				"postcode" => "3285",
				"suburb" => "CODRINGTON",
				"state" => "VIC",
				"lat" => "-38.272587",
				"lon" => "141.973181"
			],
			[
				"postcode" => "3285",
				"suburb" => "NARRAWONG",
				"state" => "VIC",
				"lat" => "-38.252371",
				"lon" => "141.717039"
			],
			[
				"postcode" => "3285",
				"suburb" => "ROSEBROOK",
				"state" => "VIC",
				"lat" => "-38.351931",
				"lon" => "142.256753"
			],
			[
				"postcode" => "3285",
				"suburb" => "ST HELENS",
				"state" => "VIC",
				"lat" => "-38.244455",
				"lon" => "142.0613"
			],
			[
				"postcode" => "3285",
				"suburb" => "TOOLONG",
				"state" => "VIC",
				"lat" => "-38.318384",
				"lon" => "142.227517"
			],
			[
				"postcode" => "3285",
				"suburb" => "TYRENDARRA",
				"state" => "VIC",
				"lat" => "-38.218374",
				"lon" => "141.780986"
			],
			[
				"postcode" => "3285",
				"suburb" => "TYRENDARRA EAST",
				"state" => "VIC",
				"lat" => "-38.245122",
				"lon" => "141.87849"
			],
			[
				"postcode" => "3285",
				"suburb" => "YAMBUK",
				"state" => "VIC",
				"lat" => "-38.315793",
				"lon" => "142.065127"
			],
			[
				"postcode" => "3286",
				"suburb" => "CONDAH SWAMP",
				"state" => "VIC",
				"lat" => "-37.972228",
				"lon" => "141.833705"
			],
			[
				"postcode" => "3286",
				"suburb" => "KNEBSWORTH",
				"state" => "VIC",
				"lat" => "-38.000472",
				"lon" => "141.870835"
			],
			[
				"postcode" => "3286",
				"suburb" => "MACARTHUR",
				"state" => "VIC",
				"lat" => "-38.034053",
				"lon" => "142.001047"
			],
			[
				"postcode" => "3286",
				"suburb" => "RIPPONHURST",
				"state" => "VIC",
				"lat" => "-37.983824",
				"lon" => "142.108563"
			],
			[
				"postcode" => "3286",
				"suburb" => "WARRABKOOK",
				"state" => "VIC",
				"lat" => "-37.979189",
				"lon" => "142.044275"
			],
			[
				"postcode" => "3287",
				"suburb" => "HAWKESDALE",
				"state" => "VIC",
				"lat" => "-38.106999",
				"lon" => "142.322188"
			],
			[
				"postcode" => "3287",
				"suburb" => "MINHAMITE",
				"state" => "VIC",
				"lat" => "-37.991565",
				"lon" => "142.327342"
			],
			[
				"postcode" => "3289",
				"suburb" => "GAZETTE",
				"state" => "VIC",
				"lat" => "-37.897958",
				"lon" => "142.174884"
			],
			[
				"postcode" => "3289",
				"suburb" => "GERRIGERRUP",
				"state" => "VIC",
				"lat" => "-38.007342",
				"lon" => "142.181224"
			],
			[
				"postcode" => "3289",
				"suburb" => "PENSHURST",
				"state" => "VIC",
				"lat" => "-37.87522",
				"lon" => "142.29024"
			],
			[
				"postcode" => "3289",
				"suburb" => "PURDEET",
				"state" => "VIC",
				"lat" => "-37.923773",
				"lon" => "142.378199"
			],
			[
				"postcode" => "3289",
				"suburb" => "TABOR",
				"state" => "VIC",
				"lat" => "-37.804364",
				"lon" => "142.182405"
			],
			[
				"postcode" => "3292",
				"suburb" => "NELSON",
				"state" => "VIC",
				"lat" => "-38.04659",
				"lon" => "141.006938"
			],
			[
				"postcode" => "3293",
				"suburb" => "GLENTHOMPSON",
				"state" => "VIC",
				"lat" => "-37.636489",
				"lon" => "142.545707"
			],
			[
				"postcode" => "3293",
				"suburb" => "NAREEB",
				"state" => "VIC",
				"lat" => "-37.858467",
				"lon" => "142.565483"
			],
			[
				"postcode" => "3293",
				"suburb" => "NARRAPUMELAP SOUTH",
				"state" => "VIC",
				"lat" => "-37.75697",
				"lon" => "142.641677"
			],
			[
				"postcode" => "3294",
				"suburb" => "DUNKELD",
				"state" => "VIC",
				"lat" => "-37.649713",
				"lon" => "142.344662"
			],
			[
				"postcode" => "3294",
				"suburb" => "KARABEAL",
				"state" => "VIC",
				"lat" => "-37.602979",
				"lon" => "142.21249"
			],
			[
				"postcode" => "3294",
				"suburb" => "MIRRANATWA",
				"state" => "VIC",
				"lat" => "-37.405327",
				"lon" => "142.395682"
			],
			[
				"postcode" => "3294",
				"suburb" => "MOUTAJUP",
				"state" => "VIC",
				"lat" => "-37.665193",
				"lon" => "142.250571"
			],
			[
				"postcode" => "3294",
				"suburb" => "VICTORIA POINT",
				"state" => "VIC",
				"lat" => "-37.525167",
				"lon" => "142.205291"
			],
			[
				"postcode" => "3294",
				"suburb" => "VICTORIA VALLEY",
				"state" => "VIC",
				"lat" => "-37.498531",
				"lon" => "142.333604"
			],
			[
				"postcode" => "3294",
				"suburb" => "WOODHOUSE",
				"state" => "VIC",
				"lat" => "-37.801065",
				"lon" => "142.45467"
			],
			[
				"postcode" => "3300",
				"suburb" => "BYADUK NORTH",
				"state" => "VIC",
				"lat" => "-37.880712",
				"lon" => "141.960066"
			],
			[
				"postcode" => "3300",
				"suburb" => "HAMILTON",
				"state" => "VIC",
				"lat" => "-37.743025",
				"lon" => "142.020065"
			],
			[
				"postcode" => "3301",
				"suburb" => "BOCHARA",
				"state" => "VIC",
				"lat" => "-37.704033",
				"lon" => "141.927084"
			],
			[
				"postcode" => "3301",
				"suburb" => "BROADWATER",
				"state" => "VIC",
				"lat" => "-38.107562",
				"lon" => "142.051206"
			],
			[
				"postcode" => "3301",
				"suburb" => "BUCKLEY SWAMP",
				"state" => "VIC",
				"lat" => "-37.849978",
				"lon" => "142.057186"
			],
			[
				"postcode" => "3301",
				"suburb" => "BYADUK",
				"state" => "VIC",
				"lat" => "-37.952429",
				"lon" => "141.987783"
			],
			[
				"postcode" => "3301",
				"suburb" => "CROXTON EAST",
				"state" => "VIC",
				"lat" => "-37.792699",
				"lon" => "142.261056"
			],
			[
				"postcode" => "3301",
				"suburb" => "HENSLEY PARK",
				"state" => "VIC",
				"lat" => "-37.602933",
				"lon" => "142.057626"
			],
			[
				"postcode" => "3301",
				"suburb" => "MORGIANA",
				"state" => "VIC",
				"lat" => "-37.733163",
				"lon" => "141.849073"
			],
			[
				"postcode" => "3301",
				"suburb" => "MOUNT NAPIER",
				"state" => "VIC",
				"lat" => "-37.89663",
				"lon" => "142.063516"
			],
			[
				"postcode" => "3301",
				"suburb" => "STRATHKELLAR",
				"state" => "VIC",
				"lat" => "-37.717544",
				"lon" => "142.126345"
			],
			[
				"postcode" => "3301",
				"suburb" => "TAHARA",
				"state" => "VIC",
				"lat" => "-37.742435",
				"lon" => "141.702187"
			],
			[
				"postcode" => "3301",
				"suburb" => "TARRINGTON",
				"state" => "VIC",
				"lat" => "-37.767146",
				"lon" => "142.09796"
			],
			[
				"postcode" => "3301",
				"suburb" => "WANNON",
				"state" => "VIC",
				"lat" => "-37.671854",
				"lon" => "141.843327"
			],
			[
				"postcode" => "3301",
				"suburb" => "WARRAYURE",
				"state" => "VIC",
				"lat" => "-37.696837",
				"lon" => "142.205871"
			],
			[
				"postcode" => "3301",
				"suburb" => "YATCHAW",
				"state" => "VIC",
				"lat" => "-37.816126",
				"lon" => "142.099016"
			],
			[
				"postcode" => "3301",
				"suburb" => "YULECART",
				"state" => "VIC",
				"lat" => "-37.748521",
				"lon" => "141.936368"
			],
			[
				"postcode" => "3302",
				"suburb" => "BRANXHOLME",
				"state" => "VIC",
				"lat" => "-37.856656",
				"lon" => "141.794565"
			],
			[
				"postcode" => "3302",
				"suburb" => "GRASSDALE",
				"state" => "VIC",
				"lat" => "-37.792645",
				"lon" => "141.646446"
			],
			[
				"postcode" => "3303",
				"suburb" => "BREAKAWAY CREEK",
				"state" => "VIC",
				"lat" => "-38.03119",
				"lon" => "141.814595"
			],
			[
				"postcode" => "3303",
				"suburb" => "CONDAH",
				"state" => "VIC",
				"lat" => "-37.970084",
				"lon" => "141.732922"
			],
			[
				"postcode" => "3303",
				"suburb" => "HOTSPUR",
				"state" => "VIC",
				"lat" => "-37.926306",
				"lon" => "141.561279"
			],
			[
				"postcode" => "3303",
				"suburb" => "LAKE CONDAH",
				"state" => "VIC",
				"lat" => "-38.093159",
				"lon" => "141.794924"
			],
			[
				"postcode" => "3303",
				"suburb" => "WALLACEDALE",
				"state" => "VIC",
				"lat" => "-37.933651",
				"lon" => "141.810169"
			],
			[
				"postcode" => "3304",
				"suburb" => "BESSIEBELLE",
				"state" => "VIC",
				"lat" => "-38.146567",
				"lon" => "141.966132"
			],
			[
				"postcode" => "3304",
				"suburb" => "DARTMOOR",
				"state" => "VIC",
				"lat" => "-37.922543",
				"lon" => "141.27543"
			],
			[
				"postcode" => "3304",
				"suburb" => "DRIK DRIK",
				"state" => "VIC",
				"lat" => "-38.001508",
				"lon" => "141.286526"
			],
			[
				"postcode" => "3304",
				"suburb" => "DRUMBORG",
				"state" => "VIC",
				"lat" => "-38.091837",
				"lon" => "141.597511"
			],
			[
				"postcode" => "3304",
				"suburb" => "GREENWALD",
				"state" => "VIC",
				"lat" => "-37.953544",
				"lon" => "141.405571"
			],
			[
				"postcode" => "3304",
				"suburb" => "HEYWOOD",
				"state" => "VIC",
				"lat" => "-38.131028",
				"lon" => "141.630332"
			],
			[
				"postcode" => "3304",
				"suburb" => "HOMERTON",
				"state" => "VIC",
				"lat" => "-38.137283",
				"lon" => "141.759184"
			],
			[
				"postcode" => "3304",
				"suburb" => "LYONS",
				"state" => "VIC",
				"lat" => "-38.005981",
				"lon" => "141.503684"
			],
			[
				"postcode" => "3304",
				"suburb" => "MILLTOWN",
				"state" => "VIC",
				"lat" => "-38.043676",
				"lon" => "141.698339"
			],
			[
				"postcode" => "3304",
				"suburb" => "MUMBANNAR",
				"state" => "VIC",
				"lat" => "-37.926374",
				"lon" => "141.186841"
			],
			[
				"postcode" => "3304",
				"suburb" => "MYAMYN",
				"state" => "VIC",
				"lat" => "-38.006326",
				"lon" => "141.720263"
			],
			[
				"postcode" => "3304",
				"suburb" => "WINNAP",
				"state" => "VIC",
				"lat" => "-37.944963",
				"lon" => "141.31758"
			],
			[
				"postcode" => "3305",
				"suburb" => "ALLESTREE",
				"state" => "VIC",
				"lat" => "-38.274855",
				"lon" => "141.646078"
			],
			[
				"postcode" => "3305",
				"suburb" => "BOLWARRA",
				"state" => "VIC",
				"lat" => "-38.281821",
				"lon" => "141.614962"
			],
			[
				"postcode" => "3305",
				"suburb" => "CAPE BRIDGEWATER",
				"state" => "VIC",
				"lat" => "-38.370774",
				"lon" => "141.401813"
			],
			[
				"postcode" => "3305",
				"suburb" => "CASHMORE",
				"state" => "VIC",
				"lat" => "-38.311967",
				"lon" => "141.481232"
			],
			[
				"postcode" => "3305",
				"suburb" => "DUTTON WAY",
				"state" => "VIC",
				"lat" => "-38.313173",
				"lon" => "141.594139"
			],
			[
				"postcode" => "3305",
				"suburb" => "GORAE",
				"state" => "VIC",
				"lat" => "-38.240845",
				"lon" => "141.55627"
			],
			[
				"postcode" => "3305",
				"suburb" => "GORAE WEST",
				"state" => "VIC",
				"lat" => "-38.259661",
				"lon" => "141.500413"
			],
			[
				"postcode" => "3305",
				"suburb" => "HEATHMERE",
				"state" => "VIC",
				"lat" => "-38.222332",
				"lon" => "141.622619"
			],
			[
				"postcode" => "3305",
				"suburb" => "MOUNT RICHMOND",
				"state" => "VIC",
				"lat" => "-38.198109",
				"lon" => "141.358815"
			],
			[
				"postcode" => "3305",
				"suburb" => "PORTLAND",
				"state" => "VIC",
				"lat" => "-38.351032",
				"lon" => "141.587701"
			],
			[
				"postcode" => "3305",
				"suburb" => "PORTLAND NORTH",
				"state" => "VIC",
				"lat" => "-38.314243",
				"lon" => "141.59424"
			],
			[
				"postcode" => "3305",
				"suburb" => "PORTLAND WEST",
				"state" => "VIC",
				"lat" => "-38.342188",
				"lon" => "141.569468"
			],
			[
				"postcode" => "3309",
				"suburb" => "DIGBY",
				"state" => "VIC",
				"lat" => "-37.794364",
				"lon" => "141.500674"
			],
			[
				"postcode" => "3310",
				"suburb" => "MERINO",
				"state" => "VIC",
				"lat" => "-37.720455",
				"lon" => "141.548293"
			],
			[
				"postcode" => "3310",
				"suburb" => "TAHARA WEST",
				"state" => "VIC",
				"lat" => "-37.727284",
				"lon" => "141.639652"
			],
			[
				"postcode" => "3311",
				"suburb" => "CASTERTON",
				"state" => "VIC",
				"lat" => "-37.584211",
				"lon" => "141.405944"
			],
			[
				"postcode" => "3311",
				"suburb" => "CORNDALE",
				"state" => "VIC",
				"lat" => "-37.531494",
				"lon" => "141.289748"
			],
			[
				"postcode" => "3312",
				"suburb" => "BAHGALLAH",
				"state" => "VIC",
				"lat" => "-37.6391",
				"lon" => "141.365747"
			],
			[
				"postcode" => "3312",
				"suburb" => "BRIMBOAL",
				"state" => "VIC",
				"lat" => "-37.404872",
				"lon" => "141.424838"
			],
			[
				"postcode" => "3312",
				"suburb" => "CARAPOOK",
				"state" => "VIC",
				"lat" => "-37.551741",
				"lon" => "141.541128"
			],
			[
				"postcode" => "3312",
				"suburb" => "CHETWYND",
				"state" => "VIC",
				"lat" => "-37.27944",
				"lon" => "141.417184"
			],
			[
				"postcode" => "3312",
				"suburb" => "DERGHOLM",
				"state" => "VIC",
				"lat" => "-37.370335",
				"lon" => "141.215072"
			],
			[
				"postcode" => "3312",
				"suburb" => "DORODONG",
				"state" => "VIC",
				"lat" => "-37.345174",
				"lon" => "141.031936"
			],
			[
				"postcode" => "3312",
				"suburb" => "DUNROBIN",
				"state" => "VIC",
				"lat" => "-37.532697",
				"lon" => "141.382928"
			],
			[
				"postcode" => "3312",
				"suburb" => "HENTY",
				"state" => "VIC",
				"lat" => "-37.660292",
				"lon" => "141.51291"
			],
			[
				"postcode" => "3312",
				"suburb" => "KILLARA",
				"state" => "VIC",
				"lat" => "-37.757082",
				"lon" => "141.407391"
			],
			[
				"postcode" => "3312",
				"suburb" => "LAKE MUNDI",
				"state" => "VIC",
				"lat" => "-37.563526",
				"lon" => "141.059286"
			],
			[
				"postcode" => "3312",
				"suburb" => "LINDSAY",
				"state" => "VIC",
				"lat" => "-37.602358",
				"lon" => "141.067756"
			],
			[
				"postcode" => "3312",
				"suburb" => "NANGEELA",
				"state" => "VIC",
				"lat" => "-37.486133",
				"lon" => "141.361871"
			],
			[
				"postcode" => "3312",
				"suburb" => "POOLAIJELO",
				"state" => "VIC",
				"lat" => "-37.212636",
				"lon" => "141.100756"
			],
			[
				"postcode" => "3312",
				"suburb" => "POWERS CREEK",
				"state" => "VIC",
				"lat" => "-37.196196",
				"lon" => "141.292351"
			],
			[
				"postcode" => "3312",
				"suburb" => "SANDFORD",
				"state" => "VIC",
				"lat" => "-37.610974",
				"lon" => "141.44304"
			],
			[
				"postcode" => "3312",
				"suburb" => "STRATHDOWNIE",
				"state" => "VIC",
				"lat" => "-37.727419",
				"lon" => "141.14483"
			],
			[
				"postcode" => "3312",
				"suburb" => "WANDO BRIDGE",
				"state" => "VIC",
				"lat" => "-37.442491",
				"lon" => "141.423158"
			],
			[
				"postcode" => "3312",
				"suburb" => "WANDO VALE",
				"state" => "VIC",
				"lat" => "-37.517954",
				"lon" => "141.448106"
			],
			[
				"postcode" => "3312",
				"suburb" => "WARROCK",
				"state" => "VIC",
				"lat" => "-37.430567",
				"lon" => "141.290496"
			],
			[
				"postcode" => "3314",
				"suburb" => "BULART",
				"state" => "VIC",
				"lat" => "-37.586718",
				"lon" => "141.935665"
			],
			[
				"postcode" => "3314",
				"suburb" => "CAVENDISH",
				"state" => "VIC",
				"lat" => "-37.526205",
				"lon" => "142.039943"
			],
			[
				"postcode" => "3314",
				"suburb" => "GLENISLA",
				"state" => "VIC",
				"lat" => "-37.243087",
				"lon" => "142.194121"
			],
			[
				"postcode" => "3314",
				"suburb" => "GRAMPIANS",
				"state" => "VIC",
				"lat" => "-37.316714",
				"lon" => "142.484076"
			],
			[
				"postcode" => "3314",
				"suburb" => "MOORALLA",
				"state" => "VIC",
				"lat" => "-37.398976",
				"lon" => "142.099717"
			],
			[
				"postcode" => "3314",
				"suburb" => "WOOHLPOOER",
				"state" => "VIC",
				"lat" => "-37.371558",
				"lon" => "142.160996"
			],
			[
				"postcode" => "3315",
				"suburb" => "BRIT BRIT",
				"state" => "VIC",
				"lat" => "-37.441278",
				"lon" => "141.758617"
			],
			[
				"postcode" => "3315",
				"suburb" => "CLOVER FLAT",
				"state" => "VIC",
				"lat" => "-37.599933",
				"lon" => "141.558767"
			],
			[
				"postcode" => "3315",
				"suburb" => "COLERAINE",
				"state" => "VIC",
				"lat" => "-37.598268",
				"lon" => "141.691125"
			],
			[
				"postcode" => "3315",
				"suburb" => "COOJAR",
				"state" => "VIC",
				"lat" => "-37.348173",
				"lon" => "141.685584"
			],
			[
				"postcode" => "3315",
				"suburb" => "CULLA",
				"state" => "VIC",
				"lat" => "-37.268488",
				"lon" => "141.648637"
			],
			[
				"postcode" => "3315",
				"suburb" => "GRINGEGALGONA",
				"state" => "VIC",
				"lat" => "-37.415905",
				"lon" => "141.808405"
			],
			[
				"postcode" => "3315",
				"suburb" => "GRITJURK",
				"state" => "VIC",
				"lat" => "-37.542228",
				"lon" => "141.78656"
			],
			[
				"postcode" => "3315",
				"suburb" => "HILGAY",
				"state" => "VIC",
				"lat" => "-37.620925",
				"lon" => "141.628411"
			],
			[
				"postcode" => "3315",
				"suburb" => "KONONGWOOTONG",
				"state" => "VIC",
				"lat" => "-37.531865",
				"lon" => "141.681426"
			],
			[
				"postcode" => "3315",
				"suburb" => "MELVILLE FOREST",
				"state" => "VIC",
				"lat" => "-37.513021",
				"lon" => "141.826377"
			],
			[
				"postcode" => "3315",
				"suburb" => "MUNTHAM",
				"state" => "VIC",
				"lat" => "-37.560588",
				"lon" => "141.575279"
			],
			[
				"postcode" => "3315",
				"suburb" => "NAREEN",
				"state" => "VIC",
				"lat" => "-37.371173",
				"lon" => "141.565849"
			],
			[
				"postcode" => "3315",
				"suburb" => "PASCHENDALE",
				"state" => "VIC",
				"lat" => "-37.659196",
				"lon" => "141.594212"
			],
			[
				"postcode" => "3315",
				"suburb" => "TAHARA BRIDGE",
				"state" => "VIC",
				"lat" => "-37.6881",
				"lon" => "141.648325"
			],
			[
				"postcode" => "3315",
				"suburb" => "TARRAYOUKYAN",
				"state" => "VIC",
				"lat" => "-37.327118",
				"lon" => "141.570754"
			],
			[
				"postcode" => "3315",
				"suburb" => "TARRENLEA",
				"state" => "VIC",
				"lat" => "-37.676203",
				"lon" => "141.741339"
			],
			[
				"postcode" => "3315",
				"suburb" => "WOOTONG VALE",
				"state" => "VIC",
				"lat" => "-37.531576",
				"lon" => "141.715919"
			],
			[
				"postcode" => "3317",
				"suburb" => "HARROW",
				"state" => "VIC",
				"lat" => "-37.119835",
				"lon" => "141.600473"
			],
			[
				"postcode" => "3318",
				"suburb" => "CHARAM",
				"state" => "VIC",
				"lat" => "-36.986424",
				"lon" => "141.510896"
			],
			[
				"postcode" => "3318",
				"suburb" => "CONNEWIRRICOO",
				"state" => "VIC",
				"lat" => "-37.191654",
				"lon" => "141.45156"
			],
			[
				"postcode" => "3318",
				"suburb" => "EDENHOPE",
				"state" => "VIC",
				"lat" => "-37.036143",
				"lon" => "141.296235"
			],
			[
				"postcode" => "3318",
				"suburb" => "KADNOOK",
				"state" => "VIC",
				"lat" => "-37.14572",
				"lon" => "141.385313"
			],
			[
				"postcode" => "3318",
				"suburb" => "LANGKOOP",
				"state" => "VIC",
				"lat" => "-37.091858",
				"lon" => "141.062048"
			],
			[
				"postcode" => "3318",
				"suburb" => "PATYAH",
				"state" => "VIC",
				"lat" => "-36.896736",
				"lon" => "141.249539"
			],
			[
				"postcode" => "3318",
				"suburb" => "ULLSWATER",
				"state" => "VIC",
				"lat" => "-36.928902",
				"lon" => "141.395927"
			],
			[
				"postcode" => "3319",
				"suburb" => "APSLEY",
				"state" => "VIC",
				"lat" => "-36.967557",
				"lon" => "141.080748"
			],
			[
				"postcode" => "3319",
				"suburb" => "BENAYEO",
				"state" => "VIC",
				"lat" => "-36.843195",
				"lon" => "141.045845"
			],
			[
				"postcode" => "3319",
				"suburb" => "BRINGALBERT",
				"state" => "VIC",
				"lat" => "-36.843902",
				"lon" => "141.155059"
			],
			[
				"postcode" => "3321",
				"suburb" => "HESSE",
				"state" => "VIC",
				"lat" => "-38.111995",
				"lon" => "143.855664"
			],
			[
				"postcode" => "3321",
				"suburb" => "INVERLEIGH",
				"state" => "VIC",
				"lat" => "-38.100967",
				"lon" => "144.058343"
			],
			[
				"postcode" => "3321",
				"suburb" => "WINGEEL",
				"state" => "VIC",
				"lat" => "-38.06397",
				"lon" => "143.857655"
			],
			[
				"postcode" => "3322",
				"suburb" => "CRESSY",
				"state" => "VIC",
				"lat" => "-38.028752",
				"lon" => "143.643643"
			],
			[
				"postcode" => "3323",
				"suburb" => "BERRYBANK",
				"state" => "VIC",
				"lat" => "-37.991587",
				"lon" => "143.486027"
			],
			[
				"postcode" => "3323",
				"suburb" => "DUVERNEY",
				"state" => "VIC",
				"lat" => "-38.014259",
				"lon" => "143.570355"
			],
			[
				"postcode" => "3323",
				"suburb" => "FOXHOW",
				"state" => "VIC",
				"lat" => "-38.048885",
				"lon" => "143.461877"
			],
			[
				"postcode" => "3324",
				"suburb" => "LISMORE",
				"state" => "VIC",
				"lat" => "-37.953552",
				"lon" => "143.34368"
			],
			[
				"postcode" => "3324",
				"suburb" => "MINGAY",
				"state" => "VIC",
				"lat" => "-37.853522",
				"lon" => "143.320127"
			],
			[
				"postcode" => "3324",
				"suburb" => "MOUNT BUTE",
				"state" => "VIC",
				"lat" => "-37.879341",
				"lon" => "143.451114"
			],
			[
				"postcode" => "3325",
				"suburb" => "DERRINALLUM",
				"state" => "VIC",
				"lat" => "-37.948485",
				"lon" => "143.219987"
			],
			[
				"postcode" => "3325",
				"suburb" => "LARRALEA",
				"state" => "VIC",
				"lat" => "-38.021889",
				"lon" => "143.239049"
			],
			[
				"postcode" => "3325",
				"suburb" => "VITE VITE",
				"state" => "VIC",
				"lat" => "-37.816618",
				"lon" => "143.157936"
			],
			[
				"postcode" => "3325",
				"suburb" => "VITE VITE NORTH",
				"state" => "VIC",
				"lat" => "-37.792923",
				"lon" => "143.208666"
			],
			[
				"postcode" => "3328",
				"suburb" => "TEESDALE",
				"state" => "VIC",
				"lat" => "-38.039758",
				"lon" => "144.048285"
			],
			[
				"postcode" => "3329",
				"suburb" => "BARUNAH PARK",
				"state" => "VIC",
				"lat" => "-38.02107",
				"lon" => "143.856658"
			],
			[
				"postcode" => "3329",
				"suburb" => "SHELFORD",
				"state" => "VIC",
				"lat" => "-38.013703",
				"lon" => "143.976087"
			],
			[
				"postcode" => "3330",
				"suburb" => "ROKEWOOD",
				"state" => "VIC",
				"lat" => "-37.844281",
				"lon" => "143.677351"
			],
			[
				"postcode" => "3331",
				"suburb" => "BANNOCKBURN",
				"state" => "VIC",
				"lat" => "-38.046528",
				"lon" => "144.171067"
			],
			[
				"postcode" => "3331",
				"suburb" => "GHERINGHAP",
				"state" => "VIC",
				"lat" => "-38.07663",
				"lon" => "144.233865"
			],
			[
				"postcode" => "3331",
				"suburb" => "MAUDE",
				"state" => "VIC",
				"lat" => "-37.947695",
				"lon" => "144.168659"
			],
			[
				"postcode" => "3331",
				"suburb" => "RUSSELLS BRIDGE",
				"state" => "VIC",
				"lat" => "-38.016611",
				"lon" => "144.181789"
			],
			[
				"postcode" => "3331",
				"suburb" => "SHE OAKS",
				"state" => "VIC",
				"lat" => "-37.899687",
				"lon" => "144.133464"
			],
			[
				"postcode" => "3331",
				"suburb" => "STEIGLITZ",
				"state" => "VIC",
				"lat" => "-37.905086",
				"lon" => "144.187068"
			],
			[
				"postcode" => "3331",
				"suburb" => "SUTHERLANDS CREEK",
				"state" => "VIC",
				"lat" => "-38.003845",
				"lon" => "144.217941"
			],
			[
				"postcode" => "3332",
				"suburb" => "LETHBRIDGE",
				"state" => "VIC",
				"lat" => "-37.962809",
				"lon" => "144.139178"
			],
			[
				"postcode" => "3333",
				"suburb" => "BAMGANIE",
				"state" => "VIC",
				"lat" => "-37.924962",
				"lon" => "144.025575"
			],
			[
				"postcode" => "3333",
				"suburb" => "MEREDITH",
				"state" => "VIC",
				"lat" => "-37.845715",
				"lon" => "144.076801"
			],
			[
				"postcode" => "3334",
				"suburb" => "BUNGAL",
				"state" => "VIC",
				"lat" => "-37.710436",
				"lon" => "144.094545"
			],
			[
				"postcode" => "3334",
				"suburb" => "CARGERIE",
				"state" => "VIC",
				"lat" => "-37.804935",
				"lon" => "143.980293"
			],
			[
				"postcode" => "3334",
				"suburb" => "ELAINE",
				"state" => "VIC",
				"lat" => "-37.77736",
				"lon" => "144.028618"
			],
			[
				"postcode" => "3334",
				"suburb" => "MOUNT DORAN",
				"state" => "VIC",
				"lat" => "-37.72122",
				"lon" => "144.050734"
			],
			[
				"postcode" => "3335",
				"suburb" => "PLUMPTON",
				"state" => "VIC",
				"lat" => "-37.68584",
				"lon" => "144.685449"
			],
			[
				"postcode" => "3335",
				"suburb" => "ROCKBANK",
				"state" => "VIC",
				"lat" => "-37.729119",
				"lon" => "144.650778"
			],
			[
				"postcode" => "3337",
				"suburb" => "KURUNJANG",
				"state" => "VIC",
				"lat" => "-37.675127",
				"lon" => "144.58855"
			],
			[
				"postcode" => "3337",
				"suburb" => "MELTON",
				"state" => "VIC",
				"lat" => "-37.683206",
				"lon" => "144.58315"
			],
			[
				"postcode" => "3337",
				"suburb" => "MELTON WEST",
				"state" => "VIC",
				"lat" => "-37.684849",
				"lon" => "144.560691"
			],
			[
				"postcode" => "3337",
				"suburb" => "TOOLERN VALE",
				"state" => "VIC",
				"lat" => "-37.605843",
				"lon" => "144.589792"
			],
			[
				"postcode" => "3338",
				"suburb" => "BROOKFIELD",
				"state" => "VIC",
				"lat" => "-37.701172",
				"lon" => "144.540792"
			],
			[
				"postcode" => "3338",
				"suburb" => "EXFORD",
				"state" => "VIC",
				"lat" => "-37.729899",
				"lon" => "144.548212"
			],
			[
				"postcode" => "3338",
				"suburb" => "EYNESBURY",
				"state" => "VIC",
				"lat" => "-37.790039",
				"lon" => "144.56627"
			],
			[
				"postcode" => "3338",
				"suburb" => "MELTON SOUTH",
				"state" => "VIC",
				"lat" => "-37.704323",
				"lon" => "144.574818"
			],
			[
				"postcode" => "3340",
				"suburb" => "BACCHUS MARSH",
				"state" => "VIC",
				"lat" => "-37.675855",
				"lon" => "144.437663"
			],
			[
				"postcode" => "3340",
				"suburb" => "BALLIANG",
				"state" => "VIC",
				"lat" => "-37.882062",
				"lon" => "144.378684"
			],
			[
				"postcode" => "3340",
				"suburb" => "BALLIANG EAST",
				"state" => "VIC",
				"lat" => "-37.786546",
				"lon" => "144.46028"
			],
			[
				"postcode" => "3340",
				"suburb" => "COIMADAI",
				"state" => "VIC",
				"lat" => "-37.586714",
				"lon" => "144.458987"
			],
			[
				"postcode" => "3340",
				"suburb" => "DARLEY",
				"state" => "VIC",
				"lat" => "-37.660314",
				"lon" => "144.441634"
			],
			[
				"postcode" => "3340",
				"suburb" => "GLENMORE",
				"state" => "VIC",
				"lat" => "-37.713491",
				"lon" => "144.321688"
			],
			[
				"postcode" => "3340",
				"suburb" => "HOPETOUN PARK",
				"state" => "VIC",
				"lat" => "-37.696301",
				"lon" => "144.49671"
			],
			[
				"postcode" => "3340",
				"suburb" => "LONG FOREST",
				"state" => "VIC",
				"lat" => "-37.648056",
				"lon" => "144.505"
			],
			[
				"postcode" => "3340",
				"suburb" => "MADDINGLEY",
				"state" => "VIC",
				"lat" => "-37.680437",
				"lon" => "144.421974"
			],
			[
				"postcode" => "3340",
				"suburb" => "MERRIMU",
				"state" => "VIC",
				"lat" => "-37.619416",
				"lon" => "144.50635"
			],
			[
				"postcode" => "3340",
				"suburb" => "PARWAN",
				"state" => "VIC",
				"lat" => "-37.705964",
				"lon" => "144.462452"
			],
			[
				"postcode" => "3340",
				"suburb" => "ROWSLEY",
				"state" => "VIC",
				"lat" => "-37.723941",
				"lon" => "144.375232"
			],
			[
				"postcode" => "3341",
				"suburb" => "DALES CREEK",
				"state" => "VIC",
				"lat" => "-37.519237",
				"lon" => "144.309955"
			],
			[
				"postcode" => "3341",
				"suburb" => "GREENDALE",
				"state" => "VIC",
				"lat" => "-37.563196",
				"lon" => "144.305245"
			],
			[
				"postcode" => "3341",
				"suburb" => "KOROBEIT",
				"state" => "VIC",
				"lat" => "-37.576312",
				"lon" => "144.34186"
			],
			[
				"postcode" => "3341",
				"suburb" => "MYRNIONG",
				"state" => "VIC",
				"lat" => "-37.607752",
				"lon" => "144.318527"
			],
			[
				"postcode" => "3341",
				"suburb" => "PENTLAND HILLS",
				"state" => "VIC",
				"lat" => "-37.643624",
				"lon" => "144.365696"
			],
			[
				"postcode" => "3342",
				"suburb" => "BALLAN",
				"state" => "VIC",
				"lat" => "-37.60016",
				"lon" => "144.225458"
			],
			[
				"postcode" => "3342",
				"suburb" => "BEREMBOKE",
				"state" => "VIC",
				"lat" => "-37.770748",
				"lon" => "144.217417"
			],
			[
				"postcode" => "3342",
				"suburb" => "BLAKEVILLE",
				"state" => "VIC",
				"lat" => "-37.502683",
				"lon" => "144.203178"
			],
			[
				"postcode" => "3342",
				"suburb" => "BUNDING",
				"state" => "VIC",
				"lat" => "-37.557953",
				"lon" => "144.190143"
			],
			[
				"postcode" => "3342",
				"suburb" => "COLBROOK",
				"state" => "VIC",
				"lat" => "-37.53094",
				"lon" => "144.224945"
			],
			[
				"postcode" => "3342",
				"suburb" => "DURDIDWARRAH",
				"state" => "VIC",
				"lat" => "-37.812989",
				"lon" => "144.194393"
			],
			[
				"postcode" => "3342",
				"suburb" => "FISKVILLE",
				"state" => "VIC",
				"lat" => "-37.677991",
				"lon" => "144.227291"
			],
			[
				"postcode" => "3342",
				"suburb" => "INGLISTON",
				"state" => "VIC",
				"lat" => "-37.64379",
				"lon" => "144.289282"
			],
			[
				"postcode" => "3342",
				"suburb" => "MOUNT WALLACE",
				"state" => "VIC",
				"lat" => "-37.734514",
				"lon" => "144.217919"
			],
			[
				"postcode" => "3345",
				"suburb" => "GORDON",
				"state" => "VIC",
				"lat" => "-37.594546",
				"lon" => "144.099862"
			],
			[
				"postcode" => "3350",
				"suburb" => "ALFREDTON",
				"state" => "VIC",
				"lat" => "-37.556958",
				"lon" => "143.817225"
			],
			[
				"postcode" => "3350",
				"suburb" => "BAKERY HILL",
				"state" => "VIC",
				"lat" => "-37.568592",
				"lon" => "143.864099"
			],
			[
				"postcode" => "3350",
				"suburb" => "BALLARAT",
				"state" => "VIC",
				"lat" => "-37.563318",
				"lon" => "143.863715"
			],
			[
				"postcode" => "3350",
				"suburb" => "BALLARAT CENTRAL",
				"state" => "VIC",
				"lat" => "-37.563039",
				"lon" => "143.855405"
			],
			[
				"postcode" => "3350",
				"suburb" => "BALLARAT EAST",
				"state" => "VIC",
				"lat" => "-37.565618",
				"lon" => "143.886657"
			],
			[
				"postcode" => "3350",
				"suburb" => "BALLARAT NORTH",
				"state" => "VIC",
				"lat" => "-37.536899",
				"lon" => "143.862448"
			],
			[
				"postcode" => "3350",
				"suburb" => "BALLARAT WEST",
				"state" => "VIC",
				"lat" => "-37.563608",
				"lon" => "143.862054"
			],
			[
				"postcode" => "3350",
				"suburb" => "BLACK HILL",
				"state" => "VIC",
				"lat" => "-37.546532",
				"lon" => "143.875848"
			],
			[
				"postcode" => "3350",
				"suburb" => "BROWN HILL",
				"state" => "VIC",
				"lat" => "-37.552458",
				"lon" => "143.902041"
			],
			[
				"postcode" => "3350",
				"suburb" => "CANADIAN",
				"state" => "VIC",
				"lat" => "-37.584072",
				"lon" => "143.883055"
			],
			[
				"postcode" => "3350",
				"suburb" => "EUREKA",
				"state" => "VIC",
				"lat" => "-37.574981",
				"lon" => "143.868893"
			],
			[
				"postcode" => "3350",
				"suburb" => "GOLDEN POINT",
				"state" => "VIC",
				"lat" => "-37.57075",
				"lon" => "143.864955"
			],
			[
				"postcode" => "3350",
				"suburb" => "INVERMAY PARK",
				"state" => "VIC",
				"lat" => "-37.528996",
				"lon" => "143.862585"
			],
			[
				"postcode" => "3350",
				"suburb" => "LAKE WENDOUREE",
				"state" => "VIC",
				"lat" => "-37.549965",
				"lon" => "143.849441"
			],
			[
				"postcode" => "3350",
				"suburb" => "MOUNT CLEAR",
				"state" => "VIC",
				"lat" => "-37.603114",
				"lon" => "143.868659"
			],
			[
				"postcode" => "3350",
				"suburb" => "MOUNT HELEN",
				"state" => "VIC",
				"lat" => "-37.628466",
				"lon" => "143.880285"
			],
			[
				"postcode" => "3350",
				"suburb" => "MOUNT PLEASANT",
				"state" => "VIC",
				"lat" => "-37.581598",
				"lon" => "143.852739"
			],
			[
				"postcode" => "3350",
				"suburb" => "NERRINA",
				"state" => "VIC",
				"lat" => "-37.53748",
				"lon" => "143.890253"
			],
			[
				"postcode" => "3350",
				"suburb" => "NEWINGTON",
				"state" => "VIC",
				"lat" => "-37.567867",
				"lon" => "143.793037"
			],
			[
				"postcode" => "3350",
				"suburb" => "REDAN",
				"state" => "VIC",
				"lat" => "-37.572707",
				"lon" => "143.839859"
			],
			[
				"postcode" => "3350",
				"suburb" => "SOLDIERS HILL",
				"state" => "VIC",
				"lat" => "-37.551158",
				"lon" => "143.859744"
			],
			[
				"postcode" => "3350",
				"suburb" => "SOVEREIGN HILL",
				"state" => "VIC",
				"lat" => "-37.579026",
				"lon" => "143.864748"
			],
			[
				"postcode" => "3351",
				"suburb" => "BERRINGA",
				"state" => "VIC",
				"lat" => "-37.770766",
				"lon" => "143.683679"
			],
			[
				"postcode" => "3351",
				"suburb" => "BO PEEP",
				"state" => "VIC",
				"lat" => "-37.527396",
				"lon" => "143.678614"
			],
			[
				"postcode" => "3351",
				"suburb" => "CAPE CLEAR",
				"state" => "VIC",
				"lat" => "-37.786818",
				"lon" => "143.612778"
			],
			[
				"postcode" => "3351",
				"suburb" => "CARNGHAM",
				"state" => "VIC",
				"lat" => "-37.576056",
				"lon" => "143.578864"
			],
			[
				"postcode" => "3351",
				"suburb" => "CHEPSTOWE",
				"state" => "VIC",
				"lat" => "-37.584632",
				"lon" => "143.516571"
			],
			[
				"postcode" => "3351",
				"suburb" => "HADDON",
				"state" => "VIC",
				"lat" => "-37.592314",
				"lon" => "143.719153"
			],
			[
				"postcode" => "3351",
				"suburb" => "HAPPY VALLEY",
				"state" => "VIC",
				"lat" => "-37.719294",
				"lon" => "143.609858"
			],
			[
				"postcode" => "3351",
				"suburb" => "HILLCREST",
				"state" => "VIC",
				"lat" => "-37.619088",
				"lon" => "143.637236"
			],
			[
				"postcode" => "3351",
				"suburb" => "ILLABAROOK",
				"state" => "VIC",
				"lat" => "-37.826653",
				"lon" => "143.645921"
			],
			[
				"postcode" => "3351",
				"suburb" => "LAKE BOLAC",
				"state" => "VIC",
				"lat" => "-37.712432",
				"lon" => "142.839797"
			],
			[
				"postcode" => "3351",
				"suburb" => "MININERA",
				"state" => "VIC",
				"lat" => "-37.604862",
				"lon" => "142.959773"
			],
			[
				"postcode" => "3351",
				"suburb" => "MOUNT EMU",
				"state" => "VIC",
				"lat" => "-37.596868",
				"lon" => "143.416319"
			],
			[
				"postcode" => "3351",
				"suburb" => "NERRIN NERRIN",
				"state" => "VIC",
				"lat" => "-37.770863",
				"lon" => "143.017363"
			],
			[
				"postcode" => "3351",
				"suburb" => "NEWTOWN",
				"state" => "VIC",
				"lat" => "-37.70637",
				"lon" => "143.664088"
			],
			[
				"postcode" => "3351",
				"suburb" => "NINTINGBOOL",
				"state" => "VIC",
				"lat" => "-37.642384",
				"lon" => "143.709581"
			],
			[
				"postcode" => "3351",
				"suburb" => "PIGGOREET",
				"state" => "VIC",
				"lat" => "-37.728419",
				"lon" => "143.644442"
			],
			[
				"postcode" => "3351",
				"suburb" => "PITFIELD",
				"state" => "VIC",
				"lat" => "-37.811603",
				"lon" => "143.577695"
			],
			[
				"postcode" => "3351",
				"suburb" => "ROKEWOOD JUNCTION",
				"state" => "VIC",
				"lat" => "-37.844281",
				"lon" => "143.677351"
			],
			[
				"postcode" => "3351",
				"suburb" => "ROSS CREEK",
				"state" => "VIC",
				"lat" => "-37.628507",
				"lon" => "143.767332"
			],
			[
				"postcode" => "3351",
				"suburb" => "SCARSDALE",
				"state" => "VIC",
				"lat" => "-37.668421",
				"lon" => "143.654685"
			],
			[
				"postcode" => "3351",
				"suburb" => "SMYTHES CREEK",
				"state" => "VIC",
				"lat" => "-37.596827",
				"lon" => "143.768269"
			],
			[
				"postcode" => "3351",
				"suburb" => "SMYTHESDALE",
				"state" => "VIC",
				"lat" => "-37.646169",
				"lon" => "143.683223"
			],
			[
				"postcode" => "3351",
				"suburb" => "SNAKE VALLEY",
				"state" => "VIC",
				"lat" => "-37.612093",
				"lon" => "143.584543"
			],
			[
				"postcode" => "3351",
				"suburb" => "SPRINGDALLAH",
				"state" => "VIC",
				"lat" => "-37.746273",
				"lon" => "143.631404"
			],
			[
				"postcode" => "3351",
				"suburb" => "STAFFORDSHIRE REEF",
				"state" => "VIC",
				"lat" => "-37.752956",
				"lon" => "143.700798"
			],
			[
				"postcode" => "3351",
				"suburb" => "STREATHAM",
				"state" => "VIC",
				"lat" => "-37.679137",
				"lon" => "143.058258"
			],
			[
				"postcode" => "3351",
				"suburb" => "WALLINDUC",
				"state" => "VIC",
				"lat" => "-37.879636",
				"lon" => "143.509572"
			],
			[
				"postcode" => "3351",
				"suburb" => "WESTMERE",
				"state" => "VIC",
				"lat" => "-37.692668",
				"lon" => "142.999465"
			],
			[
				"postcode" => "3352",
				"suburb" => "ADDINGTON",
				"state" => "VIC",
				"lat" => "-37.384464",
				"lon" => "143.672506"
			],
			[
				"postcode" => "3352",
				"suburb" => "BARKSTEAD",
				"state" => "VIC",
				"lat" => "-37.462409",
				"lon" => "144.085601"
			],
			[
				"postcode" => "3352",
				"suburb" => "BLOWHARD",
				"state" => "VIC",
				"lat" => "-37.429268",
				"lon" => "143.788393"
			],
			[
				"postcode" => "3352",
				"suburb" => "BOLWARRAH",
				"state" => "VIC",
				"lat" => "-37.513611",
				"lon" => "144.095063"
			],
			[
				"postcode" => "3352",
				"suburb" => "BREWSTER",
				"state" => "VIC",
				"lat" => "-37.48494",
				"lon" => "143.527883"
			],
			[
				"postcode" => "3352",
				"suburb" => "BULLAROOK",
				"state" => "VIC",
				"lat" => "-37.50866",
				"lon" => "144.004654"
			],
			[
				"postcode" => "3352",
				"suburb" => "BUNGAREE",
				"state" => "VIC",
				"lat" => "-37.558902",
				"lon" => "143.99726"
			],
			[
				"postcode" => "3352",
				"suburb" => "BUNKERS HILL",
				"state" => "VIC",
				"lat" => "-37.576871",
				"lon" => "143.745113"
			],
			[
				"postcode" => "3352",
				"suburb" => "BURRUMBEET",
				"state" => "VIC",
				"lat" => "-37.473098",
				"lon" => "143.656645"
			],
			[
				"postcode" => "3352",
				"suburb" => "CAMBRIAN HILL",
				"state" => "VIC",
				"lat" => "-37.62525",
				"lon" => "143.832618"
			],
			[
				"postcode" => "3352",
				"suburb" => "CARDIGAN",
				"state" => "VIC",
				"lat" => "-37.526537",
				"lon" => "143.747739"
			],
			[
				"postcode" => "3352",
				"suburb" => "CARDIGAN VILLAGE",
				"state" => "VIC",
				"lat" => "-37.524031",
				"lon" => "143.741734"
			],
			[
				"postcode" => "3352",
				"suburb" => "CHAPEL FLAT",
				"state" => "VIC",
				"lat" => "-37.478761",
				"lon" => "143.897125"
			],
			[
				"postcode" => "3352",
				"suburb" => "CLARENDON",
				"state" => "VIC",
				"lat" => "-37.690352",
				"lon" => "143.977725"
			],
			[
				"postcode" => "3352",
				"suburb" => "CLARETOWN",
				"state" => "VIC",
				"lat" => "-37.515415",
				"lon" => "144.032034"
			],
			[
				"postcode" => "3352",
				"suburb" => "CLARKES HILL",
				"state" => "VIC",
				"lat" => "-37.495739",
				"lon" => "143.973782"
			],
			[
				"postcode" => "3352",
				"suburb" => "CORINDHAP",
				"state" => "VIC",
				"lat" => "-37.871921",
				"lon" => "143.749854"
			],
			[
				"postcode" => "3352",
				"suburb" => "DEREEL",
				"state" => "VIC",
				"lat" => "-37.813488",
				"lon" => "143.749864"
			],
			[
				"postcode" => "3352",
				"suburb" => "DUNNSTOWN",
				"state" => "VIC",
				"lat" => "-37.590632",
				"lon" => "143.977119"
			],
			[
				"postcode" => "3352",
				"suburb" => "DURHAM LEAD",
				"state" => "VIC",
				"lat" => "-37.697654",
				"lon" => "143.87785"
			],
			[
				"postcode" => "3352",
				"suburb" => "ENFIELD",
				"state" => "VIC",
				"lat" => "-37.745523",
				"lon" => "143.773881"
			],
			[
				"postcode" => "3352",
				"suburb" => "ERCILDOUNE",
				"state" => "VIC",
				"lat" => "-37.43581",
				"lon" => "143.61408"
			],
			[
				"postcode" => "3352",
				"suburb" => "GARIBALDI",
				"state" => "VIC",
				"lat" => "-37.726329",
				"lon" => "143.871154"
			],
			[
				"postcode" => "3352",
				"suburb" => "GLEN PARK",
				"state" => "VIC",
				"lat" => "-37.518068",
				"lon" => "143.908716"
			],
			[
				"postcode" => "3352",
				"suburb" => "GLENBRAE",
				"state" => "VIC",
				"lat" => "-37.350376",
				"lon" => "143.568829"
			],
			[
				"postcode" => "3352",
				"suburb" => "GONG GONG",
				"state" => "VIC",
				"lat" => "-37.550811",
				"lon" => "143.932208"
			],
			[
				"postcode" => "3352",
				"suburb" => "GRENVILLE",
				"state" => "VIC",
				"lat" => "-37.743019",
				"lon" => "143.840855"
			],
			[
				"postcode" => "3352",
				"suburb" => "INVERMAY",
				"state" => "VIC",
				"lat" => "-37.520241",
				"lon" => "143.897158"
			],
			[
				"postcode" => "3352",
				"suburb" => "LAL LAL",
				"state" => "VIC",
				"lat" => "-37.692331",
				"lon" => "144.040895"
			],
			[
				"postcode" => "3352",
				"suburb" => "LAMPLOUGH",
				"state" => "VIC",
				"lat" => "-37.136644",
				"lon" => "143.50799"
			],
			[
				"postcode" => "3352",
				"suburb" => "LANGI KAL KAL",
				"state" => "VIC",
				"lat" => "-37.400516",
				"lon" => "143.505961"
			],
			[
				"postcode" => "3352",
				"suburb" => "LEARMONTH",
				"state" => "VIC",
				"lat" => "-37.420343",
				"lon" => "143.713222"
			],
			[
				"postcode" => "3352",
				"suburb" => "LEIGH CREEK",
				"state" => "VIC",
				"lat" => "-37.559567",
				"lon" => "143.952925"
			],
			[
				"postcode" => "3352",
				"suburb" => "LEXTON",
				"state" => "VIC",
				"lat" => "-37.275704",
				"lon" => "143.513453"
			],
			[
				"postcode" => "3352",
				"suburb" => "MAGPIE",
				"state" => "VIC",
				"lat" => "-37.617962",
				"lon" => "143.847038"
			],
			[
				"postcode" => "3352",
				"suburb" => "MILLBROOK",
				"state" => "VIC",
				"lat" => "-37.590237",
				"lon" => "144.056383"
			],
			[
				"postcode" => "3352",
				"suburb" => "MINERS REST",
				"state" => "VIC",
				"lat" => "-37.484449",
				"lon" => "143.802353"
			],
			[
				"postcode" => "3352",
				"suburb" => "MITCHELL PARK",
				"state" => "VIC",
				"lat" => "-37.509085",
				"lon" => "143.784073"
			],
			[
				"postcode" => "3352",
				"suburb" => "MOLLONGGHIP",
				"state" => "VIC",
				"lat" => "-37.47511",
				"lon" => "144.038392"
			],
			[
				"postcode" => "3352",
				"suburb" => "MOUNT BOLTON",
				"state" => "VIC",
				"lat" => "-37.358834",
				"lon" => "143.684003"
			],
			[
				"postcode" => "3352",
				"suburb" => "MOUNT EGERTON",
				"state" => "VIC",
				"lat" => "-37.630149",
				"lon" => "144.105564"
			],
			[
				"postcode" => "3352",
				"suburb" => "MOUNT MERCER",
				"state" => "VIC",
				"lat" => "-37.80564",
				"lon" => "143.9091"
			],
			[
				"postcode" => "3352",
				"suburb" => "MOUNT MITCHELL",
				"state" => "VIC",
				"lat" => "-37.297903",
				"lon" => "143.600948"
			],
			[
				"postcode" => "3352",
				"suburb" => "MOUNT ROWAN",
				"state" => "VIC",
				"lat" => "-37.505408",
				"lon" => "143.845131"
			],
			[
				"postcode" => "3352",
				"suburb" => "NAPOLEONS",
				"state" => "VIC",
				"lat" => "-37.67641",
				"lon" => "143.829065"
			],
			[
				"postcode" => "3352",
				"suburb" => "NAVIGATORS",
				"state" => "VIC",
				"lat" => "-37.624897",
				"lon" => "143.950671"
			],
			[
				"postcode" => "3352",
				"suburb" => "POOTILLA",
				"state" => "VIC",
				"lat" => "-37.523658",
				"lon" => "143.966627"
			],
			[
				"postcode" => "3352",
				"suburb" => "SCOTSBURN",
				"state" => "VIC",
				"lat" => "-37.670099",
				"lon" => "143.93046"
			],
			[
				"postcode" => "3352",
				"suburb" => "SPRINGBANK",
				"state" => "VIC",
				"lat" => "-37.534236",
				"lon" => "144.073588"
			],
			[
				"postcode" => "3352",
				"suburb" => "SULKY",
				"state" => "VIC",
				"lat" => "-37.464987",
				"lon" => "143.836332"
			],
			[
				"postcode" => "3352",
				"suburb" => "WALLACE",
				"state" => "VIC",
				"lat" => "-37.555477",
				"lon" => "144.047668"
			],
			[
				"postcode" => "3352",
				"suburb" => "WARRENHEIP",
				"state" => "VIC",
				"lat" => "-37.574854",
				"lon" => "143.92573"
			],
			[
				"postcode" => "3352",
				"suburb" => "WATTLE FLAT",
				"state" => "VIC",
				"lat" => "-37.457993",
				"lon" => "143.942747"
			],
			[
				"postcode" => "3352",
				"suburb" => "WAUBRA",
				"state" => "VIC",
				"lat" => "-37.360061",
				"lon" => "143.640151"
			],
			[
				"postcode" => "3352",
				"suburb" => "WEATHERBOARD",
				"state" => "VIC",
				"lat" => "-37.445888",
				"lon" => "143.680675"
			],
			[
				"postcode" => "3352",
				"suburb" => "WERNETH",
				"state" => "VIC",
				"lat" => "-37.933474",
				"lon" => "143.616585"
			],
			[
				"postcode" => "3352",
				"suburb" => "YENDON",
				"state" => "VIC",
				"lat" => "-37.633954",
				"lon" => "143.969478"
			],
			[
				"postcode" => "3353",
				"suburb" => "BALLARAT",
				"state" => "VIC",
				"lat" => "-37.7778",
				"lon" => "144.835743"
			],
			[
				"postcode" => "3354",
				"suburb" => "BAKERY HILL",
				"state" => "VIC",
				"lat" => "-37.560917",
				"lon" => "143.867158"
			],
			[
				"postcode" => "3355",
				"suburb" => "LAKE GARDENS",
				"state" => "VIC",
				"lat" => "-37.545723",
				"lon" => "143.820973"
			],
			[
				"postcode" => "3355",
				"suburb" => "MITCHELL PARK",
				"state" => "VIC",
				"lat" => "-37.509085",
				"lon" => "143.784073"
			],
			[
				"postcode" => "3355",
				"suburb" => "WENDOUREE",
				"state" => "VIC",
				"lat" => "-37.54022",
				"lon" => "143.831297"
			],
			[
				"postcode" => "3355",
				"suburb" => "WENDOUREE VILLAGE",
				"state" => "VIC",
				"lat" => "-37.532908",
				"lon" => "143.824328"
			],
			[
				"postcode" => "3356",
				"suburb" => "BONSHAW",
				"state" => "VIC",
				"lat" => "-37.591298",
				"lon" => "143.828273"
			],
			[
				"postcode" => "3356",
				"suburb" => "DELACOMBE",
				"state" => "VIC",
				"lat" => "-37.58453",
				"lon" => "143.807662"
			],
			[
				"postcode" => "3356",
				"suburb" => "SEBASTOPOL",
				"state" => "VIC",
				"lat" => "-37.597592",
				"lon" => "143.841026"
			],
			[
				"postcode" => "3357",
				"suburb" => "BUNINYONG",
				"state" => "VIC",
				"lat" => "-37.648547",
				"lon" => "143.918563"
			],
			[
				"postcode" => "3360",
				"suburb" => "LINTON",
				"state" => "VIC",
				"lat" => "-37.686374",
				"lon" => "143.562977"
			],
			[
				"postcode" => "3360",
				"suburb" => "MANNIBADAR",
				"state" => "VIC",
				"lat" => "-37.752233",
				"lon" => "143.467636"
			],
			[
				"postcode" => "3360",
				"suburb" => "PITTONG",
				"state" => "VIC",
				"lat" => "-37.668732",
				"lon" => "143.475816"
			],
			[
				"postcode" => "3360",
				"suburb" => "WILLOWVALE",
				"state" => "VIC",
				"lat" => "-37.805729",
				"lon" => "143.45921"
			],
			[
				"postcode" => "3361",
				"suburb" => "BRADVALE",
				"state" => "VIC",
				"lat" => "-37.779772",
				"lon" => "143.407202"
			],
			[
				"postcode" => "3361",
				"suburb" => "CARRANBALLAC",
				"state" => "VIC",
				"lat" => "-37.701093",
				"lon" => "143.218205"
			],
			[
				"postcode" => "3361",
				"suburb" => "SKIPTON",
				"state" => "VIC",
				"lat" => "-37.685939",
				"lon" => "143.365063"
			],
			[
				"postcode" => "3363",
				"suburb" => "CRESWICK",
				"state" => "VIC",
				"lat" => "-37.424838",
				"lon" => "143.894483"
			],
			[
				"postcode" => "3363",
				"suburb" => "CRESWICK NORTH",
				"state" => "VIC",
				"lat" => "-37.36548",
				"lon" => "143.877677"
			],
			[
				"postcode" => "3363",
				"suburb" => "DEAN",
				"state" => "VIC",
				"lat" => "-37.4645",
				"lon" => "143.991203"
			],
			[
				"postcode" => "3363",
				"suburb" => "GLENDARUEL",
				"state" => "VIC",
				"lat" => "-37.347345",
				"lon" => "143.722525"
			],
			[
				"postcode" => "3363",
				"suburb" => "LANGDONS HILL",
				"state" => "VIC",
				"lat" => "-37.413218",
				"lon" => "144.068068"
			],
			[
				"postcode" => "3363",
				"suburb" => "MOUNT BECKWORTH",
				"state" => "VIC",
				"lat" => "-37.311869",
				"lon" => "143.688092"
			],
			[
				"postcode" => "3363",
				"suburb" => "TOURELLO",
				"state" => "VIC",
				"lat" => "-37.356793",
				"lon" => "143.808277"
			],
			[
				"postcode" => "3364",
				"suburb" => "ALLENDALE",
				"state" => "VIC",
				"lat" => "-37.368711",
				"lon" => "143.938548"
			],
			[
				"postcode" => "3364",
				"suburb" => "ASCOT",
				"state" => "VIC",
				"lat" => "-37.40088",
				"lon" => "143.802511"
			],
			[
				"postcode" => "3364",
				"suburb" => "BALD HILLS",
				"state" => "VIC",
				"lat" => "-37.450713",
				"lon" => "143.839388"
			],
			[
				"postcode" => "3364",
				"suburb" => "BLAMPIED",
				"state" => "VIC",
				"lat" => "-37.360361",
				"lon" => "144.056095"
			],
			[
				"postcode" => "3364",
				"suburb" => "BROOMFIELD",
				"state" => "VIC",
				"lat" => "-37.387436",
				"lon" => "143.903734"
			],
			[
				"postcode" => "3364",
				"suburb" => "CABBAGE TREE",
				"state" => "VIC",
				"lat" => "-37.278159",
				"lon" => "143.890311"
			],
			[
				"postcode" => "3364",
				"suburb" => "CAMPBELLTOWN",
				"state" => "VIC",
				"lat" => "-37.203474",
				"lon" => "143.946436"
			],
			[
				"postcode" => "3364",
				"suburb" => "COGHILLS CREEK",
				"state" => "VIC",
				"lat" => "-37.383521",
				"lon" => "143.757838"
			],
			[
				"postcode" => "3364",
				"suburb" => "GLENDONNELL",
				"state" => "VIC",
				"lat" => "-37.360699",
				"lon" => "143.844507"
			],
			[
				"postcode" => "3364",
				"suburb" => "KINGSTON",
				"state" => "VIC",
				"lat" => "-37.372652",
				"lon" => "143.954309"
			],
			[
				"postcode" => "3364",
				"suburb" => "KOOROOCHEANG",
				"state" => "VIC",
				"lat" => "-37.285444",
				"lon" => "144.034028"
			],
			[
				"postcode" => "3364",
				"suburb" => "LAWRENCE",
				"state" => "VIC",
				"lat" => "-37.313624",
				"lon" => "143.908197"
			],
			[
				"postcode" => "3364",
				"suburb" => "MOUNT PROSPECT",
				"state" => "VIC",
				"lat" => "-37.40751",
				"lon" => "144.032913"
			],
			[
				"postcode" => "3364",
				"suburb" => "NEWLYN",
				"state" => "VIC",
				"lat" => "-37.417055",
				"lon" => "143.981438"
			],
			[
				"postcode" => "3364",
				"suburb" => "NEWLYN NORTH",
				"state" => "VIC",
				"lat" => "-37.399016",
				"lon" => "143.995952"
			],
			[
				"postcode" => "3364",
				"suburb" => "ROCKLYN",
				"state" => "VIC",
				"lat" => "-37.430329",
				"lon" => "144.052859"
			],
			[
				"postcode" => "3364",
				"suburb" => "SMEATON",
				"state" => "VIC",
				"lat" => "-37.312403",
				"lon" => "143.94954"
			],
			[
				"postcode" => "3364",
				"suburb" => "SMOKEYTOWN",
				"state" => "VIC",
				"lat" => "-37.404302",
				"lon" => "143.925516"
			],
			[
				"postcode" => "3364",
				"suburb" => "SPRINGMOUNT",
				"state" => "VIC",
				"lat" => "-37.414701",
				"lon" => "143.935411"
			],
			[
				"postcode" => "3364",
				"suburb" => "STRATHLEA",
				"state" => "VIC",
				"lat" => "-37.139606",
				"lon" => "143.963403"
			],
			[
				"postcode" => "3364",
				"suburb" => "WERONA",
				"state" => "VIC",
				"lat" => "-37.243658",
				"lon" => "144.024726"
			],
			[
				"postcode" => "3370",
				"suburb" => "CLUNES",
				"state" => "VIC",
				"lat" => "-37.293942",
				"lon" => "143.787341"
			],
			[
				"postcode" => "3370",
				"suburb" => "GLENGOWER",
				"state" => "VIC",
				"lat" => "-37.226997",
				"lon" => "143.884943"
			],
			[
				"postcode" => "3370",
				"suburb" => "MOUNT CAMERON",
				"state" => "VIC",
				"lat" => "-37.209586",
				"lon" => "143.825148"
			],
			[
				"postcode" => "3370",
				"suburb" => "ULLINA",
				"state" => "VIC",
				"lat" => "-37.284441",
				"lon" => "143.890428"
			],
			[
				"postcode" => "3371",
				"suburb" => "AMHERST",
				"state" => "VIC",
				"lat" => "-37.146466",
				"lon" => "143.670166"
			],
			[
				"postcode" => "3371",
				"suburb" => "BURNBANK",
				"state" => "VIC",
				"lat" => "-37.227531",
				"lon" => "143.577744"
			],
			[
				"postcode" => "3371",
				"suburb" => "CARALULUP",
				"state" => "VIC",
				"lat" => "-37.205024",
				"lon" => "143.637709"
			],
			[
				"postcode" => "3371",
				"suburb" => "DUNACH",
				"state" => "VIC",
				"lat" => "-37.219423",
				"lon" => "143.729832"
			],
			[
				"postcode" => "3371",
				"suburb" => "EVANSFORD",
				"state" => "VIC",
				"lat" => "-37.258734",
				"lon" => "143.625242"
			],
			[
				"postcode" => "3371",
				"suburb" => "LILLICUR",
				"state" => "VIC",
				"lat" => "-37.165285",
				"lon" => "143.554504"
			],
			[
				"postcode" => "3371",
				"suburb" => "MOUNT GLASGOW",
				"state" => "VIC",
				"lat" => "-37.197694",
				"lon" => "143.739521"
			],
			[
				"postcode" => "3371",
				"suburb" => "STONY CREEK",
				"state" => "VIC",
				"lat" => "-37.225719",
				"lon" => "143.683737"
			],
			[
				"postcode" => "3371",
				"suburb" => "TALBOT",
				"state" => "VIC",
				"lat" => "-37.171463",
				"lon" => "143.698142"
			],
			[
				"postcode" => "3373",
				"suburb" => "BEAUFORT",
				"state" => "VIC",
				"lat" => "-37.429812",
				"lon" => "143.383709"
			],
			[
				"postcode" => "3373",
				"suburb" => "CHUTE",
				"state" => "VIC",
				"lat" => "-37.332405",
				"lon" => "143.387135"
			]
		]);
		DB::table('suburbs')->insert([
			[
				"postcode" => "3373",
				"suburb" => "CROSS ROADS",
				"state" => "VIC",
				"lat" => "-37.546494",
				"lon" => "143.231404"
			],
			[
				"postcode" => "3373",
				"suburb" => "LAKE GOLDSMITH",
				"state" => "VIC",
				"lat" => "-37.554684",
				"lon" => "143.36684"
			],
			[
				"postcode" => "3373",
				"suburb" => "LAKE WONGAN",
				"state" => "VIC",
				"lat" => "-37.594156",
				"lon" => "143.13746"
			],
			[
				"postcode" => "3373",
				"suburb" => "MAIN LEAD",
				"state" => "VIC",
				"lat" => "-37.392977",
				"lon" => "143.32985"
			],
			[
				"postcode" => "3373",
				"suburb" => "MENA PARK",
				"state" => "VIC",
				"lat" => "-37.521118",
				"lon" => "143.463104"
			],
			[
				"postcode" => "3373",
				"suburb" => "NERRING",
				"state" => "VIC",
				"lat" => "-37.497474",
				"lon" => "143.446479"
			],
			[
				"postcode" => "3373",
				"suburb" => "RAGLAN",
				"state" => "VIC",
				"lat" => "-37.351713",
				"lon" => "143.330232"
			],
			[
				"postcode" => "3373",
				"suburb" => "SHIRLEY",
				"state" => "VIC",
				"lat" => "-37.442898",
				"lon" => "143.213328"
			],
			[
				"postcode" => "3373",
				"suburb" => "STOCKYARD HILL",
				"state" => "VIC",
				"lat" => "-37.53596",
				"lon" => "143.251325"
			],
			[
				"postcode" => "3373",
				"suburb" => "STONELEIGH",
				"state" => "VIC",
				"lat" => "-37.585741",
				"lon" => "143.25939"
			],
			[
				"postcode" => "3373",
				"suburb" => "TRAWALLA",
				"state" => "VIC",
				"lat" => "-37.436827",
				"lon" => "143.469053"
			],
			[
				"postcode" => "3373",
				"suburb" => "WATERLOO",
				"state" => "VIC",
				"lat" => "-37.372434",
				"lon" => "143.414495"
			],
			[
				"postcode" => "3375",
				"suburb" => "BALLYROGAN",
				"state" => "VIC",
				"lat" => "-37.427465",
				"lon" => "143.132372"
			],
			[
				"postcode" => "3375",
				"suburb" => "BAYINDEEN",
				"state" => "VIC",
				"lat" => "-37.305549",
				"lon" => "143.163733"
			],
			[
				"postcode" => "3375",
				"suburb" => "BUANGOR",
				"state" => "VIC",
				"lat" => "-37.366754",
				"lon" => "143.174831"
			],
			[
				"postcode" => "3375",
				"suburb" => "MIDDLE CREEK",
				"state" => "VIC",
				"lat" => "-37.398313",
				"lon" => "143.23096"
			],
			[
				"postcode" => "3377",
				"suburb" => "ARARAT",
				"state" => "VIC",
				"lat" => "-37.284301",
				"lon" => "142.928227"
			],
			[
				"postcode" => "3377",
				"suburb" => "ARMSTRONG",
				"state" => "VIC",
				"lat" => "-37.210025",
				"lon" => "142.884986"
			],
			[
				"postcode" => "3377",
				"suburb" => "CATHCART",
				"state" => "VIC",
				"lat" => "-37.304935",
				"lon" => "142.879648"
			],
			[
				"postcode" => "3377",
				"suburb" => "CROWLANDS",
				"state" => "VIC",
				"lat" => "-37.149857",
				"lon" => "143.109353"
			],
			[
				"postcode" => "3377",
				"suburb" => "DENICULL CREEK",
				"state" => "VIC",
				"lat" => "-37.349467",
				"lon" => "142.89664"
			],
			[
				"postcode" => "3377",
				"suburb" => "DOBIE",
				"state" => "VIC",
				"lat" => "-37.311758",
				"lon" => "143.021199"
			],
			[
				"postcode" => "3377",
				"suburb" => "DUNNEWORTHY",
				"state" => "VIC",
				"lat" => "-37.202282",
				"lon" => "143.041956"
			],
			[
				"postcode" => "3377",
				"suburb" => "EVERSLEY",
				"state" => "VIC",
				"lat" => "-37.189662",
				"lon" => "143.178787"
			],
			[
				"postcode" => "3377",
				"suburb" => "GREAT WESTERN",
				"state" => "VIC",
				"lat" => "-37.152658",
				"lon" => "142.855946"
			],
			[
				"postcode" => "3377",
				"suburb" => "LANGI LOGAN",
				"state" => "VIC",
				"lat" => "-37.393824",
				"lon" => "142.924496"
			],
			[
				"postcode" => "3377",
				"suburb" => "MAROONA",
				"state" => "VIC",
				"lat" => "-37.440606",
				"lon" => "142.859279"
			],
			[
				"postcode" => "3377",
				"suburb" => "MOUNT COLE",
				"state" => "VIC",
				"lat" => "-37.255088",
				"lon" => "143.198377"
			],
			[
				"postcode" => "3377",
				"suburb" => "MOUNT COLE CREEK",
				"state" => "VIC",
				"lat" => "-37.218791",
				"lon" => "143.123858"
			],
			[
				"postcode" => "3377",
				"suburb" => "MOYSTON",
				"state" => "VIC",
				"lat" => "-37.300887",
				"lon" => "142.76704"
			],
			[
				"postcode" => "3377",
				"suburb" => "NORVAL",
				"state" => "VIC",
				"lat" => "-37.251262",
				"lon" => "142.843173"
			],
			[
				"postcode" => "3377",
				"suburb" => "RHYMNEY",
				"state" => "VIC",
				"lat" => "-37.218844",
				"lon" => "142.779136"
			],
			[
				"postcode" => "3377",
				"suburb" => "ROCKY POINT",
				"state" => "VIC",
				"lat" => "-37.335958",
				"lon" => "142.854336"
			],
			[
				"postcode" => "3377",
				"suburb" => "ROSSBRIDGE",
				"state" => "VIC",
				"lat" => "-37.498396",
				"lon" => "142.864267"
			],
			[
				"postcode" => "3377",
				"suburb" => "WARRAK",
				"state" => "VIC",
				"lat" => "-37.265182",
				"lon" => "143.115878"
			],
			[
				"postcode" => "3378",
				"suburb" => "TATYOON",
				"state" => "VIC",
				"lat" => "-37.529051",
				"lon" => "142.944769"
			],
			[
				"postcode" => "3378",
				"suburb" => "YALLA-Y-POORA",
				"state" => "VIC",
				"lat" => "-37.527438",
				"lon" => "143.13232"
			],
			[
				"postcode" => "3379",
				"suburb" => "BORNES HILL",
				"state" => "VIC",
				"lat" => "-37.534037",
				"lon" => "142.521439"
			],
			[
				"postcode" => "3379",
				"suburb" => "CHATSWORTH",
				"state" => "VIC",
				"lat" => "-37.857749",
				"lon" => "142.649816"
			],
			[
				"postcode" => "3379",
				"suburb" => "MAFEKING",
				"state" => "VIC",
				"lat" => "-37.378411",
				"lon" => "142.54037"
			],
			[
				"postcode" => "3379",
				"suburb" => "STAVELY",
				"state" => "VIC",
				"lat" => "-37.58305",
				"lon" => "142.633256"
			],
			[
				"postcode" => "3379",
				"suburb" => "WICKLIFFE",
				"state" => "VIC",
				"lat" => "-37.685137",
				"lon" => "142.708737"
			],
			[
				"postcode" => "3379",
				"suburb" => "WILLAURA",
				"state" => "VIC",
				"lat" => "-37.540494",
				"lon" => "142.7353"
			],
			[
				"postcode" => "3379",
				"suburb" => "WILLAURA NORTH",
				"state" => "VIC",
				"lat" => "-37.388237",
				"lon" => "142.742735"
			],
			[
				"postcode" => "3380",
				"suburb" => "BELLELLEN",
				"state" => "VIC",
				"lat" => "-37.157329",
				"lon" => "142.699342"
			],
			[
				"postcode" => "3380",
				"suburb" => "BRIDGE INN",
				"state" => "VIC",
				"lat" => "-37.029226",
				"lon" => "142.808498"
			],
			[
				"postcode" => "3380",
				"suburb" => "MOKEPILLY",
				"state" => "VIC",
				"lat" => "-37.093743",
				"lon" => "142.626594"
			],
			[
				"postcode" => "3380",
				"suburb" => "STAWELL",
				"state" => "VIC",
				"lat" => "-37.055661",
				"lon" => "142.77938"
			],
			[
				"postcode" => "3380",
				"suburb" => "STAWELL WEST",
				"state" => "VIC",
				"lat" => "-37.023514",
				"lon" => "142.763255"
			],
			[
				"postcode" => "3380",
				"suburb" => "WINJALLOK",
				"state" => "VIC",
				"lat" => "-36.822297",
				"lon" => "143.197839"
			],
			[
				"postcode" => "3381",
				"suburb" => "BARKLY",
				"state" => "VIC",
				"lat" => "-36.941793",
				"lon" => "143.211642"
			],
			[
				"postcode" => "3381",
				"suburb" => "BELLFIELD",
				"state" => "VIC",
				"lat" => "-37.228577",
				"lon" => "142.480053"
			],
			[
				"postcode" => "3381",
				"suburb" => "BOLANGUM",
				"state" => "VIC",
				"lat" => "-36.716649",
				"lon" => "142.99812"
			],
			[
				"postcode" => "3381",
				"suburb" => "CALLAWADDA",
				"state" => "VIC",
				"lat" => "-36.817331",
				"lon" => "142.785567"
			],
			[
				"postcode" => "3381",
				"suburb" => "CAMPBELLS BRIDGE",
				"state" => "VIC",
				"lat" => "-36.916423",
				"lon" => "142.785635"
			],
			[
				"postcode" => "3381",
				"suburb" => "CONCONGELLA",
				"state" => "VIC",
				"lat" => "-37.053735",
				"lon" => "142.875032"
			],
			[
				"postcode" => "3381",
				"suburb" => "DEEP LEAD",
				"state" => "VIC",
				"lat" => "-37.009961",
				"lon" => "142.715571"
			],
			[
				"postcode" => "3381",
				"suburb" => "FYANS CREEK",
				"state" => "VIC",
				"lat" => "-37.08344",
				"lon" => "142.565254"
			],
			[
				"postcode" => "3381",
				"suburb" => "GERMANIA",
				"state" => "VIC",
				"lat" => "-36.976575",
				"lon" => "142.758501"
			],
			[
				"postcode" => "3381",
				"suburb" => "GREENS CREEK",
				"state" => "VIC",
				"lat" => "-36.950991",
				"lon" => "142.936558"
			],
			[
				"postcode" => "3381",
				"suburb" => "HALLS GAP",
				"state" => "VIC",
				"lat" => "-37.141371",
				"lon" => "142.518955"
			],
			[
				"postcode" => "3381",
				"suburb" => "ILLAWARRA",
				"state" => "VIC",
				"lat" => "-37.053668",
				"lon" => "142.688557"
			],
			[
				"postcode" => "3381",
				"suburb" => "JOEL JOEL",
				"state" => "VIC",
				"lat" => "-37.006333",
				"lon" => "142.990618"
			],
			[
				"postcode" => "3381",
				"suburb" => "JOEL SOUTH",
				"state" => "VIC",
				"lat" => "-37.056742",
				"lon" => "143.049734"
			],
			[
				"postcode" => "3381",
				"suburb" => "KANYA",
				"state" => "VIC",
				"lat" => "-36.782368",
				"lon" => "142.998913"
			],
			[
				"postcode" => "3381",
				"suburb" => "LAKE FYANS",
				"state" => "VIC",
				"lat" => "-37.135366",
				"lon" => "142.627942"
			],
			[
				"postcode" => "3381",
				"suburb" => "LAKE LONSDALE",
				"state" => "VIC",
				"lat" => "-37.047728",
				"lon" => "142.581813"
			],
			[
				"postcode" => "3381",
				"suburb" => "LUBECK",
				"state" => "VIC",
				"lat" => "-36.746935",
				"lon" => "142.548741"
			],
			[
				"postcode" => "3381",
				"suburb" => "MORRL MORRL",
				"state" => "VIC",
				"lat" => "-36.854505",
				"lon" => "142.933441"
			],
			[
				"postcode" => "3381",
				"suburb" => "PARADISE",
				"state" => "VIC",
				"lat" => "-36.831662",
				"lon" => "143.108792"
			],
			[
				"postcode" => "3381",
				"suburb" => "POMONAL",
				"state" => "VIC",
				"lat" => "-37.192318",
				"lon" => "142.609034"
			],
			[
				"postcode" => "3381",
				"suburb" => "ROSTRON",
				"state" => "VIC",
				"lat" => "-36.769367",
				"lon" => "143.176161"
			],
			[
				"postcode" => "3381",
				"suburb" => "WAL WAL",
				"state" => "VIC",
				"lat" => "-36.84136",
				"lon" => "142.598921"
			],
			[
				"postcode" => "3381",
				"suburb" => "WALLALOO",
				"state" => "VIC",
				"lat" => "-36.7285",
				"lon" => "142.892723"
			],
			[
				"postcode" => "3381",
				"suburb" => "WALLALOO EAST",
				"state" => "VIC",
				"lat" => "-36.781477",
				"lon" => "142.930714"
			],
			[
				"postcode" => "3384",
				"suburb" => "FRENCHMANS",
				"state" => "VIC",
				"lat" => "-36.979212",
				"lon" => "143.198999"
			],
			[
				"postcode" => "3384",
				"suburb" => "LANDSBOROUGH",
				"state" => "VIC",
				"lat" => "-37.004798",
				"lon" => "143.129581"
			],
			[
				"postcode" => "3384",
				"suburb" => "LANDSBOROUGH WEST",
				"state" => "VIC",
				"lat" => "-37.012381",
				"lon" => "143.053574"
			],
			[
				"postcode" => "3384",
				"suburb" => "NAVARRE",
				"state" => "VIC",
				"lat" => "-36.900107",
				"lon" => "143.11354"
			],
			[
				"postcode" => "3384",
				"suburb" => "SHAYS FLAT",
				"state" => "VIC",
				"lat" => "-37.065177",
				"lon" => "143.090811"
			],
			[
				"postcode" => "3384",
				"suburb" => "WATTLE CREEK",
				"state" => "VIC",
				"lat" => "-36.980263",
				"lon" => "143.111695"
			],
			[
				"postcode" => "3385",
				"suburb" => "DADSWELLS BRIDGE",
				"state" => "VIC",
				"lat" => "-36.916062",
				"lon" => "142.511313"
			],
			[
				"postcode" => "3385",
				"suburb" => "GLENORCHY",
				"state" => "VIC",
				"lat" => "-36.910409",
				"lon" => "142.655571"
			],
			[
				"postcode" => "3385",
				"suburb" => "LEDCOURT",
				"state" => "VIC",
				"lat" => "-36.96876",
				"lon" => "142.515765"
			],
			[
				"postcode" => "3385",
				"suburb" => "RIACHELLA",
				"state" => "VIC",
				"lat" => "-36.82488",
				"lon" => "142.687805"
			],
			[
				"postcode" => "3387",
				"suburb" => "MARNOO",
				"state" => "VIC",
				"lat" => "-36.671662",
				"lon" => "142.869768"
			],
			[
				"postcode" => "3388",
				"suburb" => "BANYENA",
				"state" => "VIC",
				"lat" => "-36.572229",
				"lon" => "142.816541"
			],
			[
				"postcode" => "3388",
				"suburb" => "RUPANYUP",
				"state" => "VIC",
				"lat" => "-36.630462",
				"lon" => "142.63136"
			],
			[
				"postcode" => "3390",
				"suburb" => "KEWELL",
				"state" => "VIC",
				"lat" => "-36.449414",
				"lon" => "142.422325"
			],
			[
				"postcode" => "3390",
				"suburb" => "MURTOA",
				"state" => "VIC",
				"lat" => "-36.620248",
				"lon" => "142.470529"
			],
			[
				"postcode" => "3391",
				"suburb" => "BRIM",
				"state" => "VIC",
				"lat" => "-36.069357",
				"lon" => "142.519496"
			],
			[
				"postcode" => "3392",
				"suburb" => "MINYIP",
				"state" => "VIC",
				"lat" => "-36.460553",
				"lon" => "142.586163"
			],
			[
				"postcode" => "3392",
				"suburb" => "SHEEP HILLS",
				"state" => "VIC",
				"lat" => "-36.349474",
				"lon" => "142.529677"
			],
			[
				"postcode" => "3393",
				"suburb" => "AILSA",
				"state" => "VIC",
				"lat" => "-36.331465",
				"lon" => "142.363833"
			],
			[
				"postcode" => "3393",
				"suburb" => "ANGIP",
				"state" => "VIC",
				"lat" => "-36.102371",
				"lon" => "142.224515"
			],
			[
				"postcode" => "3393",
				"suburb" => "AUBREY",
				"state" => "VIC",
				"lat" => "-36.241102",
				"lon" => "142.234143"
			],
			[
				"postcode" => "3393",
				"suburb" => "BANGERANG",
				"state" => "VIC",
				"lat" => "-36.182982",
				"lon" => "142.549706"
			],
			[
				"postcode" => "3393",
				"suburb" => "CANNUM",
				"state" => "VIC",
				"lat" => "-36.310127",
				"lon" => "142.243725"
			],
			[
				"postcode" => "3393",
				"suburb" => "CRYMELON",
				"state" => "VIC",
				"lat" => "-36.154101",
				"lon" => "142.268098"
			],
			[
				"postcode" => "3393",
				"suburb" => "KELLALAC",
				"state" => "VIC",
				"lat" => "-36.389971",
				"lon" => "142.394232"
			],
			[
				"postcode" => "3393",
				"suburb" => "LAH",
				"state" => "VIC",
				"lat" => "-36.128411",
				"lon" => "142.420452"
			],
			[
				"postcode" => "3393",
				"suburb" => "WARRACKNABEAL",
				"state" => "VIC",
				"lat" => "-36.253202",
				"lon" => "142.402596"
			],
			[
				"postcode" => "3393",
				"suburb" => "WILKUR",
				"state" => "VIC",
				"lat" => "-36.050005",
				"lon" => "142.724535"
			],
			[
				"postcode" => "3393",
				"suburb" => "WILLENABRINA",
				"state" => "VIC",
				"lat" => "-36.040823",
				"lon" => "142.218395"
			],
			[
				"postcode" => "3395",
				"suburb" => "BEULAH",
				"state" => "VIC",
				"lat" => "-35.93804",
				"lon" => "142.418961"
			],
			[
				"postcode" => "3395",
				"suburb" => "KENMARE",
				"state" => "VIC",
				"lat" => "-35.930786",
				"lon" => "142.238991"
			],
			[
				"postcode" => "3396",
				"suburb" => "HOPETOUN",
				"state" => "VIC",
				"lat" => "-35.727235",
				"lon" => "142.364734"
			],
			[
				"postcode" => "3396",
				"suburb" => "HOPEVALE",
				"state" => "VIC",
				"lat" => "-35.806411",
				"lon" => "142.240719"
			],
			[
				"postcode" => "3396",
				"suburb" => "YARTO",
				"state" => "VIC",
				"lat" => "-35.517724",
				"lon" => "142.358521"
			],
			[
				"postcode" => "3400",
				"suburb" => "HORSHAM",
				"state" => "VIC",
				"lat" => "-36.711714",
				"lon" => "142.204899"
			],
			[
				"postcode" => "3400",
				"suburb" => "HORSHAM WEST",
				"state" => "VIC",
				"lat" => "-36.722304",
				"lon" => "142.17788"
			],
			[
				"postcode" => "3401",
				"suburb" => "BLACKHEATH",
				"state" => "VIC",
				"lat" => "-36.455387",
				"lon" => "142.30917"
			],
			[
				"postcode" => "3401",
				"suburb" => "BRIMPAEN",
				"state" => "VIC",
				"lat" => "-37.050262",
				"lon" => "142.211604"
			],
			[
				"postcode" => "3401",
				"suburb" => "BUNGALALLY",
				"state" => "VIC",
				"lat" => "-36.797118",
				"lon" => "142.230516"
			],
			[
				"postcode" => "3401",
				"suburb" => "CHERRYPOOL",
				"state" => "VIC",
				"lat" => "-37.121087",
				"lon" => "142.192167"
			],
			[
				"postcode" => "3401",
				"suburb" => "DOOEN",
				"state" => "VIC",
				"lat" => "-36.657569",
				"lon" => "142.257313"
			],
			[
				"postcode" => "3401",
				"suburb" => "DRUNG",
				"state" => "VIC",
				"lat" => "-36.715903",
				"lon" => "142.3345"
			],
			[
				"postcode" => "3401",
				"suburb" => "GYMBOWEN",
				"state" => "VIC",
				"lat" => "-36.731403",
				"lon" => "141.592382"
			],
			[
				"postcode" => "3401",
				"suburb" => "HAVEN",
				"state" => "VIC",
				"lat" => "-36.748085",
				"lon" => "142.178789"
			],
			[
				"postcode" => "3401",
				"suburb" => "HORSHAM",
				"state" => "VIC",
				"lat" => "-36.711714",
				"lon" => "142.204899"
			],
			[
				"postcode" => "3401",
				"suburb" => "JUNG",
				"state" => "VIC",
				"lat" => "-36.607806",
				"lon" => "142.360074"
			],
			[
				"postcode" => "3401",
				"suburb" => "KALKEE",
				"state" => "VIC",
				"lat" => "-36.547269",
				"lon" => "142.209253"
			],
			[
				"postcode" => "3401",
				"suburb" => "KANAGULK",
				"state" => "VIC",
				"lat" => "-37.12889",
				"lon" => "141.848527"
			],
			[
				"postcode" => "3401",
				"suburb" => "KARNAK",
				"state" => "VIC",
				"lat" => "-36.865321",
				"lon" => "141.486565"
			],
			[
				"postcode" => "3401",
				"suburb" => "LAHARUM",
				"state" => "VIC",
				"lat" => "-36.946669",
				"lon" => "142.323875"
			],
			[
				"postcode" => "3401",
				"suburb" => "LONGERENONG",
				"state" => "VIC",
				"lat" => "-36.671731",
				"lon" => "142.330787"
			],
			[
				"postcode" => "3401",
				"suburb" => "LOWER NORTON",
				"state" => "VIC",
				"lat" => "-36.785779",
				"lon" => "142.083514"
			],
			[
				"postcode" => "3401",
				"suburb" => "MCKENZIE CREEK",
				"state" => "VIC",
				"lat" => "-36.783608",
				"lon" => "142.173995"
			],
			[
				"postcode" => "3401",
				"suburb" => "MOCKINYA",
				"state" => "VIC",
				"lat" => "-36.961856",
				"lon" => "142.153851"
			],
			[
				"postcode" => "3401",
				"suburb" => "MURRA WARRA",
				"state" => "VIC",
				"lat" => "-36.437495",
				"lon" => "142.225612"
			],
			[
				"postcode" => "3401",
				"suburb" => "NURCOUNG",
				"state" => "VIC",
				"lat" => "-36.631605",
				"lon" => "141.683367"
			],
			[
				"postcode" => "3401",
				"suburb" => "NURRABIEL",
				"state" => "VIC",
				"lat" => "-36.913902",
				"lon" => "142.038307"
			],
			[
				"postcode" => "3401",
				"suburb" => "PIMPINIO",
				"state" => "VIC",
				"lat" => "-36.587573",
				"lon" => "142.120393"
			],
			[
				"postcode" => "3401",
				"suburb" => "QUANTONG",
				"state" => "VIC",
				"lat" => "-36.737533",
				"lon" => "142.021508"
			],
			[
				"postcode" => "3401",
				"suburb" => "RIVERSIDE",
				"state" => "VIC",
				"lat" => "-36.703736",
				"lon" => "142.238181"
			],
			[
				"postcode" => "3401",
				"suburb" => "ROCKLANDS",
				"state" => "VIC",
				"lat" => "-37.207637",
				"lon" => "141.942484"
			],
			[
				"postcode" => "3401",
				"suburb" => "ST HELENS PLAINS",
				"state" => "VIC",
				"lat" => "-36.767965",
				"lon" => "142.406357"
			],
			[
				"postcode" => "3401",
				"suburb" => "TELANGATUK EAST",
				"state" => "VIC",
				"lat" => "-37.074713",
				"lon" => "141.976505"
			],
			[
				"postcode" => "3401",
				"suburb" => "TOOLONDO",
				"state" => "VIC",
				"lat" => "-36.992793",
				"lon" => "141.93403"
			],
			[
				"postcode" => "3401",
				"suburb" => "VECTIS",
				"state" => "VIC",
				"lat" => "-36.713783",
				"lon" => "142.062946"
			],
			[
				"postcode" => "3401",
				"suburb" => "WAIL",
				"state" => "VIC",
				"lat" => "-36.509398",
				"lon" => "142.1026"
			],
			[
				"postcode" => "3401",
				"suburb" => "WALLUP",
				"state" => "VIC",
				"lat" => "-36.331267",
				"lon" => "142.239762"
			],
			[
				"postcode" => "3401",
				"suburb" => "WARTOOK",
				"state" => "VIC",
				"lat" => "-37.033414",
				"lon" => "142.340592"
			],
			[
				"postcode" => "3401",
				"suburb" => "WONWONDAH",
				"state" => "VIC",
				"lat" => "-36.899739",
				"lon" => "142.135435"
			],
			[
				"postcode" => "3401",
				"suburb" => "ZUMSTEINS",
				"state" => "VIC",
				"lat" => "-37.092355",
				"lon" => "142.431933"
			],
			[
				"postcode" => "3402",
				"suburb" => "HORSHAM",
				"state" => "VIC",
				"lat" => "-37.164183",
				"lon" => "142.666302"
			],
			[
				"postcode" => "3407",
				"suburb" => "BALMORAL",
				"state" => "VIC",
				"lat" => "-37.248109",
				"lon" => "141.841762"
			],
			[
				"postcode" => "3407",
				"suburb" => "ENGLEFIELD",
				"state" => "VIC",
				"lat" => "-37.31601",
				"lon" => "141.81832"
			],
			[
				"postcode" => "3407",
				"suburb" => "GATUM",
				"state" => "VIC",
				"lat" => "-37.397755",
				"lon" => "141.956241"
			],
			[
				"postcode" => "3407",
				"suburb" => "PIGEON PONDS",
				"state" => "VIC",
				"lat" => "-37.295245",
				"lon" => "141.668245"
			],
			[
				"postcode" => "3407",
				"suburb" => "VASEY",
				"state" => "VIC",
				"lat" => "-37.370978",
				"lon" => "141.872121"
			],
			[
				"postcode" => "3409",
				"suburb" => "ARAPILES",
				"state" => "VIC",
				"lat" => "-36.779163",
				"lon" => "141.762526"
			],
			[
				"postcode" => "3409",
				"suburb" => "CLEAR LAKE",
				"state" => "VIC",
				"lat" => "-37.04162",
				"lon" => "141.716529"
			],
			[
				"postcode" => "3409",
				"suburb" => "DOUGLAS",
				"state" => "VIC",
				"lat" => "-37.842988",
				"lon" => "144.892631"
			],
			[
				"postcode" => "3409",
				"suburb" => "DUCHEMBEGARRA",
				"state" => "VIC",
				"lat" => "-36.623534",
				"lon" => "141.947299"
			],
			[
				"postcode" => "3409",
				"suburb" => "GRASS FLAT",
				"state" => "VIC",
				"lat" => "-36.664864",
				"lon" => "141.865311"
			],
			[
				"postcode" => "3409",
				"suburb" => "JILPANGER",
				"state" => "VIC",
				"lat" => "-37.783465",
				"lon" => "145.175907"
			],
			[
				"postcode" => "3409",
				"suburb" => "MIGA LAKE",
				"state" => "VIC",
				"lat" => "-36.93852",
				"lon" => "141.626234"
			],
			[
				"postcode" => "3409",
				"suburb" => "MITRE",
				"state" => "VIC",
				"lat" => "-36.754508",
				"lon" => "141.767459"
			],
			[
				"postcode" => "3409",
				"suburb" => "NATIMUK",
				"state" => "VIC",
				"lat" => "-36.741816",
				"lon" => "141.941948"
			],
			[
				"postcode" => "3409",
				"suburb" => "NORADJUHA",
				"state" => "VIC",
				"lat" => "-36.834829",
				"lon" => "141.972845"
			],
			[
				"postcode" => "3409",
				"suburb" => "TOOAN",
				"state" => "VIC",
				"lat" => "-36.783589",
				"lon" => "141.764633"
			],
			[
				"postcode" => "3409",
				"suburb" => "WOMBELANO",
				"state" => "VIC",
				"lat" => "-37.079728",
				"lon" => "141.747046"
			],
			[
				"postcode" => "3412",
				"suburb" => "GOROKE",
				"state" => "VIC",
				"lat" => "-36.747329",
				"lon" => "141.472623"
			],
			[
				"postcode" => "3413",
				"suburb" => "MINIMAY",
				"state" => "VIC",
				"lat" => "-36.714185",
				"lon" => "141.180738"
			],
			[
				"postcode" => "3413",
				"suburb" => "NEUARPURR",
				"state" => "VIC",
				"lat" => "-36.743083",
				"lon" => "141.071497"
			],
			[
				"postcode" => "3413",
				"suburb" => "OZENKADNOOK",
				"state" => "VIC",
				"lat" => "-36.844934",
				"lon" => "141.330012"
			],
			[
				"postcode" => "3413",
				"suburb" => "PERONNE",
				"state" => "VIC",
				"lat" => "-36.724135",
				"lon" => "141.377862"
			],
			[
				"postcode" => "3414",
				"suburb" => "ANTWERP",
				"state" => "VIC",
				"lat" => "-36.298418",
				"lon" => "142.024557"
			],
			[
				"postcode" => "3414",
				"suburb" => "DIMBOOLA",
				"state" => "VIC",
				"lat" => "-36.455551",
				"lon" => "142.027588"
			],
			[
				"postcode" => "3414",
				"suburb" => "TARRANYURK",
				"state" => "VIC",
				"lat" => "-36.211453",
				"lon" => "142.034536"
			],
			[
				"postcode" => "3415",
				"suburb" => "MIRAM",
				"state" => "VIC",
				"lat" => "-36.378089",
				"lon" => "141.357823"
			],
			[
				"postcode" => "3418",
				"suburb" => "BROUGHTON",
				"state" => "VIC",
				"lat" => "-36.165178",
				"lon" => "141.334582"
			],
			[
				"postcode" => "3418",
				"suburb" => "GERANG GERUNG",
				"state" => "VIC",
				"lat" => "-36.373589",
				"lon" => "141.885252"
			],
			[
				"postcode" => "3418",
				"suburb" => "GLENLEE",
				"state" => "VIC",
				"lat" => "-36.244028",
				"lon" => "141.852554"
			],
			[
				"postcode" => "3418",
				"suburb" => "KIATA",
				"state" => "VIC",
				"lat" => "-36.402759",
				"lon" => "141.79328"
			],
			[
				"postcode" => "3418",
				"suburb" => "LAWLOIT",
				"state" => "VIC",
				"lat" => "-36.419148",
				"lon" => "141.463761"
			],
			[
				"postcode" => "3418",
				"suburb" => "LITTLE DESERT",
				"state" => "VIC",
				"lat" => "-36.48148",
				"lon" => "141.600922"
			],
			[
				"postcode" => "3418",
				"suburb" => "LORQUON",
				"state" => "VIC",
				"lat" => "-36.133321",
				"lon" => "141.749243"
			],
			[
				"postcode" => "3418",
				"suburb" => "NETHERBY",
				"state" => "VIC",
				"lat" => "-36.104936",
				"lon" => "141.616536"
			],
			[
				"postcode" => "3418",
				"suburb" => "NHILL",
				"state" => "VIC",
				"lat" => "-36.332858",
				"lon" => "141.650635"
			],
			[
				"postcode" => "3418",
				"suburb" => "YANAC",
				"state" => "VIC",
				"lat" => "-36.147883",
				"lon" => "141.435374"
			],
			[
				"postcode" => "3419",
				"suburb" => "KANIVA",
				"state" => "VIC",
				"lat" => "-36.377563",
				"lon" => "141.244901"
			],
			[
				"postcode" => "3420",
				"suburb" => "LILLIMUR",
				"state" => "VIC",
				"lat" => "-36.361245",
				"lon" => "141.117251"
			],
			[
				"postcode" => "3420",
				"suburb" => "SERVICETON",
				"state" => "VIC",
				"lat" => "-36.376549",
				"lon" => "140.986209"
			],
			[
				"postcode" => "3420",
				"suburb" => "TELOPEA DOWNS",
				"state" => "VIC",
				"lat" => "-36.13056",
				"lon" => "141.143503"
			],
			[
				"postcode" => "3423",
				"suburb" => "JEPARIT",
				"state" => "VIC",
				"lat" => "-36.14057",
				"lon" => "141.987191"
			],
			[
				"postcode" => "3424",
				"suburb" => "ALBACUTYA",
				"state" => "VIC",
				"lat" => "-35.691918",
				"lon" => "141.974601"
			],
			[
				"postcode" => "3424",
				"suburb" => "YAAPEET",
				"state" => "VIC",
				"lat" => "-35.766065",
				"lon" => "142.060249"
			],
			[
				"postcode" => "3427",
				"suburb" => "DIGGERS REST",
				"state" => "VIC",
				"lat" => "-37.627752",
				"lon" => "144.719981"
			],
			[
				"postcode" => "3428",
				"suburb" => "BULLA",
				"state" => "VIC",
				"lat" => "-37.637155",
				"lon" => "144.804139"
			],
			[
				"postcode" => "3429",
				"suburb" => "SUNBURY",
				"state" => "VIC",
				"lat" => "-37.576859",
				"lon" => "144.731425"
			],
			[
				"postcode" => "3429",
				"suburb" => "WILDWOOD",
				"state" => "VIC",
				"lat" => "-37.575434",
				"lon" => "144.795859"
			],
			[
				"postcode" => "3430",
				"suburb" => "CLARKEFIELD",
				"state" => "VIC",
				"lat" => "-37.483711",
				"lon" => "144.745723"
			],
			[
				"postcode" => "3431",
				"suburb" => "RIDDELLS CREEK",
				"state" => "VIC",
				"lat" => "-37.463999",
				"lon" => "144.665048"
			],
			[
				"postcode" => "3432",
				"suburb" => "BOLINDA",
				"state" => "VIC",
				"lat" => "-37.433632",
				"lon" => "144.77977"
			],
			[
				"postcode" => "3434",
				"suburb" => "CHEROKEE",
				"state" => "VIC",
				"lat" => "-37.389195",
				"lon" => "144.6379"
			],
			[
				"postcode" => "3434",
				"suburb" => "KERRIE",
				"state" => "VIC",
				"lat" => "-37.390614",
				"lon" => "144.697088"
			],
			[
				"postcode" => "3434",
				"suburb" => "ROMSEY",
				"state" => "VIC",
				"lat" => "-37.348923",
				"lon" => "144.742359"
			],
			[
				"postcode" => "3434",
				"suburb" => "SPRINGFIELD",
				"state" => "VIC",
				"lat" => "-37.358834",
				"lon" => "144.821043"
			],
			[
				"postcode" => "3435",
				"suburb" => "BENLOCH",
				"state" => "VIC",
				"lat" => "-37.189508",
				"lon" => "144.692899"
			],
			[
				"postcode" => "3435",
				"suburb" => "GOLDIE",
				"state" => "VIC",
				"lat" => "-37.255579",
				"lon" => "144.801162"
			],
			[
				"postcode" => "3435",
				"suburb" => "LANCEFIELD",
				"state" => "VIC",
				"lat" => "-37.276795",
				"lon" => "144.731718"
			],
			[
				"postcode" => "3435",
				"suburb" => "NULLA VALE",
				"state" => "VIC",
				"lat" => "-37.172089",
				"lon" => "144.750918"
			],
			[
				"postcode" => "3437",
				"suburb" => "BULLENGAROOK",
				"state" => "VIC",
				"lat" => "-37.523331",
				"lon" => "144.477431"
			],
			[
				"postcode" => "3437",
				"suburb" => "GISBORNE",
				"state" => "VIC",
				"lat" => "-37.488037",
				"lon" => "144.59112"
			],
			[
				"postcode" => "3437",
				"suburb" => "GISBORNE SOUTH",
				"state" => "VIC",
				"lat" => "-37.53865",
				"lon" => "144.597248"
			],
			[
				"postcode" => "3438",
				"suburb" => "NEW GISBORNE",
				"state" => "VIC",
				"lat" => "-37.459119",
				"lon" => "144.599206"
			],
			[
				"postcode" => "3440",
				"suburb" => "MACEDON",
				"state" => "VIC",
				"lat" => "-37.399584",
				"lon" => "144.588405"
			],
			[
				"postcode" => "3441",
				"suburb" => "MOUNT MACEDON",
				"state" => "VIC",
				"lat" => "-37.396044",
				"lon" => "144.590721"
			],
			[
				"postcode" => "3442",
				"suburb" => "ASHBOURNE",
				"state" => "VIC",
				"lat" => "-37.385948",
				"lon" => "144.446407"
			],
			[
				"postcode" => "3442",
				"suburb" => "CADELLO",
				"state" => "VIC",
				"lat" => "-37.295815",
				"lon" => "144.543992"
			],
			[
				"postcode" => "3442",
				"suburb" => "CARLSRUHE",
				"state" => "VIC",
				"lat" => "-37.286556",
				"lon" => "144.513823"
			],
			[
				"postcode" => "3442",
				"suburb" => "COBAW",
				"state" => "VIC",
				"lat" => "-37.260826",
				"lon" => "144.655906"
			],
			[
				"postcode" => "3442",
				"suburb" => "HANGING ROCK",
				"state" => "VIC",
				"lat" => "-37.327655",
				"lon" => "144.594968"
			],
			[
				"postcode" => "3442",
				"suburb" => "HESKET",
				"state" => "VIC",
				"lat" => "-37.34745",
				"lon" => "144.620225"
			],
			[
				"postcode" => "3442",
				"suburb" => "NEWHAM",
				"state" => "VIC",
				"lat" => "-37.313335",
				"lon" => "144.592383"
			],
			[
				"postcode" => "3442",
				"suburb" => "ROCHFORD",
				"state" => "VIC",
				"lat" => "-37.311685",
				"lon" => "144.676513"
			],
			[
				"postcode" => "3442",
				"suburb" => "WOODEND",
				"state" => "VIC",
				"lat" => "-37.35681",
				"lon" => "144.52727"
			],
			[
				"postcode" => "3442",
				"suburb" => "WOODEND NORTH",
				"state" => "VIC",
				"lat" => "-37.323937",
				"lon" => "144.541667"
			],
			[
				"postcode" => "3444",
				"suburb" => "BARFOLD",
				"state" => "VIC",
				"lat" => "-37.091978",
				"lon" => "144.50611"
			],
			[
				"postcode" => "3444",
				"suburb" => "BAYNTON",
				"state" => "VIC",
				"lat" => "-37.147477",
				"lon" => "144.628537"
			],
			[
				"postcode" => "3444",
				"suburb" => "BAYNTON EAST",
				"state" => "VIC",
				"lat" => "-37.122322",
				"lon" => "144.71193"
			],
			[
				"postcode" => "3444",
				"suburb" => "EDGECOMBE",
				"state" => "VIC",
				"lat" => "-37.183037",
				"lon" => "144.493092"
			],
			[
				"postcode" => "3444",
				"suburb" => "GLENHOPE",
				"state" => "VIC",
				"lat" => "-37.086279",
				"lon" => "144.609211"
			],
			[
				"postcode" => "3444",
				"suburb" => "GREENHILL",
				"state" => "VIC",
				"lat" => "-37.174031",
				"lon" => "144.449466"
			],
			[
				"postcode" => "3444",
				"suburb" => "KYNETON",
				"state" => "VIC",
				"lat" => "-37.248467",
				"lon" => "144.453354"
			],
			[
				"postcode" => "3444",
				"suburb" => "KYNETON SOUTH",
				"state" => "VIC",
				"lat" => "-37.286853",
				"lon" => "144.445689"
			],
			[
				"postcode" => "3444",
				"suburb" => "LANGLEY",
				"state" => "VIC",
				"lat" => "-37.149333",
				"lon" => "144.493373"
			],
			[
				"postcode" => "3444",
				"suburb" => "LAURISTON",
				"state" => "VIC",
				"lat" => "-37.239435",
				"lon" => "144.368266"
			],
			[
				"postcode" => "3444",
				"suburb" => "LYAL",
				"state" => "VIC",
				"lat" => "-36.929279",
				"lon" => "144.459509"
			],
			[
				"postcode" => "3444",
				"suburb" => "METCALFE EAST",
				"state" => "VIC",
				"lat" => "-37.137839",
				"lon" => "144.447253"
			],
			[
				"postcode" => "3444",
				"suburb" => "MIA MIA",
				"state" => "VIC",
				"lat" => "-37.000433",
				"lon" => "144.570796"
			],
			[
				"postcode" => "3444",
				"suburb" => "MYRTLE CREEK",
				"state" => "VIC",
				"lat" => "-36.951244",
				"lon" => "144.428545"
			],
			[
				"postcode" => "3444",
				"suburb" => "PASTORIA",
				"state" => "VIC",
				"lat" => "-37.216862",
				"lon" => "144.53667"
			],
			[
				"postcode" => "3444",
				"suburb" => "PASTORIA EAST",
				"state" => "VIC",
				"lat" => "-37.178335",
				"lon" => "144.640182"
			],
			[
				"postcode" => "3444",
				"suburb" => "PIPERS CREEK",
				"state" => "VIC",
				"lat" => "-37.252289",
				"lon" => "144.547277"
			],
			[
				"postcode" => "3444",
				"suburb" => "REDESDALE",
				"state" => "VIC",
				"lat" => "-37.021382",
				"lon" => "144.532054"
			],
			[
				"postcode" => "3444",
				"suburb" => "SIDONIA",
				"state" => "VIC",
				"lat" => "-37.137443",
				"lon" => "144.573806"
			],
			[
				"postcode" => "3444",
				"suburb" => "SPRING HILL",
				"state" => "VIC",
				"lat" => "-37.314116",
				"lon" => "144.35067"
			],
			[
				"postcode" => "3444",
				"suburb" => "TYLDEN",
				"state" => "VIC",
				"lat" => "-37.32541",
				"lon" => "144.406442"
			],
			[
				"postcode" => "3444",
				"suburb" => "TYLDEN SOUTH",
				"state" => "VIC",
				"lat" => "-37.353578",
				"lon" => "144.373464"
			],
			[
				"postcode" => "3446",
				"suburb" => "DRUMMOND NORTH",
				"state" => "VIC",
				"lat" => "-37.199978",
				"lon" => "144.29344"
			],
			[
				"postcode" => "3446",
				"suburb" => "MALMSBURY",
				"state" => "VIC",
				"lat" => "-37.18842",
				"lon" => "144.382533"
			],
			[
				"postcode" => "3447",
				"suburb" => "TARADALE",
				"state" => "VIC",
				"lat" => "-37.133438",
				"lon" => "144.356519"
			],
			[
				"postcode" => "3448",
				"suburb" => "ELPHINSTONE",
				"state" => "VIC",
				"lat" => "-37.105",
				"lon" => "144.337783"
			],
			[
				"postcode" => "3448",
				"suburb" => "METCALFE",
				"state" => "VIC",
				"lat" => "-37.102084",
				"lon" => "144.423136"
			],
			[
				"postcode" => "3448",
				"suburb" => "SUTTON GRANGE",
				"state" => "VIC",
				"lat" => "-36.990506",
				"lon" => "144.358577"
			],
			[
				"postcode" => "3450",
				"suburb" => "CASTLEMAINE",
				"state" => "VIC",
				"lat" => "-37.063869",
				"lon" => "144.217101"
			],
			[
				"postcode" => "3450",
				"suburb" => "MOONLIGHT FLAT",
				"state" => "VIC",
				"lat" => "-37.060183",
				"lon" => "144.244448"
			],
			[
				"postcode" => "3451",
				"suburb" => "BARKERS CREEK",
				"state" => "VIC",
				"lat" => "-37.0292",
				"lon" => "144.239946"
			],
			[
				"postcode" => "3451",
				"suburb" => "CAMPBELLS CREEK",
				"state" => "VIC",
				"lat" => "-37.094107",
				"lon" => "144.203759"
			],
			[
				"postcode" => "3451",
				"suburb" => "CHEWTON",
				"state" => "VIC",
				"lat" => "-37.081139",
				"lon" => "144.25651"
			],
			[
				"postcode" => "3451",
				"suburb" => "CHEWTON BUSHLANDS",
				"state" => "VIC",
				"lat" => "-37.073952",
				"lon" => "144.286574"
			],
			[
				"postcode" => "3451",
				"suburb" => "FARADAY",
				"state" => "VIC",
				"lat" => "-37.043052",
				"lon" => "144.290219"
			],
			[
				"postcode" => "3451",
				"suburb" => "FRYERSTOWN",
				"state" => "VIC",
				"lat" => "-37.141197",
				"lon" => "144.24988"
			],
			[
				"postcode" => "3451",
				"suburb" => "GLENLUCE",
				"state" => "VIC",
				"lat" => "-37.187501",
				"lon" => "144.23947"
			],
			[
				"postcode" => "3451",
				"suburb" => "GOLDEN POINT",
				"state" => "VIC",
				"lat" => "-37.070795",
				"lon" => "144.274803"
			],
			[
				"postcode" => "3451",
				"suburb" => "GOWER",
				"state" => "VIC",
				"lat" => "-37.03258",
				"lon" => "144.100645"
			],
			[
				"postcode" => "3451",
				"suburb" => "GUILDFORD",
				"state" => "VIC",
				"lat" => "-37.151069",
				"lon" => "144.160962"
			],
			[
				"postcode" => "3451",
				"suburb" => "IRISHTOWN",
				"state" => "VIC",
				"lat" => "-37.153711",
				"lon" => "144.23221"
			],
			[
				"postcode" => "3451",
				"suburb" => "MCKENZIE HILL",
				"state" => "VIC",
				"lat" => "-37.069084",
				"lon" => "144.198261"
			],
			[
				"postcode" => "3451",
				"suburb" => "MUCKLEFORD",
				"state" => "VIC",
				"lat" => "-37.057404",
				"lon" => "144.145959"
			],
			[
				"postcode" => "3451",
				"suburb" => "TARILTA",
				"state" => "VIC",
				"lat" => "-37.166325",
				"lon" => "144.192235"
			],
			[
				"postcode" => "3451",
				"suburb" => "VAUGHAN",
				"state" => "VIC",
				"lat" => "-37.157268",
				"lon" => "144.210421"
			],
			[
				"postcode" => "3451",
				"suburb" => "YAPEEN",
				"state" => "VIC",
				"lat" => "-37.122722",
				"lon" => "144.16841"
			],
			[
				"postcode" => "3453",
				"suburb" => "HARCOURT",
				"state" => "VIC",
				"lat" => "-36.998965",
				"lon" => "144.262588"
			],
			[
				"postcode" => "3453",
				"suburb" => "HARCOURT NORTH",
				"state" => "VIC",
				"lat" => "-36.970325",
				"lon" => "144.28189"
			],
			[
				"postcode" => "3453",
				"suburb" => "RAVENSWOOD",
				"state" => "VIC",
				"lat" => "-36.899628",
				"lon" => "144.217529"
			],
			[
				"postcode" => "3453",
				"suburb" => "RAVENSWOOD SOUTH",
				"state" => "VIC",
				"lat" => "-36.934927",
				"lon" => "144.227601"
			],
			[
				"postcode" => "3458",
				"suburb" => "BARRYS REEF",
				"state" => "VIC",
				"lat" => "-37.451989",
				"lon" => "144.293564"
			],
			[
				"postcode" => "3458",
				"suburb" => "BLACKWOOD",
				"state" => "VIC",
				"lat" => "-37.472283",
				"lon" => "144.306407"
			],
			[
				"postcode" => "3458",
				"suburb" => "FERN HILL",
				"state" => "VIC",
				"lat" => "-37.357651",
				"lon" => "144.392692"
			],
			[
				"postcode" => "3458",
				"suburb" => "LERDERDERG",
				"state" => "VIC",
				"lat" => "-37.51709",
				"lon" => "144.37593"
			],
			[
				"postcode" => "3458",
				"suburb" => "LITTLE HAMPTON",
				"state" => "VIC",
				"lat" => "-37.359474",
				"lon" => "144.292594"
			],
			[
				"postcode" => "3458",
				"suburb" => "NEWBURY",
				"state" => "VIC",
				"lat" => "-37.409771",
				"lon" => "144.289521"
			],
			[
				"postcode" => "3458",
				"suburb" => "NORTH BLACKWOOD",
				"state" => "VIC",
				"lat" => "-37.466577",
				"lon" => "144.303975"
			],
			[
				"postcode" => "3458",
				"suburb" => "TRENTHAM",
				"state" => "VIC",
				"lat" => "-37.389363",
				"lon" => "144.326001"
			],
			[
				"postcode" => "3458",
				"suburb" => "TRENTHAM EAST",
				"state" => "VIC",
				"lat" => "-37.396258",
				"lon" => "144.381486"
			],
			[
				"postcode" => "3460",
				"suburb" => "BASALT",
				"state" => "VIC",
				"lat" => "-37.308233",
				"lon" => "144.094647"
			],
			[
				"postcode" => "3460",
				"suburb" => "DAYLESFORD",
				"state" => "VIC",
				"lat" => "-37.343587",
				"lon" => "144.142321"
			],
			[
				"postcode" => "3461",
				"suburb" => "BULLARTO",
				"state" => "VIC",
				"lat" => "-37.394334",
				"lon" => "144.221001"
			],
			[
				"postcode" => "3461",
				"suburb" => "BULLARTO SOUTH",
				"state" => "VIC",
				"lat" => "-37.423908",
				"lon" => "144.210458"
			],
			[
				"postcode" => "3461",
				"suburb" => "CLYDESDALE",
				"state" => "VIC",
				"lat" => "-37.178651",
				"lon" => "144.089983"
			],
			[
				"postcode" => "3461",
				"suburb" => "COOMOORA",
				"state" => "VIC",
				"lat" => "-37.328489",
				"lon" => "144.189283"
			],
			[
				"postcode" => "3461",
				"suburb" => "DENVER",
				"state" => "VIC",
				"lat" => "-37.277351",
				"lon" => "144.296321"
			],
			[
				"postcode" => "3461",
				"suburb" => "DRUMMOND",
				"state" => "VIC",
				"lat" => "-37.240902",
				"lon" => "144.326211"
			],
			[
				"postcode" => "3461",
				"suburb" => "DRY DIGGINGS",
				"state" => "VIC",
				"lat" => "-37.299821",
				"lon" => "144.162344"
			],
			[
				"postcode" => "3461",
				"suburb" => "EGANSTOWN",
				"state" => "VIC",
				"lat" => "-37.340453",
				"lon" => "144.097095"
			],
			[
				"postcode" => "3461",
				"suburb" => "ELEVATED PLAINS",
				"state" => "VIC",
				"lat" => "-37.291096",
				"lon" => "144.124212"
			],
			[
				"postcode" => "3461",
				"suburb" => "FRANKLINFORD",
				"state" => "VIC",
				"lat" => "-37.248503",
				"lon" => "144.133262"
			],
			[
				"postcode" => "3461",
				"suburb" => "GLENLYON",
				"state" => "VIC",
				"lat" => "-37.295179",
				"lon" => "144.244678"
			],
			[
				"postcode" => "3461",
				"suburb" => "HEPBURN",
				"state" => "VIC",
				"lat" => "-37.272298",
				"lon" => "144.194341"
			],
			[
				"postcode" => "3461",
				"suburb" => "HEPBURN SPRINGS",
				"state" => "VIC",
				"lat" => "-37.315344",
				"lon" => "144.138197"
			],
			[
				"postcode" => "3461",
				"suburb" => "KORWEINGUBOORA",
				"state" => "VIC",
				"lat" => "-37.452037",
				"lon" => "144.134899"
			],
			[
				"postcode" => "3461",
				"suburb" => "LEONARDS HILL",
				"state" => "VIC",
				"lat" => "-37.425757",
				"lon" => "144.115474"
			],
			[
				"postcode" => "3461",
				"suburb" => "LYONVILLE",
				"state" => "VIC",
				"lat" => "-37.392417",
				"lon" => "144.250813"
			],
			[
				"postcode" => "3461",
				"suburb" => "MOUNT FRANKLIN",
				"state" => "VIC",
				"lat" => "-37.260735",
				"lon" => "144.158367"
			],
			[
				"postcode" => "3461",
				"suburb" => "MUSK",
				"state" => "VIC",
				"lat" => "-37.371711",
				"lon" => "144.192548"
			],
			[
				"postcode" => "3461",
				"suburb" => "MUSK VALE",
				"state" => "VIC",
				"lat" => "-37.272298",
				"lon" => "144.194341"
			],
			[
				"postcode" => "3461",
				"suburb" => "PORCUPINE RIDGE",
				"state" => "VIC",
				"lat" => "-37.248496",
				"lon" => "144.199698"
			],
			[
				"postcode" => "3461",
				"suburb" => "SAILORS FALLS",
				"state" => "VIC",
				"lat" => "-37.405983",
				"lon" => "144.123382"
			],
			[
				"postcode" => "3461",
				"suburb" => "SAILORS HILL",
				"state" => "VIC",
				"lat" => "-37.353431",
				"lon" => "144.130517"
			],
			[
				"postcode" => "3461",
				"suburb" => "SHEPHERDS FLAT",
				"state" => "VIC",
				"lat" => "-37.271431",
				"lon" => "144.108578"
			],
			[
				"postcode" => "3461",
				"suburb" => "SPARGO CREEK",
				"state" => "VIC",
				"lat" => "-37.48976",
				"lon" => "144.143564"
			],
			[
				"postcode" => "3461",
				"suburb" => "STRANGWAYS",
				"state" => "VIC",
				"lat" => "-37.135335",
				"lon" => "144.076945"
			],
			[
				"postcode" => "3461",
				"suburb" => "WHEATSHEAF",
				"state" => "VIC",
				"lat" => "-37.313722",
				"lon" => "144.226117"
			],
			[
				"postcode" => "3461",
				"suburb" => "YANDOIT",
				"state" => "VIC",
				"lat" => "-37.21296",
				"lon" => "144.088977"
			],
			[
				"postcode" => "3461",
				"suburb" => "YANDOIT HILLS",
				"state" => "VIC",
				"lat" => "-37.213136",
				"lon" => "144.048852"
			],
			[
				"postcode" => "3462",
				"suburb" => "GREEN GULLY",
				"state" => "VIC",
				"lat" => "-37.107829",
				"lon" => "144.095795"
			],
			[
				"postcode" => "3462",
				"suburb" => "JOYCES CREEK",
				"state" => "VIC",
				"lat" => "-37.087397",
				"lon" => "143.993953"
			],
			[
				"postcode" => "3462",
				"suburb" => "MUCKLEFORD SOUTH",
				"state" => "VIC",
				"lat" => "-37.095316",
				"lon" => "144.120321"
			],
			[
				"postcode" => "3462",
				"suburb" => "NEWSTEAD",
				"state" => "VIC",
				"lat" => "-37.105377",
				"lon" => "144.06511"
			],
			[
				"postcode" => "3462",
				"suburb" => "SANDON",
				"state" => "VIC",
				"lat" => "-37.168753",
				"lon" => "144.038138"
			],
			[
				"postcode" => "3462",
				"suburb" => "WELSHMANS REEF",
				"state" => "VIC",
				"lat" => "-37.071551",
				"lon" => "144.045866"
			],
			[
				"postcode" => "3463",
				"suburb" => "BARINGHUP",
				"state" => "VIC",
				"lat" => "-36.984271",
				"lon" => "143.951487"
			],
			[
				"postcode" => "3463",
				"suburb" => "BARINGHUP WEST",
				"state" => "VIC",
				"lat" => "-36.951137",
				"lon" => "143.871634"
			],
			[
				"postcode" => "3463",
				"suburb" => "BRADFORD",
				"state" => "VIC",
				"lat" => "-36.909699",
				"lon" => "144.031371"
			],
			[
				"postcode" => "3463",
				"suburb" => "EASTVILLE",
				"state" => "VIC",
				"lat" => "-36.875239",
				"lon" => "143.960842"
			],
			[
				"postcode" => "3463",
				"suburb" => "LAANECOORIE",
				"state" => "VIC",
				"lat" => "-36.827056",
				"lon" => "143.904434"
			],
			[
				"postcode" => "3463",
				"suburb" => "MALDON",
				"state" => "VIC",
				"lat" => "-36.996354",
				"lon" => "144.06843"
			],
			[
				"postcode" => "3463",
				"suburb" => "NEEREMAN",
				"state" => "VIC",
				"lat" => "-36.920084",
				"lon" => "143.943625"
			],
			[
				"postcode" => "3463",
				"suburb" => "NUGGETTY",
				"state" => "VIC",
				"lat" => "-36.946118",
				"lon" => "144.061662"
			],
			[
				"postcode" => "3463",
				"suburb" => "PERKINS REEF",
				"state" => "VIC",
				"lat" => "-37.004817",
				"lon" => "144.066266"
			],
			[
				"postcode" => "3463",
				"suburb" => "PORCUPINE FLAT",
				"state" => "VIC",
				"lat" => "-36.962657",
				"lon" => "144.120525"
			],
			[
				"postcode" => "3463",
				"suburb" => "SHELBOURNE",
				"state" => "VIC",
				"lat" => "-36.846308",
				"lon" => "144.021846"
			],
			[
				"postcode" => "3463",
				"suburb" => "TARRENGOWER",
				"state" => "VIC",
				"lat" => "-37.021233",
				"lon" => "144.04768"
			],
			[
				"postcode" => "3463",
				"suburb" => "WALMER",
				"state" => "VIC",
				"lat" => "-36.965043",
				"lon" => "144.166608"
			],
			[
				"postcode" => "3463",
				"suburb" => "WOODSTOCK WEST",
				"state" => "VIC",
				"lat" => "-36.841499",
				"lon" => "143.985758"
			],
			[
				"postcode" => "3464",
				"suburb" => "CARISBROOK",
				"state" => "VIC",
				"lat" => "-37.007853",
				"lon" => "143.796275"
			],
			[
				"postcode" => "3465",
				"suburb" => "ADELAIDE LEAD",
				"state" => "VIC",
				"lat" => "-37.074671",
				"lon" => "143.677358"
			],
			[
				"postcode" => "3465",
				"suburb" => "ALMA",
				"state" => "VIC",
				"lat" => "-37.028805",
				"lon" => "143.676819"
			],
			[
				"postcode" => "3465",
				"suburb" => "BOWENVALE",
				"state" => "VIC",
				"lat" => "-36.983442",
				"lon" => "143.699121"
			],
			[
				"postcode" => "3465",
				"suburb" => "BUNG BONG",
				"state" => "VIC",
				"lat" => "-37.10168",
				"lon" => "143.566093"
			],
			[
				"postcode" => "3465",
				"suburb" => "COTSWOLD",
				"state" => "VIC",
				"lat" => "-37.124567",
				"lon" => "143.886721"
			],
			[
				"postcode" => "3465",
				"suburb" => "CRAIGIE",
				"state" => "VIC",
				"lat" => "-37.103917",
				"lon" => "143.775852"
			],
			[
				"postcode" => "3465",
				"suburb" => "DAISY HILL",
				"state" => "VIC",
				"lat" => "-37.117514",
				"lon" => "143.716854"
			],
			[
				"postcode" => "3465",
				"suburb" => "FLAGSTAFF",
				"state" => "VIC",
				"lat" => "-37.048352",
				"lon" => "143.78002"
			],
			[
				"postcode" => "3465",
				"suburb" => "GOLDEN POINT",
				"state" => "VIC",
				"lat" => "-37.088162",
				"lon" => "143.762344"
			],
			[
				"postcode" => "3465",
				"suburb" => "HAVELOCK",
				"state" => "VIC",
				"lat" => "-36.967324",
				"lon" => "143.770432"
			],
			[
				"postcode" => "3465",
				"suburb" => "HOMEBUSH",
				"state" => "VIC",
				"lat" => "-37.057395",
				"lon" => "143.534299"
			],
			[
				"postcode" => "3465",
				"suburb" => "MAJORCA",
				"state" => "VIC",
				"lat" => "-37.116323",
				"lon" => "143.795769"
			],
			[
				"postcode" => "3465",
				"suburb" => "MARYBOROUGH",
				"state" => "VIC",
				"lat" => "-37.048387",
				"lon" => "143.735409"
			],
			[
				"postcode" => "3465",
				"suburb" => "MOOLORT",
				"state" => "VIC",
				"lat" => "-37.078304",
				"lon" => "143.927259"
			],
			[
				"postcode" => "3465",
				"suburb" => "MOONLIGHT FLAT",
				"state" => "VIC",
				"lat" => "-37.049633",
				"lon" => "143.659182"
			],
			[
				"postcode" => "3465",
				"suburb" => "NATTE YALLOCK",
				"state" => "VIC",
				"lat" => "-36.94085",
				"lon" => "143.46707"
			],
			[
				"postcode" => "3465",
				"suburb" => "RATHSCAR",
				"state" => "VIC",
				"lat" => "-37.005652",
				"lon" => "143.546997"
			],
			[
				"postcode" => "3465",
				"suburb" => "RATHSCAR WEST",
				"state" => "VIC",
				"lat" => "-37.021108",
				"lon" => "143.481855"
			],
			[
				"postcode" => "3465",
				"suburb" => "RODBOROUGH",
				"state" => "VIC",
				"lat" => "-37.100827",
				"lon" => "143.877588"
			],
			[
				"postcode" => "3465",
				"suburb" => "SIMSON",
				"state" => "VIC",
				"lat" => "-36.994898",
				"lon" => "143.774385"
			],
			[
				"postcode" => "3465",
				"suburb" => "TIMOR",
				"state" => "VIC",
				"lat" => "-36.970369",
				"lon" => "143.710742"
			],
			[
				"postcode" => "3465",
				"suburb" => "TIMOR WEST",
				"state" => "VIC",
				"lat" => "-36.967873",
				"lon" => "143.690326"
			],
			[
				"postcode" => "3465",
				"suburb" => "WAREEK",
				"state" => "VIC",
				"lat" => "-36.990541",
				"lon" => "143.608305"
			],
			[
				"postcode" => "3467",
				"suburb" => "AVOCA",
				"state" => "VIC",
				"lat" => "-37.088539",
				"lon" => "143.473798"
			],
			[
				"postcode" => "3467",
				"suburb" => "MOYREISK",
				"state" => "VIC",
				"lat" => "-36.909968",
				"lon" => "143.37707"
			],
			[
				"postcode" => "3468",
				"suburb" => "AMPHITHEATRE",
				"state" => "VIC",
				"lat" => "-37.182344",
				"lon" => "143.399915"
			],
			[
				"postcode" => "3468",
				"suburb" => "MOUNT LONARCH",
				"state" => "VIC",
				"lat" => "-37.258868",
				"lon" => "143.397305"
			],
			[
				"postcode" => "3469",
				"suburb" => "ELMHURST",
				"state" => "VIC",
				"lat" => "-37.179436",
				"lon" => "143.249097"
			],
			[
				"postcode" => "3469",
				"suburb" => "GLENLOFTY",
				"state" => "VIC",
				"lat" => "-37.114597",
				"lon" => "143.220904"
			],
			[
				"postcode" => "3469",
				"suburb" => "GLENLOGIE",
				"state" => "VIC",
				"lat" => "-37.223958",
				"lon" => "143.281716"
			],
			[
				"postcode" => "3469",
				"suburb" => "GLENPATRICK",
				"state" => "VIC",
				"lat" => "-37.136846",
				"lon" => "143.33887"
			],
			[
				"postcode" => "3469",
				"suburb" => "NOWHERE CREEK",
				"state" => "VIC",
				"lat" => "-37.128713",
				"lon" => "143.300831"
			],
			[
				"postcode" => "3472",
				"suburb" => "BET BET",
				"state" => "VIC",
				"lat" => "-36.924333",
				"lon" => "143.756154"
			],
			[
				"postcode" => "3472",
				"suburb" => "BETLEY",
				"state" => "VIC",
				"lat" => "-36.909469",
				"lon" => "143.796024"
			],
			[
				"postcode" => "3472",
				"suburb" => "BROMLEY",
				"state" => "VIC",
				"lat" => "-36.8779",
				"lon" => "143.75353"
			],
			[
				"postcode" => "3472",
				"suburb" => "DUNLUCE",
				"state" => "VIC",
				"lat" => "-36.907629",
				"lon" => "143.58518"
			],
			[
				"postcode" => "3472",
				"suburb" => "DUNOLLY",
				"state" => "VIC",
				"lat" => "-36.860408",
				"lon" => "143.732463"
			],
			[
				"postcode" => "3472",
				"suburb" => "EDDINGTON",
				"state" => "VIC",
				"lat" => "-36.887013",
				"lon" => "143.863928"
			],
			[
				"postcode" => "3472",
				"suburb" => "GOLDSBOROUGH",
				"state" => "VIC",
				"lat" => "-36.825061",
				"lon" => "143.676938"
			],
			[
				"postcode" => "3472",
				"suburb" => "INKERMAN",
				"state" => "VIC",
				"lat" => "-36.807319",
				"lon" => "143.678195"
			],
			[
				"postcode" => "3472",
				"suburb" => "MCINTYRE",
				"state" => "VIC",
				"lat" => "-36.681035",
				"lon" => "143.691851"
			],
			[
				"postcode" => "3472",
				"suburb" => "MOLIAGUL",
				"state" => "VIC",
				"lat" => "-36.753256",
				"lon" => "143.665544"
			],
			[
				"postcode" => "3472",
				"suburb" => "MOUNT HOOGHLY",
				"state" => "VIC",
				"lat" => "-36.917005",
				"lon" => "143.696699"
			],
			[
				"postcode" => "3475",
				"suburb" => "ARCHDALE",
				"state" => "VIC",
				"lat" => "-36.830903",
				"lon" => "143.502295"
			],
			[
				"postcode" => "3475",
				"suburb" => "ARCHDALE JUNCTION",
				"state" => "VIC",
				"lat" => "-36.884915",
				"lon" => "143.517311"
			],
			[
				"postcode" => "3475",
				"suburb" => "BEALIBA",
				"state" => "VIC",
				"lat" => "-36.789386",
				"lon" => "143.549822"
			],
			[
				"postcode" => "3475",
				"suburb" => "BURKES FLAT",
				"state" => "VIC",
				"lat" => "-36.655933",
				"lon" => "143.550981"
			],
			[
				"postcode" => "3475",
				"suburb" => "COCHRANES CREEK",
				"state" => "VIC",
				"lat" => "-36.703611",
				"lon" => "143.59134"
			],
			[
				"postcode" => "3475",
				"suburb" => "EMU",
				"state" => "VIC",
				"lat" => "-36.731139",
				"lon" => "143.44389"
			],
			[
				"postcode" => "3475",
				"suburb" => "LOGAN",
				"state" => "VIC",
				"lat" => "-36.622015",
				"lon" => "143.490756"
			],
			[
				"postcode" => "3478",
				"suburb" => "AVON PLAINS",
				"state" => "VIC",
				"lat" => "-36.544552",
				"lon" => "142.921227"
			],
			[
				"postcode" => "3478",
				"suburb" => "BEAZLEYS BRIDGE",
				"state" => "VIC",
				"lat" => "-36.713108",
				"lon" => "143.157179"
			],
			[
				"postcode" => "3478",
				"suburb" => "CARAPOOEE",
				"state" => "VIC",
				"lat" => "-36.711719",
				"lon" => "143.31401"
			],
			[
				"postcode" => "3478",
				"suburb" => "CARAPOOEE WEST",
				"state" => "VIC",
				"lat" => "-36.730657",
				"lon" => "143.288292"
			],
			[
				"postcode" => "3478",
				"suburb" => "COONOOER BRIDGE",
				"state" => "VIC",
				"lat" => "-36.475617",
				"lon" => "143.31468"
			],
			[
				"postcode" => "3478",
				"suburb" => "COONOOER WEST",
				"state" => "VIC",
				"lat" => "-36.425651",
				"lon" => "143.219362"
			],
			[
				"postcode" => "3478",
				"suburb" => "DOOBOOBETIC",
				"state" => "VIC",
				"lat" => "-36.374108",
				"lon" => "143.183679"
			],
			[
				"postcode" => "3478",
				"suburb" => "GOOROC",
				"state" => "VIC",
				"lat" => "-36.467068",
				"lon" => "143.202071"
			],
			[
				"postcode" => "3478",
				"suburb" => "GOWAR EAST",
				"state" => "VIC",
				"lat" => "-36.553102",
				"lon" => "143.418817"
			],
			[
				"postcode" => "3478",
				"suburb" => "GRE GRE",
				"state" => "VIC",
				"lat" => "-36.661542",
				"lon" => "143.057792"
			],
			[
				"postcode" => "3478",
				"suburb" => "GRE GRE NORTH",
				"state" => "VIC",
				"lat" => "-36.594805",
				"lon" => "143.077543"
			],
			[
				"postcode" => "3478",
				"suburb" => "GRE GRE SOUTH",
				"state" => "VIC",
				"lat" => "-36.678933",
				"lon" => "143.028991"
			],
			[
				"postcode" => "3478",
				"suburb" => "KOOREH",
				"state" => "VIC",
				"lat" => "-36.641341",
				"lon" => "143.384603"
			],
			[
				"postcode" => "3478",
				"suburb" => "MEDLYN",
				"state" => "VIC",
				"lat" => "-36.684629",
				"lon" => "143.264101"
			],
			[
				"postcode" => "3478",
				"suburb" => "MOOLERR",
				"state" => "VIC",
				"lat" => "-36.630985",
				"lon" => "143.217849"
			],
			[
				"postcode" => "3478",
				"suburb" => "MOONAMBEL",
				"state" => "VIC",
				"lat" => "-36.988253",
				"lon" => "143.320323"
			],
			[
				"postcode" => "3478",
				"suburb" => "PERCYDALE",
				"state" => "VIC",
				"lat" => "-37.07827",
				"lon" => "143.387035"
			],
			[
				"postcode" => "3478",
				"suburb" => "REDBANK",
				"state" => "VIC",
				"lat" => "-36.933063",
				"lon" => "143.3162"
			],
			[
				"postcode" => "3478",
				"suburb" => "SLATY CREEK",
				"state" => "VIC",
				"lat" => "-36.546474",
				"lon" => "143.298301"
			],
			[
				"postcode" => "3478",
				"suburb" => "ST ARNAUD",
				"state" => "VIC",
				"lat" => "-36.615024",
				"lon" => "143.256852"
			],
			[
				"postcode" => "3478",
				"suburb" => "ST ARNAUD EAST",
				"state" => "VIC",
				"lat" => "-36.6084",
				"lon" => "143.2675"
			],
			[
				"postcode" => "3478",
				"suburb" => "ST ARNAUD NORTH",
				"state" => "VIC",
				"lat" => "-36.592298",
				"lon" => "143.169342"
			],
			[
				"postcode" => "3478",
				"suburb" => "STUART MILL",
				"state" => "VIC",
				"lat" => "-36.805748",
				"lon" => "143.286094"
			],
			[
				"postcode" => "3478",
				"suburb" => "SUTHERLAND",
				"state" => "VIC",
				"lat" => "-36.525343",
				"lon" => "143.189561"
			],
			[
				"postcode" => "3478",
				"suburb" => "SWANWATER",
				"state" => "VIC",
				"lat" => "-36.523775",
				"lon" => "143.103615"
			],
			[
				"postcode" => "3478",
				"suburb" => "TANWOOD",
				"state" => "VIC",
				"lat" => "-37.006265",
				"lon" => "143.387126"
			],
			[
				"postcode" => "3478",
				"suburb" => "TOTTINGTON",
				"state" => "VIC",
				"lat" => "-36.777057",
				"lon" => "143.121261"
			],
			[
				"postcode" => "3478",
				"suburb" => "TRAYNORS LAGOON",
				"state" => "VIC",
				"lat" => "-36.579533",
				"lon" => "142.981976"
			],
			[
				"postcode" => "3478",
				"suburb" => "TULKARA",
				"state" => "VIC",
				"lat" => "-36.943712",
				"lon" => "143.061809"
			],
			[
				"postcode" => "3478",
				"suburb" => "WARRENMANG",
				"state" => "VIC",
				"lat" => "-37.037515",
				"lon" => "143.311499"
			],
			[
				"postcode" => "3478",
				"suburb" => "YAWONG HILLS",
				"state" => "VIC",
				"lat" => "-36.470002",
				"lon" => "143.381591"
			],
			[
				"postcode" => "3480",
				"suburb" => "AREEGRA",
				"state" => "VIC",
				"lat" => "-36.236565",
				"lon" => "142.687307"
			],
			[
				"postcode" => "3480",
				"suburb" => "BANYENONG",
				"state" => "VIC",
				"lat" => "-36.264615",
				"lon" => "143.080898"
			],
			[
				"postcode" => "3480",
				"suburb" => "BOOLITE",
				"state" => "VIC",
				"lat" => "-36.34364",
				"lon" => "142.65012"
			],
			[
				"postcode" => "3480",
				"suburb" => "CARRON",
				"state" => "VIC",
				"lat" => "-36.292385",
				"lon" => "142.739051"
			],
			[
				"postcode" => "3480",
				"suburb" => "COPE COPE",
				"state" => "VIC",
				"lat" => "-36.470318",
				"lon" => "143.068595"
			],
			[
				"postcode" => "3480",
				"suburb" => "CORACK",
				"state" => "VIC",
				"lat" => "-36.171602",
				"lon" => "143.040236"
			],
			[
				"postcode" => "3480",
				"suburb" => "CORACK EAST",
				"state" => "VIC",
				"lat" => "-36.17753",
				"lon" => "143.038318"
			],
			[
				"postcode" => "3480",
				"suburb" => "DONALD",
				"state" => "VIC",
				"lat" => "-36.37066",
				"lon" => "142.982457"
			],
			[
				"postcode" => "3480",
				"suburb" => "GIL GIL",
				"state" => "VIC",
				"lat" => "-36.322142",
				"lon" => "143.034902"
			],
			[
				"postcode" => "3480",
				"suburb" => "JEFFCOTT",
				"state" => "VIC",
				"lat" => "-36.350942",
				"lon" => "143.112537"
			],
			[
				"postcode" => "3480",
				"suburb" => "JEFFCOTT NORTH",
				"state" => "VIC",
				"lat" => "-36.28673",
				"lon" => "143.109711"
			],
			[
				"postcode" => "3480",
				"suburb" => "LAEN",
				"state" => "VIC",
				"lat" => "-36.452296",
				"lon" => "142.780344"
			],
			[
				"postcode" => "3480",
				"suburb" => "LAEN EAST",
				"state" => "VIC",
				"lat" => "-36.395951",
				"lon" => "142.893872"
			],
			[
				"postcode" => "3480",
				"suburb" => "LAEN NORTH",
				"state" => "VIC",
				"lat" => "-36.382094",
				"lon" => "142.804115"
			],
			[
				"postcode" => "3480",
				"suburb" => "LAKE BULOKE",
				"state" => "VIC",
				"lat" => "-36.202162",
				"lon" => "142.985275"
			],
			[
				"postcode" => "3480",
				"suburb" => "LAWLER",
				"state" => "VIC",
				"lat" => "-36.378438",
				"lon" => "142.74228"
			],
			[
				"postcode" => "3480",
				"suburb" => "LITCHFIELD",
				"state" => "VIC",
				"lat" => "-36.296777",
				"lon" => "142.845319"
			],
			[
				"postcode" => "3480",
				"suburb" => "RICH AVON",
				"state" => "VIC",
				"lat" => "-36.444739",
				"lon" => "142.916181"
			],
			[
				"postcode" => "3480",
				"suburb" => "RICH AVON EAST",
				"state" => "VIC",
				"lat" => "-36.51331",
				"lon" => "142.887634"
			],
			[
				"postcode" => "3480",
				"suburb" => "RICH AVON WEST",
				"state" => "VIC",
				"lat" => "-36.488443",
				"lon" => "142.836874"
			],
			[
				"postcode" => "3480",
				"suburb" => "SWANWATER WEST",
				"state" => "VIC",
				"lat" => "-36.512366",
				"lon" => "143.026085"
			],
			[
				"postcode" => "3482",
				"suburb" => "MASSEY",
				"state" => "VIC",
				"lat" => "-36.226051",
				"lon" => "142.859931"
			],
			[
				"postcode" => "3482",
				"suburb" => "MORTON PLAINS",
				"state" => "VIC",
				"lat" => "-36.082429",
				"lon" => "142.882888"
			],
			[
				"postcode" => "3482",
				"suburb" => "WARMUR",
				"state" => "VIC",
				"lat" => "-36.128125",
				"lon" => "142.81005"
			],
			[
				"postcode" => "3482",
				"suburb" => "WATCHEM",
				"state" => "VIC",
				"lat" => "-36.148917",
				"lon" => "142.858965"
			],
			[
				"postcode" => "3482",
				"suburb" => "WATCHEM WEST",
				"state" => "VIC",
				"lat" => "-36.187579",
				"lon" => "142.759352"
			],
			[
				"postcode" => "3483",
				"suburb" => "BALLAPUR",
				"state" => "VIC",
				"lat" => "-35.979172",
				"lon" => "142.747934"
			],
			[
				"postcode" => "3483",
				"suburb" => "BIRCHIP",
				"state" => "VIC",
				"lat" => "-35.980771",
				"lon" => "142.917843"
			],
			[
				"postcode" => "3483",
				"suburb" => "BIRCHIP WEST",
				"state" => "VIC",
				"lat" => "-36.013841",
				"lon" => "142.821841"
			],
			[
				"postcode" => "3483",
				"suburb" => "CURYO",
				"state" => "VIC",
				"lat" => "-35.823165",
				"lon" => "142.796611"
			],
			[
				"postcode" => "3483",
				"suburb" => "JIL JIL",
				"state" => "VIC",
				"lat" => "-35.834959",
				"lon" => "142.992658"
			],
			[
				"postcode" => "3483",
				"suburb" => "KARYRIE",
				"state" => "VIC",
				"lat" => "-35.902049",
				"lon" => "142.869123"
			],
			[
				"postcode" => "3483",
				"suburb" => "KINNABULLA",
				"state" => "VIC",
				"lat" => "-35.899008",
				"lon" => "142.795867"
			],
			[
				"postcode" => "3483",
				"suburb" => "MARLBED",
				"state" => "VIC",
				"lat" => "-35.820897",
				"lon" => "142.849932"
			],
			[
				"postcode" => "3483",
				"suburb" => "NARRAPORT",
				"state" => "VIC",
				"lat" => "-36.027098",
				"lon" => "143.061288"
			],
			[
				"postcode" => "3483",
				"suburb" => "REEDY DAM",
				"state" => "VIC",
				"lat" => "-35.964848",
				"lon" => "142.633563"
			],
			[
				"postcode" => "3483",
				"suburb" => "WHIRILY",
				"state" => "VIC",
				"lat" => "-35.922694",
				"lon" => "142.986589"
			],
			[
				"postcode" => "3485",
				"suburb" => "BANYAN",
				"state" => "VIC",
				"lat" => "-35.635088",
				"lon" => "142.766116"
			],
			[
				"postcode" => "3485",
				"suburb" => "WATCHUPGA",
				"state" => "VIC",
				"lat" => "-35.758053",
				"lon" => "142.708455"
			],
			[
				"postcode" => "3485",
				"suburb" => "WILLANGIE",
				"state" => "VIC",
				"lat" => "-35.719379",
				"lon" => "142.796561"
			],
			[
				"postcode" => "3485",
				"suburb" => "WOOMELANG",
				"state" => "VIC",
				"lat" => "-35.680879",
				"lon" => "142.666099"
			],
			[
				"postcode" => "3487",
				"suburb" => "LASCELLES",
				"state" => "VIC",
				"lat" => "-35.606765",
				"lon" => "142.578891"
			],
			[
				"postcode" => "3488",
				"suburb" => "SPEED",
				"state" => "VIC",
				"lat" => "-35.400818",
				"lon" => "142.44027"
			],
			[
				"postcode" => "3488",
				"suburb" => "TURRIFF EAST",
				"state" => "VIC",
				"lat" => "-35.445806",
				"lon" => "142.588306"
			],
			[
				"postcode" => "3489",
				"suburb" => "TEMPY",
				"state" => "VIC",
				"lat" => "-35.344581",
				"lon" => "142.476178"
			],
			[
				"postcode" => "3490",
				"suburb" => "BOINKA",
				"state" => "VIC",
				"lat" => "-35.199697",
				"lon" => "141.600652"
			],
			[
				"postcode" => "3490",
				"suburb" => "KULWIN",
				"state" => "VIC",
				"lat" => "-35.066719",
				"lon" => "142.655764"
			],
			[
				"postcode" => "3490",
				"suburb" => "OUYEN",
				"state" => "VIC",
				"lat" => "-35.072165",
				"lon" => "142.318876"
			],
			[
				"postcode" => "3490",
				"suburb" => "TORRITA",
				"state" => "VIC",
				"lat" => "-35.13549",
				"lon" => "141.905953"
			],
			[
				"postcode" => "3490",
				"suburb" => "TUTYE",
				"state" => "VIC",
				"lat" => "-35.214904",
				"lon" => "141.498506"
			],
			[
				"postcode" => "3491",
				"suburb" => "PATCHEWOLLOCK",
				"state" => "VIC",
				"lat" => "-35.382896",
				"lon" => "142.1895"
			],
			[
				"postcode" => "3494",
				"suburb" => "CARWARP",
				"state" => "VIC",
				"lat" => "-34.457991",
				"lon" => "142.230811"
			],
			[
				"postcode" => "3494",
				"suburb" => "COLIGNAN",
				"state" => "VIC",
				"lat" => "-34.52924",
				"lon" => "142.36671"
			],
			[
				"postcode" => "3494",
				"suburb" => "IRAAK",
				"state" => "VIC",
				"lat" => "-34.429715",
				"lon" => "142.353874"
			],
			[
				"postcode" => "3494",
				"suburb" => "NANGILOC",
				"state" => "VIC",
				"lat" => "-34.474154",
				"lon" => "142.359892"
			],
			[
				"postcode" => "3496",
				"suburb" => "CARDROSS",
				"state" => "VIC",
				"lat" => "-34.292017",
				"lon" => "142.145463"
			],
			[
				"postcode" => "3496",
				"suburb" => "CULLULLERAINE",
				"state" => "VIC",
				"lat" => "-34.278196",
				"lon" => "141.597777"
			],
			[
				"postcode" => "3496",
				"suburb" => "MERINGUR",
				"state" => "VIC",
				"lat" => "-34.39048",
				"lon" => "141.338808"
			],
			[
				"postcode" => "3496",
				"suburb" => "MERRINEE",
				"state" => "VIC",
				"lat" => "-34.369766",
				"lon" => "141.812102"
			],
			[
				"postcode" => "3496",
				"suburb" => "NEDS CORNER",
				"state" => "VIC",
				"lat" => "-34.274805",
				"lon" => "141.263471"
			],
			[
				"postcode" => "3496",
				"suburb" => "RED CLIFFS",
				"state" => "VIC",
				"lat" => "-34.308353",
				"lon" => "142.186534"
			],
			[
				"postcode" => "3496",
				"suburb" => "SUNNYCLIFFS",
				"state" => "VIC",
				"lat" => "-34.28754",
				"lon" => "142.191911"
			],
			[
				"postcode" => "3496",
				"suburb" => "WERRIMULL",
				"state" => "VIC",
				"lat" => "-34.38721",
				"lon" => "141.597044"
			],
			[
				"postcode" => "3498",
				"suburb" => "IRYMPLE",
				"state" => "VIC",
				"lat" => "-34.234604",
				"lon" => "142.181724"
			],
			[
				"postcode" => "3500",
				"suburb" => "MILDURA",
				"state" => "VIC",
				"lat" => "-34.181714",
				"lon" => "142.163072"
			],
			[
				"postcode" => "3500",
				"suburb" => "MILDURA EAST",
				"state" => "VIC",
				"lat" => "-34.203319",
				"lon" => "142.17039"
			],
			[
				"postcode" => "3500",
				"suburb" => "MILDURA WEST",
				"state" => "VIC",
				"lat" => "-34.203319",
				"lon" => "142.17039"
			],
			[
				"postcode" => "3501",
				"suburb" => "HATTAH",
				"state" => "VIC",
				"lat" => "-34.850899",
				"lon" => "142.327634"
			],
			[
				"postcode" => "3501",
				"suburb" => "KOORLONG",
				"state" => "VIC",
				"lat" => "-34.264174",
				"lon" => "142.096554"
			],
			[
				"postcode" => "3501",
				"suburb" => "MILDURA CENTRE PLAZA",
				"state" => "VIC",
				"lat" => "-34.207114",
				"lon" => "142.136298"
			],
			[
				"postcode" => "3501",
				"suburb" => "MILDURA SOUTH",
				"state" => "VIC",
				"lat" => "-34.244732",
				"lon" => "142.090351"
			],
			[
				"postcode" => "3501",
				"suburb" => "NICHOLS POINT",
				"state" => "VIC",
				"lat" => "-34.214151",
				"lon" => "142.186812"
			],
			[
				"postcode" => "3502",
				"suburb" => "MILDURA",
				"state" => "VIC",
				"lat" => "-37.972887",
				"lon" => "145.25835"
			],
			[
				"postcode" => "3505",
				"suburb" => "BIRDWOODTON",
				"state" => "VIC",
				"lat" => "-34.19768",
				"lon" => "142.057629"
			],
			[
				"postcode" => "3505",
				"suburb" => "CABARITA",
				"state" => "VIC",
				"lat" => "-34.197773",
				"lon" => "142.084141"
			],
			[
				"postcode" => "3505",
				"suburb" => "MERBEIN",
				"state" => "VIC",
				"lat" => "-34.167929",
				"lon" => "142.060861"
			],
			[
				"postcode" => "3505",
				"suburb" => "MERBEIN SOUTH",
				"state" => "VIC",
				"lat" => "-34.215642",
				"lon" => "142.024463"
			],
			[
				"postcode" => "3505",
				"suburb" => "MERBEIN WEST",
				"state" => "VIC",
				"lat" => "-34.166774",
				"lon" => "142.007289"
			],
			[
				"postcode" => "3505",
				"suburb" => "WARGAN",
				"state" => "VIC",
				"lat" => "-34.264274",
				"lon" => "141.954205"
			],
			[
				"postcode" => "3505",
				"suburb" => "YELTA",
				"state" => "VIC",
				"lat" => "-34.149578",
				"lon" => "141.978682"
			],
			[
				"postcode" => "3506",
				"suburb" => "COWANGIE",
				"state" => "VIC",
				"lat" => "-35.27579",
				"lon" => "141.399006"
			],
			[
				"postcode" => "3507",
				"suburb" => "WALPEUP",
				"state" => "VIC",
				"lat" => "-35.191803",
				"lon" => "142.02364"
			],
			[
				"postcode" => "3509",
				"suburb" => "LINGA",
				"state" => "VIC",
				"lat" => "-35.173454",
				"lon" => "141.692549"
			],
			[
				"postcode" => "3509",
				"suburb" => "UNDERBOOL",
				"state" => "VIC",
				"lat" => "-35.169799",
				"lon" => "141.808981"
			],
			[
				"postcode" => "3512",
				"suburb" => "CARINA",
				"state" => "VIC",
				"lat" => "-35.218149",
				"lon" => "141.090483"
			],
			[
				"postcode" => "3512",
				"suburb" => "MURRAYVILLE",
				"state" => "VIC",
				"lat" => "-35.262387",
				"lon" => "141.183321"
			],
			[
				"postcode" => "3515",
				"suburb" => "MARONG",
				"state" => "VIC",
				"lat" => "-36.736592",
				"lon" => "144.132572"
			],
			[
				"postcode" => "3515",
				"suburb" => "WILSONS HILL",
				"state" => "VIC",
				"lat" => "-36.724153",
				"lon" => "144.100779"
			],
			[
				"postcode" => "3516",
				"suburb" => "BRIDGEWATER",
				"state" => "VIC",
				"lat" => "-36.593021",
				"lon" => "143.924643"
			],
			[
				"postcode" => "3516",
				"suburb" => "BRIDGEWATER NORTH",
				"state" => "VIC",
				"lat" => "-36.524666",
				"lon" => "143.996272"
			],
			[
				"postcode" => "3516",
				"suburb" => "BRIDGEWATER ON LODDON",
				"state" => "VIC",
				"lat" => "-36.601351",
				"lon" => "143.941051"
			],
			[
				"postcode" => "3516",
				"suburb" => "DERBY",
				"state" => "VIC",
				"lat" => "-36.64949",
				"lon" => "144.017206"
			],
			[
				"postcode" => "3516",
				"suburb" => "LEICHARDT",
				"state" => "VIC",
				"lat" => "-36.691491",
				"lon" => "144.075949"
			],
			[
				"postcode" => "3516",
				"suburb" => "YARRABERB",
				"state" => "VIC",
				"lat" => "-36.603624",
				"lon" => "144.062812"
			],
			[
				"postcode" => "3517",
				"suburb" => "BEARS LAGOON",
				"state" => "VIC",
				"lat" => "-36.298881",
				"lon" => "143.915229"
			],
			[
				"postcode" => "3517",
				"suburb" => "BRENANAH",
				"state" => "VIC",
				"lat" => "-36.566388",
				"lon" => "143.707293"
			],
			[
				"postcode" => "3517",
				"suburb" => "GLENALBYN",
				"state" => "VIC",
				"lat" => "-36.508436",
				"lon" => "143.764881"
			],
			[
				"postcode" => "3517",
				"suburb" => "INGLEWOOD",
				"state" => "VIC",
				"lat" => "-36.576463",
				"lon" => "143.868955"
			],
			[
				"postcode" => "3517",
				"suburb" => "JARKLIN",
				"state" => "VIC",
				"lat" => "-36.269461",
				"lon" => "143.966665"
			],
			[
				"postcode" => "3517",
				"suburb" => "KINGOWER",
				"state" => "VIC",
				"lat" => "-36.608608",
				"lon" => "143.7543"
			],
			[
				"postcode" => "3517",
				"suburb" => "KURTING",
				"state" => "VIC",
				"lat" => "-36.53964",
				"lon" => "143.811981"
			],
			[
				"postcode" => "3517",
				"suburb" => "POWLETT PLAINS",
				"state" => "VIC",
				"lat" => "-36.437652",
				"lon" => "143.899053"
			],
			[
				"postcode" => "3517",
				"suburb" => "RHEOLA",
				"state" => "VIC",
				"lat" => "-36.651471",
				"lon" => "143.699164"
			],
			[
				"postcode" => "3517",
				"suburb" => "SALISBURY WEST",
				"state" => "VIC",
				"lat" => "-36.517569",
				"lon" => "143.923368"
			],
			[
				"postcode" => "3517",
				"suburb" => "SERPENTINE",
				"state" => "VIC",
				"lat" => "-36.412547",
				"lon" => "143.974416"
			],
			[
				"postcode" => "3518",
				"suburb" => "BERRIMAL",
				"state" => "VIC",
				"lat" => "-36.501479",
				"lon" => "143.456459"
			],
			[
				"postcode" => "3518",
				"suburb" => "BORUNG",
				"state" => "VIC",
				"lat" => "-36.291375",
				"lon" => "143.751749"
			],
			[
				"postcode" => "3518",
				"suburb" => "FENTONS CREEK",
				"state" => "VIC",
				"lat" => "-36.564065",
				"lon" => "143.519958"
			],
			[
				"postcode" => "3518",
				"suburb" => "FERNIHURST",
				"state" => "VIC",
				"lat" => "-36.240301",
				"lon" => "143.867439"
			],
			[
				"postcode" => "3518",
				"suburb" => "FIERY FLAT",
				"state" => "VIC",
				"lat" => "-36.404297",
				"lon" => "143.823229"
			],
			[
				"postcode" => "3518",
				"suburb" => "KURRACA",
				"state" => "VIC",
				"lat" => "-36.517281",
				"lon" => "143.613413"
			],
			[
				"postcode" => "3518",
				"suburb" => "KURRACA WEST",
				"state" => "VIC",
				"lat" => "-36.504624",
				"lon" => "143.556361"
			],
			[
				"postcode" => "3518",
				"suburb" => "MYSIA",
				"state" => "VIC",
				"lat" => "-36.234836",
				"lon" => "143.758455"
			],
			[
				"postcode" => "3518",
				"suburb" => "NINE MILE",
				"state" => "VIC",
				"lat" => "-36.421098",
				"lon" => "143.459744"
			],
			[
				"postcode" => "3518",
				"suburb" => "RICHMOND PLAINS",
				"state" => "VIC",
				"lat" => "-36.391689",
				"lon" => "143.446399"
			],
			[
				"postcode" => "3518",
				"suburb" => "SKINNERS FLAT",
				"state" => "VIC",
				"lat" => "-36.3585",
				"lon" => "143.582874"
			],
			[
				"postcode" => "3518",
				"suburb" => "WEDDERBURN",
				"state" => "VIC",
				"lat" => "-36.418555",
				"lon" => "143.61284"
			],
			[
				"postcode" => "3518",
				"suburb" => "WEDDERBURN JUNCTION",
				"state" => "VIC",
				"lat" => "-36.424318",
				"lon" => "143.68675"
			],
			[
				"postcode" => "3518",
				"suburb" => "WEHLA",
				"state" => "VIC",
				"lat" => "-36.603174",
				"lon" => "143.61479"
			],
			[
				"postcode" => "3518",
				"suburb" => "WOOLSHED FLAT",
				"state" => "VIC",
				"lat" => "-36.331249",
				"lon" => "143.660601"
			],
			[
				"postcode" => "3518",
				"suburb" => "WOOSANG",
				"state" => "VIC",
				"lat" => "-36.345755",
				"lon" => "143.470856"
			],
			[
				"postcode" => "3520",
				"suburb" => "KINYPANIAL",
				"state" => "VIC",
				"lat" => "-36.331469",
				"lon" => "143.83557"
			],
			[
				"postcode" => "3520",
				"suburb" => "KORONG VALE",
				"state" => "VIC",
				"lat" => "-36.356586",
				"lon" => "143.705869"
			],
			[
				"postcode" => "3521",
				"suburb" => "PYALONG",
				"state" => "VIC",
				"lat" => "-37.120609",
				"lon" => "144.882105"
			],
			[
				"postcode" => "3522",
				"suburb" => "EMU FLAT",
				"state" => "VIC",
				"lat" => "-37.126178",
				"lon" => "144.750364"
			],
			[
				"postcode" => "3522",
				"suburb" => "TOOBORAC",
				"state" => "VIC",
				"lat" => "-37.046912",
				"lon" => "144.798912"
			],
			[
				"postcode" => "3523",
				"suburb" => "ARGYLE",
				"state" => "VIC",
				"lat" => "-36.944132",
				"lon" => "144.732986"
			],
			[
				"postcode" => "3523",
				"suburb" => "COSTERFIELD",
				"state" => "VIC",
				"lat" => "-36.894752",
				"lon" => "144.80027"
			],
			[
				"postcode" => "3523",
				"suburb" => "DERRINAL",
				"state" => "VIC",
				"lat" => "-36.88112",
				"lon" => "144.649341"
			],
			[
				"postcode" => "3523",
				"suburb" => "HEATHCOTE",
				"state" => "VIC",
				"lat" => "-36.922052",
				"lon" => "144.708908"
			],
			[
				"postcode" => "3523",
				"suburb" => "HEATHCOTE SOUTH",
				"state" => "VIC",
				"lat" => "-37.005382",
				"lon" => "144.723819"
			],
			[
				"postcode" => "3523",
				"suburb" => "KNOWSLEY",
				"state" => "VIC",
				"lat" => "-36.82727",
				"lon" => "144.595092"
			],
			[
				"postcode" => "3523",
				"suburb" => "LADYS PASS",
				"state" => "VIC",
				"lat" => "-36.829301",
				"lon" => "144.710782"
			],
			[
				"postcode" => "3523",
				"suburb" => "MOORMBOOL WEST",
				"state" => "VIC",
				"lat" => "-36.802355",
				"lon" => "144.882263"
			],
			[
				"postcode" => "3523",
				"suburb" => "MOUNT CAMEL",
				"state" => "VIC",
				"lat" => "-36.787493",
				"lon" => "144.715683"
			],
			[
				"postcode" => "3523",
				"suburb" => "REDCASTLE",
				"state" => "VIC",
				"lat" => "-36.795314",
				"lon" => "144.802939"
			],
			[
				"postcode" => "3525",
				"suburb" => "BARRAKEE",
				"state" => "VIC",
				"lat" => "-36.268867",
				"lon" => "143.426085"
			],
			[
				"postcode" => "3525",
				"suburb" => "BUCKRABANYULE",
				"state" => "VIC",
				"lat" => "-36.264986",
				"lon" => "143.508029"
			],
			[
				"postcode" => "3525",
				"suburb" => "CHARLTON",
				"state" => "VIC",
				"lat" => "-36.269007",
				"lon" => "143.350406"
			],
			[
				"postcode" => "3525",
				"suburb" => "GRANITE FLAT",
				"state" => "VIC",
				"lat" => "-36.213632",
				"lon" => "143.128316"
			],
			[
				"postcode" => "3525",
				"suburb" => "LAKE MARMAL",
				"state" => "VIC",
				"lat" => "-36.160504",
				"lon" => "143.513558"
			],
			[
				"postcode" => "3525",
				"suburb" => "NAREEWILLOCK",
				"state" => "VIC",
				"lat" => "-36.158726",
				"lon" => "143.431571"
			],
			[
				"postcode" => "3525",
				"suburb" => "TEDDYWADDY",
				"state" => "VIC",
				"lat" => "-36.196584",
				"lon" => "143.341278"
			],
			[
				"postcode" => "3525",
				"suburb" => "TEDDYWADDY WEST",
				"state" => "VIC",
				"lat" => "-36.196125",
				"lon" => "143.204814"
			],
			[
				"postcode" => "3525",
				"suburb" => "TERRAPPEE",
				"state" => "VIC",
				"lat" => "-36.150048",
				"lon" => "143.587841"
			],
			[
				"postcode" => "3525",
				"suburb" => "WOOROONOOK",
				"state" => "VIC",
				"lat" => "-36.261221",
				"lon" => "143.211082"
			],
			[
				"postcode" => "3525",
				"suburb" => "WYCHITELLA",
				"state" => "VIC",
				"lat" => "-36.273232",
				"lon" => "143.597571"
			],
			[
				"postcode" => "3525",
				"suburb" => "WYCHITELLA NORTH",
				"state" => "VIC",
				"lat" => "-36.197174",
				"lon" => "143.627886"
			],
			[
				"postcode" => "3525",
				"suburb" => "YEUNGROON",
				"state" => "VIC",
				"lat" => "-36.386796",
				"lon" => "143.381179"
			],
			[
				"postcode" => "3525",
				"suburb" => "YEUNGROON EAST",
				"state" => "VIC",
				"lat" => "-36.356027",
				"lon" => "143.438925"
			],
			[
				"postcode" => "3527",
				"suburb" => "BUNGULUKE",
				"state" => "VIC",
				"lat" => "-36.055958",
				"lon" => "143.38661"
			],
			[
				"postcode" => "3527",
				"suburb" => "DUMOSA",
				"state" => "VIC",
				"lat" => "-35.903515",
				"lon" => "143.261657"
			],
			[
				"postcode" => "3527",
				"suburb" => "GLENLOTH",
				"state" => "VIC",
				"lat" => "-36.139588",
				"lon" => "143.339126"
			],
			[
				"postcode" => "3527",
				"suburb" => "GLENLOTH EAST",
				"state" => "VIC",
				"lat" => "-36.059245",
				"lon" => "143.450693"
			],
			[
				"postcode" => "3527",
				"suburb" => "THALIA",
				"state" => "VIC",
				"lat" => "-36.09834",
				"lon" => "143.067339"
			],
			[
				"postcode" => "3527",
				"suburb" => "TOWANINNY",
				"state" => "VIC",
				"lat" => "-35.812817",
				"lon" => "143.365339"
			],
			[
				"postcode" => "3527",
				"suburb" => "TOWANINNY SOUTH",
				"state" => "VIC",
				"lat" => "-35.939667",
				"lon" => "143.331977"
			],
			[
				"postcode" => "3527",
				"suburb" => "WYCHEPROOF",
				"state" => "VIC",
				"lat" => "-36.077203",
				"lon" => "143.227148"
			],
			[
				"postcode" => "3527",
				"suburb" => "WYCHEPROOF SOUTH",
				"state" => "VIC",
				"lat" => "-36.135691",
				"lon" => "143.18554"
			],
			[
				"postcode" => "3529",
				"suburb" => "KALPIENUNG",
				"state" => "VIC",
				"lat" => "-35.780006",
				"lon" => "143.259314"
			],
			[
				"postcode" => "3529",
				"suburb" => "NULLAWIL",
				"state" => "VIC",
				"lat" => "-35.854123",
				"lon" => "143.178092"
			],
			[
				"postcode" => "3530",
				"suburb" => "CULGOA",
				"state" => "VIC",
				"lat" => "-35.718468",
				"lon" => "143.107379"
			],
			[
				"postcode" => "3530",
				"suburb" => "WARNE",
				"state" => "VIC",
				"lat" => "-35.780915",
				"lon" => "143.120509"
			],
			[
				"postcode" => "3531",
				"suburb" => "BERRIWILLOCK",
				"state" => "VIC",
				"lat" => "-35.635336",
				"lon" => "142.991804"
			],
			[
				"postcode" => "3531",
				"suburb" => "BOIGBEAT",
				"state" => "VIC",
				"lat" => "-35.563179",
				"lon" => "142.914657"
			],
			[
				"postcode" => "3531",
				"suburb" => "SPRINGFIELD",
				"state" => "VIC",
				"lat" => "-35.583752",
				"lon" => "143.109086"
			],
			[
				"postcode" => "3533",
				"suburb" => "BIMBOURIE",
				"state" => "VIC",
				"lat" => "-35.360723",
				"lon" => "142.786824"
			],
			[
				"postcode" => "3533",
				"suburb" => "LAKE TYRRELL",
				"state" => "VIC",
				"lat" => "-35.309",
				"lon" => "142.7795"
			],
			[
				"postcode" => "3533",
				"suburb" => "MITTYACK",
				"state" => "VIC",
				"lat" => "-35.157562",
				"lon" => "142.656977"
			],
			[
				"postcode" => "3533",
				"suburb" => "NANDALY",
				"state" => "VIC",
				"lat" => "-35.308438",
				"lon" => "142.698564"
			],
			[
				"postcode" => "3533",
				"suburb" => "NINDA",
				"state" => "VIC",
				"lat" => "-35.45375",
				"lon" => "142.755877"
			],
			[
				"postcode" => "3533",
				"suburb" => "NYARRIN",
				"state" => "VIC",
				"lat" => "-35.388524",
				"lon" => "142.650655"
			],
			[
				"postcode" => "3533",
				"suburb" => "SEA LAKE",
				"state" => "VIC",
				"lat" => "-35.504189",
				"lon" => "142.850808"
			],
			[
				"postcode" => "3533",
				"suburb" => "TYRRELL",
				"state" => "VIC",
				"lat" => "-35.425329",
				"lon" => "142.961344"
			],
			[
				"postcode" => "3533",
				"suburb" => "TYRRELL DOWNS",
				"state" => "VIC",
				"lat" => "-35.358339",
				"lon" => "142.972786"
			],
			[
				"postcode" => "3537",
				"suburb" => "BARRAPORT",
				"state" => "VIC",
				"lat" => "-36.011488",
				"lon" => "143.671965"
			],
			[
				"postcode" => "3537",
				"suburb" => "BARRAPORT WEST",
				"state" => "VIC",
				"lat" => "-36.018669",
				"lon" => "143.527848"
			],
			[
				"postcode" => "3537",
				"suburb" => "BOORT",
				"state" => "VIC",
				"lat" => "-36.116842",
				"lon" => "143.725589"
			],
			[
				"postcode" => "3537",
				"suburb" => "CANARY ISLAND",
				"state" => "VIC",
				"lat" => "-35.986353",
				"lon" => "143.87463"
			],
			[
				"postcode" => "3537",
				"suburb" => "CATUMNAL",
				"state" => "VIC",
				"lat" => "-36.090288",
				"lon" => "143.644117"
			],
			[
				"postcode" => "3537",
				"suburb" => "GREDGWIN",
				"state" => "VIC",
				"lat" => "-35.984791",
				"lon" => "143.604361"
			],
			[
				"postcode" => "3537",
				"suburb" => "LEAGHUR",
				"state" => "VIC",
				"lat" => "-35.942274",
				"lon" => "143.818646"
			],
			[
				"postcode" => "3537",
				"suburb" => "MINMINDIE",
				"state" => "VIC",
				"lat" => "-36.042299",
				"lon" => "143.745106"
			],
			[
				"postcode" => "3537",
				"suburb" => "YANDO",
				"state" => "VIC",
				"lat" => "-36.068607",
				"lon" => "143.807342"
			],
			[
				"postcode" => "3540",
				"suburb" => "CANNIE",
				"state" => "VIC",
				"lat" => "-35.75855",
				"lon" => "143.445376"
			],
			[
				"postcode" => "3540",
				"suburb" => "NINYEUNOOK",
				"state" => "VIC",
				"lat" => "-35.942628",
				"lon" => "143.445965"
			],
			[
				"postcode" => "3540",
				"suburb" => "OAKVALE",
				"state" => "VIC",
				"lat" => "-35.907104",
				"lon" => "143.593301"
			],
			[
				"postcode" => "3540",
				"suburb" => "QUAMBATOOK",
				"state" => "VIC",
				"lat" => "-35.849005",
				"lon" => "143.520646"
			],
			[
				"postcode" => "3542",
				"suburb" => "COKUM",
				"state" => "VIC",
				"lat" => "-35.758096",
				"lon" => "143.284751"
			],
			[
				"postcode" => "3542",
				"suburb" => "LALBERT",
				"state" => "VIC",
				"lat" => "-35.667621",
				"lon" => "143.374622"
			],
			[
				"postcode" => "3542",
				"suburb" => "TITYBONG",
				"state" => "VIC",
				"lat" => "-35.699829",
				"lon" => "143.38222"
			],
			[
				"postcode" => "3544",
				"suburb" => "CHINANGIN",
				"state" => "VIC",
				"lat" => "-35.513341",
				"lon" => "143.197025"
			],
			[
				"postcode" => "3544",
				"suburb" => "GOWANFORD",
				"state" => "VIC",
				"lat" => "-35.410778",
				"lon" => "143.191625"
			],
			[
				"postcode" => "3544",
				"suburb" => "MURNUNGIN",
				"state" => "VIC",
				"lat" => "-35.614725",
				"lon" => "143.237807"
			],
			[
				"postcode" => "3544",
				"suburb" => "ULTIMA",
				"state" => "VIC",
				"lat" => "-35.470402",
				"lon" => "143.26756"
			],
			[
				"postcode" => "3544",
				"suburb" => "ULTIMA EAST",
				"state" => "VIC",
				"lat" => "-35.467617",
				"lon" => "143.341976"
			],
			[
				"postcode" => "3544",
				"suburb" => "WAITCHIE",
				"state" => "VIC",
				"lat" => "-35.365614",
				"lon" => "143.103594"
			],
			[
				"postcode" => "3546",
				"suburb" => "BOLTON",
				"state" => "VIC",
				"lat" => "-34.96464",
				"lon" => "142.884361"
			],
			[
				"postcode" => "3546",
				"suburb" => "CHINKAPOOK",
				"state" => "VIC",
				"lat" => "-35.190061",
				"lon" => "142.947359"
			],
			[
				"postcode" => "3546",
				"suburb" => "COCAMBA",
				"state" => "VIC",
				"lat" => "-35.109974",
				"lon" => "142.900139"
			],
			[
				"postcode" => "3546",
				"suburb" => "GERAHMIN",
				"state" => "VIC",
				"lat" => "-35.181035",
				"lon" => "142.795553"
			],
			[
				"postcode" => "3546",
				"suburb" => "MANANGATANG",
				"state" => "VIC",
				"lat" => "-35.054563",
				"lon" => "142.882871"
			],
			[
				"postcode" => "3546",
				"suburb" => "TUROAR",
				"state" => "VIC",
				"lat" => "-35.181524",
				"lon" => "143.079145"
			],
			[
				"postcode" => "3546",
				"suburb" => "WINNAMBOOL",
				"state" => "VIC",
				"lat" => "-34.977791",
				"lon" => "142.767585"
			],
			[
				"postcode" => "3549",
				"suburb" => "ANNUELLO",
				"state" => "VIC",
				"lat" => "-34.847699",
				"lon" => "142.830117"
			],
			[
				"postcode" => "3549",
				"suburb" => "BANNERTON",
				"state" => "VIC",
				"lat" => "-34.698232",
				"lon" => "142.813221"
			],
			[
				"postcode" => "3549",
				"suburb" => "HAPPY VALLEY",
				"state" => "VIC",
				"lat" => "-34.695199",
				"lon" => "142.713108"
			],
			[
				"postcode" => "3549",
				"suburb" => "LIPAROO",
				"state" => "VIC",
				"lat" => "-34.819892",
				"lon" => "142.581157"
			],
			[
				"postcode" => "3549",
				"suburb" => "ROBINVALE",
				"state" => "VIC",
				"lat" => "-34.590121",
				"lon" => "142.772064"
			],
			[
				"postcode" => "3549",
				"suburb" => "ROBINVALE IRRIGATION DISTRICT SECTION B",
				"state" => "VIC",
				"lat" => "-34.612077",
				"lon" => "142.789595"
			],
			[
				"postcode" => "3549",
				"suburb" => "ROBINVALE IRRIGATION DISTRICT SECTION C",
				"state" => "VIC",
				"lat" => "-34.626246",
				"lon" => "142.730687"
			],
			[
				"postcode" => "3549",
				"suburb" => "ROBINVALE IRRIGATION DISTRICT SECTION D",
				"state" => "VIC",
				"lat" => "-34.636393",
				"lon" => "142.75566"
			],
			[
				"postcode" => "3549",
				"suburb" => "ROBINVALE IRRIGATION DISTRICT SECTION E",
				"state" => "VIC",
				"lat" => "-34.664554",
				"lon" => "142.759585"
			],
			[
				"postcode" => "3549",
				"suburb" => "TOL TOL",
				"state" => "VIC",
				"lat" => "-34.642107",
				"lon" => "142.822454"
			],
			[
				"postcode" => "3549",
				"suburb" => "WANDOWN",
				"state" => "VIC",
				"lat" => "-34.820509",
				"lon" => "142.92752"
			],
			[
				"postcode" => "3549",
				"suburb" => "WEMEN",
				"state" => "VIC",
				"lat" => "-34.804308",
				"lon" => "142.672627"
			],
			[
				"postcode" => "3550",
				"suburb" => "BENDIGO",
				"state" => "VIC",
				"lat" => "-36.758492",
				"lon" => "144.280075"
			],
			[
				"postcode" => "3550",
				"suburb" => "BENDIGO SOUTH",
				"state" => "VIC",
				"lat" => "-36.771921",
				"lon" => "144.291162"
			],
			[
				"postcode" => "3550",
				"suburb" => "DIAMOND HILL",
				"state" => "VIC",
				"lat" => "-36.822895",
				"lon" => "144.270219"
			],
			[
				"postcode" => "3550",
				"suburb" => "EAST BENDIGO",
				"state" => "VIC",
				"lat" => "-36.749405",
				"lon" => "144.30275"
			],
			[
				"postcode" => "3550",
				"suburb" => "FLORA HILL",
				"state" => "VIC",
				"lat" => "-36.774405",
				"lon" => "144.290098"
			],
			[
				"postcode" => "3550",
				"suburb" => "IRONBARK",
				"state" => "VIC",