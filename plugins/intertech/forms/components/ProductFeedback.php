<?php namespace Intertech\Forms\Components;

use Lang;
use Flash;
use Request;
use Redirect;
use Validator;
use ValidationException;
use RainLab\User\Models\User;
use Cms\Classes\ComponentBase;
use Feegleweb\Octoshop\Models\Product as ShopProduct;
use Feegleweb\Catalog\Models\Product as CatalogProduct;
use Intertech\Forms\Traits\ComponentsTrait;

class ProductFeedback extends ComponentBase
{
    use ComponentsTrait;

    public function componentDetails()
    {
        return [
            'name'        => 'ProductFeedback Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'partial' => [
                'label' => 'Partial',
                'description' => 'Partial file name',
            ],
        ];
    }

    public function getData()
    {
        return [];
    }

    /**
     * Translations for attribute name
     */
    public function attributeNames()
    {
        return [
            'full_name' => Lang::get('rainlab.user::lang.register.validation.first_name'),
            'email' => Lang::get('rainlab.user::lang.register.validation.email'),
        ];
    }

    /**
     * Send feedback
     * This function for send request (page product)
     * end create in DB
     */
    public function onSendFeedback()
    {
        try {
            if ($productId = post('product_id')) {
                $type = $this->getUserType(post('type'));

                if ($type == 1) {
                    $product = CatalogProduct::find($productId);
                }

                if ($type == 2) {
                    $product = ShopProduct::find($productId);
                }

                if (!$product) {
                    Flash::error('Даного продукта не существует');
                }
            }

            $rules = [
                'full_name' => 'required',
                'email' => 'required|min:6|email'
            ];

            $validation = Validator::make(post(), $rules, [], $this->attributeNames());
            if ($validation->fails()) {
                throw new ValidationException($validation);
            }

            $product->feedbacks()->create([
                'full_name' => post('full_name'),
                'email' => post('email'),
                'message' => post('message')
            ]);

            Flash::success(Lang::get('intertech.forms::lang.callback.success_send_feedback'));
            
            return Redirect::to(Request::url());
        }
        catch (Exception $ex) {
            if (Request::ajax()) throw $ex;
            else Flash::error($ex->getMessage());
        }
    }

    /**
     * Send email after create callback in DB
     */
    public function sendMail()
    {

    }

    public function getUserType($type = 1)
    {
        if ($type != User::TYPE_WHOLESALE && $type != User::TYPE_RETAIL) {
            $type = User::TYPE_WHOLESALE;
        }

        return $type;
    }
}
