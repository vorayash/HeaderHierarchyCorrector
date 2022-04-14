/*
 * @package Joomla
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @extension Header hierarchy corrector System Plugin
 */

/*
 * @Correct Heading Hierarchy : first get all the heading tags and add appropriate level in each tag's class. Then replace tag    * depth by extracting level from that tag's class. 
*/

document.addEventListener("DOMContentLoaded", () => {

	// Select all heading tags and add heading class to access heading tags in order
	document.querySelectorAll('h1,h2,h3,h4,h5,h6').forEach(function (elem) {
		elem.classList.add('heading');
	})

	// H_tags stores visited tags with their given level
	let h_tags = {};
	// We will push tag in queue with level required
	let tag_queue = [];
	// Index is order no. of tag
	let index = 1;

	// Iterate over all heading tag
	document.querySelectorAll('.heading').forEach(function (elem) {

		//Depth of h tag. for exa. 1 for h1, 2 for h2
		var depth = parseInt(elem.tagName.substring(1));

		// Key is depth of last heading tag and value is given level to that tag
		let key, value;

		// Here if key is undefined means this is first tag in document
		try {
			key = parseInt(Object.keys(tag_queue[index - 1])[0]);
			value = parseInt(Object.values(tag_queue[index - 1])[0]);
		}
		catch (e) {
			key = undefined;
		}

		// If we encounter h1 tag than check it is already in document or not, if yes then add level 2 in class
		if (depth == 1) {
			// Undefined means it is first h1 tag in document
			if (h_tags[1] === undefined) {
				elem.className = 1 + " " + elem.className;
				h_tags[1] = 1;
			}
			else {
				elem.className = 2 + " " + elem.className;
			}
		}
		else {
			// If tag itself is a first heading tag than it should not be other than h2
			if (key === undefined) {
				if (depth != 2) {
					elem.className = 2 + " " + elem.className;
				}
				else{
					elem.className = 2 + " " + elem.className;
				}
			}

			// If tag is h2 then it is fine
			else if (depth === 2) {
				elem.className = 2 + " " + elem.className;
			}

			// If depth less than preceder then, if tag with this depth is already in document then give that tag's level otherwise check for nearest tag which have depth greater than our tag and give it's level that tag should not be h1. if we not get such tag than give level 2.
			else if (depth < key) {
				if (h_tags[depth] != undefined) {
					elem.className = h_tags[depth] + " " + elem.className;
				}
				else {
					elem.className = 2 + " " + elem.className;
					tag_queue.slice().reverse().forEach((tag) => {
						let tagKey = parseInt(Object.keys(tag)[0]);
						let tagValue = parseInt(Object.values(tag)[0]);

						if (depth > tagKey && tagKey !== 1) {
							elem.className = tagValue + " " + elem.className;
						}
					})
				}
			}

			// If tag depth is one plus of it's preceder than give level+1 of preceder
			else if (depth > key) {
				elem.className = (value + 1) + " " + elem.className;

			}

			// If tag depth is qual to its preceder than give level of preceder
			else if (depth === key) {
				elem.className = value + " " + elem.className;

			}
			 // Add current tag in h_tags with it's given level 
			h_tags[depth] = parseInt(elem.className.substr(0, 1));
		}

		// Object: Key is depth and value is given level
		let obj = {}
		obj[depth] = parseInt(elem.className.substr(0, 1));
		// Add obj in tag_queue
		tag_queue[index++] = obj;
	})

	// Iterate all the heading tags and change depth with given level
	document.querySelectorAll('.heading').forEach(function (elem) {
		elem.outerHTML = elem.outerHTML.replace('<h' + elem.tagName.substr(1), '<h' + elem.className.substr(0, 1))
			.replace('</h' + elem.tagName.substr(1) + '>', '</h' + elem.className.substr(0, 1) + '>');
	})

});
