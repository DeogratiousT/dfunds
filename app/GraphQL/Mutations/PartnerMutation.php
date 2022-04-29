<?php

namespace App\GraphQL\Mutations;

use App\Models\Partner;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class PartnerMutation
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
        $partner = Partner::create([
            'name' => $args['name']
        ]);

        return [
            'message' => 'Partner Created Successfully',
            'partner' => $partner
        ];
    }

    public function update($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $partner = Partner::find($args['id']);
        
        $partner->name = $args['name'];
        $partner->save();        

        return [
            'message' => 'Partner Updated Successfully',
            'partner' => $partner
        ];
    }

    public function destroy($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $partner = Partner::find($args['id']);
        
        $partner->delete();        

        return [
            'message' => 'Partner Deleted Successfully',
            'partner' => $partner
        ];
    }
}
