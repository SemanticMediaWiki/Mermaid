ARG MW_VERSION
ARG PHP_VERSION
FROM gesinn/mediawiki-ci:${MW_VERSION}-php${PHP_VERSION}

ARG MW_VERSION
ARG SMW_VERSION
ARG PHP_VERSION

# get needed dependencies for this extension
RUN sed -i s/80/8080/g /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

RUN composer-require.sh mediawiki/semantic-media-wiki ${SMW_VERSION}
RUN composer update 


RUN chown -R www-data:www-data /var/www/html/extensions/SemanticMediaWiki/

ENV EXTENSION=Mermaid
COPY composer*.json package*.json /var/www/html/extensions/$EXTENSION/

RUN cd extensions/$EXTENSION && composer update

COPY . /var/www/html/extensions/$EXTENSION

RUN echo \
        "wfLoadExtension( 'SemanticMediaWiki' );\n" \
        "enableSemantics( 'localhost' );\n" \
        "wfLoadExtension( '$EXTENSION' );\n" \
    >> __setup_extension__
