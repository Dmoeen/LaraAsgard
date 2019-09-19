<?php

namespace Modules\ProductManagement\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterProductManagementSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('productmanagement::productmanagements.title.productmanagements'), function (Item $item) {
                $item->icon('fa fa-file');
                $item->weight(10);
                $item->authorize(
                    $this->auth->hasAccess('productmanagement.products.index')

                );
                $item->item(trans('productmanagement::categories.title.categories'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.productmanagement.category.create');
                    $item->route('admin.productmanagement.category.index');
                    $item->authorize(
                        $this->auth->hasAccess('productmanagement.categories.index')
                    );
                });
                $item->item(trans('productmanagement::products.title.products'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.productmanagement.product.create');
                    $item->route('admin.productmanagement.product.index');
                    $item->authorize(
                        $this->auth->hasAccess('productmanagement.products.index')
                    );
                });
                $item->item(trans('productmanagement::events.title.events'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.productmanagement.event.create');
                    $item->route('admin.productmanagement.event.index');
                    $item->authorize(
                        $this->auth->hasAccess('productmanagement.events.index')
                    );
                });
                $item->item(trans('productmanagement::flavours.title.flavours'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.productmanagement.flavour.create');
                    $item->route('admin.productmanagement.flavour.index');
                    $item->authorize(
                        $this->auth->hasAccess('productmanagement.flavours.index')
                    );
                });
                $item->item(trans('productmanagement::shapes.title.shapes'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.productmanagement.shape.create');
                    $item->route('admin.productmanagement.shape.index');
                    $item->authorize(
                        $this->auth->hasAccess('productmanagement.shapes.index')
                    );
                });
                $item->item(trans('productmanagement::designs.title.designs'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.productmanagement.design.create');
                    $item->route('admin.productmanagement.design.index');
                    $item->authorize(
                        $this->auth->hasAccess('productmanagement.designs.index')
                    );
                });
                $item->item(trans('productmanagement::icings.title.icings'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.productmanagement.icing.create');
                    $item->route('admin.productmanagement.icing.index');
                    $item->authorize(
                        $this->auth->hasAccess('productmanagement.icings.index')
                    );
                });
                $item->item(trans('productmanagement::subcategories.title.subcategories'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.productmanagement.subcategory.create');
                    $item->route('admin.productmanagement.subcategory.index');
                    $item->authorize(
                        $this->auth->hasAccess('productmanagement.subcategories.index')
                    );
                });
                $item->item(trans('productmanagement::colors.title.colors'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.productmanagement.color.create');
                    $item->route('admin.productmanagement.color.index');
                    $item->authorize(
                        $this->auth->hasAccess('productmanagement.colors.index')
                    );
                });
// append









            });
        });

        return $menu;
    }
}
