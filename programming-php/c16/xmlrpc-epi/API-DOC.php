<?php
echo "<!-- API-DOC.html is generated from API-DOC.php.  Do not edit the html file directly -->";
echo "<html><head><title>xmlrpc-epi-php API reference</title></head><body>";

$api = array(methods => 
      array(
         array(id => "encoding",
               title => "request (de)serialization",
               desc => "these functions are used to convert between php native data types and the xml " .
                       "vocabulary in either direction. these, plus a network request function, are all " .
                       "that are required for a simple xmlrpc client",
               notes => "",
               methods => array(
                  array(method => "xmlrpc_encode_request",
                        desc => "generate xml for a method call or response",
                        sig => "string xmlrpc_encode_request(string method, mixed params [, array output_options])",
                        ret => "generated xml string or false on failure",
                        args => array(
                           method => "method to call on remote server. if null, generated xml is a response",
                           params => "argument data of any type. should match remote method signature",
                           output_options => "see <a href='#output_options'>output_options</a>"
                           )
                  ),
                  array(method => "xmlrpc_decode_request",
                        desc => "decode xml into native php types. also returns methodname",
                        sig => "string xmlrpc_decode_request(string method, string& method [, encoding])",
                        ret => "a single value of any type.  usually an array.",
                        args => array(
                           xml => "raw xml to decode",
                           method => "variable to store method name in. (pass by ref). unchanged if not a method call",
                           encoding => "input encoding to translate to.  defaults to iso-8859-1"
                           )
                  ),
                  array(method => "xmlrpc_encode",
                        desc => "generate xml for a value, sans <method[Call|Response]>",
                        sig => "string xmlrpc_encode(mixed value)",
                        ret => "generated xml string or false on failure",
                        args => array(
                           value => "php value to be serialized"
                           )
                  ),
                  array(method => "xmlrpc_decode",
                        desc => "decode xml into native php types",
                        sig => "mixed xmlrpc_decode(string xml [,string encoding])",
                        ret => "a single value of any type.  usually an array.",
                        args => array(
                           xml => "raw xml to decode",
                           encoding => "input encoding to translate to.  defaults to iso-8859-1"
                           )
                  )
   
               )
         ),
         array(id => "server",
               desc => "these functions are provided to enable easy creation of an xmlrpc server. " .
                       "basically, a server, once created, will register user methods and then process " .
                       "requests. the requests are in the form of raw xml data that can be passed " .
                       "directly to xmlrpc_server_call_method, which will call a previously registered " .
                       "user method and return the result.",
               notes => "",
               methods => array(
                  array(method => "xmlrpc_server_create",
                        desc => "create an xml server",
                        sig => "handle xmlrpc_server_create()",
                        ret => "a handle to a newly created server or false on failure"
                  ),
                  array(method => "xmlrpc_server_destroy",
                        desc => "destroy server resources. it is good practice to call this function " .
                                "however if you do not, the server will be destroyed at the end of the " .
                                "request regardless.",
                        sig => "void xmlrpc_server_destroy(handle server)",
                        ret => "void",
                        args => array(
                           handle => "handle to a server created with xmlrpc_server_create"
                           )
                  ),
                  array(method => "xmlrpc_server_register_method",
                        desc => "register a php function to handle method matching method_name ",
                        sig => "int xmlrpc_server_register_method(handle server, string method_name, string function)",
                        ret => "true, or false on failure",
                        args => array(
                           handle => "handle to a server created with xmlrpc_server_create",
                           method_name => "public (xmlrpc) method name",
                           "function" => "name of application (php) function that will implement the method"
                           )
                  ),
                  array(method => "xmlrpc_server_call_method",
                        desc => "parse xml request and call method ",
                        sig => "mixed xmlrpc_server_call_method(handle server, string xml, mixed user_data [, array output_options])",
                        ret => "result of method call. this will either be a php value, or an xml encoded representation of " .
                               "that value, depending on output_options",
                        args => array(
                           handle => "handle to a server created with xmlrpc_server_create",
                           xml => "raw xml request string",
                           user_data => "any data the application needs to pass to the method handler function",
                           output_options => "see <a href='#output_options'>output_options</a>"
                           )
                  ),
                  array(method => "xmlrpc_server_set_method_description",
                        desc => "set method description for a method",
                        sig => "int xmlrpc_server_set_method_description(handle server, string method, struct description)",
                        ret => "1 if success.  0 otherwise",
                        args => array(
                           handle => "handle to a server created with xmlrpc_server_create",
                           method => "name of method being described",
                           description => "a method description, as defined by the system.describeMethods <a href='http://xmlrpc-epi.sourceforge.net/system.describeMethods.php'>spec</a>"
                           )
                  )
               )
         ),
         
         array(id => "introspection",
               desc => "it is important to have good documentation for any public API.  the introspection " .
                       "functions enable server developers to generate highly descriptive documentation describing " .
                       "methods and their parameter types using a simple XML vocabulary. further, a callback " .
                       "mechanism is provided because documentation generation can be expensive and thus should " .
                       "only be done on demand, particularly in php's interpreted per request environment.",
               notes => "",
               methods => array(
                  array(method => "xmlrpc_server_register_introspection_callback",
                        desc => "register a php function to generate documentation when it is requested (lazy evaluation). " .
                                "this is more efficient and should be used in preference to the parse/add methods. " .
                                "the user function simply needs to return xml conforming to the introspection spec, and " .
                                "it will automatically be parsed, registered with the server and returned to the client as appropriate",
                        sig => "int xmlrpc_server_register_introspection_callback(handle server, string function)",
                        ret => "true, or false on failure",
                        args => array(
                           handle => "handle to a server created with xmlrpc_server_create",
                           "function" => "name of application (php) function that will implement the method. " .
                                         "function signature is:<br>  string func(mixed user_data)"
                           )
                  ),
                  array(method => "xmlrpc_parse_method_descriptions",
                        desc => "parse xml into a method description. See the <a href='http://xmlrpc-epi.sourceforge.net/specs/rfc.system.describeMethods.php'>introspection spec</a> for " .
                                "a description of the xml vocabulary",
                        sig => "array xmlrpc_parse_method_descriptions(string xml)",
                        ret => "an array suitable for use with xmlrpc_server_add_introspection_data, or null if failure",
                        args => array(
                           xml => "xml conforming to introspection spec"
                        )
                  ),
                  array(method => "xmlrpc_server_add_introspection_data",
                        desc => "adds introspection data to a server for future use",
                        sig => "bool xmlrpc_server_add_introspection_data(handle server, array desc)",
                        ret => "bool.  true if successful",
                        args => array(
                           handle => "handle to a server created with xmlrpc_server_create",
                           desc   => "a description created with xmlrpc_parse_method_description"
                           )
                  )
               )
         ),


         array(id => "types",
               title => "type manipulation",
               desc => "these functions are provided because of the unique implementation of the base64 and " .
                       "datetime data types.  neither of these types are native to php, so it is necessary to " .
                       "store and retrieve that meta information somehow. This second implementation achieves" .
                       "this by converting the value to a php object and storing type information in a member",
               notes => "",
               methods => array(
                  array(method => "xmlrpc_set_type",
                        desc => "set xmlrpc type, base64 or datetime, for a php string value. " .
                                "if successful, the string will be converted to an object. the object " .
                                "will have a member 'xmlrpc_type', which contains the new type, and a " .
                                "member 'scalar', which contains the actual value",
                        sig => "bool xmlrpc_set_type(string &value, string type)",
                        ret => "true, or false on failure",
                        args => array(
                           value => "a reference to a string. typically containing either base64 or an iso 8601 conforming date.",
                           type => "a string. one of the <a href='#xmlrpc_type'>allowed types</a>"
                           )
                  ),
                  array(method => "xmlrpc_get_type",
                        desc => "get xmlrpc type for a php value. especially useful for base64 and datetime strings which do not have php type equivalents.",
                        sig => "string xmlrpc_get_type(mixed value)",
                        ret => "a string indicating the value's xmlrpc type. see <a href='#types'>types</a>",
                        args => array(
                           value => "value to determine type of"
                           )
                  ),
                  array(method => "xmlrpc_is_fault",
                        desc => "check if a returned value is a fault",
                        sig => "bool xmlrpc_is_fault(array value)",
                        ret => "true if value is a fault, false otherwise",
                        args => array(
                           value => "array value to query"
                           )
                  )
               )
           )
     ),
     data => array(
        array(
           id => "xmlrpc_type",
           type => "defines",
           vals => array(
              none => "not a value",
              "empty" => "value created but not set, or null.",
              base64 => "base64 encoded string, usually for sending binary data",
              boolean => "true or false",
              datetime => "iso 8601 encoded date/time string",
              "double" => "floating point value",
              "int" => "integer",
              string => "a string",
              "array" => "an array",
              "struct" => "a struct"
              )
           ),
        array(
           id => "output_options",
           desc => "sets xml generation options.  any values not set will use defaults",
           type => "hashed array",
           vals => array(
             "output_type" => "return data as either <i>php</i> native data types or <i>xml</i> encoded. if" .
                              "<i>php</i> is used, then the other values are ignored. default = <i>xml</i>",

             "verbosity" => "determine compactness of generated xml. options are <i>no_white_space</i>, " .
                            "<i>newlines_only</i>, and <i>pretty</i>.  default = <i>pretty</i>",

             "escaping" =>  "determine how/whether to escape certain characters. 1 or more values are " .
                            "allowed.  If multiple, they need to be specified as a sub-array. " .
                            "options are: <i>cdata</i>, <i>non-ascii</i>, <i>non-print</i>, and <i>markup</i>." .
                            "default = <i>non-ascii, non-print, markup</i>",

             "version" => "version of xml vocabulary to use.  currently, three are supported: <i>xmlrpc</i>, " .
                          "<i>soap 1.1</i>, and <i>simple</i>. The keyword <i>auto</i> is also recognized to mean respond in whichever " .
				              "version the request came in. default = <i>auto</i> (when applicable), <i>xmlrpc</i>",

             "encoding" => "the encoding that the data is in.  Since PHP defaults to iso-8859-1 you will " .
                           "usually want to use that. Change it if you know what you are doing. default=<i>iso-8859-1</i>"

              ),
           example => 
'$output_options = array(
                       "output_type" => "xml",
                       "verbosity" => "pretty",
                       "escaping" => array("markup", "non-ascii", "non-print"),
                       "version" => "xmlrpc",
                       "encoding" => "utf-8"
                      );
or

$output_options = array("output_type" => "php");'
           )
        )
   );

echo "<center><h1>contents</h1></center>";

foreach($api[methods] as $section) {
   $id = $section[id];
   $title = $section[title] ? $section[title] : $id;
   echo "<h1><a href='#$id'>$title</a></h1><ul>";
   foreach($section[methods] as $meth) {
      $method = $meth[method];
      echo "<li><a href='#$method'>$method</a>\n";
   }
   echo "</ul>\n";
}

echo "<h1><a href='#data'>data structures</a></h1><ul>";
foreach($api[data] as $data) {
   $id = $data[id];
   echo "<li><a href='#$id'>$id</a>\n";
}
echo "</ul>";


echo "<center><h1>API Reference</h1></center>";

foreach($api[methods] as $section) {
   $id = $section[id];
   $title = $section[title] ? $section[title] : $id;
   $desc = $section[desc] ? "<p>" . $section[desc] . "</p>" : "";
   echo "<h1><a name='$id'>$title</a></h1>$desc<blockquote>";
   foreach($section[methods] as $meth) {
      $method = $meth[method];
      $desc = $meth[desc];
      $sig = $meth[sig];
      $ret = $meth[ret];
      echo <<< END
 <h3><a name='$method'>$sig</a></h3>
 <blockquote>
 $desc
 <p>
 <b>returns:</b> $ret
 <p>
END;
      if($meth[args]) {
         echo "<b>args:</b></br><blockquote>";
         foreach($meth[args] as $arg => $val) {
            echo "<b>$arg:</b> $val<br>";
         }
         echo "</blockquote>";
      }
      echo "<br><br>";

      echo "</blockquote>\n";
   }
   echo "</blockquote>\n";
}

echo "<h1><a name='data'>data structures</a></h1>";
foreach($api[data] as $data) {
   $id = $data[id];
   $type = $data[type];
   $desc = $data[desc];
   $xmp = $data[example];

   echo "<h3><a name='$id'>$id</a></h3><blockquote>";
   echo "<b>type: $type</b><br>";
   if($desc) {
      echo "$desc<br>";
   }
   echo "<br><b>values:</b><blockquote>";


   foreach($data[vals] as $val => $desc) {
      echo "<b>$val:</b> $desc<br><br>";
   }
   echo "</blockquote>";

   if($xmp) {
      echo "<h3>example usage</h3>";
      echo "<xmp>\n$xmp\n</xmp>";
   }

   echo "</blockquote>";
}

?>
</html>
