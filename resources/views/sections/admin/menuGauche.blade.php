<div id="sidebar" class="sidebar">
			<div data-scrollbar="true" data-height="100%">
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<img src="{{ asset('images/logo-ssma.png') }}" alt="user" />
							</div>
							<div class="info">
								<b class="caret pull-right"></b>{{ Auth::user()->nom ?? 'Admin' }}
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
							<li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
							<li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
							<li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav">

					{{-- USER  --}}
					<li class="has-sub">
						<a href="{{route('admin.users.index')}}">
							<i class="fa-solid fa-user-shield"></i>
							<span>Administrateurs</span>
						</a>
					</li>

                    {{-- MEMBRES  --}}
					<li class="has-sub">
						<a href="{{route('admin.membres.index')}}">
							<i class="fa fa-users"></i>
							<span>Membres</span>
						</a>
					</li>

                    {{-- EQUIPE  --}}
					<li class="has-sub">
						<a href="{{route('admin.equipes.index')}}">
							<i class="fa fa-users"></i>
							<span>Equipe</span>
						</a>
					</li>

                    {{-- MEDIA  --}}
					<li class="has-sub">
						<a href="{{route('admin.media.index')}}">
							<i class="fa fa-photo-video"></i>
							<span>Média</span>
						</a>
					</li>

                    {{-- BOOK --}}
					<li class="has-sub">
						<a href="{{route('admin.books.index')}}">
							<i class="fa fa-book"></i>
							<span>Book</span>
						</a>
					</li>

					{{-- BOOK --}}
					<li class="has-sub">
						<a href="{{route('admin.auteurs.index')}}">
							<i class="fa fa-book"></i>
							<span>Auteur</span>
						</a>
					</li>

                    {{-- EVENTS   --}}
					<li class="has-sub">
						<a href="{{route('admin.events.index')}}">
							<i class="fa fa-calendar-alt"></i>
							<span>Événements</span>
						</a>
					</li>

                    {{-- Contact --}}
					<li class="has-sub">
						<a href="{{route('admin.contacts.index')}}">
							<i class="fa fa-envelope"></i>
							<span>Contact</span>
						</a>
					</li>

					{{-- Déconnexion --}}
					<li class=" mt-2 has-sub">
						<form method="POST" action="{{ route('logout') }}">
								@csrf
							<a class="ml-3 text-gray-500" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
								<i class="fa fa-sign-out-alt"></i>
								<span>Déconnexion</span>
							</a>
						</form>
					</li>

					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="sidebar-bg"></div>
