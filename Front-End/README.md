  <ul class="flex justify-center space-x-2 text-white list-none">
        <li>
          <button
            @click="currentTab(1)"
            class="collections-btn inline-block px-4 py-2 text-center text-black border-none bg-transparent focus:outline-none"
          >
            <div class="w-[70px] h-[70px] rounded-full bg-white mb-5">
              <img
                src="@/assets/icon/icon_pizza_active.png"
                class="collections-icon"
                :class="[tab === 1 ? 'active' : '']"
                alt=""
              />
            </div>
            <div
              class="collections-text"
              :class="[tab === 1 ? 'active' : '']"
            >
              Pizza
            </div>
          </button>
        </li>
        <li>
          <button
            @click="currentTab(2)"
            class="collections-btn inline-block px-4 py-2 text-center text-black border-none bg-transparent focus:outline-none"
          >
            <div class="w-[70px] h-[70px] rounded-full bg-white mb-5">
              <img
                src="@/assets/icon/icon_khaivi_active.png"
                class="collections-icon"
                :class="[tab === 2 ? 'active' : '']"
                alt=""
              />
            </div>
            <div
              class="collections-text"
              :class="[tab === 2 ? 'active' : '']"
            >
              Mì Ý
            </div>
          </button>
        </li>
        <li>
          <button
            @click="currentTab(3)"
            class="collections-btn inline-block px-4 py-2 text-center text-black border-none bg-transparent focus:outline-none"
          >
            <div class="w-[70px] h-[70px] rounded-full bg-white mb-5">
              <img
                src="@/assets/icon/icon_salad_active.png"
                class="collections-icon"
                :class="[tab === 3 ? 'active' : '']"
                alt=""
              />
            </div>
            <div
              class="collections-text"
              :class="[tab === 3 ? 'active' : '']"
            >
              Salad
            </div>
          </button>
        </li>
        <li>
          <button
            @click="currentTab(4)"
            class="collections-btn inline-block px-4 py-2 text-center text-black border-none bg-transparent focus:outline-none"
          >
            <div class="w-[70px] h-[70px] rounded-full bg-white mb-5">
              <img
                src="@/assets/icon/icon_douong_active.png"
                class="collections-icon"
                :class="[tab === 4 ? 'active' : '']"
                alt=""
              />
            </div>
            <div
              class="collections-text"
              :class="[tab === 4 ? 'active' : '']"
            >
              Đồ uống
            </div>
          </button>
        </li>
        <li>
          <button
            @click="currentTab(5)"
            class="collections-btn inline-block px-4 py-2 text-center text-black border-none bg-transparent focus:outline-none"
          >
            <div class="w-[70px] h-[70px] rounded-full bg-white mb-5">
              <img
                src="@/assets/icon/icon_combo_active.png"
                class="collections-icon"
                :class="[tab === 5 ? 'active' : '']"
                alt=""
              />
            </div>
            <div
              class="collections-text"
              :class="[tab === 5 ? 'active' : '']"
            >
              Combo
            </div>
          </button>
        </li>
      </ul>