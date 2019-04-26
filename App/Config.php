<?php
declare(strict_types = 1);

namespace App;

class Config {

	const DB_HOST = 'localhost';
	const DB_NAME = 'quizzer';
	const DB_USER = 'root';
	const DB_PASS = '';

	const SHOW_ERRORS = true; //TODO: Disable for production

  const USE_URL_TRAILING_SLASH = false;

	const TEMPLATE_DIR = '/App/Templates/default';

	const TEMPLATE_CACHING = false;

	const CACHE_DIRECTORY = '/cache/files';

	const ENCRYPTION_KEY = 'C358533A9E2DF8FE316CD57DCEF29';

}
