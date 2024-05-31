<?php 
namespace App\Services;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryService {
    public function categoryList() {
        return  $categories = Category::paginate(10); 
    }

}


?>