use App\Helpers\ConfigHelper;
use App\Models\Insurance;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class InsuranceController extends Controller
{
    public function index(Request $request)
    {
        SEOTools::setTitle('Quỹ bảo hiểm uy tín - Tra cứu lừa đảo');
        SEOTools::setDescription('Danh sách các thành viên, đơn vị đã tham gia đóng quỹ bảo hiểm tín nhiệm, đảm bảo an toàn khi giao dịch.');

        $query = Insurance::where('status', 1);
        // ... rest of index ...
        if ($request->has('search') && ! empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        $insurances = $query->orderBy('id', 'asc')->get();

        $total_fund = Insurance::where('status', 1)->sum('amount');
        $total_members = Insurance::where('status', 1)->count();

        return view('insurances.index', compact('insurances', 'total_fund', 'total_members'));
    }

    public function show($slug)
    {
        $insurance = Insurance::where('status', 1)
            ->where('slug', $slug)
            ->firstOrFail();

        // Advanced SEO
        $siteTitle = ConfigHelper::getConfig('site_title', 'CheckScam');
        $metaTitle = $insurance->full_name.' | Xác minh Quỹ bảo hiểm uy tín - '.$siteTitle;
        $metaDesc = $insurance->full_name.' đã tham gia đóng quỹ bảo hiểm với số tiền '.number_format($insurance->amount).' VNĐ. Đây là thành viên đã được '.$siteTitle.' xác minh tín nhiệm, đảm bảo an toàn tuyệt đối khi giao dịch.';

        SEOTools::setTitle($metaTitle);
        SEOTools::setDescription($metaDesc);
        SEOTools::metatags()->addKeyword('bảo hiểm, tín nhiệm, '.$insurance->full_name.', uy tín giao dịch, check tín nhiệm, '.$siteTitle);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('type', 'profile');
        SEOTools::opengraph()->addImage($insurance->avatar_url);

        return view('insurances.detail', compact('insurance'));
    }
}
