<?php
/**
 * 登录token
 */

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class TokenController extends Controller
{
    protected $jwt;

    protected $customAttributes = [
        'old_password' => '旧密码',
        'password' => '新密码',
        'password_confirmation' => '确认密码',
    ];

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    /**
     * 登录-管理员
     *
     * @param Request $request
     *
     * @return array
     */
    public function create(Request $request)
    {
        if (!$token = $this->jwt->attempt($request->only('username', 'password'))) {
            $this->error('账号或者密码错误');
        }

        return $this->respondWithToken($token);
    }

    /**
     * 更新token
     *
     * @param Request $request
     *
     * @return array
     * @throws JWTException
     */
    public function update(Request $request)
    {
        if (!$this->jwt->parser()->setRequest($request)->hasToken()) {
            throw new UnauthorizedHttpException('jwt-auth', 'Token not provided');
        }

        return $this->respondWithToken($this->jwt->parseToken()->refresh());
    }

    /**
     * 退出
     *
     * @return string
     */
    public function delete()
    {
        $this->jwt->blacklist()->add($this->jwt->payload());

        return '已退出';
    }

    /**
     * 处理返回token格式
     *
     * @param  string $token
     *
     * @return array
     */
    protected function respondWithToken($token)
    {
        return [
            'token' => $token,
            'type' => 'Bearer',
            'expired_at' => time() + $this->jwt->factory()->getTTL() * 60,
        ];
    }

    /**
     * 修改个人密码
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse|string
     * @throws ValidationException
     */
    public function password(Request $request)
    {
        $this->verify($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);
        // 验证旧密码
        /** @var User $user */
        $user = Auth::user();
        if (!Hash::check($request->input('old_password'), $user->password)) {
            $this->verifyError('old_password', '旧密码错误');
        }
        $user->password = $request->input('password');
        $user->save();
        return 'ok';
    }

    /**
     * 获取登录权限列表
     *
     * 前端每次刷新页面时请求
     *
     * @return array|Collection
     */
    public function userInfo()
    {
        /** @var User $user */
        $user = Auth::user();

        return $user->only(['id', 'username', 'nickname']);
    }

}
