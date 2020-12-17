        <?php
        
        namespace App\Http\Controllers;
        
        use Illuminate\Http\Request;
        use App\Models\User;
        use Illuminate\Support\Facades\Auth;
        // 下記を追記
        use App\Services\UserService;
        
        class UserController extends Controller
        {
            // 下記を追記
            /**
             *
             * @var UserService
             */
            private $userService;
        
            public function __construct(UserService $userService)
            {
                $this->userService = $userService;
            }
            // 上記までを追記
        
            public function index()
            {
                $user_id = Auth::id();
                // 下記を修正
                $user_info = $this->userService->getUserInfoByUserId($user_id);
                return view('users.index', ['user_info' => $user_info]);
            }
        }
        