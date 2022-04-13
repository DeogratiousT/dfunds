<?php

namespace App\GraphQL\Mutations;

use App\Models\Regions\State;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class StateMutation
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
        $state = State::create([
            'name' => $args['name']
        ]);

        return [
            'message' => 'State Created Successfully',
            'state' => $state
        ];
    }

    public function update($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $state = State::find($args['id']);
        
        $state->name = $args['name'];
        $state->save();        

        return [
            'message' => 'State Updated Successfully',
            'state' => $state
        ];
    }

    public function destroy($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $state = State::find($args['id']);
        
        $state->delete();        

        return [
            'message' => 'State Deleted Successfully',
            'state' => $state
        ];
    }
}
