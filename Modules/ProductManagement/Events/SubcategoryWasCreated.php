<?php
/**
 * Created by PhpStorm.
 * User: Daniyal
 * Date: 9/22/2019
 * Time: 4:36 PM
 */

namespace Modules\ProductManagement\Events;



use Modules\Media\Contracts\StoringMedia;

class SubcategoryWasCreated implements StoringMedia
{


    private $subcategory;
    private $data;


    public function __construct($subcategory, $data)
    {
        $this->subcategory = $subcategory;
        $this->data = $data;
    }


    public function getEntity()
    {
        return $this->subcategory;
    }


    public function getSubmissionData()
    {
        return $this->data;
    }
}