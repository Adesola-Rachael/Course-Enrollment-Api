<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListCourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


            // foreach ($properties as $key => $property) {
            //     $data['items'][$key] = [
            //         'id' => $property->id,
            //         'street' => $property->street,
            //         'zipcode' => $property->zipcode,
            //         'city' => $property->city->name,
            //         'type' => $property->type->name,
            //         'interior' => $property->interior->type,
            //         'bedrooms' => $property->bedrooms,
            //         'year' => $property->year,
            //         'surface' => $property->surface,
            //         'available' => $property->available,
            //         'rent' => $property->rent,
            //         'service_costs' => $property->service_costs,
            //         'deposit' => $property->deposit,
            //         'text_nl' => $property->leader_text,
            //         'office' => $property->office->name,
            //     ];
            //     foreach ($property->property_images as $image) {
            //         $data['items'][$key]['images'][] = [
            //             'id' => $image->id,
            //         ];
            //     }
            // }
            // return [
            // ];
        }
}
