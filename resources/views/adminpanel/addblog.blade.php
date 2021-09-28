@extends('adminpanel.default.master')
 
@section('title', 'Add/Edit Blog')

@section('content')

                <?php
                $label = "Create";
                
                $cate_id = "";
                $blog_title = "";
                $description = "";
                $tags = "";
                $is_publish  = "";
                $status = false;
                $id = "";
                $isError = false;
                $formRoute = 'adminpanel.blog.save';
                $blog_image = asset('adminpanel/images/default-user.jpg');
                if(isset($data['error'])) {
                    $isError = true;
                    if($data['type']=="Edit") {
                        $label = "Edit";
                        $formRoute = 'adminpanel.blog.update';
                    }
                    $cate_id = $data['input']['cate_id'];                    
                    $blog_title = $data['input']['blog_title'];
                    $description = $data['input']['description'];
                    $tags = $data['input']['tags'];
                    $is_publish = $data['input']['is_publish'];
                    $status = $data['input']['status'];
                    
                } else { 
                    if($data['type'] == "edit") {
                        $label = "Edit";
                        $cate_id = $data['input'][0]->cate_id;
                        $blog_title = $data['input'][0]->blog_title;
                        $description = $data['input'][0]->description;
                        $tags = $data['input'][0]->tags;
                        $is_publish = $data['input'][0]->is_publish;                        
                        $status = $data['input'][0]->status;
                        $id = $data['input'][0]->id;
                        $blog_image = $data['input'][0]->blog_image;
                        if($blog_image!="" && $blog_image!=null) {
                            if(file_exists(public_path()."/uploads/blog_image/".$blog_image)) {
                                $blog_image = asset('/uploads/blog_image/'.$blog_image);
                            }
                        }
                        $formRoute = 'adminpanel.blog.update';
                    }
                    if($status==1) {
                    	$status = true;
                	}
                	if($is_publish==1) {
                    	$is_publish = true;
                	}
                } 
                ?>
                <div class="top-dashboard-title">
                    <div class="d-code-main">
                        <div class="d-title">
                            <h4><strong>{{ $label }} Blog</strong><span>|</span>Enter Blog details and submit </h4>
                        </div>
                    </div>
                    
                </div>

                <div class="dashboard-content-main add-user-main">
                    <div class="add-user-one-main-content">                        
                        @if($errors->any())
                            <div class="error-message-box">                    
                                <p>{{$errors->first()}}</p>
                            </div>
                        @endif
                        @if($isError)
                            <div class="error-message-box">
                                <?php foreach($data['error']->all() as $error) {
                                    echo "<p>". $error . "</p>";
                                } ?>
                            </div>
                        @endif
                        {{ Form::open(array('route' => $formRoute, 'method' => 'post', 'enctype' => 'multipart/form-data')) }}
                            {{ Form::hidden(
                                'id', $id
                                ) 
                            }}
                            <div class="user-pro-detail-main-content">
                                <div class="user-pro-detail-sub-content">
                                    <div class="user-pro-detail-main-content-title">
                                        <h1>Blog management:</h1>
                                    </div>
                                    <div class="user-pro-detail-content">
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Select Category</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'cate_id', 
                                                    $data['blog_cate'],
                                                    $cate_id, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Category',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Blog Title</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'blog_title', $blog_title, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter blog title',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Image</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <div class="user-img-main" style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <img src="{{ $blog_image }}" id="logoimg" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
                                                    <div class="button-wrapper">
                                                        <span class="label"><img src="{{ asset('adminpanel/images/pencil-edit-button.svg') }}"></span>
                                                        {{ Form::file(
                                                            'blog_image', 
                                                            [
                                                                'class' => 'upload-box',
                                                                'id' => 'blog_image',
                                                                'placeholder' => 'Select Image',
                                                                'onchange' => 'displaySingleImagePreview(this, "logoimg")'
                                                            ]
                                                            ) 
                                                        }}
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Description</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <textarea name="description">{{ $description }}</textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Email</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'tags', $tags, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter tags',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Is Publish?</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <label class="ki-checkbox">
                                                    {{ Form::checkbox('is_publish', 1, $is_publish) }}
                                                    <span style="top:-5px;"></span>
                                                </label>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Is Active</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <label class="ki-checkbox">
                                                    {{ Form::checkbox('status', 1, $status) }}
                                                    <span style="top:-5px;"></span>
                                                </label>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="next-step-btn-main">
                                        {{ Form::button(
                                            'Save',
                                            [
                                                'class' => 'next-step',
                                                'type' => 'submit'
                                            ]
                                            )
                                        }}
                                    </div>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>

@endsection
               