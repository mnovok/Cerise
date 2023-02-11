/* Get all elements with class heart-icon */
const heartIcons = document.querySelectorAll('.car .heart-icon');
for (let i = 0; i < heartIcons.length; i++) {
	const heartIcon = heartIcons[i];
	// add an event listener to each heart icon and define what happens on a click event
	heartIcon.addEventListener('click', handleHeartIconClick);
}

async function handleHeartIconClick(e) {
	
// add and remove fa-heart and fa-heart-o classes depending on which one is currently present
const heartIcon = e.currentTarget; // clicked heart icon

const card = heartIcon.closest('.card');
const cardId = card.getAttribute('data-card-id');

const isCurrentlyLiked = heartIcon.classList.contains('fa-heart');
try {
	const serverResponse = await fetch(
		`API.php?action=toggleCardLike&id=${cardId}&liked=${isCurrentlyLiked ? 0 : 1}`
	);
	const responseData = await serverResponse.json();

	if (!responseData.success) {
		throw new Error(`Error liking card: ${responseData.reason}`);
	}

	if (!isCurrentlyLiked) {
		// if heart is 'empty'
		heartIcon.classList.remove('fa-heart-o');
		heartIcon.classList.add('fa-heart');
	} else {
		heartIcon.classList.remove('fa-heart');
		heartIcon.classList.add('fa-heart-o');
	}
} catch (error) {
	throw new Error(error.message || error);
}


}

const starElements = document.querySelectorAll('.card .bookmark-icon');

for (let i = 0; i < starElements.length; i++) {
	const bookmarkElement = starElements[i];
	bookmarkElement.addEventListener('click', handleBookmarkClick);
}

async function handleBookmarkClick(e) {
	const bookmark = e.currentTarget;
	const bookmarkContainer = bookmark.parentElement;
	const bookmarkSiblings = bookmarkContainer.children;

	const card = star.closest('.card');
	const cardId = card.getAttribute('data-card-id');
	
	try{
		const serverResponse = await fetch(
			`API.php?action=toggleBookmark&id=${cardId}&starIndex=${starIndex}`
		);
		const responseData = await serverResponse.json();

		if (!responseData.success) {
			throw new Error(`Error toggle star: ${responseData.reason}`);
		}

		let clickedStarPassed = false;

		for (let i = 0; i < starSiblings.length; i++) {
			const currentStar = starSiblings[i];

			if (!clickedStarPassed) {
				currentStar.classList.remove('fa-star-o');
				currentStar.classList.add('fa-star');
			} else {
				currentStar.classList.remove('fa-star');
				currentStar.classList.add('fa-star-o');
			}

			if (currentStar == star) {
				clickedStarPassed = true;
			}
		}

	}
	catch(error){
		throw new Error(error.message || error);
	}
	
}
