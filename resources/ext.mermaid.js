/*!
 * @file
 * @ingroup SMW
 *
 * @licence GNU GPL v2+
 * @author mwjames
 */

/*global mediaWiki, mermaid */
/*jslint white: true */

import mermaid from 'mermaid';
window.mermaid = mermaid;

const generateString = (length) =>
  Array(length)
    .fill("")
    .map(() => Math.random().toString(36).charAt(2))
    .join("");

function decodeHtmlEntities(str) {
  const textarea = document.createElement('textarea');
  textarea.innerHTML = str;
  return textarea.value;
}

async function initMermaid() {
  if (typeof mermaid === 'undefined') {
    console.error('[Mermaid] Global "mermaid" object not found.');
    return;
  }

  const items = document.querySelectorAll('.ext-mermaid');
  await Promise.all(Array.from(items).map(async (item, index) => {
    const id = 'ext-mermaid-' + generateString(8) + '-' + index;

    let data;
    try {
      data = typeof item.dataset.mermaid === 'string'
        ? JSON.parse(item.dataset.mermaid)
        : {};
    } catch (e) {
      console.error('[Mermaid] Failed to parse data-mermaid:', e);
      return;
    }

    if (!data.content || typeof data.content !== 'string') {
      console.error('[Mermaid] No diagram content provided.');
      return;
    }

    // Hide loading animation (dots)
    const dots = item.children[0];
    if (dots) dots.style.display = 'none';

    try {
      mermaid.initialize({
		securityLevel: 'loose',
		...data.config
	  });
      const { svg, bindFunctions } = await mermaid.render(id + '-svg', decodeHtmlEntities(data.content));
      const graph = document.createElement('div');
      graph.id = id;
      graph.innerHTML = svg;
      item.appendChild(graph);
      bindFunctions?.(graph);
    } catch (e) {
      console.error(`[Mermaid] Failed to render diagram with id=${id}:`, e);
    }
  }));
}

initMermaid();
