<?php
include_once 'config/core.php';

include_once 'config/database.php';
include_once 'objects/product.php';
include_once 'objects/category.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$category = new Category($db);

$search_term = isset($_GET['s']) ? $_GET['s'] : '';

$page_title = "You searched for '{$search_term}'";

include_once 'layout_header.php';

$stmt = $product->search($search_term, $from_record_num, $records_per_page);

$page_url = 'search.php?s={$search_term}&';

$total_rows = $product->countAll_BySearch($search_term);

include_once 'read_template.php';

include_once 'layout_footer.php';
?>