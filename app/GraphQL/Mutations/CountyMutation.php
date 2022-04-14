<?php

namespace App\GraphQL\Mutations;

use App\Models\Regions\County;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class CountyMutation
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
        $county = County::create([
            'name' => $args['name'],
            'state_id' => $args['state_id']
        ]);

        return [
            'message' => 'County Created Successfully',
            'county' => $county
        ];
    }

    public function update($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $county = County::find($args['id']);
        
        $county->name = $args['name'];
        $county->state_id = $args['state_id'];
        $county->save();        

        return [
            'message' => 'County Updated Successfully',
            'county' => $county
        ];
    }

    public function destroy($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $county = County::find($args['id']);
        
        $county->delete();        

        return [
            'message' => 'County Deleted Successfully',
            'county' => $county
        ];
    }
}
