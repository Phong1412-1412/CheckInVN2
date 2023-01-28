//
//  ProvinceRow.swift
//  CheckInVN2
//
//  Created by PPPP on 17/01/2023.
//

import SwiftUI

struct ProvinceRow: View {
    @StateObject var FamousModel = ViewModel()
        var body: some View {
            NavigationView {
                List {
                    ForEach(FamousModel.coorFamous, id:\.id)
                    {
                        famous in
                        HStack {
                            Text(famous.name)
              
                        }
                    }
                }
                .navigationTitle("FamousPlace")
                .onAppear{
                    FamousModel.fetchFamous()
                }
            }
    }
}

struct ProvinceRow_Previews: PreviewProvider {
    static var previews: some View {
        ProvinceRow()
    }
}
