<?php

namespace App\GraphQL\Mutations;

use App\Models\Project;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ProjectMutation
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
        $project = Project::create([
            'name' => $args['name'],
            'description' => $args['description'],
            'partner_id' => $args['partner_id'],
            'state_id' => $args['state_id'],
            'county_id' => $args['county_id'],
            'payam_id' => $args['payam_id'],
            'start_date' => $args['start_date'],
            'end_date' =>$args['end_date'],
            'payment_type' => $args['payment_type'],
            'status' => $args['status'],
        ]);

        return [
            'message' => 'Project Created Successfully',
            'project' => $project
        ];
    }

    public function update($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $project = Project::find($args['id']);
        
        $project->update([
            'name' => $args['name'],
            'description' => $args['description'],
            'partner_id' => $args['partner_id'],
            'state_id' => $args['state_id'],
            'county_id' => $args['county_id'],
            'payam_id' => $args['payam_id'],
            'start_date' => $args['start_date'],
            'end_date' =>$args['end_date'],
            'payment_type' => $args['payment_type'],
            'status' => $args['status'],
        ]);       

        return [
            'message' => 'Project Updated Successfully',
            'project' => $project
        ];
    }

    public function destroy($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $project = Project::find($args['id']);
        
        $project->delete();        

        return [
            'message' => 'Project Deleted Successfully',
            'project' => $project
        ];
    }
}
