@extends('layouts.app')

@section('title', 'Articles List')
@section('header', 'Articles List')
@section('content')

    <link rel="stylesheet" href="/admin-lte/plugins/jsgrid/jsgrid.min.css">
    <link rel="stylesheet" href="/admin-lte/plugins/jsgrid/jsgrid-theme.min.css">


    <div id="jsGrid1"></div>


    <script type="text/javascript" src="/admin-lte/plugins/jsgrid/jsgrid.min.js" defer></script>
    <script>

        window.addEventListener('load', function() {
            $(function () {
                $("#jsGrid1").jsGrid({
                    width: "100%",
                    height: "420px",
                    inserting: false,
                    editing: false,
                    sorting: true,
                    paging: true,
                    autoload: true,
                    editButton: false,
                    pageSize: 15,
                    pageButtonCount: 5,
                    deleteConfirm: function(item) {
                        return "The article \"" + item.title + "\" will be removed. Are you sure?";
                    },
                    rowClick: function(args) {
                       // showDetailsDialog("Edit", args.item);

                        window.location.href= "/articles/"+args.item.id+"/edit";
                    },

                    data: {!! json_encode($articles->toArray(), JSON_HEX_TAG) !!},

                    fields: [
                        { name: "title", title: "Title", type: "text", validate: "required", width: 100 },
                        { name: "slug", title: "Slug", type: "text", validate: "required", width: 100 },
                        { name: "excerpt", title: "Excerpt", type: "text", validate: "required", width: 150 },
                        { name: "content", title: "Content", type: "text", validate: "required", width: "100%" },
                        {
                            type: "control",
                            modeSwitchButton: false,
                            editButton: false,
                            headerTemplate: function() {
                                return $("<button>").attr("type", "button").attr("class", "btn btn-block btn-outline-primary").text("+")
                                    .on("click", function () {
                                        window.location.href= "/articles/create";
                                    });
                            }
                        }
                    ],
                    onItemDeleting: function(args) {
                        // cancel deletion of the item with 'protected' field
                        console.error(args);
                        //args.cancel=true;
                        $.ajax({
                            type: "DELETE",
                            url: "/articles/"+args.item.id,

                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (data) {
                                console.error(data);
                            },
                            error: function (error) {
                                console.error(error);

                            }

                        });
                    }
                });


            });
        })

    </script>



@endsection
