import { Component, ViewChild } from '@angular/core';
import { ClientService } from './services/client.service';
import { MiaTableComponent, MiaTableConfig } from '@agencycoda/mia-table';
import { MiaFormConfig, MiaFormModalConfig } from '@agencycoda/mia-form';
import {MiaFormModalComponent} from '@agencycoda/mia-form';
import { MatDialog } from '@angular/material/dialog';
import { DeleteModalComponent } from './modals/delete-modal/delete-modal.component';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent {

  @ViewChild('tableComp') tableComp!: MiaTableComponent;

  tableConfig: MiaTableConfig = new MiaTableConfig();

  constructor(
    private clientService: ClientService,
    protected dialog: MatDialog,)
  { }


  ngOnInit() {

    this.tableConfig.service = this.clientService

    this.tableConfig.id = 'table-test';

    this.tableConfig.columns = [
      { key: 'firstname', type: 'string', title: 'First Name', field_key: 'firstname'},
      { key: 'lastname', type: 'string', title: 'Last Name', field_key: 'lastname'},
      { key: 'email', type: 'string', title: 'Email', field_key: 'email'},
      { key: 'more', type: 'more', title: '', extra: {
        actions: [
          { icon: 'create', title: 'Edit', key: 'edit' },
          { icon: 'delete', title: 'Delete', key: 'remove' },
        ]
      } },
    ];

    this.tableConfig.loadingColor = 'white';
    this.tableConfig.hasEmptyScreen = true;
    this.tableConfig.emptyScreenTitle = 'No tenes cargado ningun elemento todavia';

    this.tableConfig.onClick.subscribe(result => {

      switch (result.key) {
        case 'edit':

          let data = new MiaFormModalConfig();
          data.item = result.item
          data.service = this.clientService
          data.titleNew = 'Create Contact';
          data.titleEdit = 'Edit Contact';
      
          let config = new MiaFormConfig();
          config.hasSubmit = false;
          config.fields = [
            { key: 'firstname', type: 'string', label: 'First Name' },
            { key: 'lastname', type: 'string', label: 'Last Name' },
            { key: 'email', type: 'string', label: 'Email' },
          ];
      
          data.config = config;
      
          return this.dialog.open(MiaFormModalComponent, {
            width: '400px',
            panelClass: 'modal-full-width-mobile',
            data: data
          }).afterClosed();

          break;

          case 'remove':
            return this.dialog.open(DeleteModalComponent,{
              data:{
                item: result.item
              }
            }).afterClosed().subscribe(result => {
    
              this.tableComp.loadItems()
        
            })
          break;

      }

      return 0

    });


  }
  

  addNewClient() {
    let data = new MiaFormModalConfig();
    data.item = {firstname: '', lastname: '', email: ''};
    data.service = this.clientService
    data.titleNew = 'Create Contact';
    data.titleEdit = 'Edit Contact';

    let config = new MiaFormConfig();
    config.hasSubmit = false;
    config.fields = [
      { key: 'firstname', type: 'string', label: 'First Name' },

      { key: 'lastname', type: 'string', label: 'Last Name' },
      { key: 'email', type: 'string', label: 'Email' },
    ];

    data.config = config;

    return this.dialog.open(MiaFormModalComponent, {
      width: '400px',
      panelClass: 'modal-full-width-mobile',
      data: data
    }).afterClosed().subscribe(result => {

      this.tableComp.loadItems()

    })
  }

}
