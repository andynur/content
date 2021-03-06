<?php
/**
 * Created by PhpStorm.
 * User: dyangalih
 * Date: 04/11/18
 * Time: 03.50
 */

namespace WebAppId\Content\Seeds;


use Illuminate\Database\Seeder;
use WebAppId\Content\Repositories\CategoryStatusRepository;
use WebAppId\Content\Services\Params\AddCategoryStatusParam;

/**
 * Class CategoryStatusTableSeeder
 * @package WebAppId\Content\Seeds
 */
class CategoryStatusTableSeeder extends Seeder
{
    /**
     * @param CategoryStatusRepository $categoryStatusRepository
     * @param AddCategoryStatusParam $addCategoryStatusParam
     */
    public function run(CategoryStatusRepository $categoryStatusRepository,
                        AddCategoryStatusParam $addCategoryStatusParam)
    {
        $categoryStatuses = array(
            'active',
            'not active'
        );
        
        foreach ($categoryStatuses as $categoryStatus) {
            $result = $this->container->call([$categoryStatusRepository, 'getByName'], ['name' => $categoryStatus]);
            if ($result == null) {
                $addCategoryStatusParam->setName($categoryStatus);
    
                $this->container->call([$categoryStatusRepository, 'addCategoryStatus'], ['addCategoryStatusParam' => $addCategoryStatusParam]);
            }
        }
    }
}