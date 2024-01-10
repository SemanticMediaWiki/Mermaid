/*!
 * @file
 * @ingroup SMW
 *
 * @licence GNU GPL v2+
 * @author mwjames
 */

/*global jQuery, mediaWiki, mermaid */
/*jslint white: true */

(function ($, mw) {
  "use strict";

  const generateString = (length) =>
    Array(length)
      .fill("")
      .map(() => Math.random().toString(36).charAt(2))
      .join("");

  mw.loader.using(["mediawiki.api", "ext.mermaid"]).then(function () {
    $(document).ready(function () {
      $(".ext-mermaid").each(function () {
        let that = $(this);

        let id = "ext-mermaid-" + generateString(10);
        let data = that.data("mermaid");

        that.find(".mermaid-dots").hide();
        that.append(`<div id="${id}">${data.content}</div>`);

        mermaid.initialize(data.config);
        mermaid.init(undefined, document.getElementById(id));
      });
    });
  });
})(jQuery, mediaWiki);