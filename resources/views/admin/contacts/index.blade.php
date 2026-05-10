@include("sections.admin.head")

<body>

@include("sections.admin.loader")

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">

    @include("sections.admin.menuHaut")
    @include("sections.admin.menuGauche")

		<!-- Section Content -->
        <div id="content" class="content">

			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Gestion des messages</a></li>
			</ol>

			<h1 class="page-header">Gestion des Messages de Contact</h1>

			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Liste des messages reçus</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>

				<div class="panel-body">
					<table id="data-table-default" class="table table-striped table-bordered table-hover table-td-valign-middle">
						<thead class="bg-dark text-white">
							<tr>
								<th width="1%" class="text-center">#</th>
								<th class="text-nowrap">Nom</th>
								<th class="text-nowrap">Email</th>
								<th class="text-nowrap">Sujet</th>
								<th class="text-nowrap">Message</th>
								<th class="text-nowrap text-center">Date</th>
								<th class="text-nowrap text-center">Lu</th>
								<th class="text-nowrap text-center">Répondu</th>
								<th width="1%" data-orderable="false" class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($contacts as $contact)
                                <tr class="odd gradeX hover-highlight {{ !$contact->lu ? 'table-warning' : '' }}">
                                    <!-- Numéro d'ordre -->
                                    <td width="1%" class="f-w-600 text-inverse text-center">{{ $loop->iteration }}</td>

                                    <!-- Nom -->
                                    <td class="font-weight-bold">
                                        @if(!$contact->lu)
                                            <i class="fa fa-circle text-warning" style="font-size: 8px;"></i>
                                        @endif
                                        {{ $contact->nom }}
                                    </td>

                                    <!-- Email -->
                                    <td>
                                        <a href="mailto:{{ $contact->email }}" class="text-info">
                                            <i class="fa fa-envelope"></i> {{ $contact->email }}
                                        </a>
                                    </td>

                                    <!-- Sujet -->
                                    <td class="font-weight-bold">{{ Str::limit($contact->sujet, 30) }}</td>

                                    <!-- Message -->
                                    <td>
                                        <span class="text-muted">{{ Str::limit($contact->message, 50) }}</span>
                                    </td>

                                    <!-- Date -->
                                    <td class="text-center">
                                        <span class="badge badge-secondary badge-pill">
                                            <i class="fa fa-calendar"></i> {{ $contact->created_at->format('d/m/Y') }}
                                            <br><small>{{ $contact->created_at->format('H:i') }}</small>
                                        </span>
                                    </td>

                                    <!-- Lu -->
                                    <td class="text-center">
                                        @if($contact->lu)
                                            <span class="badge badge-success badge-pill">
                                                <i class="fa fa-check-circle"></i> Oui
                                            </span>
                                        @else
                                            <span class="badge badge-warning badge-pill">
                                                <i class="fa fa-eye-slash"></i> Non
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Répondu -->
                                    <td class="text-center">
                                        @if($contact->repondu)
                                            <span class="badge badge-success badge-pill">
                                                <i class="fa fa-reply"></i> Oui
                                            </span>
                                        @else
                                            <span class="badge badge-danger badge-pill">
                                                <i class="fa fa-times"></i> Non
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Actions -->
                                    <td width="1%" class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-xs btn-info" title="Voir le message"
                                                onclick="openViewModal({{ $contact->id }})"
                                                data-nom="{{ $contact->nom }}"
                                                data-email="{{ $contact->email }}"
                                                data-sujet="{{ $contact->sujet }}"
                                                data-message="{{ $contact->message }}"
                                                data-date="{{ $contact->created_at->format('d/m/Y à H:i') }}"
                                                data-reponse="{{ $contact->reponse }}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            @if(!$contact->lu)
                                                <button type="button" class="btn btn-xs btn-success" title="Marquer comme lu" onclick="markAsRead({{ $contact->id }})">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            @endif
                                            @if(!$contact->repondu)
                                                <button type="button" class="btn btn-xs btn-primary" title="Répondre"
                                                    onclick="openReplyModal({{ $contact->id }})"
                                                    data-nom="{{ $contact->nom }}"
                                                    data-email="{{ $contact->email }}"
                                                    data-sujet="{{ $contact->sujet }}">
                                                    <i class="fa fa-reply"></i>
                                                </button>
                                            @endif
                                            <button type="button" class="btn btn-xs btn-danger" title="Supprimer" onclick="confirmDelete({{ $contact->id }}, '{{ $contact->nom }}')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>

</div>



		<!-- Section scroll to top  -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	</div>

	<!-- Modal de visualisation -->
	<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content bg-dark text-white">
				<div class="modal-header bg-black border-secondary">
					<h5 class="modal-title text-white" id="viewModalLabel">
						<i class="fa fa-envelope-open"></i> Détails du message
					</h5>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body bg-white">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label text-dark font-weight-bold">
									<i class="fa fa-user text-primary"></i> Nom
								</label>
								<p id="view_nom" class="text-dark"></p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label text-dark font-weight-bold">
									<i class="fa fa-envelope text-info"></i> Email
								</label>
								<p id="view_email" class="text-dark"></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label text-dark font-weight-bold">
									<i class="fa fa-tag text-warning"></i> Sujet
								</label>
								<p id="view_sujet" class="text-dark"></p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label text-dark font-weight-bold">
									<i class="fa fa-calendar text-danger"></i> Date
								</label>
								<p id="view_date" class="text-dark"></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="form-label text-dark font-weight-bold">
									<i class="fa fa-comment text-success"></i> Message
								</label>
								<p id="view_message" class="text-dark" style="white-space: pre-wrap;"></p>
							</div>
						</div>
					</div>
					<div class="row" id="view_reponse_section" style="display: none;">
						<div class="col-md-12">
							<div class="alert alert-info">
								<label class="form-label text-dark font-weight-bold">
									<i class="fa fa-reply text-primary"></i> Votre réponse
								</label>
								<p id="view_reponse" class="text-dark" style="white-space: pre-wrap;"></p>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer bg-dark border-secondary">
					<button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">
						<i class="fa fa-times-circle"></i> Fermer
					</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal de réponse -->
	<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content bg-dark text-white">
				<div class="modal-header bg-black border-secondary">
					<h5 class="modal-title text-white" id="replyModalLabel">
						<i class="fa fa-reply"></i> Répondre au message
					</h5>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="replyForm" method="POST">
					@csrf
					@method('PATCH')
					<div class="modal-body bg-white">
						<div class="alert alert-info">
							<h6 class="text-dark"><strong>Message original</strong></h6>
							<p class="text-dark"><strong>De :</strong> <span id="reply_from_nom"></span> (<span id="reply_from_email"></span>)</p>
							<p class="text-dark"><strong>Sujet :</strong> <span id="reply_sujet"></span></p>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="reply_reponse" class="form-label text-dark">
										<i class="fa fa-comment text-primary"></i> Votre réponse *
									</label>
									<textarea class="form-control" id="reply_reponse" name="reponse" rows="6" placeholder="Tapez votre réponse ici..." required></textarea>
									<small class="text-muted">Cette réponse sera enregistrée dans la base de données</small>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer bg-dark border-secondary">
						<button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">
							<i class="fa fa-times-circle"></i> Annuler
						</button>
						<button type="button" class="btn btn-success btn-lg" onclick="confirmReply()">
							<i class="fa fa-paper-plane"></i> Envoyer la réponse
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

    <!-- Section Script -->
    @include("sections.admin.script")

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<style>
		/* Améliorations du design du tableau */
		.table-hover tbody tr:hover {
			background-color: #f8f9fa !important;
			transform: scale(1.01);
			transition: all 0.2s ease;
			box-shadow: 0 2px 8px rgba(0,0,0,0.1);
		}

		.table-warning {
			background-color: #fff3cd !important;
		}

		.badge-pill {
			border-radius: 50rem;
			padding: 0.5em 1em;
		}

		.table thead th {
			border-bottom: 2px solid #dee2e6;
			font-weight: 600;
			text-align: center;
			font-size: 0.9rem;
			letter-spacing: 0.3px;
		}

		.table tbody td {
			vertical-align: middle;
			padding: 1rem 0.75rem;
		}

		.btn-group .btn {
			margin: 0 2px;
			border-radius: 4px;
		}

		.text-muted {
			color: #6c757d !important;
		}

		.font-weight-bold {
			font-weight: 600 !important;
		}

		/* Animation pour les badges */
		.badge {
			transition: all 0.3s ease;
		}

		.badge:hover {
			transform: translateY(-2px);
			box-shadow: 0 4px 8px rgba(0,0,0,0.2);
		}

		/* Améliorations du modal */
		.modal-content {
			border-radius: 15px;
			box-shadow: 0 10px 30px rgba(0,0,0,0.3);
		}

		.modal-header {
			border-radius: 15px 15px 0 0;
		}

		.modal-footer {
			border-radius: 0 0 15px 15px;
		}

		.btn-lg {
			padding: 12px 24px;
			font-size: 16px;
			border-radius: 8px;
		}

		.form-label {
			font-weight: 600;
			margin-bottom: 8px;
		}

		.form-label i {
			margin-right: 8px;
		}

		/* Animation pour les champs */
		.form-control {
			transition: all 0.3s ease;
		}

		.form-control:focus {
			transform: translateY(-2px);
			box-shadow: 0 4px 12px rgba(0,0,0,0.15);
		}
	</style>

	<script>
		function openViewModal(id) {
			// Récupérer le bouton cliqué
			var button = event.target.closest('button');

			// Récupérer les données depuis les attributs data
			var nom = button.getAttribute('data-nom');
			var email = button.getAttribute('data-email');
			var sujet = button.getAttribute('data-sujet');
			var message = button.getAttribute('data-message');
			var date = button.getAttribute('data-date');
			var reponse = button.getAttribute('data-reponse');

			// Remplir le modal avec les données
			document.getElementById('view_nom').textContent = nom || '';
			document.getElementById('view_email').innerHTML = '<a href="mailto:' + email + '">' + email + '</a>';
			document.getElementById('view_sujet').textContent = sujet || '';
			document.getElementById('view_message').textContent = message || '';
			document.getElementById('view_date').textContent = date || '';

			// Afficher la réponse si elle existe
			if (reponse && reponse !== 'null') {
				document.getElementById('view_reponse').textContent = reponse;
				document.getElementById('view_reponse_section').style.display = 'block';
			} else {
				document.getElementById('view_reponse_section').style.display = 'none';
			}

			// Afficher le modal
			$('#viewModal').modal('show');
		}

		function openReplyModal(id) {
			// Récupérer le bouton cliqué
			var button = event.target.closest('button');

			// Récupérer les données depuis les attributs data
			var nom = button.getAttribute('data-nom');
			var email = button.getAttribute('data-email');
			var sujet = button.getAttribute('data-sujet');

			// Remplir le modal avec les données
			document.getElementById('reply_from_nom').textContent = nom || '';
			document.getElementById('reply_from_email').textContent = email || '';
			document.getElementById('reply_sujet').textContent = sujet || '';

			// Réinitialiser le champ de réponse
			document.getElementById('reply_reponse').value = '';

			// Mettre à jour l'action du formulaire
			document.getElementById('replyForm').action = '/admin/contacts/' + id + '/reply';

			// Afficher le modal
			$('#replyModal').modal('show');
		}

		function markAsRead(id) {
			// Créer un formulaire temporaire pour l'envoi
			var form = document.createElement('form');
			form.method = 'POST';
			form.action = '/admin/contacts/' + id + '/mark-read';

			var csrfToken = document.createElement('input');
			csrfToken.type = 'hidden';
			csrfToken.name = '_token';
			csrfToken.value = '{{ csrf_token() }}';

			var methodField = document.createElement('input');
			methodField.type = 'hidden';
			methodField.name = '_method';
			methodField.value = 'PATCH';

			form.appendChild(csrfToken);
			form.appendChild(methodField);
			document.body.appendChild(form);
			form.submit();
		}

		// Fonction de confirmation pour supprimer un message
		function confirmDelete(id, nom) {
			Swal.fire({
				title: 'Êtes-vous sûr ?',
				text: `Voulez-vous vraiment supprimer définitivement le message de "${nom}" ?`,
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Oui, supprimer !',
				cancelButtonText: 'Annuler'
			}).then((result) => {
				if (result.isConfirmed) {
					// Créer un formulaire temporaire pour l'envoi
					var form = document.createElement('form');
					form.method = 'POST';
					form.action = '/admin/contacts/' + id;

					var csrfToken = document.createElement('input');
					csrfToken.type = 'hidden';
					csrfToken.name = '_token';
					csrfToken.value = '{{ csrf_token() }}';

					var methodField = document.createElement('input');
					methodField.type = 'hidden';
					methodField.name = '_method';
					methodField.value = 'DELETE';

					form.appendChild(csrfToken);
					form.appendChild(methodField);
					document.body.appendChild(form);
					form.submit();
				}
			});
		}

		// Fonction de confirmation pour envoyer une réponse
		function confirmReply() {
			Swal.fire({
				title: 'Envoyer la réponse ?',
				text: 'La réponse sera enregistrée dans la base de données.',
				icon: 'question',
				showCancelButton: true,
				confirmButtonColor: '#28a745',
				cancelButtonColor: '#6c757d',
				confirmButtonText: 'Oui, envoyer !',
				cancelButtonText: 'Annuler'
			}).then((result) => {
				if (result.isConfirmed) {
					// Soumettre le formulaire
					document.getElementById('replyForm').submit();
				}
			});
		}
	</script>
</body>
</html>
