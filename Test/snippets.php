<?php
/**
 * Generic snippets to test some sniffs.
 */

/**
 * Test method HttpDeflateStream.
 */
function test_HttpDeflateStream() {
  $stream = new HttpDeflateStream(
    HttpDeflateStream::TYPE_GZIP |
    HttpDeflateStream::LEVEL_MAX |
    HttpDeflateStream::FLUSH_SYNC);

  echo $stream->update($data);
  echo $stream->finish();
}

/**
 * Test HttpInflateStream.
 */
function test_HttpInflateStream() {
  $stream = new HttpInflateStream;
  echo $stream->update($data);
  echo $stream->finish();
}

/**
 * Test HttpMessage.
 */
function test_HttpMessage() {
  $message = new HttpMessage;
  echo $message->setResponseCode(200);
}

/**
 * Test HttpQueryString.
 */
function test_HttpQueryString() {
  $http = new HttpQueryString();
  $http->set(array('page' => 1, 'sort' => 'asc'));
}

/**
 * Test HttpRequest.
 */
function test_HttpRequest() {
  $http = new HttpRequest;
  $http->addCookies(
    array("cookie_name" => "cookie value")
  );
}

/**
 * Test HttpRequestPool.
 */
function test_HttpRequestPool() {
  $http = new HttpRequestPool;
  $http->send();
}

/**
 * Test HttpResponse.
 */
function test_HttpResponse() {
  HttpResponse::setCache(true);
  HttpResponse::setContentType('application/pdf');
  HttpResponse::setContentDisposition("test.pdf", false);
  HttpResponse::setFile('sheet.pdf');
  HttpResponse::send();
}

/**
 * Test Http functions.
 */
function test_functions() {
  http_cache_last_modified();
  http_chunked_decode();
  http_deflate();
  http_inflate();
  http_build_cookie();
  http_date();
  http_get_request_body_stream();
  http_get_request_body();
  http_get_request_headers();
  http_match_etag();
  http_match_modified();
  http_match_request_header();
  http_support();
  http_negotiate_charset();
  http_negotiate_content_type();
  http_negotiate_language();
  ob_deflatehandler();
  ob_etaghandler();
  ob_inflatehandler();
  http_parse_cookie();
  http_parse_headers();
  http_parse_message();
  http_parse_params();
  http_persistent_handles_clean();
  http_persistent_handles_count();
  http_persistent_handles_ident();
  http_get();
  http_head();
  http_post_data();
  http_post_fields();
  http_put_data();
  http_put_file();
  http_put_stream();
  http_request_body_encode();
  http_request_method_exists();
  http_request_method_name();
  http_request_method_register();
  http_request_method_unregister();
  http_request();
  http_redirect();
  http_send_content_disposition();
  http_send_content_type();
  http_send_data();
  http_send_file();
  http_send_last_modified();
  http_send_status();
  http_send_stream();
  http_throttle();
  http_build_str();
  http_build_url();
}
