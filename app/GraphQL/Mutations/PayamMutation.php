<?php

namespace App\GraphQL\Mutations;

use App\Models\Regions\Payam;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class PayamMutation
{
    /**
     * Return a value for the field.
     *
     * @param  @param  null  $root Always null, since this field has no parent.
     * @param  array<string, mixed>  $args The field arguments passed by the client.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Shared between all fields.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Metadata for advanced query resolution.
     * @return mixed
     */
    public function store($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $payam = Payam::create([
            'name' => $args['name'],
            'county_id' => $args['county_id']
        ]);

        return [
            'message' => 'Payam Created Successfully',
            'payam' => $payam
        ];
    }

    public function update($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $payam = Payam::find($args['id']);
        
        $payam->name = $args['name'];
        $payam->county_id = $args['county_id'];
        $payam->save();        

        return [
            'message' => 'Payam Updated Successfully',
            'payam' => $payam
        ];
    }

    public function destroy($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $payam = Payam::find($args['id']);
        
        $payam->delete();        

        return [
            'message' => 'Payam Deleted Successfully',
            'payam' => $payam
        ];
    }
}
