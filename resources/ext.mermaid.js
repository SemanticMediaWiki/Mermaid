/*!
 * @file
 * @ingroup SMW
 *
 * @licence GNU GPL v2+
 * @author mwjames
 */

/*global jQuery, mediaWiki, mermaid */
/*jslint white: true */

let mermaid = require('./mermaid.min.js');

const generateString = (length) =>
Array(length)
  .fill("")
  .map(() => Math.random().toString(36).charAt(2))
  .join("");

async function init_mermaid(){
  let items = document.querySelectorAll('.ext-mermaid');

  await Promise.all(Array.from(items).map( async (item) => {
    let id = "ext-mermaid-" + generateString(10);
    let data = JSON.parse(item.dataset['mermaid']);

    // Hide animated dots!
    let dots = item.children[0];
    dots.style.display = "none";

    // Render graph
    mermaid.initialize(data.config);
    const { svg } = await mermaid.render(id + '-svg', data.content);

    // Add graph to DOM
    let graph = document.createElement('div');
    graph.id = id;
    graph.innerHTML = svg;
    item.appendChild(graph);
   }));
}
// No longer need to wait for document to load or wrap in closure
init_mermaid();
