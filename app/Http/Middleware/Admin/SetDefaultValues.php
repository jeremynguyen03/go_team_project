<?php
namespace App\Http\Middleware\Admin;

use App\Services\AdminUserServiceInterface;

class SetDefaultValues
{
    /** @var AdminUserServiceInterface */
    protected $adminUserService;

    /**
     * Create a new filter instance.
     *
     * @param AdminUserServiceInterface $adminUserService
     */
    public function __construct(
        AdminUserServiceInterface $adminUserService
    ) {
        $this->adminUserService = $adminUserService;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        $user = $this->adminUserService->getUser();
        view()->share('authUser', $user);
        view()->share('menu', '');

        return $next($request);
    }
}
