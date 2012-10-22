PHP SDK for the CloudExperience SDK
===================================

### Overview
This is a PHP library to authenticate with and call any API in the CloudExperience API.

Most of these examples can be found in the included `examples.php` file.

### Initialization

Your *client id* and *client secret* can be found on the Mashery site under your Cloud Experience apps.

    include 'CloudExperience.php';
    $cx = new CloudExperience('YOUR_CLIENT_ID', 'YOUR_CLIENT_SECRET');

### Authorization

If the user hasn't yet granted access to your app you'll need to obtain an access token from CloudExperience to their account. An overview of OAuth2 is out of the scope of this document but you can Google it if you'd like. With this library you won't need to really know the underlying details of OAuth.

    // get the authorization URL
    $cx->getAuthorizationUrl('https://yoursite.com');
        // https://www.cx.com/mycx/oauth/authorize?client_id=your_client_id&redirect_uri=https%3A%2F%2Fyoursite.com

Redirect the user to the *Authorization URL* and once the user approves your app they'll be redirected to the callback URL you specified. The request will include a *GET* parameter named `authorization_code` which we'll pass back to CloudExperience in exchange for an access token.

    // obtaining an access token
    $cx->getAccessToken('qjdgpg2arjdmgnt2fdcchn85', 'https://google.com')
        //  array(3) {
        //    ["token_type"]=>
        //    string(6) "bearer"
        //    ["mapi"]=>
        //    string(24) "your_client_id"
        //    ["access_token"]=>
        //    string(24) "user_access_token"
        //  }

You'll want to save the `access_token` so you can access protected APIs for this user. Before you access these APIs you'll need to set the access token.

    // set the access token
    $cx->setAccessToken('user_access_token');
    
    // you can also set the access token when initializeing the CloudExperience object
    $cx = new CloudExperience('YOUR_CLIENT_ID', 'YOUR_CLIENT_SECRET', 'USER_ACCESS_TOKEN);

### Making API calls

Once you've been granted access to the user's account and set the access token you can make a call to get the user's information.

You can use the `get`, `post` and `upload` methods.

    // make a call to /users/self
    $cx->get('/users/self');
        //  array(1) {
        //    ["profile"]=>
        //    array(6) {
        //      ["id"]=>
        //      string(22) "some_id"
        //      ["username"]=>
        //      string(7) "your_username"
        //    }
        //  }

### Uploading files

Uploading files works the same way as all other API calls. Make sure you prepend the file name with an '@' sign as you see below.

    $params = array(
      'file_content_type' => 'image/jpg',
      'file' => '@foobar.jpg'
    );
    $cx->upload('/data/self:/foobar.jpg', $params);
        //  Array(14) {
        //    ["id"]=>
        //    string(22) "some_id"
        //    ["version"]=>
        //    int(1)
        //    ["created"]=>
        //    string(24) "2012-10-22T21:26:47.700Z"
        //    ["modified"]=>
        //    ["shares"]=>
        //    array(0) {
        //    }
        //    ["stats"]=>
        //    array(1) {
        //      ["comments"]=>
        //      int(0)
        //    }
        //    ["suspended"]=>
        //    bool(false)
        //  }
                
