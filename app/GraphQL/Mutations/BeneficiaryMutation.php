<?php

namespace App\GraphQL\Mutations;

use Illuminate\Http\File;
use App\Models\Beneficiary;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use GraphQL\Type\Definition\ResolveInfo;
use App\GraphQL\Exceptions\FileUploadException;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class BeneficiaryMutation
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
        $featuredImage = $this->processFile(isset($args['featured_image']) ? $args['featured_image'] : null);

        $beneficiary = Beneficiary::create([
            'internal_id' => Str::upper(Str::random(5)),
            'first_name' => $args['first_name'],
            'middle_name' => isset($args['middle_name']) ? $args['middle_name'] : null,
            'last_name' => isset($args['last_name']) ? $args['last_name'] : null,
            'age' => $args['age'],
            'mobile_number' => $args['mobile_number'],
            'national_id' => $args['national_id'],
            'token_number' => $args['token_number'],
            'project_id' =>$args['project_id'],
            'amount' => $args['amount'],
            'payment_status' => $args['payment_status'],
            'featured_image' => $featuredImage
        ]);

        return [
            'message' => 'Beneficiary Created Successfully',
            'beneficiary' => $beneficiary
        ];
    }

    public function update($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $beneficiary = Beneficiary::find($args['id']);

        $featuredImage = $this->processFile(isset($args['featured_image']) ? $args['featured_image'] : null);
        
        // Delete First Image
        if ($featuredImage && Storage::disk('beneficiaries')->exists('beneficiaries/' . $beneficiary->featured_image)) {
            Storage::disk('beneficiaries')->delete('beneficiaries/' . $beneficiary->featured_image);
        }
        
        $beneficiary->update([
            'first_name' => $args['first_name'],
            'middle_name' => isset($args['middle_name']) ? $args['middle_name'] : null,
            'last_name' => isset($args['last_name']) ? $args['last_name'] : null,
            'age' => $args['age'],
            'mobile_number' => $args['mobile_number'],
            'national_id' => $args['national_id'],
            'token_number' => $args['token_number'],
            'project_id' =>$args['project_id'],
            'amount' => $args['amount'],
            'featured_image' => $featuredImage,
            'payment_status' => $args['payment_status'],
        ]);       

        return [
            'message' => 'Beneficiary Updated Successfully',
            'beneficiary' => $beneficiary
        ];
    }

    public function destroy($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $beneficiary = Beneficiary::find($args['id']);
        
        $beneficiary->delete();  
        
        // Delete First Image
        if (Storage::disk('beneficiaries')->exists('beneficiaries/' . $beneficiary->featured_image)) {
            Storage::disk('beneficiaries')->delete('beneficiaries/' . $beneficiary->featured_image);
        }

        return [
            'message' => 'Beneficiary Deleted Successfully',
            'beneficiary' => $beneficiary
        ];
    }

    public function processFile($file)
    {
        //Handle File upload
        if($file){
            try {
                //Get File Name with the Extension
                $filenameWithExt = $file->getClientOriginalName();
                //Get just File name
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Get just Ext
                $extension = $file->getClientOriginalExtension();
                //Filename to store
                $fileNameToStore = $filename.'_'.Str::random('5').'.'.$extension;
                //Upload Image
                Storage::disk('beneficiaries')->putFileAs('beneficiaries', new File($file), $fileNameToStore, );

                return $fileNameToStore;
            } catch (\Throwable $th) {
                throw new FileUploadException(
                    'File Processing Failed',
                    $th->getMessage()
                );
            }
        }

        return null;
    }
}
