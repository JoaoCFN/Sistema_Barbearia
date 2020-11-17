import { IconDefinition } from '@fortawesome/free-solid-svg-icons';

export class BasicCard {

  constructor(public title :string,
    public data: any,
    //public headerIcon: IconDefinition,
    public footer:string,
    //public footerIcon: IconDefinition,
    public cardType: number,) {


  }

}
