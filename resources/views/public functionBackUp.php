public function action(Request $request)
{
if ($request->ajax()) {
$output = '';
$query = $request->get('query');
$viewType = $request->get('viewType');
$searchOption = $request->get('searchOption');
$selectedDistrict = $request->get('selectedDistrict');
$numOfCols = 3;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;

if ($query != '')
//BusinessName Search Option
{
if ($searchOption === "businessNameSearch") {
$data = DB::table('businesses')
->join('industries', 'industries.id', '=', 'businesses.industryId')
->select('businesses.id','businesses.logo', 'businesses.business_name', 'industries.industry')
->where('business_name', 'LIKE', $query . '%')
->get();
}
//Province Search Option
elseif($searchOption === "provinceSearch") {
$data = DB::table('businesses')
->join('industries', 'industries.id', '=', 'businesses.industryId')
->join('provinces', 'provinces.id', '=', 'businesses.provinceId')
->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry', 'provinces.province')
->where('province', 'LIKE', $query . '%')
->get();
}
//District Search Option
elseif($searchOption === "districtSearch") {
$data = DB::table('businesses')
->join('industries', 'industries.id', '=', 'businesses.industryId')
->join('municipal_districts', 'municipal_districts.id', '=', 'businesses.districtId')
->join('provinces', 'provinces.id', '=', 'businesses.provinceId')
->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry',
'provinces.province','municipal_districts.municipal_district')
->where('municipal_district', 'LIKE', $query . '%')
->get();

}
//Municipality Search Option

elseif($searchOption === "municipalitySearch") {
$data = DB::table('businesses')
->join('industries', 'industries.id', '=', 'businesses.industryId')
->join('municipal_districts', 'municipal_districts.id', '=', 'businesses.districtId')
->join('provinces', 'provinces.id', '=', 'businesses.provinceId')
->join('municipalities', 'municipalities.id', '=', 'businesses.municipalityId')
->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry',
'provinces.province','municipalities.municipality')
->where('municipality', 'LIKE', $query . '%')
->get();

}
//Industry Search Option
elseif($searchOption === "industrySearch") {
if(!empty($selectedDistrict)){
$data = DB::table('businesses')
->join('industries', 'industries.id', '=', 'businesses.industryId')
->join('municipal_districts', 'municipal_districts.id', '=', 'businesses.districtId')
->join('municipalities', 'municipalities.id', '=', 'businesses.municipalityId')
->leftJoin('provinces', function($join){
$join->on('provinces.id', '=', 'businesses.provinceId')
->orOn('provinces.id', '=', 'businesses.districtId')
->orOn('provinces.id', '=', 'businesses.municipalityId');
})
->select('businesses.id','businesses.logo', 'businesses.business_name', 'industries.industry',
'provinces.province','municipalities.municipality','municipal_districts.municipal_district')
->where('industry', 'LIKE', $query . '%')
->where('provinces.province', '=', $request->selectedProvince)
->where('municipal_districts.municipal_district', '=', $request->selectedDistrict)
->where('municipalities.municipality', '=', $request->selectedMunicipality)
->get();
}else{
$data = DB::table('businesses')
->leftjoin('industries', 'industries.id', '=', 'businesses.industryId')
->leftjoin('provinces', 'provinces.id', '=', 'businesses.provinceId')
->leftjoin('users', 'users.id', '=', 'businesses.company_rep')
->select('users.name', 'businesses.*', 'provinces.province', 'industries.industry')
->where('industry', 'LIKE', $query . '%')
->get();
}

}

} else {
$data = DB::table('businesses')
->leftjoin('industries', 'industries.id', '=', 'businesses.industryId')
->leftjoin('provinces', 'provinces.id', '=', 'businesses.provinceId')
->leftjoin('municipal_districts', 'municipal_districts.id', '=', 'businesses.districtId')
->leftjoin('municipalities', 'municipalities.id', '=', 'businesses.municipalityId')
->select('businesses.*', 'businesses.business_name', 'industries.industry',
'provinces.province','municipalities.municipality')
->where('activation_status', '=', 1)
->get();

}

$total_row = $data->count();

if ($total_row > 0) {
foreach ($data as $row) {
if ($viewType === 'cardView') {

if( empty($row->industry)) { $row->industry = "Industry"; }
( empty($row->logo))? $row->logo = "placeholder/placeholder.jpeg" : "";
$output .= '
<div class="card rounded-md mb-5 shadow-md overflow-hidden hover:shadow-lg" style="width: 100%;">
    <div class="img-wrap overflow-hidden"
        style="background-size:cover; background-repeat: no-repeat; background-position:center;  background-size: cover">
        <img src="../img/'. $row->logo .'" class="logoicon p-4" />
    </div>
    <div class="card-body text-center">
        <h5 class="font-bold card-title text-green-600">' . $row->business_name . '</h5>
        <p class="card-text text-xs">' . $row->industry . '</p>
        <a href="/viewBusiness/' . $row->id . '"
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 w-full">View</a>
    </div>
</div>';
}
if ($viewType === 'listView') {
$output .= '
<tr>
    <td>' . $row->id . '</td>
    <td>' . $row->business_name . '</td>
</tr>
';
}
}
} else {
if ($viewType === 'cardView') {
$output = 'No Data Found';
}
if ($viewType === 'listView') {
$output = '<tr>
    <td>No Data Found</td>
</tr>';
}
}
$data = array(
'table_data' => $output,
);
echo json_encode($data);
}
}