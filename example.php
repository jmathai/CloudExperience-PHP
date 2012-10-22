<?php
include 'CloudExperience.php';
$cx = new CloudExperience('YOUR_CLIENT_ID', 'YOUR_CLIENT_SECRET');

// get the authorization URL
$cx->getAuthorizationUrl('https://yoursite.com');
// https://www.cx.com/mycx/oauth/authorize?client_id=your_client_id&redirect_uri=https%3A%2F%2Fyoursite.com

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

// set the access token
$cx->setAccessToken('user_access_token');

// make a call to /users/self
$cx->get('/users/self');
//  array(1) {
//    ["profile"]=>
//    array(6) {
//      ["id"]=>
//      string(22) "some_id"
//      ["username"]=>
//      string(7) "your_username"
//      ["quota"]=>
//      array(10) {
//        ["totalCapacity"]=>
//        int(10000000000)
//        ["totalConsumed"]=>
//        int(3548945)
//        ["totalConsumedWithVersions"]=>
//        int(3548945)
//        ["totalConsumedNoVersions"]=>
//        int(3548945)
//        ["consumedByUserFiles"]=>
//        int(3548945)
//        ["consumedByUserFilesWithVersions"]=>
//        int(3548945)
//        ["consumedByUserFilesNoVersions"]=>
//        int(3548945)
//        ["consumedByUserFilesInTrashWithVersions"]=>
//        int(0)
//        ["consumedByUserFilesInTrashNoVersions"]=>
//        int(0)
//        ["consumedByGroupFiles"]=>
//        array(1) {
//          ["gMd4zgZ2EeKGhRICOASQIQ"]=>
//          array(7) {
//            ["groupId"]=>
//            string(22) "some_id"
//            ["consumed"]=>
//            int(0)
//            ["consumedAllVersions"]=>
//            int(0)
//            ["consumedNoVersions"]=>
//            int(0)
//            ["consumedInTrashWithVersions"]=>
//            int(0)
//            ["consumedInTrashNoVersions"]=>
//            int(0)
//            ["capacity"]=>
//            int(200000000)
//          }
//        }
//      }
//      ["avatar"]=>
//      string(0) ""
//      ["contact"]=>
//      array(4) {
//        ["email"]=>
//        string(18) "youremail@gmail.com"
//        ["phoneNumbers"]=>
//        array(0) {
//        }
//        ["instantMessage"]=>
//        array(0) {
//        }
//        ["socialLinks"]=>
//        array(0) {
//        }
//      }
//      ["account"]=>
//      array(3) {
//        ["active"]=>
//        bool(true)
//        ["plan"]=>
//        array(4) {
//          ["id"]=>
//          int(1)
//          ["name"]=>
//          string(4) "10GB"
//          ["oneOff"]=>
//          bool(false)
//          ["quota"]=>
//          int(10000000000)
//        }
//        ["graceLength"]=>
//        int(604800000)
//      }
//    }
//  }

// upload a photo
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
//    ["name"]=>
//    string(7) "foobar.jpg"
//    ["description"]=>
//    string(0) ""
//    ["size"]=>
//    int(349)
//    ["created"]=>
//    string(24) "2012-10-22T21:26:47.700Z"
//    ["modified"]=>
//    string(24) "2012-10-22T21:26:47.700Z"
//    ["isDir"]=>
//    bool(false)
//    ["checksum"]=>
//    string(27) "some_checksum"
//    ["checksumMethod"]=>
//    string(4) "SHA1"
//    ["md5checksum"]=>
//    string(22) "some_other_checksum"
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
