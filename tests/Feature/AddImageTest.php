<?php

use App\Models\User;
namespace Illuminate\Http\Testing;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Testing\FileFactory;

class AddImageTest extends TestCase 
{
    use DatabaseMigrations;
    /**
     * Database test .
     * @covers test_only_admin_can_upload_images()
     * @return void
     */
    function test_only_admin_can_upload_images()
    {
        $this->withExceptionHandling();
        $this->json('POST','api/prices')
        ->assertStatus(401);
    }
    function test_valid_image_must_be_provided()
    {
        
      
        $this->withExceptionHandling();
        
        $this->json('POST','api/prices',[
            'image' => 'non-an-image'
        ])->assertStatus(422);
    }
    function test_user_can_upload_image()
    {
        // Storage::disk('public')->put('file.txt','Contents');
        $this->$this->middleware('guest')->except('logout');
        $this->json('POST','api/prices',[
            'image' => UploadedFile::fake()->image('coffe.jpg')]);
    
    }
    
}