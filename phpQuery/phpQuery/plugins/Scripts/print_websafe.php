<?php
/**
 * Script makes content safe for printing as web page and not redirecting client.
 *
 * @author Tobiasz Cudnik <tobiasz.cudnik/gmail.com>
 */
/** @var phpQuery_Object */
$self = $self;
$self
	->find('script')
		->add('meta[http-equiv=refresh]')
			->add('meta[http-equiv=Refresh]')
				->remove();