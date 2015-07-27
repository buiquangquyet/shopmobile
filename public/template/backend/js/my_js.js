$(document).ready(function(){
    $("a#edit_is_gird").click(function(){
        var url     = $(this).attr('alt');
        var temp = $(this);
        
        console.log(url);
        $.get(url, function(data){
            var json = console.log(data);
            obj = JSON.parse(data);
            var status = obj.status;
            var icon = obj.icon;
            temp.html(icon);
            temp.attr( "alt", status);
        });
    });
});

$(document).ready(function(){
    $("a#editpublish").click(function(){
        var url     = $(this).attr('alt');
        var temp = $(this);
        $.get(url, function(data){
            obj = JSON.parse(data);
            var status = obj.status;
            console.log(data);
            var icon = obj.icon;
            temp.html(icon);
            temp.attr("alt", status);    
        });
        return false;
    });
});





function BrowseServer1(){
    var finder = new CKFinder();
    finder.basePath = '../';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField1;
    finder.popup();
}
function SetFileField1( fileUrl ){
    document.getElementById( 'xFilePath1','image' ).value = fileUrl;
}

function BrowseServer2(){
    var finder = new CKFinder();
    finder.basePath = '../';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField2;
    finder.popup();
    }
function SetFileField2( fileUrl ){
    document.getElementById( 'xFilePath2','image' ).value = fileUrl;
    }

function BrowseServer3(){
    var finder = new CKFinder();
    finder.basePath = '../';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField3;
    finder.popup();
}
function SetFileField3( fileUrl ){
    document.getElementById( 'xFilePath3','image' ).value = fileUrl;
}

function BrowseServer4(){
    var finder = new CKFinder();
    finder.basePath = '../';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField4;
    finder.popup();
}
function SetFileField4( fileUrl ){
    document.getElementById( 'xFilePath4','image' ).value = fileUrl;
}

function BrowseServer5(){
    var finder = new CKFinder();
    finder.basePath = '../';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField5;
    finder.popup();
}
function SetFileField5( fileUrl ){
    document.getElementById( 'xFilePath5','image' ).value = fileUrl;
}

function BrowseServer6(){
    var finder = new CKFinder();
    finder.basePath = '../';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField6;
    finder.popup();
}
function SetFileField6( fileUrl ){
    document.getElementById( 'xFilePath6','image' ).value = fileUrl;
}

function BrowseServer7(){
    var finder = new CKFinder();
    finder.basePath = '../';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField7;
    finder.popup();
}
function SetFileField7( fileUrl ){
    document.getElementById( 'xFilePath7','image' ).value = fileUrl;
}

function BrowseServer8(){
    var finder = new CKFinder();
    finder.basePath = '../';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField8;
    finder.popup();
}
function SetFileField8( fileUrl ){
    document.getElementById( 'xFilePath8','image' ).value = fileUrl;
}

function BrowseServer9(){
    var finder = new CKFinder();
    finder.basePath = '../';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField9;
    finder.popup();
}
function SetFileField9( fileUrl ){
    document.getElementById( 'xFilePath9','image' ).value = fileUrl;
}

function BrowseServer10(){
    var finder = new CKFinder();
    finder.basePath = '../';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField10;
    finder.popup();
}
function SetFileField10( fileUrl ){
    document.getElementById( 'xFilePath10','image' ).value = fileUrl;
}

