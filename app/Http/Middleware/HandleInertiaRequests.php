<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'flash' => function () use ($request) {
                return [
                    'cart' => $request->session()->get('cart'),
                    'success' => $request->session()->get('success'),
                    'error' => $request->session()->get('error'),
                ];
            },
            'tabs' => function () {
                return [
                    ['label' => 'Menu 1'],
                    ['label' => 'Menu 2'],
                    ['label' => 'Menu 3'],
                    ['label' => 'Menu 4'],
                ];
            },
            //
            'MenusDrawer' =>  [
                [
                    'path' => '/dashboard',
                    'name' => 'dashboard',
                    'redirect' => 'noredirect',
                    'meta' => [
                        'title' => 'Dashboard',
                        'icon' => 'mdi-view-dashboard',
                    ],
                ],
                [
                    'path' => '/user',
                    'redirect' => 'noredirect',
                    // 'hidden' => true,
                    // 'name' => 'Usuarios',
                    'meta' => [
                        'title' => 'Usuarios',
                        'icon' => 'mdi-file-tree',
                    ],
                    'children' => [
                        [
                            'path' => 'users',
                            'name' => 'users.index',
                            'meta' => [
                                'title' => 'Usuarios', 'icon' => 'mdi-account'
                            ],
                        ],
                        // [
                        //     'path' => 'nested1_1',
                        //     'name' => 'Nested1_1',
                        //     'meta' => [
                        //         'title' => 'nivel 1', 'icon' => 'mdi-numeric-1-box'
                        //     ],
                        //     'children' => [
                        //         [
                        //             'path' => 'nested1_1_1',
                        //             'name' => 'Nested1_1_1',
                        //             'meta' => [
                        //                 'title' => 'nivel 1.1', 'icon' => 'mdi-numeric-2-box'
                        //             ],
                        //             'children' => [
                        //                 [
                        //                     'path' => 'nested1_1_1_1',
                        //                     'name' => 'Nested1_1_1_1',
                        //                     'meta' => [
                        //                         'title' => 'nivel 1.1.1', 'icon' => 'mdi-numeric-3-box'
                        //                     ],
                        //                 ],
                        //                 [
                        //                     'path' => 'nested1_1_1_2',
                        //                     'name' => 'Nested1_1_1_2',
                        //                     'meta' => [
                        //                         'title' => 'nivel 1.1.2', 'icon' => 'mdi-numeric-3-box'
                        //                     ],
                        //                 ]
                        //             ]
                        //         ],
                        //         [
                        //             'path' => 'nested1_1_2',
                        //             'name' => 'Nested1_1_2',
                        //             'meta' => [
                        //                 'title' => 'nivel 1.2', 'icon' => 'mdi-numeric-2-box'
                        //             ],
                        //         ]
                        //     ]
                        // ],
                        // [
                        //     'path' => 'users/register',
                        //     'name' => 'users.create',
                        //     'meta' => [
                        //         'title' => 'Registrar Usuario', 'icon' => 'mdi-account-plus'
                        //     ],
                        // ],
                    ]
                ]

            ]
        ]);
    }
}
