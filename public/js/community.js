// Community data
const communityData = {
  PawFriends: {
    avatar: "🐶",
    post: "Terima kasih untuk semua relawan yang ikut turun tangan di kegiatan vaksinasi hewan hari ini! 🐾🐕",
    author: "Angela Valerie",
    time: "2 jam yang lalu",
    bgColor: "#f0e8d5",
    useImage: true,
  },
  "Green Earth": {
    avatar: "🌍",
    post: "Berhasil menanam 500 pohon hari ini! Mari terus jaga bumi kita bersama!",
    author: "Admin",
    time: "5 jam yang lalu",
    bgColor: "#90EE90",
  },
  EduShare: {
    avatar: "🎓",
    post: "Donasi buku mencapai 1000 buku bulan ini. Terima kasih semua!",
    author: "Admin",
    time: "1 hari yang lalu",
    bgColor: "#FFB6C1",
  },
  HelpingHands: {
    avatar: "🤝",
    post: "Distribusi bantuan untuk korban banjir sudah mencapai 200 keluarga.",
    author: "Admin",
    time: "3 jam yang lalu",
    bgColor: "#FFD9B3",
  },
}

let joinedCommunities = []

// Check localStorage for joined communities
function loadJoinedCommunities() {
  joinedCommunities = []
  Object.keys(communityData).forEach((communityName) => {
    if (localStorage.getItem(`member_${communityName}`) === "true") {
      joinedCommunities.push(communityName)
    }
  })
}

// Filter functionality
function initializeFilters() {
  const filterButtons = document.querySelectorAll(".filter-btn")
  const communityCards = document.querySelectorAll(".community-card")

  filterButtons.forEach((button) => {
    button.addEventListener("click", () => {
      filterButtons.forEach((btn) => btn.classList.remove("active"))
      button.classList.add("active")

      const filter = button.getAttribute("data-filter")
      // const searchTerm = document.getElementById("searchInput").value.toLowerCase()

      communityCards.forEach((card) => {
        const category = card.getAttribute("data-category")
        // const communityName = card.getAttribute("data-name").toLowerCase()
        // const description = card.querySelector(".community-description").textContent.toLowerCase()

        communityCards.forEach((card) => {
          const category = card.getAttribute("data-category")

          const matchesFilter =
            filter === "all" || category === filter

          card.style.display = matchesFilter ? "block" : "none"
        })
      })
    })
  })
}

// Search functionality
function initializeSearch() {
  const searchInput = document.getElementById("searchInput")
  const communityCards = document.querySelectorAll(".community-card")

  searchInput.addEventListener("input", (e) => {
    const searchTerm = e.target.value.toLowerCase()
    const activeFilter = document.querySelector(".filter-btn.active")?.getAttribute("data-filter") || "all"

    communityCards.forEach((card) => {
      const communityName = card.getAttribute("data-name").toLowerCase()
      const description = card.querySelector(".community-description").textContent.toLowerCase()
      const category = card.getAttribute("data-category")

      const matchesSearch = communityName.includes(searchTerm) || description.includes(searchTerm)
      const matchesFilter = activeFilter === "all" || category === activeFilter

      if (matchesSearch && matchesFilter) {
        card.style.display = "block"
      } else {
        card.style.display = "none"
      }
    })
  })
}

// Detail button click handler
function initializeDetailButtons() {
  const detailButtons = document.querySelectorAll(".detail-btn")
  detailButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      const card = e.target.closest(".community-card")
      const communityName = card.getAttribute("data-name")
      window.location.href = `/community/${encodeURIComponent(communityName)}`
    })
  })
}

// Update my communities section
function updateMyCommunitiesSection() {
  const myCommunitiesSection = document.getElementById("myCommunities")
  const joinedCommunitiesList = document.getElementById("joinedCommunitiesList")

  if (joinedCommunities.length > 0) {
    myCommunitiesSection.classList.remove("hidden")
    joinedCommunitiesList.innerHTML = ""

    joinedCommunities.forEach((communityName) => {
      const data = communityData[communityName]
      if (data) {
        const card = document.createElement("div")
        card.className = "community-card-joined"
        card.style.marginBottom = "15px"
        card.onclick = () => {
          window.location.href = `/forum?community=${encodeURIComponent(communityName)}`
        }

        const isImageAvatar = data.useImage
        const avatarClass = isImageAvatar ? "dog-community" : ""
        const avatarContent = isImageAvatar ? "" : data.avatar
        const avatarStyle = isImageAvatar
          ? `background-color: ${data.bgColor};`
          : `background-color: ${data.bgColor}; font-size: 32px;`

        card.innerHTML = `
                    <div class="community-avatar ${avatarClass}" style="${avatarStyle}">
                        ${avatarContent}
                    </div>
                    <div class="community-content">
                        <h3 class="community-name">${communityName}</h3>
                        <p class="community-post">
                            <span class="post-author">${data.author}:</span> ${data.post}
                        </p>
                        <p class="post-time">${data.time}</p>
                    </div>
                    <div class="arrow-icon">›</div>
                `

        joinedCommunitiesList.appendChild(card)
      }
    })
  } else {
    const myCommunitiesSection = document.getElementById('myCommunities');
    console.log(document.getElementById('myCommunities'));
    if (!myCommunitiesSection) {
        return; // ⛔ STOP, element memang tidak ada
    }

    myCommunitiesSection.classList.add("hidden");
  }
}

// Initialize all
document.addEventListener("DOMContentLoaded", () => {
  loadJoinedCommunities()
  updateMyCommunitiesSection()
  initializeFilters()
  // initializeSearch()
  initializeDetailButtons()

  if (typeof window.lucide !== "undefined") {
    window.lucide.createIcons()
  }
})
